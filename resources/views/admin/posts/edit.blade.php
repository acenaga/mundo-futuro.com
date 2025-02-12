<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 bg-white border-b border-gray-200">
                    @if ($errors->any())
                        <div class="bg-red-600 p-4 text-stone-300 rounded-md mb-4">
                            hay errores en los datos del formulario. Por favor, revisalos y volvé a intentar.
                        </div>
                    @endif
                    <div class="flex justify-between">
                        <h1 class="text-2xl font-bold text-gray-600">Crear Nuevo Post</h1>
                    </div>
                    <form action="{{ route('posts.update', $post->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 gap-6 mt-4">
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
                                <input
                                    type="text"
                                    name="title"
                                    id="title"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    value="{{ old('title', $post->title) }}"
                                >
                                @error('title')
                                    <div class="text-red-700 p-3 mt-4">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-6 mt-4 min-h-screen">
                            <div>
                                <label for="content" class="block text-sm font-medium text-gray-700">Contenido</label>
                                <textarea
                                    name="content"
                                    id="content"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                >{{ old('content', $post->content) }}</textarea>
                                @error('content')
                                    <div class="text-red-700 p-3 mt-4">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-4 mt-4 sm:grid-cols-2">
                            <div>
                                <label for="excerpt" class="block text-sm font-medium text-gray-700 mt-4">resumen</label>
                                <textarea
                                    name="excerpt"
                                    id="excerpt"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                >{{ old('excerpt', $post->excerpt) }}</textarea>
                                @error('excerpt')
                                    <div class="text-red-700 p-3 mt-4">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                @if ($post->featured_image)
                                    <img src="{{ asset('storage/' . $post->featured_image) }}" alt="{{ $post->title }}" class="w-64 h-64 object-cover">
                                @endif
                                <label for="featured_image" class="block text-sm font-medium text-gray-700 mt-4">Imagen Principal</label>
                                <input type="file" name="featured_image" id="featured_image" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">
                                @error('featured_image')
                                    <div class="text-red-700 p-3 mt-4">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="grid grid-cols-1 gap-4 mt-4 sm:grid-cols-3">
                            <div>
                                <label for="category_id" class="block text-sm font-medium text-gray-700">Categoría</label>
                                <select name="category_id" id="category_id" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    @foreach ($categories as $category)
                                        <option
                                        value="{{ $category->id }}"
                                        @selected($category->id == old('category_id', $post->category_id))
                                        >{{ $category->name }}</option>
                                    @endforeach
                                </select>
                                @error('category_id')
                                    <div class="text-red-700 p-3 mt-4">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div>
                                <label for="tags" class="block text-sm font-medium text-gray-700">Tags</label>
                                <select name="tags" id="tags" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option value="1">Laravel</option>
                                    <option value="2">PHP</option>
                                </select>
                            </div>
                            <div>
                                <label for="published" class="block text-sm font-medium text-gray-700">Estado</label>
                                <select name="published" id="published" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option
                                        value="0"
                                        @selected(0 == old('published', $post->published))
                                    >Borrador</option>
                                    <option
                                        value="1"
                                        @selected(1 == old('published', $post->published))
                                    >Publicado</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Crear Post</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <x-forms.tinymce-config />
</x-app-layout>
