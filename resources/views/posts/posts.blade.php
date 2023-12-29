@extends('layouts.front')

@section('content')
    <section id="posts" class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <h1>Aca deberian estar los post</h1>
            </div>
            @forelse ($posts as $post)
                <x-post-card :post="$post" />
            @empty
                <h3>No hay Informacion para mostrar en este momento</h3>
            @endforelse
        </div>
    </section>
@endsection
