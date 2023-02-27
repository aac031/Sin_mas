<!-- resources/views/pizzas/index.blade.php -->

<h1>Listado de Pizzas</h1>

<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Cerrar sesión</button>
</form>

<a href="{{ route('pizzas.index') }}">Pizzas</a>
<a href="{{ route('ingredients.index') }}">Ingredientes</a>
<a href="{{ route('pizzas.create') }}">Agregar Pizza</a>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Dado de alta por</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($pizzas as $pizza)
        <tr>
            <td>{{ $pizza->name }}</td>
            <td>{{ $pizza->user->name }}</td>
            <td>
                <a href="{{ route('pizzas.show', ['id' => $pizza->id]) }}">Mostrar detalles</a>
                <form action="{{ route('pizzas.destroy', $pizza) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit">Delete</button>
                </form>
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

{{ $pizzas->links() }}