<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show_front($slug)
    {
        $post = Post::where('slug', $slug)->with('user', 'category', 'comments')->first();

        //dd($post);
        return view('posts.show', compact('post'));
    }

    /**
     * Display a listing of the resource to the front.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_front()
    {
        $posts = Post::with('user', 'category', 'comments')->get();

        return view('posts.posts', compact('posts'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();

        return view('admin.posts.create', [
            'categories' => $categories,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $this->validate($request, [
        //     'title' => 'required',
        //     'content' => 'required',
        //     'category_id' => 'required',
        //     'excerpt' => 'required',
        //     'featured_image' => 'image | mimes:jpeg,png,jpg,gif | max:2048'
        // ]);

        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        $post = Post::create($input);

        if ($request->file('featured_image')) {
            $post->featured_image = $request->file('featured_file')->store('posts', 'public');
            $post->save();
        }

        return back()->with('success', 'Post added to database.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
