<!-- Modal Store Transaction-->
<div class="modal fade" id="storeTransaction" tabindex="-1" role="dialog" aria-labelledby="storeTransactionTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="storeTransactionTitle">Adicionar transação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form method="post" action="{{ route('home.store.transaction') }}">
                    @csrf
                    <div class="form-group">
                        <label for="inputDesc">Descrição</label>
                        <input type="text" class="form-control form-control-sm" id="inputDesc" name="description" required="" maxlength="20">
                    </div>

                    <div class="form-group">
                        <label for="inputDate">Data</label>
                        <input type="date" class="form-control form-control-sm" id="inputDate" name="date" required="">
                    </div>

                    <div class="form-group">
                        <label for="inputValue">Valor</label>
                        <input type="text" class="form-control form-control-sm" id="inputValue" name="value" required="" maxlength="10">
                    </div>

                    <div class="form-group">
                        <label for="inputCat">Categoria</label>
                        <select id="inputCat" class="form-control form-control-sm" name="category_id">
                            <option value="none" selected disabled hidden>Selecionar...</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="form-check">Tipo</label><br>
                        <div class="form-check form-check-inline" id="form-check">
                            <input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="1" required="">
                            <label class="form-check-label text-success" for="inlineRadio1">Receita</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="0">
                            <label class="form-check-label text-danger" for="inlineRadio2">Despesa</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="inlineRadio3" value="" disabled>
                            <label class="form-check-label" for="inlineRadio3">Outro (desabilitado)</label>
                        </div>
                    </div>

                    <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Fechar</button>
                    <button type="submit" class="btn btn-sm btn-primary">Salvar</button>
                </form>
            </div>
        </div>
    </div>
</div>