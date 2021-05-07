<?php
class Controller
{

    public function model($model)
    {

        require_once '../App/Models/' . $model . '.php';
        return new $model;
    }

    public function view($view, $data = [])
    {
        if(file_exists('../App/Views/'.$view.'.php')){
            require_once '../App/Views/'.$view.'.php';
        }else {
            die ('view doesnt exist');
        }

    }
}
