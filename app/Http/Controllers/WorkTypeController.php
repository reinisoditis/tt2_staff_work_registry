<?php

namespace App\Http\Controllers;

use App\Models\Work;
use App\Models\WorkType;
use Illuminate\Http\Request;

class WorkTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $worktypes = WorkType::paginate(10);

        return view('worktypes.index', compact('worktypes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('worktypes.create');
        return view('worktypes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('worktypes.create');
        $request->validate([
            'name' => 'required'
        ]);

        WorkType::create($request->all());

        return redirect()->route('worktypes.index')
                        ->with('success', __('messages.wtcs'));
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
    public function edit(WorkType $worktype)
    {
        $this->authorize('worktypes.edit');
        return view('worktypes.edit',compact('worktype'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, WorkType $worktype)
    {
        $this->authorize('worktypes.edit');
        $request->validate([
            'name' => 'required'
        ]);

        $worktype->update($request->all());

        return redirect()->route('worktypes.index')
                        ->with('success', __('messages.wtus'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(WorkType $worktype)
    {
        $this->authorize('worktypes.delete');
            if(Work::where('worktype_id', '=', $worktype->id)->exists()){
                return redirect()->route('worktypes.index')
                            ->withErrors(__('messages.cant'));
            }
            else{
                $worktype->delete();
                return redirect()->route('worktypes.index')
                        ->with('success', __('messages.wtds'));
            }
    }
}
