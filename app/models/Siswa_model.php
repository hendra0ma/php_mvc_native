<?php
class Siswa_model
{
    private $table = 'is_siswa';
    private $db;
    public function __construct()
    {
        $this->db = new Database;
    }
    public function getsiswa()
    {
        $this->db->query('SELECT * FROM ' . $this->table);
        return $this->db->resultSet();
    }
    public function getSiswaByOrder($data)
    {
        if ($data['short'] == "az") {
            $this->db->query('SELECT * FROM is_siswa ORDER BY nama ASC');
        } else {
            $this->db->query('SELECT * FROM is_siswa ORDER BY nama DESC');
        }

        return $this->db->resultSet();
    }
    public function getsiswaLike($data)
    {
        $query = $data['query'];
        $this->db->query('SELECT * FROM ' . $this->table . ' WHERE nama LIKE :query');
        $this->db->bind('query', "%$query%");
        return $this->db->resultSet();
    }
    public function getSiswaById($id)
    {
        $this->db->query("SELECT * FROM  $this->table WHERE id=:id");
        $this->db->bind('id', $id);
        return $this->db->single();
    }
    public function tambahDataSiswa($data)
    {
        $query = "INSERT INTO is_siswa
                    VALUES 
                    ('',:nama,:tempat_lahir,:tanggal_lahir,:agama,:alamat,:no_telepon)";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('tempat_lahir', $data['tempat_lahir']);
        $this->db->bind('tanggal_lahir', $data['tanggal_lahir']);
        $this->db->bind('agama', $data['agama']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('no_telepon', $data['no_telepon']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function editDataSiswa($data)
    {

        $query = "Update is_siswa Set nama = :nama, tanggal_lahir = :tanggal_lahir, tempat_lahir = :tempat_lahir, agama = :agama,alamat= :alamat,no_telepon = :no_telepon WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('nama', $data['nama']);
        $this->db->bind('tempat_lahir', $data['tempat_lahir']);
        $this->db->bind('tanggal_lahir', $data['tanggal_lahir']);
        $this->db->bind('agama', $data['agama']);
        $this->db->bind('alamat', $data['alamat']);
        $this->db->bind('no_telepon', $data['no_telepon']);
        $this->db->bind('id', $data['id']);
        $this->db->execute();
        return $this->db->rowCount();
    }
    public function deleteSiswa($id)
    {
        $query = "DELETE FROM is_siswa WHERE id = :id";
        $this->db->query($query);
        $this->db->bind('id', $id);
        $this->db->execute();
        return $this->db->rowCount();
    }
}
