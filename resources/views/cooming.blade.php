@extends('layouts.front')

@section('navigation')
    <livewire:navigation-front />
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
