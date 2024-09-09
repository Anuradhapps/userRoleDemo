<?php

namespace App\Http\Controllers;

use App\Models\Role;
use Exception;
use Illuminate\Http\Request;
use PhpParser\Node\Stmt\TryCatch;

class RoleController extends Controller
{
    public function list()
    {
        return view('panel.role.list', [
            'roles' => Role::all()
        ]);
    }
    public function add()
    {
        return view('panel.role.add');
    }
    public function insert(Request $request)
    {
        Role::create([
            'name' => $request->name
        ]);
        return redirect('/panel/role')->with('success', 'Role Added');
    }
    public function edit($id) {

        return view('panel.role.edit', [
            'role' => Role::findOrFail($id)
        ]);
    }
    public function update($id,Request $request) {

        $role = Role::findOrFail($id);
        $role->update([
            'name' => request('name')
        ]);
        return redirect('/panel/role')->with('success', 'Role Updated');
    }
    public function delete($id)
    {
        try{
            Role::findOrFail($id)->delete();
            return redirect('/panel/role')->with('success', 'Role Deleted');
        }catch(Exception $e){
            return redirect('/panel/role')->with('error', 'Role can not be deleted');
        }

    }
}
