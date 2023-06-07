{{ $slot }}
<form action={{ route('site.contato') }} method="POST">
    @csrf
    <input name="nome" value="{{ old('nome') }}" type="text" placeholder="Nome" class="borda-preta">
    <br>
    <input name="telefone" value="{{ old('telefone') }}" type="text" placeholder="Telefone" class="borda-preta">
    <br>
    <input name="email" value="{{ old('email') }}" type="text" placeholder="E-mail" class="borda-preta">
    <br>
    <select name="motivo_contato" class="borda-preta">
        <option value="">Qual o motivo do contato?</option>
        <option value="1">Dúvida</option>
        <option value="2">Elogio</option>
        <option value="3">Reclamação</option>
    </select>
    <br>
    <textarea name="mensagem" class="borda-preta">
        @if (old('mensagem') != '')
            {{ old('mensagem') }}
        @else
            Preencha aqui a sua mensagem
        @endif
    </textarea>
    <br>
    <button type="submit" class="borda-preta">ENVIAR</button>
</form>

<div style="position: absolute; top:0px; left:0px; width:100%; background:pink">
    <pre>
        {{ print_r($errors) }}
    </pre>
</div>