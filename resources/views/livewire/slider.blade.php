<div id="carouselPosts" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
        @forelse ($posts as $post)
            <button type="button" data-bs-target="#carouselPosts" data-bs-slide-to="{{ $loop->index }}" class="active"
                aria-current="true" aria-label="Slide {{ $loop->index + 1 }}"></button>
        @empty
            <button type="button" data-bs-target="#carouselPosts" data-bs-slide-to="0" aria-label="Slide 1"></button
        @endforelse
    </div>
    <div class="carousel-inner">
        @forelse ($posts as $post)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <img src="{{ $post->get_image }}" class="d-block w-100" alt="{{ $post->title }}">
                <div class="carousel-caption d-none d-md-block">
                    <a href="{{ route('posts.details', $post) }}" class="text-decoration-none text-dark">
                        <h5>{{ $post->title }}</h5>
                        <p>{{ $post->excerpt }}</p>
                    </a>

                </div>
            </div>
        @empty
            <div class="carousel-item active">
                <img src="{{ asset('assets/img/404-meme.gif') }}" class="d-block w-100" alt="on toy?">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Aqui deberiamos tener algo</h5>
                    <p>Error de la IA que tenemos secuestrada para crear contenido</p>
                </div>
            </div>

        @endforelse
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#carouselPosts" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#carouselPosts" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
    </button>
</div>
