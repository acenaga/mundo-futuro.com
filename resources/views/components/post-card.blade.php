<div class="col-12 col-md-6 col-lg-4 p-3">
    <div class="card h-100">
        <img src="{{ $post->featured_image }}" class="card-img-top" alt="{{ $post->title }}">
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->excerpt }}</p>
            <a href="#" type="button" class="btn btn-outline-success">{{ $post->category->name }}</a>
            <blockquote class="blockquote">
                <p>{{ $post->user->username }}</p>
            </blockquote>
            {{-- <a href="{{ route('post', $post->slug) }}" class="btn btn-primary">Go somewhere</a> --}}
            <a href="{{ url('posts/' . $post->slug) }}" class="btn btn-primary">Mas Info...</a>
        </div>
    </div>
</div>
