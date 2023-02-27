<h1>{{ $pizza->name }}</h1>
<h2>Ingredientes:</h2>
<ul>
    @foreach($pizza->ingredients as $ingredient)
    <li>{{ $ingredient->name }} - {{ $ingredient->price }} €</li>
    @endforeach
</ul>
<h2>Precio total: {{ $price }} €</h2>

<form action="{{ route('pizzas.addIngredients', ['id' => $pizza->id]) }}" method="POST">
    @csrf
    <p>Selecciona los ingredientes a añadir:</p>
    <ul>
        @foreach ($ingredients as $ingredient)
        <li>
            <label>
                <input type="checkbox" name="ingredients[]" value="{{ $ingredient->id }}">
                {{ $ingredient->name }}
            </label>
        </li>
        @endforeach
    </ul>
    <button type="submit">Añadir ingredientes a esta pizza</button>
</form>

<a href="{{ route('pizzas.index') }}">Volver</a>

