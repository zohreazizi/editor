<?php

namespace App\Http\Controllers;


use App\Http\Requests;
use App\Models;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EditorController
{
    public function create()
    {
        return view('editor');
    }

    public function store(StorePostRequest $request)
    {

        $userId = Auth::id();
        $post = new Post();
        $post->title = $request->title;
        $post->content = $request->ckeditor;
        $post->user_id = $userId;
        $post->save();
//        return view('success');
        return response()->json(['success' => 'Posted!']);

    }
}
