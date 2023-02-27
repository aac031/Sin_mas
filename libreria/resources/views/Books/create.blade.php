<form action="{{ route('books.store') }}" method="POST">
    @csrf

    <div class="form-group">
        <label for="title">Título:</label>
        <input type="text" name="title" id="title" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="author_id">Autor:</label>
        <select name="author_id" id="author_id">
            @foreach ($authors as $author)
            <option value="{{ $author->id }}">{{ $author->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="gender_id">Género:</label>
        <select name="gender_id" id="gender_id" class="form-control" required>
            @foreach($genders as $gender)
            <option value="{{ $gender->id }}">{{ $gender->name }}</option>
            @endforeach
        </select>
    </div>

    <div class="form-group">
        <label for="isbn">ISBN:</label>
        <input type="text" name="isbn" id="isbn" class="form-control" required>
    </div>

    <div class="form-group">
        <label for="published_at">Published_at:</label>
        <input type="date" name="published_at" id="published_at" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-primary">Dar de alta</button>
</form>

<a href="{{ url()->previous() }}" class="btn btn-secondary">Volver</a>