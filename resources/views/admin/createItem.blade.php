@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form class="card custom-card-shadow" action="{{ route('item.store') }}" method="POST" >
                @csrf
                <input type="hidden" name="table" value="{{$table}}">
                <div class="card-body">
                    <a class="btn btn-outline-dark mb-5" href="{{ $previusUrl }}">Regresar</a>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('status'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{{ session('status') }}</li>
                            </ul>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="nombre" class="form-label">Nombre</label>
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre">
                    </div>
                    @if ($hasPhone)
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono">
                        </div>
                    @endif
                </div>
                <div class="card-footer border-0">
                    <button type="submit" class="float-end btn btn-primary custom-card-shadow text-white">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
