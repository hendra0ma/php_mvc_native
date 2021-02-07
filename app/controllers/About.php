<?php
class About extends Controller
{
    public function index()
    {

        $data['judul'] = 'home about';
        $this->views('templates/header', $data);
        $this->views('about/index', $data);
        $this->views('templates/footer');
    }
    public function pages()
    {
        $this->views('about/pages');
    }
}
