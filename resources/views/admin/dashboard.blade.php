@extends('layouts.app')

@section('css')
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.24/css/dataTables.bootstrap5.min.css">
@endsection

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card custom-card-shadow">
                <div class="card-body">
                    <a class="btn btn-outline-dark mb-5" href="{{ route('users.index') }}">Administrar usuarios</a>
                    <a class="float-end btn btn-primary text-white mb-5" href="{{ route('libros.create') }}">Crear</a>
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>Imagen</th>
                                <th>Titulo</th>
                                <th>Publicacion</th>
                                <th>Cantidad</th>
                                <th>Activo</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($libros as $libro)
                                <tr>
                                    <td><img src="{{ asset('images/uploads/'.$libro->imagen) }}" alt="imagenLibro" class="img-flui" height="60"></td>
                                    <td>{{ $libro->titulo }}</td>
                                    <td>{{ $libro->publicacion }}</td>
                                    <td>{{ $libro->cantidad }}</td>
                                    <td>{{ $libro->activo }}</td>
                                    <td>
                                        <a href="{{ route('libros.edit', $libro) }}" class="btn btn-warning">Editar</a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.datatables.net/1.10.24/js/dataTables.bootstrap5.min.js"></script>

    <script type="text/javascript">
        $(document).ready(function(){
            $('#example').DataTable();
        });
    </script>
@endsection
