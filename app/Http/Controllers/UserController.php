<?php

namespace App\Http\Controllers;

use App\Models\User;
use Exception;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function list()
    {
        return view('panel.user.list', [
            'users' => user::all()
        ]);
    }
    public function add()
    {
        return view('panel.user.add');
    }
    public function insert(Request $request)
    {
        User::create([
            'name' => $request->name
        ]);
        return redirect('/panel/user')->with('success', 'user Added');
    }
    public function edit($id) {

        return view('panel.user.edit', [
            'user' => User::findOrFail($id)
        ]);
    }
    public function update($id,Request $request) {

        $user = User::findOrFail($id);
        $user->update([
            'name' => request('name'),
        ]);
        return redirect('/panel/user')->with('success', 'user Updated');
    }
    public function delete($id)
    {
        try{
            User::findOrFail($id)->delete();
            return redirect('/panel/user')->with('success', 'user Deleted');
        }catch(Exception $e){
            return redirect('/panel/user')->with('error', 'user can not be deleted');
        }

    }
}
