@extends('layouts.front')


@section('content')
    <section class="container-fluid px-0">
        <img class="post-img-hero" src="{{ $post->featured_image }}" alt="{{ $post->title }}">
    </section>
    <section id="posts" class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <h1 class="my-4">{{ $post->title }}</h1>
            </div>
            <div class="col-12 d-flex justify-content-center align-items-center">
                <p>{{ $post->content }}</p>
            </div>
            <div>
                <h5>Comentarios</h5>
                <ul class="list-group">
                    @forelse ($post->comments as $comment)
                        <li class="list-group-item">{{ $comment->content }}</li>
                    @empty
                        <li class="list-group-item">An item</li>
                    @endforelse
                </ul>
            </div>
        </div>
    </section>
@endsection
