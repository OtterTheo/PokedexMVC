<div>
    <h1 class="mt-md-3">Ajouter un Pokémon</h1>
    <form method="POST" action="/<?=WEBROOT2?>/Pokedex/store" enctype="multipart/form-data">
        <div class="form-group col-2 m-auto mt-md-3 mb-md-3">
            <input name="name" class="form-control" type="text" placeholder="Nom du pokémon">
        </div>
        <div class="form-group col-2 m-auto mb-md-3">
            <select name="type" class="form-select" >
                <option selected>Type</option>
                @foreach($types as $type) : #
                <option value="{{ $type->id }}" >{{ $type->label }}</option>
                @endforeach#
            </select>
        </div>
            <button class="row col-1 btn btn-success" type="submit">Créer</button>


    </form>
</div>


