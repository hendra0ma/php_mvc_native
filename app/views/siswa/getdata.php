<ul class="list-group mt-4 container-get-data">
    <?php foreach ($data['siswa'] as $siswa) : ?>
        <li class="list-group-item ">
            <?= $siswa['nama'] ?>
            <a href="<?= BASEURL; ?>/Siswa/detail/<?= $siswa['id'] ?>" class='badge badge-primary float-right ml-1'>detail</a>
            <a href="#editmodal" data-toggle="modal" data-id="<?= $siswa['id'] ?>" class='badge badge-dark float-right ml-1 edit'>edit</a>

            <a href="<?= BASEURL; ?>/Siswa/delete/<?= $siswa['id'] ?>" class='badge badge-danger float-right' onclick="return confirm('hapus data?')">delete</a>
        </li>
    <?php endforeach; ?>
</ul>