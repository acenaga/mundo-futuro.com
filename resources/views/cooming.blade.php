@extends('layouts.front')

@section('navigation')
    <livewire:navigation-front />
@endsection

@section('content')
    <livewire:cooming-soon />
    <section class="container-fluid px-0">
        <div class="row">
            <div class="col-12 d-flex justify-content-center align-items-center">
                <livewire:slider />
            </div>
        </div>
    </section>
@endsection
