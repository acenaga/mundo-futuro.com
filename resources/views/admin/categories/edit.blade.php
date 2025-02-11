<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Categorias') }}
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
                        <h1 class="text-2xl font-bold text-gray-600">Actualizar categoria</h1>
                    </div>
                    <form action="{{ route('categories.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <div class="grid grid-cols-1 gap-6 mt-4">
                            <div>
                                <label for="name" class="block text-sm font-medium text-gray-700">Nombre</label>
                                <input
                                    type="text"
                                    name="name"
                                    id="name"
                                    class="mt-1 focus:ring-indigo-500 focus:border-indigo-500 block w-full shadow-sm sm:text-sm border-gray-300 rounded-md"
                                    value="{{ old('name', $category->name ) }}">
                                @error('name')
                                    <div class="text-red-700 p-3 mt-4">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>

                        <div>
                            <button type="submit" class="mt-4 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">Actualizar</button>
                        </div>
                    </form>

                </div>
            </div>
        </div>
    </div>
    <x-forms.tinymce-config />
</x-app-layout>
