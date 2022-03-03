@if(isset($cliente->id))
    <form method="post" action="{{ route('cliente.update', ['cliente' => $cliente->id]) }}">
            @csrf
            @method('PUT')
@else
    <form method="post" action="{{ route('cliente.store') }}">
        @csrf
@endif
    <div class="form-group">
        <input class="form-control" type="text" name="nome" value="{{ $cliente->nome ?? old('nome') }}" placeholder="Nome" class="borda-preta">
        {{ $errors->has('nome') ? $errors->first('nome') : '' }}
    </div>

    <button type="submit" class="borda-preta">Cadastrar</button>
    </form>