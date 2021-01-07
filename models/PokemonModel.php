<?php



class PokemonModel  extends AbstractModel
{
    var $table = 'pokemon';

    function GetPokemons(){
        return $this->findAll(array(
            'fields' => "pokemon.*",
            'table' => "pokemon",
        ));
    }

    function GetOnePokemon($id){
        return $this->findOneById(array(
            'fields' => "pokemon.*, type.label",
            'table' => "pokemon",
            'inner' => "INNER JOIN pokemon_has_type on pokemon_has_type.pokemon_id = pokemon.id
                        INNER JOIN type on type.id = pokemon_has_type.type_id",
            'condition' => "pokemon_has_type.pokemon_id = ". $id
        ));
    }

}
