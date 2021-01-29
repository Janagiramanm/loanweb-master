<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Role;
use Illuminate\Support\Facades\DB;


class RoleController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $roles = Role::all();
        return view('back-office.roles.index')->with('roles', $roles);
    }

    public function create()
    {
        return view('back-office.roles.create');
    }

    public function store(Request $request)
    {
        $role = $request->all();
        $roles =  Role::create(['name' => $role['name']]);
        return redirect()->route('back-office.roles.index');
    }

    public function edit(Role $role)
    {
        return view('back-office.roles.edit')->with('role', $role );
    }

    public function update(Request $request, Role $role)
    {

        $role->name = $request->name;
        $role->save();

        return redirect()->route('back-office.roles.index');
    }

    public function destroy(Role $role)
    {
        // dd($role);
        DB::table("roles")->where('id',$role->id)->delete();
        return redirect()->route('back-office.roles.index')
                        ->with('success','Role deleted successfully');

    }
}
