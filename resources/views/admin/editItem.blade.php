@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form class="card custom-card-shadow" action="{{ route('item.update', $item->_id) }}" method="POST" >
                @csrf
                @method('put')
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
                        <input type="text" class="form-control @error('nombre') is-invalid @enderror" id="nombre" name="nombre" value="{{$item->nombre}}">
                    </div>
                    @if ($hasPhone)
                        <div class="mb-3">
                            <label for="telefono" class="form-label">Teléfono</label>
                            <input type="text" class="form-control @error('telefono') is-invalid @enderror" id="telefono" name="telefono" value="{{$item->telefono}}">
                        </div>
                    @endif
                </div>
                <div class="card-footer border-0">
                    <button type="button" class="float-start btn btn-danger custom-card-shadow text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">Eliminar</button>
                    <button type="submit" class="float-end btn btn-primary custom-card-shadow text-white">Guardar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" action="{{ route('item.destroy', $item->_id) }}" method="POST">
            @csrf
            @method('DELETE')
            <input type="hidden" name="table" value="{{$table}}">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Alerta</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
            ¿Seguro que quiere borrar el registro?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary text-white">Confirmar</button>
            </div>
        </form>
    </div>
</div>
@endsection
