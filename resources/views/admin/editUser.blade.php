@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form class="card custom-card-shadow" action="{{ route('users.update', $user->_id) }}" method="POST" >
                @csrf
                @method('put')
                <div class="card-body">
                    <a class="btn btn-outline-dark mb-5" href="{{ route('users.index') }}">Regresar</a>
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
                        <label for="name" class="form-label">Nombre</label>
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{$user->name}}">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{$user->email}}">
                    </div>
                </div>
                <div class="card-footer border-0">
                    <button type="button" class="float-start btn btn-danger custom-card-shadow text-white" data-bs-toggle="modal" data-bs-target="#exampleModal">Eliminar</button>
                    <button type="submit" class="float-end btn btn-primary custom-card-shadow text-white">Guardar</button>
                </div>
            </form>
        </div>
    </div>

    <div class="row mt-5">
        <div class="col">
            <form class="card custom-card-shadow" action="{{ route('update-password', $user->_id) }}" method="POST" >
                @csrf
                <div class="card-body">
                    @if (session('statusPassword'))
                        <div class="alert alert-success">
                            <ul>
                                <li>{{ session('statusPassword') }}</li>
                            </ul>
                        </div>
                    @endif

                    <div class="mb-3">
                        <label for="password" class="form-label">{{ __('Password') }}</label>
                        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                        <div class="col-md-6">

                            @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="mb-3">
                        <label for="password-confirm" class="form-label">{{ __('Confirm Password') }}</label>
                        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                    </div>
                </div>
                <div class="card-footer border-0">
                    <button type="submit" class="float-end btn btn-primary custom-card-shadow text-white">Actualizar</button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <form class="modal-content" action="{{ route('users.destroy', $user) }}" method="POST">
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
