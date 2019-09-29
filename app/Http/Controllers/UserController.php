<?php

namespace App\Http\Controllers;

use App\Image;
use App\News;
use App\Profile;
use App\Skill;
use App\User;
use App\Group;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Task;

class UserController extends Controller
{

    public function search(Request $request)
    {
        $users = User::orderBy('created_at', 'desc')->paginate(10);
        $groups=Group::all();
        $search = $request->search;
        $item = User::where ('name', 'LIKE', '%' . $search . '%')->orWhere ('email', 'LIKE', '%' . $search . '%')->get ();
        if (count($item) > 0) {
            return view('admin.index', compact('users','groups'))->withDetails($item)->withQuery($search);
        } else {
            return view('admin.index', compact('users','groups'))->withMessage('No Details found. Try to search again !');
        }
    }

    public function index()
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        return view('user.profile', compact('user'));
    }

    public function edit()
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        $group = $user->group;
        $skills = Skill::all();
        return view('user.edit', compact('user', 'skills'));
    }

    public function update(Request $request)
    {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        if($request->hasFile('image')) 
        {
            if (is_null($user->profile)) {
                Profile::create([
                    'user_id'=> $id
                ]);
            }
            // dd($user->profile->user_image);
            if(!is_null($user->profile->user_image) && \file_exists('storage/'.$user->profile->user_image->img_path)) {
                $img = Image::find($user->profile->user_img);
                unlink('storage/'.$user->profile->user_image->img_path);
            }

            $image = $request->file('image')->store('profile', 'public');
            $image_save = Image::create([
                'img_path' => $image
            ]);
            $user->profile->user_img = $image_save->id;
            if($request->skills) {
                $user->profile->skills_id = $request->skills;
            }
            $user->profile->last_name = $request->lastname;
            $user->profile->bio = $request->bio;
            $user->profile->address = $request->address;
            $user->profile->age = $request->age;
            $user->profile->gender = $request->gender;
            $user->email = $request->email;
            $user->name = $request->name;
            $user->save();
            $user->profile->save();
            // dd($user->profile->user_image->img_path);
            return redirect()->back();
        } else {
            if($request->skills) {
                $user->profile->skills_id = $request->skills;
            }
            if (is_null($user->profile)) {
                Profile::create([
                    'user_id'=> $id
                ]);
            }
            $user->profile->last_name = $request->lastname;
            $user->profile->bio = $request->bio;
            $user->profile->address = $request->address;
            $user->profile->age = $request->age;
            $user->profile->gender = $request->gender;
            $user->email = $request->email;
            $user->name = $request->name;
            $user->profile->save();
            $user->save();
            return redirect()->back();
        }

    }

    public function news()
    {
        $news = News::orderBy('id', 'desc')->get();
        return view('news.all',compact('news'));
    }

    public function tasks()
    {
        $group_id = auth()->user()->group_id;
        $tasks = Task::orderBy('created_at', 'desc')->where('group_id', $group_id)->get();
        return view('task.all', compact('tasks'));

    }

    public function schedule()
    {
        dd('schedule');
    }

}
