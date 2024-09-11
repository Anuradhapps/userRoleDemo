<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function list()
    {
        if(!in_array('user', $this->getPermission())){
            abort(404);
          }
        return view('panel.user.list', [
            'users' => user::all(),
            'permissionNames'=>$this->getPermission()
        ]);
    }
    public function add()
    {
        return view('panel.user.add', [
            'roles' => Role::all()
        ]);
    }
    public function insert(Request $request)
    {
        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns|unique:users',
            'role_id' => 'required',
            'password' => 'required|min:3|max:255'
        ]);
        User::create($validatedData);
        return redirect('/panel/user')->with('success', 'user Added');
    }
    public function edit($id)
    {

        return view('panel.user.edit', [
            'user' => User::findOrFail($id),
            'roles' => Role::all()
        ]);
    }
    public function update($id, Request $request)
    {

        $validatedData = $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email:dns',
            'role_id' => 'required',
            'password' => 'required'

        ]);

        $user = User::findOrFail($id);
        $user->update($validatedData);
        return redirect('/panel/user')->with('success', 'user Updated');
    }
    public function delete($id)
    {
        try {
            User::findOrFail($id)->delete();
            return redirect('/panel/user')->with('success', 'user Deleted');
        } catch (Exception $e) {
            return redirect('/panel/user')->with('error', 'user can not be deleted');
        }
    }
}
