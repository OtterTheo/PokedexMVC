<?php


class HomeModel extends AbstractModel
{
    var $table = 'pokemnon';

    function GetPokemons(){
        return $this->findAll(array(
            'fields' => "pokemon.*",
            'table' => "pokemon",
        ));
    }
}
