<!-- Modal Store Category-->
<div class="modal fade" id="storeCategory" tabindex="-1" role="dialog" aria-labelledby="storeCategoryTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="storeCategoryTitle">Adicionar categoria</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form method="post" action="{{ route('home.store.category') }}">
                    @csrf
                    <div class="form-group">
                        <label for="InputName">Nome</label>
                        <input type="text" class="form-control form-control-sm" id="InputName" name="name" value="{{ old('name') }}">
                    </div>

                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-sm btn-primary">Salvar</button>
                </form>
            </div>


        </div>
    </div>
</div>