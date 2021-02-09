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
    public function cari()
    {
        if (isset($_POST)) {
            $data['siswa'] = $this->model('Siswa_model')->getsiswaLike($_POST);
            if (empty($data['siswa'])) {
                Flasher::setFlash("Data yang anda cari kosong", "danger");
                Flasher::flash();
            }
            $this->views('siswa/getdata', $data);
        }
    }


    public function detail($id)
    {
        $data['judul'] = 'Detail Mahasiswa';
        $data['siswa'] = $this->model('Siswa_model')->getSiswaById($id);
        $this->views('templates/header', $data);
        $this->views('siswa/detail', $data);
        $this->views('templates/footer');
    }
    public function getById()
    {
        $data['siswa'] = $this->model('Siswa_model')->getSiswaById($_POST['id']);
        echo json_encode($data['siswa']);
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
    public function update()
    {

        if (isset($_POST)) {
            if ($this->model('Siswa_model')->editDataSiswa($_POST) > 0) {
                Flasher::setFlash('data berhasil di Edit', 'success');
                header("Location:" . BASEURL . "/Siswa/index");
                die;
            } else {
                Flasher::setFlash('data Gagal di edit', 'danger');
                header("Location:" . BASEURL . "/Siswa/index");
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
