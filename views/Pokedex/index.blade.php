<title>Pokedex</title>
<h1>Pokemons</h1>

<form action="/<?=WEBROOT2?>/Home/index" method="post">
    <input name="michel" type="text" value="1">
    <input type="submit">
</form>
<table class="table">
    <thead>
    <tr>
        <th scope="col">Id</th>
        <th scope="col">Name</th>
        <th scope="col">Image</th>
        <th scope="col">Actions</th>
    </tr>
    </thead>
    <tbody>

    @foreach($pokemons as $pokemon) :#
        <tr>
            <td>{{ $pokemon->id }}</td>
            <td>{{ $pokemon->name }}</td>
            <td><img width="90" height="90" alt="{{ $pokemon->name }}" src="/<?=WEBROOT2?>/webroot/img/Pokemouilles/{{ $pokemon->name }}.png"></td>
            <td><a href="Pokedex/show/{{ $pokemon->id }}"><i class="fas fa-info-circle"></i></a></td>
        </tr>
    @endforeach#
    </tbody>
</table>


