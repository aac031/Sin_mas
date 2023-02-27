<h1>{{ $dish->name }}</h1>
<p>Tipo: {{ $dish->type->name }}</p>

<h2>Ingredientes:</h2>
<ul>
    @foreach ($dish->ingredients as $ingredient)
    <li>{{ $ingredient->name }} ({{ $ingredient->pivot->quantity }})</li>
    @endforeach
</ul>