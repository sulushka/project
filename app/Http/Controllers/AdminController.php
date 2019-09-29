<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use App\Group;


class AdminController extends Controller
{
    public function index()
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        $groups=Group::all();
        return view('admin.index', [
            'users' => $users,
            'groups'=>$groups
        ]);
    }

    public function store(Request $request)
    {
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'group_id' => $request->group,
            'is_admin' => $request->is_admin==='on' ? 1 : 0
    ]);
        return redirect()->route('admin.index');
    }

    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect()->back();
    }

    public function schedule() 
    {
        dd('schedule');
    }
}
