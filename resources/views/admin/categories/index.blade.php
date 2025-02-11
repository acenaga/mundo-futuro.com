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
                    <div class="flex justify-between">
                        <h1 class="text-2xl font-bold text-gray-600">Posts</h1>
                        <a href="{{ route('categories.create') }}" class="bg-blue-500 text-white px-4 py-2 rounded">{{ __('Create Category') }}</a>
                    </div>
                    <table class="table-auto w-full">
                        <thead>
                            <tr>
                                <th class="border px-4 py-2">{{ __('ID') }}</th>
                                <th class="border px-4 py-2">{{ __('Name') }}</th>
                                <th class="border px-4 py-2">{{ __('Slug') }}</th>
                                <th class="border px-4 py-2">{{ __('Actions') }}</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($categories as $category)
                                <tr>
                                    <td class="border px-4 py-2">{{ $category->id }}</td>
                                    <td class="border px-4 py-2">{{ $category->name }} - {{ $category->posts->count() }}</td>
                                    <td class="border px-4 py-2">{{ $category->slug}}</td>
                                    <td class="border px-4 py-2">
                                        <a href="{{ route('categories.edit', $category->id) }}" class="bg-yellow-500 text-white px-4 py-2 rounded">{{ __('Edit') }}</a>
                                        <div x-data="{ open: false }">
                                            <button class="bg-blue-500 text-white px-4 py-2 rounded" x-on:click="open = ! open">Habilitar eliminacion de categoria</button>
                                            <form x-show="open" action="{{ route('categories.destroy', $category->id) }}"
                                                method="POST"
                                                class="inline">
                                                @csrf
                                                @method('DELETE')
                                                <button
                                                    type="submit"
                                                    class="bg-red-500 text-white px-4 py-2 rounded"
                                                    onclick="confirm('Esta categoria puede poseer post asociados, borrar esta categoria eliminaria esos post tambien, esta seguro que desea eliminar esta categoria?')"
                                                    >{{ __('Delete') }}</button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
