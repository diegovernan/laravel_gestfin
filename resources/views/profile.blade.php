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
                    title:'Sucesso!',
                    html:jQuery(".alert").html(),
                    type:'success'
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
                    title:'Oops!',
                    html:jQuery(".alert").html(),
                    type:'error'
                }).then((value) => {
                //location.reload();
                }).catch(swal.noop);
            </script>
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