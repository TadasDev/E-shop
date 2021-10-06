<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PostController extends Controller
{

    const PAGE_SIZE = 6;


    public function index()
    {
        $user = auth()->user();
        $posts = $user->posts()->orderBy('price', 'desc')->paginate(self::PAGE_SIZE);

        return view('posts.post', compact('posts'));
    }

    public function create()
    {
        return view('Posts.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required'],
            'description' => ['required'],
            'price' => ['required']
        ]);

        $post = Post::firstOrNew([
            'user_id' => Auth::id(),
            'title' => $request->title,
            'description' => $request->description,
            'price' => $request->price,
        ]);

        $post->save();

        if (!$post->wasRecentlyCreated) {
            return back()->with('message', 'this post already exists');
        } else {
            return redirect()->route('posts')->with('message', 'your post created successfully!');
        }

    }


    public function show(Post $post)
    {
        return view('posts.single', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
