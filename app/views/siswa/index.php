<div class="container mt-3">



    <div class="row mb-1">
        <div class="col-6">
            <!-- Button trigger modal -->
            <div class="flash-data">
                <?php Flasher::flash(); ?>
            </div>

            <button type="button" class="btn btn-primary tambah-data" data-toggle="modal" data-target="#formModal">
                Tambah Data Siswa
            </button>
            <br>
        </div>
    </div>

    <div class="row mt-2">
        <div class="col-6">

            <div class="input-group mb-3">
                <input type="text" class="form-control" placeholder="Search nama" id="query">
                <div class="input-group-append">
                    <button class="btn btn-primary" type="button" id="cari">Cari</button>
                </div>
            </div>

            <h3>Daftar Siswa</h3>
            <ul class="list-group mt-4 container-get-data">
                <?php foreach ($data['siswa'] as $siswa) : ?>
                    <li class="list-group-item ">
                        <?= $siswa['nama'] ?>
                        <a href="<?= BASEURL; ?>/Siswa/detail/<?= $siswa['id'] ?>" class='badge badge-primary float-right ml-1'>detail</a>
                        <a href="#formModal" data-toggle="modal" data-id="<?= $siswa['id'] ?>" class='badge badge-dark float-right ml-1 edit'>edit</a>
                        <a href="<?= BASEURL; ?>/Siswa/delete/<?= $siswa['id'] ?>" class='badge badge-danger float-right ml-1'>hapus</a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
    </div>
</div>




<!-- Modal -->
<div class="modal fade" id="formModal" tabindex="-1" aria-labelledby="judulModal" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="judulModal">Tambah Data Siswa</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="form-modal">
                <input type="hidden" name="id">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" class="form-control" id="nama" placeholder="nama" name="nama">
                    </div>
                    <div class="form-group">
                        <label for="tempat_lahir">tempat lahir</label>
                        <input type="text" class="form-control" id="tempat_lahir" placeholder="tempat_lahir" name="tempat_lahir">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_lahir">Tanggal Lahir</label>
                        <input type="date" class="form-control" id="tanggal_lahir" placeholder="tanggal_lahir" name="tanggal_lahir">
                    </div>
                    <div class="form-group">
                        <label for="Agama">Agama</label>
                        <select id="agama" name="agama" class="form-control">
                            <option value="islam">islam</option>
                            <option value="kristen">kristen</option>
                            <option value="hindu">hindu</option>
                            <option value="buddha">buddha</option>
                            <option value="konghucu">konghucu</option>
                            <option value="Tidak ada">Tidak ada</option>
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="alamat">alamat</label>
                        <input type="text" class="form-control" id="alamat" placeholder="alamat" name="alamat">
                    </div>
                    <div class="form-group">
                        <label for="no_telepon">No telepon</label>
                        <input type="number" class="form-control" id="no_telepon" placeholder="no_telepon" name="no_telepon">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <!-- <button type="button" class="btn btn-primary form-modal" data-dismiss="modal">Tambah</button> -->
                    <input type="button" value="" data-dismiss="modal" class="btn btn-primary form-modal">
            </form>
        </div>
    </div>
</div>

</div>