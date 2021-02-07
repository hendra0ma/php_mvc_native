<?php
class Siswa extends Controller
{
    public function index()
    {
        $data['judul'] = 'Siswa';
        $data['siswa'] = $this->model('Siswa_model')->getsiswa();
        $data['nama'] = $this->model('User_model')->getUser();
        $this->views('templates/header', $data);
        $this->views('siswa/index', $data);
        $this->views('templates/footer');
    }
    public function getDataAjax()
    {
        $data['siswa'] = $this->model('Siswa_model')->getsiswa();
        $this->views('siswa/getdata', $data);
    }


    public function detail($id)
    {
        $data['judul'] = 'Detail Mahasiswa';
        $data['siswa'] = $this->model('Siswa_model')->getSiswaById($id);
        $this->views('templates/header', $data);
        $this->views('siswa/detail', $data);
        $this->views('templates/footer');
    }
    public function tambah()
    {

        if (isset($_POST)) {
            if ($this->model('Siswa_model')->tambahDataSiswa($_POST) > 0) {
                Flasher::setFlash('data berhasil di tambahkan', 'success');
                Flasher::flash();
                die;
            } else {
                Flasher::setFlash('data Gagal di tambahkan', 'danger');
                Flasher::flash();
                die;
            }
        }
    }
    public function delete($id)
    {
        if ($this->model('Siswa_model')->deleteSiswa($id) > 0) {
            Flasher::setFlash('data berhasil di hapus', 'success');
            header("Location:" . BASEURL . "/Siswa/index");
            die;
        } else {
            Flasher::setFlash('data Gagal di hapus', 'danger');
            header("Location:" . BASEURL . "/Siswa/index");
            die;
        }
    }
}
