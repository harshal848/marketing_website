<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::latest()->paginate(3);

        return view('posts.index', ['posts' => $posts])
        ->with('i', (request()->input('page', 1) - 1) * 3);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('posts.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'mimes:jpg,jpeg,png,bmp,tiff |max:4096'
            ]
        );

        $post = new Post();
        $post->title  = $request->get('title');
        $post->content = $request->get('content');


        $img = $request->file('image');
        $img_name = 'blog_image_.'.time().'.' . $img->getClientOriginalExtension();
        $img->move(public_path('blog_images/'), $img_name);


        $post->filename = $img_name;

        $post->save();
        return redirect()->route('posts.index')->with('status', 'New article has been successfully created!');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        return view('posts.edit', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required',
            'content' => 'required',
            'image' => 'mimes:jpg,jpeg,png,bmp,tiff |max:4096'
            ]
        );
        $post = Post::find($id);
        $post->title = $request->get('title');
        $post->content = $request->get('content');

        if ($request->file('image')) {
            # code...
        $img = $request->file('image');
        $img_name =  '_blog_image.'.time(). $img->getClientOriginalExtension();
        $img->move(public_path('blog_images/'), $img_name);


        $post->filename = $img_name;
        }

        $post->save();
        return redirect()->route('posts.index')->with('status', 'Blog post has been successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $post->delete();

        return redirect()->route('posts.index')
        ->with('success', 'Post deleted successfully');
    }
}
