<?php class_exists('Template') or exit; ?>
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
    </tr>
    </thead>
    <tbody>
    <?php foreach($pokemons as $pokemon) : ?>
        <tr>
            <td><?php echo $pokemon->id ?></td>
            <td><?php echo $pokemon->name ?></td>
            <td><img width="90" height="90" alt="<?php echo $pokemon->name ?>" src="/<?=WEBROOT2?>/webroot/img/Pokemouilles/<?php echo $pokemon->name ?>.png"></td>
        </tr>
    <?php endforeach ?>
    </tbody>
</table>


