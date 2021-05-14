<?php

namespace App\Http\Controllers\users;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use DB;

class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('verified');
        $this->middleware('permission:Editar roles', ['only' => ['update']]);
    }

    public function index()
    {
        $roles = Role::get();
        $permission = Permission::orderBy('name')->get();
        return view('users.roles.index',compact('roles','permission'));
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|unique:roles,name',
            'permission' => 'required',
        ]);
        $role = Role::create(['name' => $request->input('name')]);
        $role->syncPermissions($request->input('permission'));
        return redirect()->route('roles')->with('success','El rol ha sido creado correctamente');
    }
    public function update(Request $request, Role $id){
        $this->validate($request, [
            'name' => 'required',
            'permission' => 'required',
        ]);
        $id->name = $request->input('name');
        $id->save();
        $id->syncPermissions($request->input('permission'));
        return redirect()->route('roles')->with('success','El rol ha sido actualizado correctamente');
    }

    public function delete(Role $id)
    {
        DB::table("role_has_permissions")->where('role_id',$id->id)->delete();
        $id->delete();
        return redirect()->route('roles')
            ->with('success','Se ha eliminado el rol correctamente');
    }
}
