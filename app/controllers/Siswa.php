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
        echo json_encode($data['siswa']);
    }
    public function cari()
    {
        if (isset($_POST)) {
            $data['siswa'] = $this->model('Siswa_model')->getsiswaLike($_POST);
            if (empty($data['siswa'])) {
                Flasher::setFlash("Data yang anda cari kosong", "danger");
                Flasher::flash();
            }
            // $this->views('siswa/getdata', $data);
            echo json_encode($data['siswa']);
            die;
        }
    }
    public function shortData()
    {
        if (isset($_POST)) {
            $data['siswa'] = $this->model('Siswa_model')->getSiswaByOrder($_POST);
            // $this->views('siswa/getdata', $data);
            echo json_encode($data['siswa']);
            die;
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
            $this->validation->name('nama')->value($_POST['nama'])->required();
            $this->validation->name('tempat lahir')->value($_POST['tempat_lahir'])->required();
            $this->validation->name('alamat')->value($_POST['alamat'])->required();
            $this->validation->name('tanggal lahir')->value($_POST['tanggal_lahir'])->pattern('date_ymd')->required();
            $this->validation->name('no telepon')->value($_POST['no_telepon'])->required();
            if ($this->validation->isSuccess()) {
                if ($this->model('Siswa_model')->tambahDataSiswa($_POST) > 0) {
                    Flasher::setFlash('data berhasil di tambahkan', 'success');
                    Flasher::flash();
                    // $this->redirect('Siswa/index');
                    die;
                } else {
                    Flasher::setFlash('data Gagal di tambahkan', 'danger');
                    Flasher::flash();
                    // $this->redirect('Siswa/index');
                    die;
                }
            } else {

                Flasher::setFlash($this->validation->displayErrors(), 'danger');
                Flasher::flash();
                // $this->redirect('Siswa/index');
                die;
            }
        }
    }
    public function update()
    {

        if (isset($_POST)) {
            $this->validation->name('nama')->value($_POST['nama'])->required();
            $this->validation->name('tempat lahir')->value($_POST['tempat_lahir'])->required();
            $this->validation->name('alamat')->value($_POST['alamat'])->required();
            $this->validation->name('tanggal lahir')->value($_POST['tanggal_lahir'])->pattern('date_ymd')->required();
            $this->validation->name('no telepon')->value($_POST['no_telepon'])->required();
            if ($this->validation->isSuccess()) {
                if ($this->model('Siswa_model')->editDataSiswa($_POST) > 0) {
                    Flasher::setFlash('data berhasil di Edit', 'success');
                    Flasher::flash();
                    // $this->redirect('Siswa/index');
                    die;
                } else {
                    Flasher::setFlash('data Gagal di edit', 'danger');
                    Flasher::flash();
                    // $this->redirect('Siswa/index');
                    die;
                }
            } else {

                Flasher::setFlash($this->validation->displayErrors(), 'danger');
                Flasher::flash();
                // $this->redirect('Siswa/index');
                die;
            }
        }
    }
    public function delete($id)
    {
        if ($this->model('Siswa_model')->deleteSiswa($id) > 0) {
            Flasher::setFlash('data berhasil di hapus', 'success');
            // Flasher::flash();
            $this->redirect('Siswa/index');
            die;
        } else {
            Flasher::setFlash('data Gagal di hapus', 'danger');
            // Flasher::flash();
            $this->redirect('Siswa/index');
            die;
        }
    }
}
