<div class="container-fluid">
    <nav class="navbar navbar-expand-lg  bg-light sticky-top">
        <div class="container-fluid">
            <a class="navbar-brand" id="logo" href="{{ route('/') }}">
                <img src="{{ asset('assets/img/square-logo.svg') }}" alt="Mundo Futuro">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarMundoFuturo"
                aria-controls="navbarMundoFuturo" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarMundoFuturo">
                <ul class="navbar-nav">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#">Educacion</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Recursos</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Tutoriales</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('posts') }}">Blog</a>
                    </li>
                    <li class="nav-item dropdown">
                        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" role="button"
                            data-bs-toggle="dropdown" aria-expanded="false">
                            Noticias
                        </a>
                        <ul class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                            <li><a class="dropdown-item" href="#">Tech</a></li>
                            <li><a class="dropdown-item" href="#">Gaming</a></li>
                            <li><a class="dropdown-item" href="#">Desarrollo</a></li>
                        </ul>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</div>
