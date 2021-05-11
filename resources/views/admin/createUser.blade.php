@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col">
            <form class="card custom-card-shadow" action="{{ route('users.store') }}" method="POST" >
                @csrf
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
                        <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name">
                    </div>
                    <div class="mb-3">
                        <label for="email" class="form-label">Correo</label>
                        <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email">
                    </div>
                </div>
                <div class="card-footer border-0">
                    <button type="submit" class="float-end btn btn-primary custom-card-shadow text-white">Crear</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
