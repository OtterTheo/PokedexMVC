<div>
    <h1 class="mt-md-3">Ajouter un Pokémon</h1>
    <form method="POST" action="/<?=WEBROOT2?>/Pokedex/store" enctype="multipart/form-data">
        <div class="form-group col-2 m-auto mt-md-3 mb-md-3">
            <input name="name" class="form-control" type="text" placeholder="Nom du pokémon">
            <small style="color: red;">{{!empty($messages['name']['required']) ? $messages['name']['required'][0] : '' }}</small>
        </div>
        <div class="form-group col-2 m-auto mb-md-3">
            <select name="type_id" class="form-select" >
                <option selected>Type</option>
                @if (!empty($types)): #
                    @foreach($types as $type):  #
                     <option type="integer" value="{{ $type->id }}" >{{ $type->label }}</option>
                    @endforeach#
                @endif#
            </select>
        </div>
            <button class="row col-1 btn btn-success" type="submit">Créer</button>
    </form>
</div>


