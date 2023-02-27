@if (Auth::check())
<a href="{{ route('books.create') }}" class="btn btn-primary">Nuevo</a>
@endif

<!-- @can('create', App\Models\Book::class)
    <a href="{{ route('books.create') }}" class="btn btn-primary">Nuevo</a>
@endcan -->

@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@endif

<table>
    <thead>
        <tr>
            <th>Título</th>
            <th>Autor(es)</th>
            <th>Usuario</th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($books as $book)
        <tr>
            <td>{{ $book->title }}</td>
            <td>
                @foreach($book->authors as $author)
                {{ $author->name }} @if(!$loop->last), @endif
                @endforeach
            </td>
            <td>{{ $book->user->name ?? 'Desconocido' }}</td>
            <td>
                <a href="{{ route('books.show', $book) }}" class="btn btn-primary">Ver</a>
                @if (Auth::check() && Auth::user()->id === $book->user_id)
                <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
                @endif

                <!-- @can('delete', $book)
                <form action="{{ route('books.destroy', $book->id) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger">Borrar</button>
                </form>
                @endcan -->
            </td>
        </tr>
        @endforeach
    </tbody>
</table>

@if (Auth::check())
<form action="{{ route('logout') }}" method="POST">
    @csrf
    <button type="submit">Logout</button>
</form>
@endif

@if(!auth()->check())
<br>
<a href="{{ url('login') }}">Acceder</a>
@endif