<h1>Listado de Ingredientes</h1>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Cerrar sesión</button>
</form>

<a href="{{ route('pizzas.index') }}">Pizzas</a>
<a href="{{ route('ingredients.index') }}">Ingredientes</a>
<a href="{{ route('ingredients.create') }}">Agregar Ingrediente</a>
<a href="{{ route('ingredients.list') }}" class="btn btn-primary">Ver ingredientes guardados</a>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<table class="table">
    <thead>
        <tr>
            <th>Name</th>
            <th>Type</th>
            <th>Created by</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($ingredients as $ingredient)
        <tr>
            <td>{{ $ingredient->name }}</td>
            <td>{{ $ingredient->type->name }}</td>
            <td>{{ $ingredient->user->name }}</td>
            <td>
                <form action="{{ route('ingredients.save', $ingredient->id) }}" method="GET">
                    <button type="submit">Agregar</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>
{{ $ingredients->links() }}