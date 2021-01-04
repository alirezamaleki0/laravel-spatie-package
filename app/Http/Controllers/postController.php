<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Resources\PostController as ResourcesPostController;

class postController extends Controller
{

    /*
    | / alirezamaleki944@gmail.com /
    | take a look at AppServiceProvider
    | ResourcesPostController resolved as a single instance
    |
    */

    public function index()
    {
        $posts = app(ResourcesPostController::class)->index();
        return view('post.index', ['posts' => $posts]);
    }

    public function create()
    {
        return view('post.create');
    }

    public function show($id)
    {
        $post = app(ResourcesPostController::class)->show($id);
        return view('post.show', ['post' => $post]);
    }

    public function destroy($id)
    {
        app(ResourcesPostController::class)->destroy($id);
        return redirect()->back();
    }

    public function edit($id)
    {
        $post = app(ResourcesPostController::class)->show($id);
        return view('post.edit', ['post' => $post]);
    }
}
