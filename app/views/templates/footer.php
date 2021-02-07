<script src="<?= BASEURL; ?>/assets/js/jquery.js"></script>
<script src="<?= BASEURL; ?>/assets/js/bootstrap.js"></script>
<script src="<?= BASEURL; ?>/assets/js/bootstrap.js.map"></script>
<script>
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
            success: (data) => {
                $('.flash-data').html(data);
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