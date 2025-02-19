<div class="col-12 col-md-6 col-lg-4 p-3">
    <div class="card h-100">
        @if ($post->featured_image)
            <img src="{{ $post->get_image }}" class="card-img-top" alt="{{ $post->title }}">
        @endif
        <div class="card-body">
            <h5 class="card-title">{{ $post->title }}</h5>
            <p class="card-text">{{ $post->excerpt }}</p>
            <a href="#" type="button" class="btn btn-outline-success">{{ $post->category->name }}</a>
            <blockquote class="blockquote">
                <p>{{ $post->user->username }}</p>
            </blockquote>
            <p class="card-text"><small class="text-muted">{{ $post->published_at }}</small></p>
            <div class="tags">
                @foreach ($post->tags as $tag)
                    <span class="tag">{{ $tag->name }}</span>
                @endforeach
            </div>

            <a href="{{ url('posts/' . $post->slug) }}" class="btn btn-primary">Mas Info...</a>
            <div class="card-footer">
                <p>
                    <small class="text-muted">Creado: {{ $post->created_at->format('d M Y')  }} - {{ $post->created_at->diffForHumans() }}</small>
                </p>
                @if($post->update_at)
                    <p>
                        <small class="text-muted">Last updated {{ $post->updated_at->diffForHumans() }}</small>
                    </p>

                @endif
                <p>
                    <small class="text-muted">Escrito por {{ $post->user->username }}</small>
                </p>


            </div>
        </div>
    </div>
</div>
