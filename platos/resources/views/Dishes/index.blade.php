<h1>Listado de platos</h1>

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<div>
    <a href="{{ route('dishes.create') }}">Añadir plato</a>
</div>

@if (auth()->check())
<form method="POST" action="{{ route('logout') }}">
    @csrf
    <button type="submit">Cerrar sesión</button>
</form>
@endif

<table>
    <thead>
        <tr>
            <th>Plato</th>
            <th>Usuario</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($dishes as $dish)
        <tr>
            <td>{{ $dish->name }}</td>
            <td>{{ $dish->user->name }}</td>
            <td>
                <a href="{{ route('dishes.show', $dish) }}" class="btn btn-info">Ver detalles</a>
                @if(auth()->check() && auth()->user()->id === $dish->user_id)
                <form action="{{ route('dishes.destroy', $dish->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
                @endif
            </td>
        </tr>
        @endforeach
    </tbody>
</table>