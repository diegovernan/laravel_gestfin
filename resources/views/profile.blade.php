@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- Messages -->
            <!-- @if( Session::has( 'success' ))
            <div class="alert alert-success alert-dismissible fade show">
                {{ Session::get( 'success' ) }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @elseif( Session::has( 'errors' ))
            <div class="alert alert-danger alert-dismissible fade show">
                @foreach ($errors->all() as $error)
                {{ $error }} <br>
                @endforeach
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif -->

            <!-- SweetAlert2 -->
            @if(Session::has('success'))
            <div class="alert fade show" style="display:none">
                {{ Session::get( 'success' ) }}
            </div>
            <script type="text/javascript">
                swal({
                    title: 'Sucesso!',
                    html: jQuery(".alert").html(),
                    type: 'success'
                }).then((value) => {
                    //location.reload();
                }).catch(swal.noop);
            </script>
            @elseif(Session::has('errors'))
            <div class="alert fade show" style="display:none">
                @foreach ($errors->all() as $error)
                {{ $error }} <br>
                @endforeach
            </div>
            <script type="text/javascript">
                swal({
                    title: 'Oops!',
                    html: jQuery(".alert").html(),
                    type: 'error'
                }).then((value) => {
                    //location.reload();
                }).catch(swal.noop);
            </script>
            @endif

            <!-- Profile name card -->
            <div class="card">
                <div class="card-header text-center">
                    <span>Meu perfil</span>
                </div>

                <div class="card-body">
                    <form method="post" action="{{ route('profile.update', $user->id) }}">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="Input1">Nome</label>
                            <input type="text" class="form-control" id="Input1" name="name" value="{{ old('name') ?? $user->name }}">
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>

            <br>

            <!-- Profile password card -->
            <div class="card">
                <div class="card-header text-center">
                    <span>Segurança</span>
                </div>

                <div class="card-body">
                    <form method="post" action="#">
                        @csrf
                        @method('PATCH')
                        <div class="form-group">
                            <label for="Input2">Senha atual</label>
                            <input type="text" class="form-control" id="Input2" name="old_password">
                        </div>

                        <div class="form-group">
                            <label for="Input3">Nova senha</label>
                            <input type="text" class="form-control" id="Input3" name="new_password">
                        </div>

                        <div class="form-group">
                            <label for="Input4">Confirmação da nova senha</label>
                            <input type="text" class="form-control" id="Input4" name="password_confirm">
                        </div>

                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </form>
                </div>
            </div>

            <br>

            <div class="float-right">
                <a href="{{ route('home') }}" class="btn btn-secondary">Voltar</a>
            </div>
        </div>
    </div>
</div>
@endsection