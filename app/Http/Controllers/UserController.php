<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\rolesypermisos\Models\Role;
use App\Models\User;
//use App\Models\rolesypermisos\Models\Permission;




class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

        $this->authorize('haveaccess', 'user.create');        
        //$roles = Role::get();
        //$roles = Role::orderBy('id','Desc')->get();
        $users = User::with('roles')->orderBy('id','Desc')->paginate(10);
        //return $users;
        return view('admin.user.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //$this->authorize('create', User::class);
        //return 'create';
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //$this->authorize('view', [$user, ['user.show', 'userown.show']]);
        $roles = Role::orderBy('name')->get();

        //return $roles;

        return view('admin.user.view', compact('roles', 'user'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        
        $this->authorize('update', $user);
        $roles = Role::orderBy('name')->get();

        //return $roles;

        return view('admin.user.edit', compact('roles', 'user'));

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        $request->validate([
           
            'name'          => 'required|max:50|unique:users,name,'.$user->id,
            'email'          => 'required|max:50|unique:users,email,'.$user->id
           
        ]);

        //dd($request->all());
        
        $user->update($request->all());
        $user->roles()->sync($request->get('roles'));
        return redirect()->route('admin.user.index')->with('status_success', 'El Usuario Se Actulizo Correctamente');
        
        
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        $user->delete();
        
        return redirect()->route('admin.user.index')->with('status_success', 'El Usuario Se A Eliminado Correctamente');
    }
}
