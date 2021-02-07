<div class="container mt-5">
    <div class="card" style="width: 18rem;">
        <div class="card-body">
            <h5 class="card-title"><?= $data['siswa']['nama'] ?></h5>
            <h6 class="card-subtitle mb-2 text-muted"><?= $data['siswa']['no_telepon'] ?></h6>
            <p class="card-text"><?= $data['siswa']['tanggal_lahir'] ?></p>
            <p class="card-text"><?= $data['siswa']['tempat_lahir'] ?></p>
            <a href="<?= BASEURL; ?>/Siswa/" class="card-link">Kembali</a>
        </div>
    </div>
</div>