<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\User;
use App\Role;
use Gate;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::paginate(5);
            return view ('admin.users.index')->with('users', $users);
        
    }
    public function index1()
    {
        $users = User::with('roles')->whereHas('roles', function($query) {
            $query->where('name', 'Admin');
        })->paginate(5);
            return view ('admin.users.index')->with('users', $users);
        
    }
    public function index2()
    {
        $users = User::with('roles')->whereHas('roles', function($query) {
            $query->where('name', 'teacher');
        })->paginate(5);
            return view ('admin.users.index')->with('users', $users);
        
    }
    public function index3()
    {
        $users = User::with('roles')->whereHas('roles', function($query) {
            $query->where('name', 'student');
        })->paginate(5);
            return view ('admin.users.index')->with('users', $users);
        
    }
    public function index4()
    {
        $users = User::with('roles')->whereHas('roles', function($query) {
            $query->where('name', 'headteacher');
        })->paginate(5);
            return view ('admin.users.index')->with('users', $users);
        
    }
    public function index5()
    {
        $users = User::with('roles')->whereHas('roles', function($query) {
            $query->where('name', 'dean');
        })->paginate(5);
            return view ('admin.users.index')->with('users', $users);
        
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {

        if(Gate::denies('edit-users')){
            return redirect(route('admin.users.index'));
        }

        $roles = Role::all();

        return view ('admin.users.edit')->with([
            'user' => $user,
            'roles' => $roles
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        if(Gate::denies('delete-users')){
            return redirect(route('admin.users.index'));
        }

        $user->roles()->detach();
        $user->delete();

        return redirect()->route('admin.users.index');
    }
}
