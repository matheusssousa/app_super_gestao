<form method="POST" action="{{ route('pedido-produto.store', ['pedido' => $pedido, 'produtos' => $produtos]) }}">
    @csrf

    <select name="produto_id">
        <option>-- Selecione um Produto --</option>
        @foreach ($produtos as $produto)
            <option value="{{ $produto->id }}" {{ old('produto_id') == $produto->id ? 'selected' : '' }}>
                {{ $produto->nome }}</option>
        @endforeach
    </select>
    {{ $errors->has('produto_id') ? $errors->first('produto_id') : '' }}

    <input type="number" name="quantidade" value="{{ $produto->quantidade ? old('quantidade') : '' }}" class="borda-preta"
        placeholder="Quantidade">
    {{ $errors->has('quantidade') ? $errors->first('quantidade') : '' }}


    <button type="submit" class="borda-preta">Cadastrar</button>
</form>
