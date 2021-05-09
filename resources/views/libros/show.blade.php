@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <div class="row justify-content-center">
                <div class="col-12 text-center mb-5">
                    <h2 class="primary-color-text">Detalles del libro</h2>
                </div>
                <div class="col-12 col-md-3">
                    <img src={{ $libro->imagen }} class="card-img-top custom-card-shadow" alt="Imagen del libro">
                </div>
                <div class="col-12 col-md-7 h-100">
                    <div class="d-flex flex-column">
                        <div class="">
                            <p class="fs-1 fw-bolder">{{ $libro->titulo }}</p>
                            <p class="text-muted">{{ $libro->descripcion }}</p>
                        </div>
                        <div class="d-flex justify-content-between mt-5">
                            @if (Auth::user())
                                <a href="#!" class="btn primary-color text-white custom-card-shadow"><i class="fas fa-book"></i> Prestar libro</a>
                            @else
                                <a href="#!" class="btn primary-color text-white custom-card-shadow" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fas fa-book"></i> Prestar libro</a>
                            @endif
                            <p class="fw-bold badge rounded-pill bg-primary bg-gradient">Disponibles: {{ $libro->cantidad }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content custom-card-shadow">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alerta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <h3>Necesitas registrarte para esta acción</h3>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Aceptar</button>
            </div>
        </div>
    </div>
</div>
@endsection
