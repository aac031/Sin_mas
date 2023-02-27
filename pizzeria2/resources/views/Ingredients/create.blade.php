<h1>Nuevo ingrediente</h1>

<form method="POST" action="{{ route('ingredients.store') }}">
    @csrf
    <div>
        <label for="name">Nombre del ingrediente:</label>
        <input type="text" name="name" id="name">
    </div>
    <div>
        <label for="type_id">Tipo de ingrediente:</label>
        <select name="type_id" id="type_id">
            @foreach ($types as $type)
            <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
    </div>
    <button type="submit">Guardar</button>
</form>

<a href="{{ url()->previous() }}" class="btn btn-secondary">Volver</a>