<title>Pokedex</title>
<h1 class="justify-content-center" style="display: flex;">Pokemons</h1>

<div class="container">
    <div class="col-md-10 d-inline-flex">
        <a type="button" class="btn btn-info ml-1" href="/<?=WEBROOT2?>/Pokedex/create" >Ajouter un Pokémon</a>
    </div>

    <table class="table">
        <thead>
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Name</th>
            <th scope="col">Type</th>
            <th scope="col">Image</th>
            <th scope="col">Actions</th>
        </tr>
        </thead>
        <tbody>

        @foreach($pokemons as $pokemon) :#
        <tr>
            <td>{{ $pokemon->id }}</td>
            <td>{{ $pokemon->name }}</td>
            <td>{{ $pokemon->label }}</td>
            <td><img width="90" height="90" alt="{{ $pokemon->name }}" src="/<?=WEBROOT2?>/webroot/img/Pokemouilles/{{ $pokemon->name }}.png"></td>
            <td><a href="Pokedex/show/{{ $pokemon->id }}"><i class="fas fa-info-circle"></i></a></td>
        </tr>
        @endforeach#
        </tbody>
    </table>
</div>

