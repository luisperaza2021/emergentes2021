@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form class="card custom-card-shadow" action="{{ route('libros.update', $libro->_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">
                    <a class="btn btn-outline-dark mb-5" href="{{ route('libros.index') }}">Regresar</a>
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
                        <label for="titulo" class="form-label">Titulo</label>
                        <input type="text" class="form-control @error('titulo') is-invalid @enderror" id="titulo" name="titulo" value="{{$libro->titulo}}">
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="imagen" class="form-label">Imagen</label>
                            <input class="form-control @error('imagen') is-invalid @enderror" type="file" id="imagen" name="imagen">
                        </div>
                        <div class="col mb-3">
                            <img src="{{ asset('images/uploads/'.$libro->imagen) }}" height="200">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" rows="3">{{$libro->descripcion}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="publicacion" class="form-label">Publicación</label>
                        <input type="datetime" class="form-control @error('publicacion') is-invalid @enderror" id="publicacion" name="publicacion"  value="{{$libro->publicacion}}">
                    </div>
                    <div class="mb-3">
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <input type="number" class="form-control @error('cantidad') is-invalid @enderror" id="cantidad" name="cantidad" value="{{$libro->cantidad}}">
                    </div>
                    <div class="mb-3">
                        <label for="prestados" class="form-label">Prestados</label>
                        <input type="number" class="form-control @error('prestados') is-invalid @enderror" id="prestados" name="prestados" value="{{$libro->prestados}}">
                    </div>
                    <div class="mb-3">
                        <label for="autor">Autor</label>
                        <select class="js-example-basic-single js-states form-control @error('autores_id') is-invalid @enderror" id="autor" name="autores_id">
                            @foreach ($autores as $item)
                                @if ($item->_id == $autor->_id)
                                    <option selected value="{{ $item->_id }}">{{ $item->nombre }}</option>
                                @else
                                    <option value="{{ $item->_id }}">{{ $item->nombre }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editorial">Editorial</label>
                        <select class="js-example-basic-single js-states form-control @error('editoriales_id') is-invalid @enderror" id="editorial" name="editoriales_id">
                            @foreach ($editoriales as $item)
                                @if ($item->_id == $editorial->_id)
                                    <option selected value="{{ $item->_id }}">{{ $item->nombre }}</option>
                                @else
                                    <option value="{{ $item->_id }}">{{ $item->nombre }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="categoria">Categoria</label>
                        <select class="js-example-basic-single js-states form-control @error('categorias_id') is-invalid @enderror" id="categoria" name="categorias_id">
                            @foreach ($categorias as $item)
                                @if ($item->_id == $categoria->_id)
                                    <option selected value="{{ $item->_id }}">{{ $item->nombre }}</option>
                                @else
                                    <option value="{{ $item->_id }}">{{ $item->nombre }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
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
        <form class="modal-content" action="{{ route('libros.destroy', $libro) }}" method="POST">
            @csrf
            @method('DELETE')
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

@section('js')
<script type="text/javascript">
    $(document).ready(function(){
        $('#autor').select2();
        $('#editorial').select2();
        $('#categoria').select2();
    });
</script>
@endsection
