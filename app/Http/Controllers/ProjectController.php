<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\Project;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $projects = Project::paginate(10);

        return view('projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('projects.create');
        return view('projects.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('projects.create');
        $rules = array(
            'name' => 'required',
            'status' => 'required'
        );

        $validated = $this->validate($request, $rules);

        $project = new Project();
        $project->name = $validated["name"];
        $project->status = $validated["status"];
        $project->save();

        return redirect()->route('projects.index')
                        ->with('success', __('messages.pjcs'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Project $project)
    {
        $this->authorize('projects.edit');
        return view('projects.edit',compact('project'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Project $project)
    {
        $this->authorize('projects.edit');
        $rules = array(
            'name' => 'required',
            'status' => 'required'
        );

        $validated = $this->validate($request, $rules);

        $project = Project::where('id', $project->id)->first();
        $project->name = $validated["name"];
        $project->status = $validated["status"];
        $project->save();

        return redirect()->route('projects.index')
                        ->with('success', __('messages.pjus'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Project $project)
    {
        $this->authorize('projects.delete');
        if(Work::where('project_id', '=', $project->id)->exists()){
            return redirect()->route('projects.index')
                        ->withErrors(__('messages.cant'));
        }
        else{
            $project->delete();
            return redirect()->route('projects.index')
                        ->with('success', __('messages.pjds'));
        }
    }
}
