<table>
    <thead>
        <tr>
            <th>Nombre</th>
            <th>Tipo</th>
            <th>Precio</th>
        </tr>
    </thead>
    <tbody>
        @foreach($ingredients as $ingredient)
        <tr>
            <td>{{ $ingredient->name }}</td>
            <td>{{ $ingredient->type->name }}</td>
            <td>{{ $ingredient->price }}</td>
        </tr>
        @endforeach
    </tbody>
</table>

<a href="{{ url()->previous() }}" class="btn btn-secondary">Volver</a>