<?php


class PokemonModel extends AbstractModel
{
    var $table = 'pokemon';

    function GetPokemons()
    {
        return $this->findAll(array(
            'fields' => "pokemon.*, type.label",
            'table' => "pokemon",
            'inner' => "INNER JOIN pokemon_has_type on pokemon_has_type.pokemon_id = pokemon.id
                        INNER JOIN type on type.id = pokemon_has_type.type_id",
            'order' => 'pokemon.id ASC'

        ));
    }

    function GetOnePokemon($id)
    {
        return $this->findOneById(array(
            'fields' => "pokemon.*, type.label",
            'table' => "pokemon",
            'inner' => "INNER JOIN pokemon_has_type on pokemon_has_type.pokemon_id = pokemon.id
                        INNER JOIN type on type.id = pokemon_has_type.type_id",
            'condition' => "pokemon_has_type.pokemon_id = " . $id
        ));
    }
    //problème d'enregistrement des données si
    //plusieurs enregistrement, donc voir pour l'insert (les paramètres)
    function SavePokemon($data)
    {

        $this->save(array(
            'fields' => 'name,prout,caca,test',
            'table' => 'pokemon',
        ), $data);

        $data['pokemon_id'] = $this->getLastPokemon();
        $data['pokemon_id'] = $data['pokemon_id']->maxid;

        $this->save(array(
            'fields' => 'pokemon_id,type_id',
            'table' => 'pokemon_has_type',
        ), $data);
    }

    function getLastPokemon()
    {
        return $this->findOneById(array(
            'fields' => 'MAX(id) as maxid',
            'table' => 'pokemon',
        ));

    }


}
