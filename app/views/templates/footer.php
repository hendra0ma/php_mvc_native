<script src="<?= BASEURL; ?>/assets/js/bootstrap.js"></script>
<script src="<?= BASEURL; ?>/assets/js/bootstrap.js.map"></script>
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

    $('#cari').on('click', () => {
        $.ajax({
            url: "<?= BASEURL; ?>/Siswa/cari",
            type: "post",
            data: {
                query: $('#query').val(),
            },
            success: (data) => {
                $('#query').val("");
                $('.container-get-data').hide(100, function() {
                    $('.container-get-data').html(data);
                    $('.container-get-data').slideDown(500);
                });
            }
        });
    });


    $('.btn.btn-primary.tambah').on('click', function() {
        $.ajax({
            url: "<?= BASEURL; ?>/Siswa/tambah",
            type: "post",
            data: {
                nama: $('#nama').val(),
                tempat_lahir: $('#tempat_lahir').val(),
                tanggal_lahir: $('#tanggal_lahir').val(),
                agama: $('#agama').val(),
                alamat: $('#alamat').val(),
                no_telepon: $('#no_telepon').val(),
            },
            success: (datas) => {
                $('.flash-data').html(datas);

                $('#nama').val("");
                $('#tempat_lahir').val("");
                $('#tanggal_lahir').val("");
                $('#agama').val("");
                $('#alamat').val("");
                $('#no_telepon').val("")
                $.ajax({

                    url: "<?= BASEURL; ?>/Siswa/getDataAjax",
                    type: "get",
                    success: (data) => {

                        $('.container-get-data').hide(100, function() {
                            $('.container-get-data').html(data);
                            $('.container-get-data').slideDown(500);
                        });

                    }
                });
            }
        });
    });
</script>
</body>

</html>