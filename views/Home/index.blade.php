<style></style>
<h1>Pokemons</h1>

<form action="/<?=WEBROOT2?>/Home/index" method="post">
    <input name="michel" type="text" value="1">
    <input type="submit">
</form>
<table>
    <thead>
        <th>Id</th>
        <th>Name</th>
    </thead>
    <tbody>
    @foreach($pokemons as $pokemon) :#
        <tr>
            <td>{{ $pokemon->id }}</td>
            <td>{{ $pokemon->name }}</td>
        </tr>
    @endforeach#
    </tbody>
</table>


