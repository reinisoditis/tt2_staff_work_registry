<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\Project;
use App\Models\WorkType;

use App\Http\Requests\UpdateWorkRequest;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class WorkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /**
         *
         *
         */
    }

    public function create()
    {
        $user = Auth::user();
        $projects=Project::all();
        $worktypes=WorkType::all();
        return view('works.create',compact('projects','worktypes','user'));
    }

    public function store(UpdateWorkRequest $request)
    {
        Work::create($request->all());

        return redirect()->route('dashboard')
                        ->with('success','Work created successfully.');
    }

    public function destroy(Work $work)
    {
        $work->delete();

        return redirect()->route('dashboard')
                        ->with('success','Work deleted successfully');
    }

    public function edit(Work $work)
    {
        $user=Auth::user();
        $projects=Project::all();
        $worktypes=WorkType::all();

        return view('works.edit',compact('projects','worktypes','user','work'));
    }

    public function update(UpdateWorkRequest $request, Work $work)
    {
        $work->update($request->all());

        return redirect()->route('dashboard')
                        ->with('success','Work updated successfully');
    }
}
