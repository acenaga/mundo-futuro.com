<div id="carouselPosts" class="carousel slide" data-bs-ride="carousel">

    <div class="carousel-indicators">
        @forelse ($posts as $post)
            <button type="button" data-bs-target="#carouselPosts" data-bs-slide-to="{{ $loop->index }}" class="active"
                aria-current="true" aria-label="Slide {{ $loop->index + 1 }}"></button>
        @empty
            <button type="button" data-bs-target="#carouselPosts" data-bs-slide-to="0" aria-label="Slide 1"></button>
            <button type="button" data-bs-target="#carouselPosts" data-bs-slide-to="1" aria-label="Slide 2"></button>
            <button type="button" data-bs-target="#carouselPosts" data-bs-slide-to="2" aria-label="Slide 3"></button>
        @endforelse
    </div>
    <div class="carousel-inner">
        @forelse ($posts as $post)
            <div class="carousel-item {{ $loop->first ? 'active' : '' }}">
                <img src="{{ asset($post->featured_image) }}" class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>{{ $post->title }}</h5>
                    <p>{{ $post->excerpt }}</p>
                </div>
            </div>
        @empty
            <div class="carousel-item active">
                <img src="https://i.picsum.photos/id/536/1920/1080.jpg?hmac=0SvJdXR7p_sAwWgkPv3yenH_d0eLLGIF92N_e3PLxKA"
                    class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>First slide label</h5>
                    <p>Some representative placeholder content for the first slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://i.picsum.photos/id/536/1920/1080.jpg?hmac=0SvJdXR7p_sAwWgkPv3yenH_d0eLLGIF92N_e3PLxKA"
                    class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Second slide label</h5>
                    <p>Some representative placeholder content for the second slide.</p>
                </div>
            </div>
            <div class="carousel-item">
                <img src="https://i.picsum.photos/id/536/1920/1080.jpg?hmac=0SvJdXR7p_sAwWgkPv3yenH_d0eLLGIF92N_e3PLxKA"
                    class="d-block w-100" alt="...">
                <div class="carousel-caption d-none d-md-block">
                    <h5>Third slide label</h5>
                    <p>Some representative placeholder content for the third slide.</p>
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
