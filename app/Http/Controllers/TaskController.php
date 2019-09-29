<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Task;
use App\Group;
use App\User;

class TaskController extends Controller
{
    public function search(Request $request)
    {
        $group_id = auth()->user()->group_id;
        $search = $request->search;
        $tasks = Task::where('group_id', $group_id)->get();
        $task = Task::where('title', 'LIKE', '%' . $search . '%')->orWhere('description', 'LIKE', '%' . $search . '%')->get();
        $filtered = $task->filter(function($value, $key) use ($group_id){
            return $value->group_id == $group_id;
        });
        $result = $filtered->all();
  
        if (count($result) > 0) {
            return view('task.all', compact('tasks'))->withDetails($result)->withQuery($search);
        } else {
            $author = User::where('name', $search)->first();
            if(!is_null($author)) {
                $author_id = $author->id;
                $result = Task::where('author_id', 'LIKE', '%' . $author_id  . '%')->get();
                return view('task.all', compact('tasks'))->withDetails($result)->withQuery($search);
            }
            return view('task.all', compact('tasks'))->withMessage('No Details found. Try to search again !');
        }
    }

    public function index()
    {
        $tasks = Task::orderBy('created_at', 'desc')->paginate(10); 
        $groups = Group::all();   
        return view('task.index', compact('tasks', 'groups'));
    }
    public function destroy($id)
    {
        $tasks = Task::find($id);
        $tasks->delete();
        return redirect()->back();
    }
    
    public function edit($id)
    {
        $tasks = Task::find($id);
        $groups = Group::all();
        return view('task.edit', compact('tasks', 'groups'));
    }
    public function update(Request $request, $id)
    {
        $tasks=Task::find($id);
        $tasks->title=$request->title;
        $tasks->description=$request->description;
        if($request->hasFile('image')) 
        {
            $image = $request->file('image')->store('uploads', 'public');
            $tasks->resources = $image;
        }
        $tasks->author_id=auth()->user()->id;
        $tasks->save();
        return redirect()->route('tasks.index');
    }

    public function store(Request $request)
    {
        if($request->hasFile('image')) 
        {
            $image = $request->file('image')->store('uploads', 'public');
        } else {
            $image=null;
        }
        Task::create([
            'title' => $request->title,
            'description' => $request->description,
            'resources' => $image,
            'group_id' => $request->group,
            'author_id' => auth()->user()->id
        ]);
        return redirect()->back();
    }

    public function show(Task $task) 
    {
        return view('task.show', compact('task'));
    }
}
