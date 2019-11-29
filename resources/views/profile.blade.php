@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            @if( Session::has( 'success' ))
            <div class="alert alert-success alert-dismissible fade show">
                {{ Session::get( 'success' ) }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <div class="card">
                <div class="card-header text-center d-flex justify-content-between align-items-center">
                    <span>Meu perfil</span>
                    <a href="{{ route('home') }}" class="btn btn-sm btn-secondary">Voltar</a>
                </div>

                <div class="card-body">
                    <form method="post" action="{{ route('profile.update', $user->id) }}">@method('PATCH')@csrf
                        <div class="form-group">
                            <label for="Input1">Nome</label>
                            <input type="text" class="form-control" id="Input1" name="name" value="{{ old('name') ?? $user->name }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection