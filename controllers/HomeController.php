<?php


class HomeController extends AbstractController
{
    function index() {
        $d = array();

        $this->loadModel('HomeModel');

        $d['pokemons'] = $this->HomeModel->GetPokemons();

        $this->set($d);

        $this->createView('index',[
            'pokemons' => $d['pokemons']
        ]);
    }
}
