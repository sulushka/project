<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\News;
use App\User;

class NewsController extends Controller
{
    public function search(Request $request)
    {
        $news = News::orderBy('created_at', 'desc')->paginate(10);
        $search = $request->search;
        
        $result = News::where ('title', 'LIKE', '%' . $search . '%')
            ->orWhere ('description', 'LIKE', '%' . $search . '%')->get();
        if (count($result) > 0) {
            return view('news.all', compact('news'))->withDetails($result)->withQuery($search);
        } else {
            $author = User::where('name', $search)->first();
            if(!is_null($author)) {
                $author_id = $author->id;
                $result = News::where('author_id', 'LIKE', '%' . $author_id  . '%')->get();
                return view('news.all', compact('news'))->withDetails($result)->withQuery($search);
            }
            return view('news.all', compact('news'))->withMessage('No Details found. Try to search again !');
        }
    }

    public function index()
    {
        // dd(News::all()); ->
        $news = News::orderBy('id', 'desc')->paginate(10);    
        return view('news.index', compact('news'));
    }
    
    public function destroy($id)
    {
        $news = News::find($id);
        $news->delete();
        return redirect()->back();
    }
    
    public function edit($id)
    {
        $news = News::find($id);
        return view('news.edit', compact('news'));
    }
    
    public function update(Request $request, $id)
    {
        $image = $request->file('image')->store('uploads', 'public');
        $news=News::find($id);
        $news->title = $request->title;
        $news->description = $request->description;
        $news->author_id = auth()->user()->id;
        $news->image = $image;
        $news->save();
        return redirect()->route('news.index');
    }

    public function store(Request $request)
    {
        $image = $request->file('image')->store('uploads', 'public');
        News::create([
            'title' => $request->title,
            'description' => $request->description,
            'author_id' => auth()->user()->id,
            'image' => $image
        ]);
        return redirect()->back();
    }

    public function show(News $news)
    {
        return view('news.show', compact('news'));
    }
}
