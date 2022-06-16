<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Work;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Auth\Events\Registered;
use Illuminate\Validation\Rules;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('users.index');

        $normalUsers = User::select('*')->where('role_id', '=', 1)->orderby('name','asc')->get();
        $projectManagers = User::select('*')->where('role_id', '=', 2)->orderby('name','asc')->get();
        $admins = User::select('*')->where('role_id', '=', 3)->orderby('name','asc')->get();
        return view('users.index', compact('normalUsers', 'projectManagers', 'admins'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('users.create');
        return view('users.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->authorize('users.create');
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role_id' => 1
        ]);

        event(new Registered($user));
        return redirect()->route('users.index')
        ->with('success', __('messages.ucs'));

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
    public function edit(User $user)
    {
        $this->authorize('users.edit');
        return view('users.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $this->authorize('users.edit');
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users,email,'.$user->id],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);

        $user->update(['name' => $request->name,
        'email' => $request->email,
        'password' => Hash::make($request->password)]);

        return redirect()->route('users.index')
                        ->with('success', __('messages.uus'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('users.delete');
        if(Work::where('user_id', '=', $user->id)->exists()){
            return redirect()->route('users.index')
                        ->withErrors(__('messages.cant'));
        }
        else {
            $user->delete();
            return redirect()->route('users.index')
                        ->with('success', __('messages.uds'));
        }
    }

    public function promote($id)
    {
        $this->authorize('users.promote');
        $user = User::where('id', '=', $id)->first();
        $user->role_id = 2;
        $user->save();
        return redirect()->route('users.index')
                        ->with('success', __('messages.promote'));
    }

    public function demote($id)
    {
        $this->authorize('users.promote');
        $user = User::where('id', '=', $id)->first();
        $user->role_id = 1;
        $user->save();
        return redirect()->route('users.index')
                        ->with('success', __('messages.demote'));
    }
}
