<h1>{{ $book->title }}</h1>
<p><strong>ISBN:</strong> {{ $book->isbn }}</p>
<p><strong>Género:</strong> {{ $book->gender->name }}</p>
<p><strong>Fecha de publicación:</strong> {{ $book->published_at }}</p>
<p><strong>Autor(es):</strong></p>
<ul>
    @foreach ($authors as $author)
    <li>{{ $author->name }}</li>
    @endforeach
</ul>
<a href="{{ url()->previous() }}" class="btn btn-secondary">Volver</a>