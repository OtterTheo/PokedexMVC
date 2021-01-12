<?php


class PokedexController extends AbstractController
{

    function index() {
        $d = array();


        $this->loadModel('PokemonModel');

        $d['pokemons'] = $this->PokemonModel->GetPokemons();

        $this->set($d);
//        $i = 1;
//        echo '<PRE>';
//        print_r($d['pokemons']);
//        echo '</PRE>';
//
//       foreach ($d['pokemons'] as $pokemon) {
//           if ($i != $pokemon['id']) {
//               $pokemon['label']
//           }
//       }


        $this->createView('index',[
            'pokemons' => $d['pokemons']
        ]);
    }
    function create()
    {
        $d = array();

        $this->loadModel('TypeModel');

        $d['types'] = $this->TypeModel->findAll();

        $this->set($d);

        $this->createView('create',[
            'types' => $d['types']
        ]);
    }
    function store()
    {
        parent::store();
//        var_dump($this->getPost());
//        die();
        $this->loadModel('PokemonModel');
        $this->PokemonModel->save($this->getPost());
        $this->Session->setFlash("Votre mis à jour a bien était prit en compte","success");

        $d['pokemons'] = $this->PokemonModel->GetPokemons();

        $this->set($d);
        $this->createView('index',[
            'pokemons' => $d['pokemons']
        ]);


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
