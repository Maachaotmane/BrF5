<?php

class Pages extends Controller
{
    public function __construct()
    {
        $this->tarif = $this->model('Tarif');
    }

    public function index()
    {
        return $this->view('/Pages/index');
    }

    public function login()
    {
        return $this->view('/Pages/login');
    }

    public function register()
    {
        return $this->view('/Pages/register');
    }

    public function reserve()
    {
        $tarifs = $this->tarif->getTarif();
        return $this->view('/Pages/reserve',[
            'tarifs' => $tarifs
        ]);
    }
}
