<?php

declare(strict_types=1);

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Torchlight\Block;
use Torchlight\Torchlight;
use Spatie\Tags\Tag;

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


        return view('posts.show', compact('post'));
    }

    /**
     * Display a listing of the resource to the front.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_front()
    {
        $posts = Post::with('user', 'category', 'comments', 'tags')->paginate(5);

        return view('posts.posts', [
            'posts' => $posts
        ]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();

        return view('admin.posts.index', [
            'posts' => $posts,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.create', [
            'categories' => $categories,
            'tags' => $tags,
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
            'featured_image' => 'required | mimes:jpeg,png,jpg,gif | max:2048',
        ]);


        $input = $request->all();

        $input['user_id'] = auth()->user()->id;
        $post = Post::create($input);
        if ($request->file('featured_image')) {
            $post->featured_image = $request->file('featured_image')->store('posts', 'public');
            $post->save();
        }

        if ($request->tags) {
            $post->attachTags($request->tags);
        }

        return redirect()
            ->route('posts.index')
            ->with('success', 'Post added to database.');


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
        $post = Post::find($id);
        $categories = Category::all();
        $tags = Tag::all();

        return view('admin.posts.edit', [
            'post' => $post,
            'categories' => $categories,
            'tags' => $tags,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $post = Post::find($id);
        $oldImage = $post->featured_image;

        $post->update([
            'title' => $request->title,
            'content' => $request->content,
            'category_id' => $request->category_id,
            'excerpt' => $request->excerpt,
            'published' => $request->published,
        ]);

        // Manejar cambio de imagen destacada
        if ($request->file('featured_image')) {
            if ($oldImage) {
                Storage::disk('public')->delete($oldImage);
            }
            $post->featured_image = $request->file('featured_image')->store('posts', 'public');
            $post->save();
        }

        if ($request->tags) {
            $post->syncTags($request->tags);
        } else {
            $post->tags()->detach();
        }

        return back()->with('success', 'Post updated in database.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        if ($post->featured_image) {
            Storage::disk('public')->delete($post->featured_image);
        }

        // Extraer y eliminar imágenes del contenido
        $content = $post->content;
        $doc = new \DOMDocument();
        libxml_use_internal_errors(true); // Habilitar el manejo interno de errores de libxml
        $doc->loadHTML(mb_convert_encoding($content, 'HTML-ENTITIES', 'UTF-8'));
        libxml_clear_errors(); // Limpiar los errores después de la carga
        $images = $doc->getElementsByTagName('img');
        $imagesToDelete = [];

        // Recopilar todas las rutas de imágenes
        foreach ($images as $img) {
            $src = $img->getAttribute('src');

            // Verificar si la URL es absoluta y contiene '/storage/'
            if (strpos($src, '/storage/') !== false) {
                // Extraer la ruta relativa de la URL absoluta
                $parsedUrl = parse_url($src);
                $path = $parsedUrl['path']; // Obtener la ruta (por ejemplo, "/storage/images/example.jpg")

                // Eliminar el prefijo '/storage/' para obtener la ruta en el disco
                $path = str_replace('/storage/', '', $path);
                // Agregar la ruta al array de imágenes a eliminar
                $imagesToDelete[] = $path;
            }
        }

        // Eliminar las imágenes
        foreach ($imagesToDelete as $path) {
            if (Storage::disk('public')->exists($path)) {
                Storage::disk('public')->delete($path);
            }
        }

        $post->delete();

        return back()->with('success', 'Post deleted from database.');
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
                'location' => Storage::url($path),
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'error' => 'Error al subir el archivo'.$e->getMessage(),
            ], 422);
        }
    }

    public function highlight(Request $request)
    {
        $code = $request->input('code');
        $language = $request->input('language');

        $block = new Block;
        $block->code($code)->language($language);

        $highlightedBlocks = Torchlight::highlight($block);
        $highlightedCode = $highlightedBlocks[0]->wrapped;

        return response()->json([
            'highlightedCode' => $highlightedCode,
        ]);
    }

    public function deleteImage(Request $request)
    {
        $path = str_replace('/storage/', '', $request->path);
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
            return response()->json(['success' => true]);
        }
        return response()->json(['success' => false, 'message' => 'Image not found'], 404);
    }
}
