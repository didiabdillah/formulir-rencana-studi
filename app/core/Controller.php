<?php

class Controller
{
    public function view($view, $data = [])
    {
        //Panggil File di Folder View
        require_once 'app/views/' . $view . '.php';
    }

    public function model($model)
    {
        //Panggil File di Folder Model
        require_once('app/models/' . $model . '.php');
        return new $model;
    }
}
