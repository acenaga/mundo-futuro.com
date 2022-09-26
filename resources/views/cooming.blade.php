@extends('layouts.front')

@section('navigation')
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" id="logo" href="#">
                <img src="{{ asset('assets/img/square-logo.svg') }}" alt="Mundo Futuro">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
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
@endsection

@section('content')
    <section class="comming-soon container-fluid">
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <img src="{{ asset('../assets/img/horizontal-logo.svg') }}" alt="aqui va una imagen">
                <div class="rocket">

                </div>
            </div>
        </div>
    </section>
@endsection
