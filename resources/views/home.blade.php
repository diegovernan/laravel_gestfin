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
                            <form action="{{ route('home') }}" method="get">
                            <select class="form-control" name="year" onchange='this.form.submit()'>
                                <option value="none" selected disabled hidden>Ano</option> 
                                @for ($y = 2015; $y <= 2025; $y++)
                                    @if (!empty($_GET['year']) && $_GET['year'] == $y)
                                        <option value="{{ $y }}" selected="selected">{{ $y }}</option>
                                    @else
                                        <option value="{{ $y }}">{{ $y }}</option>
                                    @endif
                                @endfor
                            </select>
                            </form>
                        </div>

                        <div>
                            <ul class="nav nav-tabs" role="tablist">
                                @for ($m=1; $m <= 12; $m++)
                                @php $month = substr(date('F', mktime(0, 0, 0, $m, 1)),0, 3); @endphp
                                <li class="nav-item">
                                    <a class="nav-link text-primary @if ($month === substr(date('F'),0, 3)) active @endif" id="{{ $month }}" data-toggle="tab" href="#{{ $month }}" role="tab" aria-controls="home" aria-selected="true">{{ $month }}</a>
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
                                        <h5 class="card-title text-primary">Mensal</h5>
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
                                        <h5 class="card-title text-primary">Anual</h5>
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
                                        <h5 class="card-title text-primary">Geral</h5>
                                        <p class="card-text">Receita: x</p>
                                        <p class="card-text">Despesa: y</p>
                                        <hr>
                                        <p>Total</p>
                                    </div>
                                    </div>
                                </div>
                            </div>

                            <div class="table-responsive mt-2">
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="text-primary">
                                            <th scope="col">Transação</th>
                                            <th scope="col">Categoria</th>
                                            <th scope="col">Data</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        @foreach ($transactions as $transaction)
                                        <th scope="row">{{ $transaction->description }}</th>
                                        <td>{{ $transaction->category->name }}</td>
                                        <td>{{ date('d-m-Y', strtotime($transaction->date)) }}</td>
                                        @endforeach
                                        </tr>
                                    </tbody>
                                </table>
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