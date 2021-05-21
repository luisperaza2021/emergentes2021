@extends('layouts.app')

@section('content')
    <div class="container">
        {{-- <section class="mb-5">
            <div class="form-group custom-card-shadow">
                <input type="search" class="form-control form-control-lg" id="search" name="search" placeholder="Buscar por libro, editorial">
            </div>
        </section> --}}

        <header class="mt-5 card p-5 border-0 rounded">
            <div class="banner row">
                <div class="col">
                    <h4>Biblioteca</h4>
                    <p class="text-muted">Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus suscipit libero necessitatibus quo voluptatibus nostrum optio velit officiis delectus, harum animi quibusdam laboriosam consequatur illo iure non maxime asperiores assumenda?</p>
                    <button class="btn primary-color text-white">Ver todos</button>
                </div>
                <div class="col text-center">
                    <img src={{ asset('images/read.png') }} alt="ReadBanner" class="img-flui" height="250">
                </div>
            </div>
        </header>

        <section>
            <div class="container">
                <div class="row">
                    <div class="card-group">
                        @foreach ($libros as $libro)
                            <div class="col-12 col-md-3">
                                <div class="card bg-transparent border-0 my-5 mx-3">
                                    <a href="{{ route('libros.show', $libro->slug) }}">
                                        <img src="{{ asset('images/uploads/'.$libro->imagen) }}" class="card-img-top custom-card-shadow" alt="Imagen del libro">
                                    </a>
                                    <div class="card-body">
                                        <h5 class="card-title">{{ $libro->titulo }}</h5>
                                        <p class="card-text"><small class="text-muted">{{ $libro->autor()->first()->nombre }}</small></p>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                    <div class="col">
                        <div class="text-center mx-auto">
                            {{ $libros->links() }}
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
