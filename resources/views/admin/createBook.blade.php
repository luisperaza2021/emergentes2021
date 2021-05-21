@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form class="card custom-card-shadow" action="{{ route('libros.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
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
                        <input type="text" class="form-control @error('titulo') is-invalid @enderror" id="titulo" name="titulo" value="{{ old('titulo') }}">
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="imagen" class="form-label">Imagen</label>
                            <input class="form-control @error('imagen') is-invalid @enderror" type="file" id="imagen" name="imagen">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control @error('descripcion') is-invalid @enderror" id="descripcion" name="descripcion" rows="3">{{ old('descripcion') }}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="publicacion" class="form-label">Publicación</label>
                        <input type="datetime" class="form-control @error('publicacion') is-invalid @enderror" id="publicacion" name="publicacion" value="{{ now() }}">
                    </div>
                    <div class="mb-3">
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <input type="number" class="form-control @error('cantidad') is-invalid @enderror" id="cantidad" name="cantidad" value="1">
                    </div>
                    <div class="mb-3">
                        <label for="prestados" class="form-label">Prestados</label>
                        <input type="number" class="form-control @error('prestados') is-invalid @enderror" id="prestados" name="prestados" value="0">
                    </div>
                    <div class="mb-3">
                        <label for="autor">Autor</label>
                        <select class="js-example-basic-single js-states form-control @error('autores_id') is-invalid @enderror" id="autor" name="autores_id">
                            @foreach ($autores as $item)
                                <option value="{{ $item->_id }}">{{ $item->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="editorial">Editorial</label>
                        <select class="js-example-basic-single js-states form-control @error('aditoriales_id') is-invalid @enderror" id="editorial" name="aditoriales_id">
                            @foreach ($editoriales as $item)
                                <option value="{{ $item->_id }}">{{ $item->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="categoria">Categoria</label>
                        <select class="js-example-basic-single js-states form-control @error('categorias_id') is-invalid @enderror" id="categoria" name="categorias_id">
                            @foreach ($categorias as $item)
                                <option value="{{ $item->_id }}">{{ $item->nombre }}</option>
                            @endforeach
                        </select>
                    </div>
                </div>
                <div class="card-footer border-0">
                    <button type="submit" class="float-end btn btn-primary custom-card-shadow text-white">Guardar</button>
                </div>
            </form>
        </div>
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
