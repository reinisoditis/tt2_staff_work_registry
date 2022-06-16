<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;


class DashboardController extends Controller
{
    public function show() {
        $user = Auth::user();
        $works = DB::table('works')
                ->join ('projects', 'project_id', '=', 'projects.id')
                ->join ('work_types', 'worktype_id', '=', 'work_types.id')
                ->select('works.*', 'projects.name as project_name','work_types.name as worktype_name')
                ->where('user_id', '=', $user->id)
                ->orderBy('works.to', 'desc')
                ->paginate(10);
        return view('dashboard', ['works' => $works]);
    }
}
