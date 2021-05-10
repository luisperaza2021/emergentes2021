@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form class="card custom-card-shadow" action="{{ route('libros.update', $libro->_id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('put')
                <div class="card-body">
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
                        <input type="text" class="form-control @error('address') is-invalid @enderror" id="titulo" name="titulo" value="{{$libro->titulo}}">
                    </div>
                    <div class="row">
                        <div class="col mb-3">
                            <label for="imagen" class="form-label">Imagen</label>
                            <input class="form-control" type="file" id="imagen" name="imagen">
                        </div>
                        <div class="col mb-3">
                            <img src="{{ asset('images/uploads/'.$libro->imagen) }}" height="200">
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control @error('address') is-invalid @enderror" id="descripcion" name="descripcion" rows="3">{{$libro->descripcion}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="publicacion" class="form-label">Publicación</label>
                        <input type="datetime" class="form-control @error('address') is-invalid @enderror" id="publicacion" name="publicacion"  value="{{$libro->publicacion}}">
                    </div>
                    <div class="mb-3">
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <input type="number" class="form-control @error('address') is-invalid @enderror" id="cantidad" name="cantidad" value="{{$libro->cantidad}}">
                    </div>
                    <div class="mb-3 form-check form-switch">
                        <label for="activo" class="form-label">activo</label>
                        <input class="form-check-input" type="checkbox" name="activo" id="activo" {{ ($libro->activo) ? "checked" : "" }}>
                    </div>
                    <div class="mb-3">
                        <label for="autor">Autor</label>
                        <select class="js-example-basic-single js-states form-control @error('address') is-invalid @enderror" id="autor" name="autores_id">
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
                        <select class="js-example-basic-single js-states form-control @error('address') is-invalid @enderror" id="editorial" name="aditoriales_id">
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
                        <select class="js-example-basic-single js-states form-control @error('address') is-invalid @enderror" id="categoria" name="categorias_id">
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
                    <button type="submit" class="float-end btn primary-color custom-card-shadow text-white">Guardar</button>
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
