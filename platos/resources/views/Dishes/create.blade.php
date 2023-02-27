<h1>Agregar plato</h1>
<form action="{{ route('dishes.store') }}" method="POST">
    @csrf
    <input type="hidden" name="user_id" value="{{ auth()->user()->id }}">
    <div>
        <label for="name">Nombre:</label>
        <input type="text" name="name" id="name" required>
    </div>
    <div>
        <label for="type_id">Tipo:</label>
        <select name="type_id" id="type_id" required>
            <option value="">-- Seleccione un tipo --</option>
            @foreach($types as $type)
            <option value="{{ $type->id }}">{{ $type->name }}</option>
            @endforeach
        </select>
    </div>
    <div>
        <input type="submit" value="Agregar">
    </div>
</form>

<a href="{{ route('dishes.index') }}" class="btn btn-secondary">Volver</a>