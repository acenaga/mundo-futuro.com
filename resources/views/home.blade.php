@extends('layouts.front')



@section('content')
    <section class="comming-soon container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <img src="{{ asset('../assets/img/horizontal-logo.svg') }}" alt="aqui va una imagen">
            </div>
        </div>
    </section>
    <section class="container">
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <livewire:slider />
            </div>
        </div>
    </section>
@endsection
