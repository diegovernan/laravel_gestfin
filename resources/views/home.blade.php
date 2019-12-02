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
                                <option>2020</option>
                                <option>2021</option>
                                <option>2022</option>
                                <option>2023</option>
                                <option>2024</option>
                                <option>2025</option>
                            </select>
                        </div>

                        <div>
                            <ul class="nav nav-tabs" id="myTab" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active text-primary" id="jan-tab" data-toggle="tab" href="#jan" role="tab" aria-controls="home" aria-selected="true">Jan</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-primary" id="fev-tab" data-toggle="tab" href="#fev" role="tab" aria-controls="profile" aria-selected="false">Fev</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-primary" id="mar-tab" data-toggle="tab" href="#mar" role="tab" aria-controls="contact" aria-selected="false">Mar</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-primary" id="abr-tab" data-toggle="tab" href="#abr" role="tab" aria-controls="contact" aria-selected="false">Abr</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-primary" id="mai-tab" data-toggle="tab" href="#mai" role="tab" aria-controls="contact" aria-selected="false">Mai</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-primary" id="jun-tab" data-toggle="tab" href="#jun" role="tab" aria-controls="contact" aria-selected="false">Jun</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-primary" id="jul-tab" data-toggle="tab" href="#jul" role="tab" aria-controls="contact" aria-selected="false">Jul</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-primary" id="ago-tab" data-toggle="tab" href="#ago" role="tab" aria-controls="contact" aria-selected="false">Ago</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-primary" id="set-tab" data-toggle="tab" href="#set" role="tab" aria-controls="contact" aria-selected="false">Set</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-primary" id="out-tab" data-toggle="tab" href="#out" role="tab" aria-controls="contact" aria-selected="false">Out</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-primary" id="nov-tab" data-toggle="tab" href="#nov" role="tab" aria-controls="contact" aria-selected="false">Nov</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link text-primary" id="dez-tab" data-toggle="tab" href="#dez" role="tab" aria-controls="contact" aria-selected="false">Dez</a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="jan" role="tabpanel" aria-labelledby="jan-tab">Lorem ipsum dolor sit amet consectetur adipisicing elit. Eum porro vel distinctio officia quidem adipisci dolores officiis nostrum mollitia voluptates obcaecati, commodi et asperiores, tempore dolorum dolorem harum id quas.</div>
                        <div class="tab-pane fade" id="fev" role="tabpanel" aria-labelledby="fev-tab">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Beatae, quas nostrum cumque veritatis animi voluptatum necessitatibus facilis temporibus vel voluptates omnis laboriosam dolorum consequuntur neque eveniet, eligendi hic pariatur. Nihil!</div>
                        <div class="tab-pane fade" id="mar" role="tabpanel" aria-labelledby="mar-tab">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Cupiditate inventore facere delectus incidunt beatae nihil quisquam dolores? Veniam ipsam nam suscipit sapiente quod obcaecati molestias, dignissimos saepe minus quaerat vero.</div>
                        <div class="tab-pane fade" id="abr" role="tabpanel" aria-labelledby="abr-tab">Lorem ipsum dolor sit amet consectetur adipisicing elit. Temporibus, ipsa corporis fugiat repudiandae dignissimos veritatis voluptatem delectus minus. Officiis veniam neque dolore dolores exercitationem aliquid labore, voluptatem magnam tenetur rerum.</div>
                        <div class="tab-pane fade" id="mai" role="tabpanel" aria-labelledby="mai-tab">Lorem ipsum dolor sit amet consectetur adipisicing elit. Recusandae at perferendis nostrum amet porro excepturi accusamus animi architecto placeat, unde minus quis a fugiat, provident numquam neque ut sed quibusdam?</div>
                        <div class="tab-pane fade" id="jun" role="tabpanel" aria-labelledby="jun-tab">Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet quae corporis accusantium libero accusamus deserunt, voluptates, placeat omnis explicabo quod quia itaque deleniti? Dolorum quae velit sapiente corrupti obcaecati qui!</div>
                        <div class="tab-pane fade" id="jul" role="tabpanel" aria-labelledby="jul-tab">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Harum a aliquid, ratione et voluptate vel incidunt ea expedita ut earum repudiandae recusandae voluptates! Veritatis beatae necessitatibus voluptatem, dicta eos laudantium.</div>
                        <div class="tab-pane fade" id="ago" role="tabpanel" aria-labelledby="ago-tab">Lorem, ipsum dolor sit amet consectetur adipisicing elit. Iure voluptatum consequuntur aliquid, nesciunt amet dolorum distinctio quos mollitia maxime doloremque sequi cumque et iusto voluptates eius! Beatae, veritatis ad. Quaerat!</div>
                        <div class="tab-pane fade" id="set" role="tabpanel" aria-labelledby="set-tab">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Maxime incidunt facere doloremque, odio aliquid voluptate neque delectus esse illum fugiat unde dolore consequuntur accusantium eligendi ipsa. Nemo architecto ad porro?</div>
                        <div class="tab-pane fade" id="out" role="tabpanel" aria-labelledby="out-tab">Lorem ipsum dolor sit amet consectetur adipisicing elit. Explicabo officiis molestias qui tenetur vitae laboriosam itaque quidem blanditiis molestiae in vero eum, minus accusantium ducimus quis? Labore, sapiente est. Quod.</div>
                        <div class="tab-pane fade" id="nov" role="tabpanel" aria-labelledby="nov-tab">Lorem ipsum dolor sit amet consectetur adipisicing elit. Deserunt illum inventore dolore a eos, incidunt, sed temporibus quas blanditiis libero est culpa minima aspernatur, ipsam odio aliquam vitae qui voluptas.</div>
                        <div class="tab-pane fade" id="dez" role="tabpanel" aria-labelledby="dez-tab">Lorem ipsum dolor sit, amet consectetur adipisicing elit. Rem modi quaerat reiciendis in, voluptatem, dolores debitis totam nisi obcaecati consequuntur necessitatibus autem ducimus amet maiores sit temporibus similique alias facilis?</div>
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