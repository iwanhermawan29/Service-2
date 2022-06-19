<?php

namespace App\Http\Controllers\API;

use App\Models\Post;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ArticleController extends Controller
{
    public function index()
    {
        // return Article::all();
        $articles = Post::orderBy('Title', 'ASC')->paginate(5);
        return response()->json($articles);
    }

    //get by status2
    public function status2(Request $request)
    {
        $status = $request->input('status');
        $articles = Post::where('Status', $status)->orderBy('Title', 'ASC')->paginate(5);
        return response()->json($articles);
    }

    //Get by status
    public function status($status)
    {
        $articles = Post::where('Status', $status)->orderBy('Title', 'ASC')->paginate(5);
        return response()->json($articles);
    }

    public function show($id)
    {
        return Post::find($id);
    }

    public function store(Request $request)
    {
        $article = Post::create($request->all());

        return response()->json($article, 201);
    }

    //delete function post/article/{id}
    public function delete($id)
    {
        Post::find($id)->delete();
        return response()->json(null, 204);
    }
}
