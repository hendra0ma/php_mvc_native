<?php foreach ($data['siswa'] as $siswa) : ?>
    <li class="list-group-item ">
        <?= $siswa['nama'] ?>
        <a href="<?= BASEURL; ?>/Siswa/detail/<?= $siswa['id'] ?>" class='badge badge-primary float-right ml-1'>detail</a>

        <a href="<?= BASEURL; ?>/Siswa/delete/<?= $siswa['id'] ?>" class='badge badge-danger float-right' onclick="return confirm('hapus data?')">delete</a>
    </li>
<?php endforeach; ?>