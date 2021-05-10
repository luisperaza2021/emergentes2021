@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form class="card custom-card-shadow">
                <div class="card-body">
                    <div class="mb-3">
                        <label for="titulo" class="form-label">Titulo</label>
                        <input type="text" class="form-control" id="titulo" name="titulo" value="{{$libro->titulo}}">
                    </div>
                    <div class="mb-3">
                        <label for="descripcion" class="form-label">Descripción</label>
                        <textarea class="form-control" id="descripcion" name="descripcion" rows="3">{{$libro->descripcion}}</textarea>
                    </div>
                    <div class="mb-3">
                        <label for="publicacion" class="form-label">Publicación</label>
                        <input type="date" class="form-control" id="publicacion" name="publicacion" value="{{$libro->publicacion}}">
                    </div>
                    <div class="mb-3">
                        <label for="cantidad" class="form-label">Cantidad</label>
                        <input type="number" class="form-control" id="cantidad" name="cantidad" value="{{$libro->cantidad}}">
                    </div>
                    <div class="mb-3 form-check form-switch">
                        <label for="activo" class="form-label">activo</label>
                        <input class="form-check-input" type="checkbox" id="flexSwitchCheckChecked" value="{{$libro->activo}}">
                    </div>
                    <div class="mb-3">
                        @dump($autor->_id)
                        <label for="autor">Autor</label>
                        <select class="js-example-basic-single js-states form-control" id="autor" name="autores_id">
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
                        <select class="js-example-basic-single js-states form-control" id="editorial" name="autores_id">
                            @foreach ($editoriales as $item)
                                @if ($item->_id == $autor->_id)
                                    <option selected value="{{ $item->_id }}">{{ $item->nombre }}</option>
                                @else
                                    <option value="{{ $item->_id }}">{{ $item->nombre }}</option>
                                @endif
                            @endforeach
                        </select>
                    </div>
                    <div class="mb-3">
                        <label for="categoria">Categoria</label>
                        <select class="js-example-basic-single js-states form-control" id="categoria" name="autores_id">
                            @foreach ($categorias as $item)
                                @if ($item->_id == $autor->_id)
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
