    <option value="" selected>Selecione...</option>
    @foreach($cidades as $cidade)
        <option value="{{ $cidade['id'] }}" @if(old('cidade_id') == $cidade['id']) {{ 'selected' }} @endif>{{ $cidade['name'] }}</option>
    @endforeach
