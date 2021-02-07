<?php
class Home extends Controller
{
    public function index()
    {

        $data['judul'] = 'home index';
        $data['nama'] = $this->model('User_model')->getUser();
        $this->views('templates/header', $data);
        $this->views('home/index', $data);
        $this->views('templates/footer');
    }
}
