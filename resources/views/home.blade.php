@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <!-- Messages -->
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

            <!-- Dashboard -->
            <div class="card">
                <div class="card-header text-center">
                    <span>Dashboard</span>
                </div>

                <!-- Options -->
                <div class="card-body">
                    <div class="d-flex justify-content-between flex-wrap">
                        <div class="mb-3">
                            <button class="btn btn-outline-primary" type="submit" data-toggle="modal" data-target="#storeCategory">Categoria</button>
                            @include('modals.store-category')
                            <button class="btn btn-outline-primary" type="submit" data-toggle="modal" data-target="#storeTransaction">Transação</button>
                            @include('modals.store-transaction')
                        </div>

                        <div class="btn-group mb-3" role="group" aria-label="Basic example">
                            <a class="btn btn-secondary" href="#" role="button">Relatório mensal</a>
                            <a class="btn btn-secondary" href="#" role="button">Relatório anual</a>
                        </div>
                    </div>

                    <!-- Dashboard Navigation -->
                    <div class="d-flex justify-content-between flex-wrap">
                        @if (!empty($_GET['month']) && !empty($_GET['year']))
                            @php $month = $_GET['month']; $year = $_GET['year'] @endphp
                        @else
                            @php $month = date('m'); $year = date('Y') @endphp
                        @endif

                        <div class="form-group">
                            <select class="form-control" name="year" onchange="location.replace('?month={{ $month }}&year='+this.value)">
                                <option value="none" selected disabled hidden>{{ date('Y') }}</option>
                                @for ($y = 2015; $y <= 2025; $y++)
                                    <option value="{{ ($y == $year) ? old('y') : $y }}" {{ ($y == $year) ? 'selected' : '' }}>{{ $y }}</option>
                                @endfor
                            </select>
                        </div>

                        <div>
                            <ul class="nav nav-tabs" role="tablist">
                                @for ($m=1; $m <= 12; $m++)
                                <li class="nav-item">
                                    <a href="?month={{ $m }}&year={{ $year ?? '' }}" class="nav-link text-primary {{ ($m == $month) ? 'active' : '' }}">{{ substr(date('F', mktime(0, 0, 0, $m, 1)),0, 3) }}</a>
                                </li>
                                @endfor
                            </ul>
                        </div>
                    </div>

                    <!-- Content -->
                    <div class="tab-content">
                        <div class="tab-pane fade show active">
                            <div class="row mt-2">
                                <div class="col-sm-4 my-2">
                                    <div class="card">
                                        <div class="card-header text-center">
                                            <strong>Balanço mensal</strong>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text text-success">Receita: {{ $month_one }}</p>
                                            <p class="card-text text-danger">Despesa: {{ $month_zero }}</p>
                                        </div>
                                        <div class="card-footer">
                                            <strong class="{{ (($month_one - $month_zero) >= 0) ? 'text-success' : 'text-danger' }}">Total: {{ $month_one - $month_zero }}</strong>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4 my-2">
                                    <div class="card">
                                        <div class="card-header text-center">
                                            <strong>Balanço anual</strong>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text text-success">Receita: {{ $year_one }}</p>
                                            <p class="card-text text-danger">Despesa: {{ $year_zero }}</p>
                                        </div>
                                        <div class="card-footer">
                                            <strong class="{{ (($year_one - $year_zero) >= 0) ? 'text-success' : 'text-danger' }}">Total: {{ $year_one - $year_zero }}</strong>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-sm-4 my-2">
                                    <div class="card">
                                        <div class="card-header text-center">
                                            <strong>Balanço geral</strong>
                                        </div>
                                        <div class="card-body">
                                            <p class="card-text text-success">Receita: {{ $all_one }}</p>
                                            <p class="card-text text-danger">Despesa: {{ $all_zero }}</p>
                                        </div>
                                        <div class="card-footer">
                                            <strong class="{{ (($all_one - $all_zero) >= 0) ? 'text-success' : 'text-danger' }}">Total: {{ $all_one - $all_zero }}</strong>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Content table-->
                            <div class="table-responsive mt-4">
                                <table class="table table-striped">
                                    <thead>
                                        <tr class="text-primary">
                                            <th scope="col">Data</th>
                                            <th scope="col">Transação</th>
                                            <th scope="col">Categoria</th>
                                            <th scope="col">Tipo</th>
                                            <th scope="col">Valor</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($transactions as $transaction)
                                        <tr>
                                            <td>{{ date('d/m/Y', strtotime($transaction->date)) }}</td>
                                            <td>
                                                <a href="" target="_blank" data-toggle="modal" data-target="#updateTransaction{{ $transaction->id }}">{{ $transaction->description }}</a>
                                                @include('modals.update-transaction')
                                            </td>
                                            <td>
                                                <a href="" target="_blank" data-toggle="modal" data-target="#updateCategory{{ $transaction->category->id }}">{{ $transaction->category->name }}</a>
                                                @include('modals.update-category')
                                            </td>
                                            <td>
                                                <span>{{ ($transaction->type == 1) ? 'Receita' : 'Despesa' }}</span>
                                            </td>
                                            <td>
                                                <span class="{{ ($transaction->type == 1) ? 'text-success' : 'text-danger' }}">{{ $transaction->value }}</span>
                                            </td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="5" class="text-center">Nenhuma transação encontrada...</td>
                                        </tr>
                                        @endforelse
                                        <tr class="table-secondary {{ (($month_one - $month_zero) >= 0) ? 'text-success' : 'text-danger' }}">
                                            <td colspan="4">
                                                <strong>Total do mês</strong>
                                            </td>
                                            <td colspan="5">
                                                <strong>{{ $month_one - $month_zero }}</strong>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
</div>
@endsection