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
            @elseif( Session::has( 'warning' ))
            <div class="alert alert-warning alert-dismissible fade show">
                {{ Session::get( 'warning' ) }}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            @endif

            <div class="card">
                <div class="card-header text-center">
                    <span>Dashboard</span>
                </div>

                <div class="card-body">
                    <div class="d-flex justify-content-between flex-wrap">
                        <div class="mb-3">
                            <button class="btn btn-outline-primary" type="submit" data-toggle="modal" data-target="#catMod">Categoria</button>
                            <button class="btn btn-outline-primary" type="submit" data-toggle="modal" data-target="#transMod">Transação</button>
                        </div>

                        <div class="btn-group mb-3" role="group" aria-label="Basic example">
                            <a class="btn btn-secondary" href="#" role="button">Relatório mensal</a>
                            <a class="btn btn-secondary" href="#" role="button">Relatório anual</a>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between flex-wrap">
                        <div class="form-group">
                            <select class="form-control">
                                @for ($y = 2020; $y <= 2025; $y++)
                                <option>{{$y}}</option>
                                @endfor
                            </select>
                        </div>

                        <div>
                            <ul class="nav nav-tabs" role="tablist">
                                @for ($m=1; $m <= 12; $m++)
                                @php $month = substr(date('F', mktime(0, 0, 0, $m, 1)),0, 3); @endphp
                                <li class="nav-item">
                                    <a class="nav-link text-primary {{ ($month === substr(date('F'),0, 3)) ? 'active' : '' }}" id="{{ $month }}" data-toggle="tab" href="#{{ $month }}" role="tab" aria-controls="home" aria-selected="true">{{ $month }}</a>
                                </li>
                                @endfor
                            </ul>
                        </div>
                    </div>

                    <!-- Month content -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="{{ $month }}" role="tabpanel" aria-labelledby="{{ $month }}">
                            <div class="row mt-2">
                                <div class="col-sm-4 my-2">
                                    <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Mensal</h5>
                                        <p class="card-text">Receita: x</p>
                                        <p class="card-text">Despesa: y</p>
                                        <hr>
                                        <p>Total</p>
                                    </div>
                                    </div>
                                </div>

                                <div class="col-sm-4 my-2">
                                    <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Anual</h5>
                                        <p class="card-text">Receita: x</p>
                                        <p class="card-text">Despesa: y</p>
                                        <hr>
                                        <p>Total</p>
                                    </div>
                                    </div>
                                </div>

                                <div class="col-sm-4 my-2">
                                    <div class="card">
                                    <div class="card-body">
                                        <h5 class="card-title">Geral</h5>
                                        <p class="card-text">Receita: x</p>
                                        <p class="card-text">Despesa: y</p>
                                        <hr>
                                        <p>Total</p>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Category-->
                    <div class="modal fade" id="catMod" tabindex="-1" role="dialog" aria-labelledby="catModTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="catModTitle">Adicionar categoria</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Fechar</button>
                                    <button type="button" class="btn btn-sm btn-primary">Salvar</button>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Modal Transaction-->
                    <div class="modal fade" id="transMod" tabindex="-1" role="dialog" aria-labelledby="transModTitle" aria-hidden="true">
                        <div class="modal-dialog modal-dialog-centered" role="document">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="transModTitle">Adicionar transação</h5>
                                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                                <div class="modal-body">
                                    ...
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Fechar</button>
                                    <button type="button" class="btn btn-sm btn-primary">Salvar</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection