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

<script>
    $('.badge.badge-dark.float-right.ml-1.edit').on('click', function() {
        const id = $(this).data('id');
        $.ajax({
            url: "<?= BASEURL; ?>/Siswa/getById",
            type: "POST",
            data: {
                id: id,
            },
            dataType: "json",
            success: (data) => {
                $('#edit_nama').val(data.nama);
                $('#edit_id').val(data.id);
                $('#edit_tempat_lahir').val(data.tempat_lahir);
                $('#edit_tanggal_lahir').val(data.tanggal_lahir);
                $('#edit_agama').val(data.agama);
                $('#edit_alamat').val(data.alamat);
                $('#edit_no_telepon').val(data.no_telepon);
            }
        });
    });
</script>