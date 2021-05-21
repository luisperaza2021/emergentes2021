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
                    <a class="float-end btn btn-primary text-white mb-5" href="{{ route($createUrl) }}">Crear</a>
                    <table id="example" class="table table-striped" style="width:100%">
                        <thead>
                            <tr>
                                <th>{{ $label }}</th>
                                @if ($hasPhone)
                                <th>Teléfono</th>
                                @endif
                                <th>Acciones</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($collection as $item)
                                <tr>
                                    <td>{{ $item->nombre }}</td>
                                    @if ($hasPhone)
                                    <td>{{ $item->telefono }}</td>
                                    @endif
                                    <td>
                                        <a href="{{ route($editUrl, $item) }}" class="btn btn-warning">Editar</a>
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
