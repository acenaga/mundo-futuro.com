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
                    <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        <div class="grid grid-cols-1 gap-6 mt-4">
                            <div>
                                <label for="title" class="block text-sm font-medium text-gray-700">Título</label>
                                <input type="text" name="title" id="title" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md" value="{{ old('title') }}">
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
                                <textarea name="content" id="content" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('content') }}</textarea>
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
                                <textarea name="excerpt" id="excerpt" class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md">{{ old('excerpt') }}</textarea>
                                @error('excerpt')
                                    <div class="text-red-700 p-3 mt-4">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <fieldset class="mb-3">
                                <legend class="block text-sm font-medium text-gray-700">Etiquetas</legend>
                                @foreach ($tags as $tag)
                                    <div class="flex items-center">
                                        <input
                                            type="checkbox"
                                            name="tags[]"
                                            id="tag-{{ $tag->id }}"
                                            value="{{ $tag->name }}"
                                            @checked(in_array($tag->name, old('tags', [])))>
                                        <label for="tag-{{ $tag->id }}" class="ml-2 text-sm text-gray-700">{{ $tag->name }}</label>
                                    </div>
                                @endforeach
                            </fieldset>
                            <div>
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
                                            @selected($category->id == old('category_id'))
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
                                <label for="published" class="block text-sm font-medium text-gray-700">Estado</label>
                                <select name="published" id="published" class="mt-1 block w-full pl-3 pr-10 py-2 text-base border-gray-300 focus:outline-none focus:ring-indigo-500 focus:border-indigo-500 sm:text-sm rounded-md">
                                    <option @selected(0 == old('published')) value="0">Borrador</option>
                                    <option @selected(1 == old('published')) value="1">Publicado</option>
                                </select>
                            </div>
                        </div>
                        <div>
                            <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Crear Post</button>
                            <a href="{{ route('posts.index') }}" class="mt-4 bg-gray-500 hover:bg-gray-700 text-white font-bold py-2 px-4 rounded">Cancelar</a>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <x-forms.tinymce-config />
</x-app-layout>
