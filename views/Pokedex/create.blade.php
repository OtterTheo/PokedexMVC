<div>
    <h1 class="justify-content-center" style="display: flex;">Ajouter un Pokémon</h1>
    <form method="POST" action="/<?=WEBROOT2?>/Pokedex/store" enctype="multipart/form-data">
        <div class="form-group col-2 m-auto mt-md-3 mb-md-3 justify-content-center" style="display: flex;">
            <input name="name" class="form-control" type="text" placeholder="Nom du pokémon">

        </div>
        <small class="justify-content-center"  style="color: red; display:flex;">{{!empty($messages['name']['required']) ? $messages['name']['required'][0] : '' }}</small>
        <div class="form-group col-2 m-auto mb-md-3 justify-content-center" style="display: flex;">
            <select name="type_id[]" class="selectpicker" multiple data-live-search="true" title="Type">
                @if (!empty($types)): #
                    @foreach($types as $type):  #
                     <option type="integer" value="{{ $type->id }}" >{{ $type->label }}</option>
                    @endforeach#
                @endif#
            </select>
        </div>
        <small class="justify-content-center"  style="color: red; display:flex;">{{!empty($messages['type_id']['required']) ? $messages['type_id']['required'][0] : '' }}</small>
        <div class="m-auto justify-content-center" style="display: flex;">
            <button class="row col-1 btn btn-success" type="submit">Créer</button>
        </div>
    </form>
</div>
<script>
    $('select').selectpicker();
</script>

