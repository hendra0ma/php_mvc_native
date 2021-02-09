<?php
class Controller
{
    public $validation;
    public function __construct()
    {
        $this->validation = new Validation;
    }
    public function views($view, $data = [])
    {
        require_once '../app/views/' . $view . '.php';
    }
    public function model($nama_model)
    {
        require_once '../app/models/' . $nama_model . '.php';
        return new $nama_model;
    }
    public function redirect($pages)
    {
        return header("Location:" . BASEURL . "/" . $pages);
    }
}
