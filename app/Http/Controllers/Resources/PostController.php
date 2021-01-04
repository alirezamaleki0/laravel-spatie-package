<?php

namespace App\Http\Controllers\Resources;

use App\Http\Controllers\Controller;
use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{

    public function index()
    {
        return Post::all();
    }


    public function create(Request $request)
    {
        $post = Post::create([
            'title' => $request->title,
            'body' => $request->body
        ]);
        if ($post) {
            return redirect()->back()->with('message', 'post created successfully');
        }
        return redirect()->back()->with(
            'error',
            'something is wrong for create this new post! Please Try Again Later'
        );
    }

    public function show($id)
    {
        $post = Post::find($id);
        if ($post) {
            return $post;
        }
        return redirect()->back()->with(
            'error',
            'something is wrong for present this post! Please Try Again Later'
        );
    }

    public function edit($id, Request $request)
    {

        $post = Post::where('id', $id)->update([
            'title' => $request->title,
            'body' => $request->body
        ]);
        if ($post) {

            return redirect()->back()->with('message', 'post edited successfully');
        }

        return redirect()->back()->with('error',
        'something is wrong for edit this post! Please Try Again Later');
    }

    public function destroy($id)
    {

        $post = Post::destroy($id);

        if ($post) {

            return redirect()->back()->with('message', 'post deleted successfully');
        }

        return redirect()->back()->with('error',
            'something is wrong for delete this post! Please Try Again Later');
    }
}
