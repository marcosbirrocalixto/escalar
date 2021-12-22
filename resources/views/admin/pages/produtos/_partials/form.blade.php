@include('admin.includes.alerts')

@csrf

<div class="form-group">
    <label>Título:</label>
    <input type="text" name="title" class="form-control" placeholder="Nome:" value="{{ $produto->title ?? old('title') }}">
</div>
<div class="form-group">
    <label>Descrição:</label>
    <textarea name="description" cols="30" rows="5" class="form-control">{{ $produto->description ?? old('description') }}</textarea>
</div>

@if ($produto->id ?? '')
<div class="form-group">
    <label for="categoria_id">Categorias</label>
    <select class="form-control" name="categoria_id">
        @foreach ( $categorias as $categoria )
            @if ($produto->categoria_id == $categoria->id )
                <option selected value="{{ $categoria->id }}">{{ $categoria->name }} - {{ $categoria->description }}</option>
            @else
                <option value="{{ $categoria->id }}">{{ $categoria->name }} - {{ $categoria->description }}</option>
            @endif
        @endforeach
    </select>
</div>
@else
<div class="form-group">
    <label for="categoria_id">Categorias</label>
    <select class="form-control" name="categoria_id">
        <option value="">Selecione a categoria</option>
        @foreach ( $categorias as $categoria )
            <option value="{{ $categoria->id }}">{{ $categoria->name }} - {{ $categoria->description }}</option>
        @endforeach
    </select>
</div>
@endif


<div class="form-group">
    <label>Preço:</label>
    <input type="text" name="price" class="form-control" placeholder="Preço:" value="{{ $produto->price ?? old('price') }}">
</div>

<div class="form-group">
    <button type="submit" class="btn btn-primary">Enviar</button>
</div>
