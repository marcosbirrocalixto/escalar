@include('admin.includes.alerts')

@csrf

<div class="form-group">
    <label>Nome:</label>
    <input type="text" name="name" class="form-control" placeholder="Nome:" value="{{ $categoria->name ?? old('name') }}">
</div>
<div class="form-group">
    <label>URL:</label>
    <input type="text" name="url" class="form-control" placeholder="Nome:" value="{{ $categoria->url ?? old('url') }}">
</div>
<div class="form-group">
    <label>Descrição:</label>
    <textarea name="description" cols="30" rows="5" class="form-control" placeholder="Descrição:">{{ $categoria->description ?? old('description') }}</textarea>
</div>
<div class="form-group">
    <button type="submit" class="btn btn-primary">Enviar</button>
</div>
