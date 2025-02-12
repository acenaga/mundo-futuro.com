<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Torchlight\Block;
use Torchlight\Torchlight;

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
        $this->validate($request, [
            'title' => 'required',
            'content' => 'required',
            'category_id' => 'required',
            'excerpt' => 'required',
            'featured_image' => 'required | mimes:jpeg,png,jpg,gif | max:2048'
        ]);

        $input = $request->all();
        $input['user_id'] = auth()->user()->id;
        $post = Post::create($input);
        if ($request->file('featured_image')) {
            $post->featured_image = $request->file('featured_image')->store('posts', 'public');
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

    public function uploads(Request $request)
    {
        // Validar que se haya enviado un archivo
        $request->validate([
            'file' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // Ajusta las reglas de validación según tus necesidades
        ]);
        try {
            $path = $request->file('file')->store('posts', 'public');
            return response()->json([
                'location' => Storage::url($path)
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al subir el archivo'. $e->getMessage()
            ], 422);
        }
    }

    public function highlight(Request $request)
    {
        $code = $request->input('code');
        $language = $request->input('language');

        $block = new Block();
        $block->code($code)->language($language);

        $highlightedCode = Torchlight::highlight($block)->wrapped();

        return response()->json([
            'highlightedCode' => $highlightedCode
        ]);
    }
}
