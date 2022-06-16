<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Carbon\Carbon;

class ReportController extends Controller
{

    public function personal_index () {
        $user = Auth::user();
        $work_data = Work::select('project_id','time_spent_min','to')->where('user_id', '=', $user->id)->orderBy('to', 'ASC')->get()->groupBy(function($data){
            return Carbon::parse($data->to)->format('M');
        });

        $projects_data = DB::table('works')
        ->join ('projects', 'project_id', '=', 'projects.id')
        ->join ('work_types', 'worktype_id', '=', 'work_types.id')
        ->select(DB::raw('SUM(works.time_spent_min) as spent_time'), 'projects.name as project_name')
        ->where('user_id', '=', $user->id)
        ->groupBy('project_name')
        ->get();

        $worktypes_data = DB::table('works')
        ->join ('projects', 'project_id', '=', 'projects.id')
        ->join ('work_types', 'worktype_id', '=', 'work_types.id')
        ->select(DB::raw('SUM(works.time_spent_min) as spent_time'), 'work_types.name as worktype_name')
        ->where('user_id', '=', $user->id)
        ->groupBy('worktype_name')
        ->get();

        $months=[];
        $timespent=[];
        $projects_names=[];
        $projects_time=[];
        $worktypes_names=[];
        $worktypes_time=[];

        foreach($work_data as $month => $values){
            $months[]=$month;
        }
        foreach($work_data as $time){
            $timespent[]=$time->sum('time_spent_min');
        }
        foreach($projects_data as $project){
            $projects_names[]=$project->project_name;
            $projects_time[]=$project->spent_time;
        }
        foreach($worktypes_data as $worktype){
            $worktypes_names[]=$worktype->worktype_name;
            $worktypes_time[]=$worktype->spent_time;
        }


        return view('reports.personal_index', [
            'months'=> $months,
            'timespent' => $timespent,
            'projects' => $projects_data,
            'projects_names' => $projects_names,
            'projects_time' => $projects_time,
            'worktypes_names' => $worktypes_names,
            'worktypes_time' => $worktypes_time
        ]);
    }

    public function project_index () {

        $overallData = DB::table('works')
        ->join ('projects', 'project_id', '=', 'projects.id')
        ->where('projects.status', '=', 1)
        ->select(DB::raw('SUM(works.time_spent_min) as spent_time, COUNT(DISTINCT works.user_id) as workers'), 'projects.name as project_name')
        ->groupBy('project_name')
        ->get();

        $monthlyData = DB::table('works')
        ->join ('projects', 'project_id', '=', 'projects.id')
        ->join ('work_types', 'worktype_id', '=', 'work_types.id')
        ->select(DB::raw('SUM(works.time_spent_min) as spent_time, YEAR(works.to) as year, MONTH(works.to) as month'), 'projects.name as project_name')
        ->where('projects.status', '=', 1)
        ->groupBy('projects.name','month', 'year')
        ->orderBy('year', 'asc')
        ->orderBy('month', 'asc')
        ->get()
        ->groupBy(function($monthlyData){
            return $monthlyData->year.'-'.date('F', mktime(0,0,0,$monthlyData->month,10));
        });

        $months=[];
        $projects_names=[];
        $projects_time=[];
        $projects_workers=[];

        foreach($overallData as $project){
            $projects_names[]=$project->project_name;
            $projects_time[]=$project->spent_time;
            $projects_workers[]=$project->workers;
        }


        foreach($monthlyData as $month => $values){
            $months[]=$month;
        }

        return view('reports.project_index', [
            'projects_names' => $projects_names,
            'projects_time' => $projects_time,
            'months' => $months,
            'monthlyData' => $monthlyData,
            'projects_workers' => $projects_workers
        ]);
    }
}
