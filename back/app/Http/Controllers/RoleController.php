<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Inertia\Response;
use App\Http\Requests\RoleRequest;
//use App\Models\Role as ModelsRole;

class RoleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $roles = Role::paginate(25);
        return inertia(('Roles/Index'),['roles'=>$roles]);
    }

    /**
     * Show the form for creating a new resource.
     * 
     * 
     */
    public function create()
    {
        //
        return inertia('Roles/Create');
    }

    /**
     * Store a newly created resource in storage.
     * @param App\Http\Requests\RoleRequest
     * @return \Illuminate\Http\Response
     */
    public function store(RoleRequest $request)
    {
        Role::create($request->validated());
        return redirect()->route('roles.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     * @param Role $role
     * @return \Illuminate\Http\Response
     */
    public function edit(Role $role)
    {
        return inertia('Roles/Edit',['role' => $role]);
        
    }

    /**
     * Update the specified resource in storage.
     * @param App\Http\Requests\RoleRequest $request
     * @param App\Models\Role $role
     
     * @return \Illuminate\Http\Response
     */
    public function update(RoleRequest $request,Role $role)
    {
        //
        $role->update($request->validated());
        return redirect( route('roles.index'));
    }

    /**
     * Remove the specified resource from storage.
     * @param Role $role
     * @return \Illuminate\Http\Response
     */
    public function destroy(Role $role)
    {
        
        $role->delete();
        return redirect()->route('roles.index');
    }
    
}