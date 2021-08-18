{{ $slot }}
<form action="{{ route('site.contato') }}" method="POST">
    @csrf 
    <input name="nome" type="text" placeholder="Nome" class="{{ $corBorda }}">
    <br>
    <input name="telefone" type="text" placeholder="Telefone" class="{{ $corBorda }}">
    <br>
    <input name="email" type="text" placeholder="E-mail" class="{{ $corBorda }}">
    <br>
    <select name="motivo_contato" class="{{ $corBorda }}">
        <option value="">Qual o motivo do contato?</option>
        <option value="1">Dúvida</option>
        <option value="2">Elogio</option>
        <option value="3">Reclamação</option>
    </select>
    <br>
    <textarea name="mensagem" class="{{ $corBorda }}">Preencha aqui a sua mensagem</textarea>
    <br>
    <button type="submit" class="{{ $corBorda }}">ENVIAR</button>
</form>