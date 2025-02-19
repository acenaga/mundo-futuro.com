@extends('layouts.front')

@section('content')
    <section id="posts" class="container py-5">
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <h1 class="mb-3">Aca deberian estar los post</h1>
            </div>
            @forelse ($posts as $post)
                <x-post-card :post="$post" />
            @empty
                <h3 class="mb-3">No hay Informacion para mostrar en este momento</h3>
                <figure class="text-center">
                    <img src="{{ asset('assets/img/404-meme.gif') }}" alt="No hay informacion para mostrar" class="img-fluid">
                </figure>

            @endforelse
            <div>
                {{ $posts->links('vendor.pagination.bootstrap-5') }}
            </div>
        </div>
    </section>
@endsection
