<!-- Modal Update Transaction-->
<div class="modal fade" id="updateTransaction{{ $transaction->id }}" tabindex="-1" role="dialog" aria-labelledby="updateTransaction{{ $transaction->id }}Title" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="updateTransaction{{ $transaction->id }}Title">Atualizar transação</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <div class="modal-body">
                <form method="post" action="{{ route('home.update.transaction', $transaction->id) }}">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label for="inputDesc">Descrição</label>
                        <input type="text" class="form-control form-control-sm" id="inputDesc" name="description" value="{{ $transaction->description }}">
                    </div>

                    <div class="form-group">
                        <label for="inputDate">Data</label>
                        <input type="date" class="form-control form-control-sm" id="inputDate" name="date" value="{{ $transaction->date }}">
                    </div>

                    <div class="form-group">
                        <label for="inputValue">Valor</label>
                        <input type="text" class="form-control form-control-sm" id="inputValue" name="value" value="{{ $transaction->value }}">
                    </div>

                    <div class="form-group">
                        <label for="inputCat">Categoria</label>
                        <select id="inputCat" class="form-control form-control-sm" name="category_id">
                            <option value="none" selected disabled hidden>Selecionar...</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ ($category->id == $transaction->category_id) ? 'selected' : '' }}>{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="form-check">Tipo</label><br>
                        <div class="form-check form-check-inline" id="form-check">
                            <input class="form-check-input" type="radio" name="type" id="inlineRadio1" value="1" {{ ($transaction->type == '1') ? 'checked' : '' }}>
                            <label class="form-check-label text-success" for="inlineRadio1">Receita</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="inlineRadio2" value="0" {{ ($transaction->type == '0') ? 'checked' : '' }}>
                            <label class="form-check-label text-danger" for="inlineRadio2">Despesa</label>
                        </div>
                        <div class="form-check form-check-inline">
                            <input class="form-check-input" type="radio" name="type" id="inlineRadio3" value="" disabled>
                            <label class="form-check-label" for="inlineRadio3">Outro (desabilitado)</label>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between">
                        <div>
                            <button type="button" class="btn btn-sm btn-secondary" data-dismiss="modal">Fechar</button>
                            <button type="submit" class="btn btn-sm btn-primary">Salvar</button>
                        </div>

                        <div>
                            <form method="post" action="{{ route('home.delete.transaction', $transaction->id) }}">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-sm btn-danger float-right" onclick="return confirm('Tem certeza que deseja excluir?')">Excluir</button>
                            </form>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>