<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
#use Illuminate\Support\AggregateServiceProvider;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{
    public function index()
    {
        return view('auth.drafts.edit');
    }

    public function top()
    {
        $articles = Post::orderBy('created_at', 'asc')->get();
        return view('top')->with('articles', $articles);
    }

    public function post(Request $request)
    {
        $request->validate([
            'title' => 'required|unique:posts|max:255',
            'tag' => 'required|string',
            'article' => 'required|string',
        ]);

        $tag =explode(' ', $request->tag);
        $tag1 = $tag[0];
        $tag2 = (isset($tag[1]))? $tag[1] : null;
        $tag3 = (isset($tag[2]))? $tag[2] : null;

        $article = Post::create([
            'user_id' => Auth::user()->id,
            'title' => $request->title,
            'tag1' => $tag1,
            'tag2' => $tag2,
            'tag3' => $tag3,
            'body' => $request->article,
        ]);

        return redirect('/');
        #リダイレクトがうまくいかない
        #return redirect('auth.show/',$article->id);
    }
    public function show($id)
    {
        $article = Post::where('id', $id)->first();
        return view('auth.show', compact('article'));
        #return view('auth.item', compact('article'));
    }

}
