<!-- resources/views/pizzas/create.blade.php -->

<h1>Nueva pizza</h1>

<form method="POST" action="{{ route('pizzas.store') }}">
    @csrf
    <div>
        <label for="name">Nombre de la pizza:</label>
        <input type="text" name="name" id="name">
    </div>
    <button type="submit">Guardar</button>
</form>

<a href="{{ url()->previous() }}" class="btn btn-secondary">Volver</a>