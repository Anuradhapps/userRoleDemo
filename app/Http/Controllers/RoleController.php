<?php

namespace App\Http\Controllers;

use App\Models\permission;
use App\Models\PermissionedRole;
use App\Models\Role;
use Exception;
use Illuminate\Http\Request;


class RoleController extends Controller
{
    public function list()
    {
        if(!in_array('role', $this->getPermission())){
          abort(404);
        }
        return view('panel.role.list', [
            'roles' => Role::all(),
            'permissionNames'=>$this->getPermission()
        ]);
    }
    public function add()
    {
        $groupCategories = Permission::groupBy('group_by')->select('id', 'name', 'group_by')->get();
        $data = [];

        foreach ($groupCategories as $groupCategory) {
            $groupData = Permission::where('group_by', $groupCategory->group_by)->get()->toArray();
            $data[] = [
                'id' => $groupCategory->id,
                'name' => $groupCategory->name,
                'group' => $groupData
            ];
        }
        return view('panel.role.add', ['data' => $data]);
    }
    public function insert(Request $request)
    {


        $new = Role::create([
            'name' => $request->name
        ]);

        foreach ($request->permission_id as $permissionId) {
            PermissionedRole::create([
                'role_id' => $new->id,
                'permission_id' => $permissionId
            ]);
        }

        return redirect('/panel/role')->with('success', 'Role Added');
    }
    public function edit($id)
    {
        $groupCategories = Permission::groupBy('group_by')->select('id', 'name', 'group_by')->get();
        $data = [];

        foreach ($groupCategories as $groupCategory) {
            $groupData = Permission::where('group_by', $groupCategory->group_by)->get()->toArray();
            $data[] = [
                'id' => $groupCategory->id,
                'name' => $groupCategory->name,
                'group' => $groupData
            ];
        }
        $permissionIds = PermissionedRole::where('role_id', $id)->pluck('permission_id')->toArray();
        return view('panel.role.edit', [
            'role' => Role::findOrFail($id),
            'data' => $data,
            'permissionIds' => $permissionIds
        ]);
    }
    public function update($id, Request $request)
    {
        $role = Role::findOrFail($id);
        $role->update([
            'name' => request('name')
        ]);
        PermissionedRole::where('role_id', $id)->delete();
        if ($request->permission_id) {
            foreach ($request->permission_id as $permissionId) {
                PermissionedRole::create([
                    'role_id' => $id,
                    'permission_id' => $permissionId
                ]);
            }
        }
        return redirect('/panel/role')->with('success', 'Role Updated');
    }
    public function delete($id)
    {
        try {
            Role::findOrFail($id)->delete();
            return redirect('/panel/role')->with('success', 'Role Deleted');
        } catch (Exception $e) {
            return redirect('/panel/role')->with('error', 'Role can not be deleted');
        }
    }
}
