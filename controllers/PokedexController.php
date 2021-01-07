<?php


class PokedexController extends AbstractController
{
    function index() {
        $d = array();

        $this->loadModel('PokemonModel');

        $d['pokemons'] = $this->PokemonModel->findAll();

        $this->set($d);

        $this->createView('index',[
            'pokemons' => $d['pokemons']
        ]);
    }
    function create()
    {

    }
    function store()
    {

    }
    function edit()
    {

    }
    function update()
    {

    }
    function show($data)
    {

        $this->loadModel('PokemonModel');

        $pokemon = $this->PokemonModel->GetOnePokemon($data);


        $this->createView('show',[
            'pokemon' => $pokemon
        ]);

    }
    function destroy()
    {

    }
}
