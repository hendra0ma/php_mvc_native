<script src="<?= BASEURL; ?>/assets/js/bootstrap.js"></script>
<script src="<?= BASEURL; ?>/assets/js/bootstrap.js.map"></script>
<script>
    $(document).on('click', ".badge.badge-danger.float-right.ml-1.delete", () => {
        console.log($('input[name=id]').val());
    });
    $(document).on('click', ".badge.badge-dark.float-right.ml-1.edit", function() {
        $('form#form-modal').attr("action", "<?= BASEURL; ?>/Siswa/update");
        $('.btn.btn-primary.form-modal').val("Edit");
        $('#judulModal').html("Edit Data Siswa");
        $('.btn.btn-primary.form-modal').addClass("tombol-edit");
        $('.btn.btn-primary.form-modal').removeClass("tombol-tambah");
        const id = $(this).data('id');
        console.log(id);
        $('input[name=id]').val(id);
        $.ajax({
            url: "<?= BASEURL; ?>/Siswa/getById",
            type: "POST",
            data: {
                id: id,
            },
            dataType: "json",
            success: (data) => {
                $('#nama').val(data.nama);
                $('#id').val(data.id);
                $('#tempat_lahir').val(data.tempat_lahir);
                $('#tanggal_lahir').val(data.tanggal_lahir);
                $('#agama').val(data.agama);
                $('#alamat').val(data.alamat);
                $('#no_telepon').val(data.no_telepon);
            }
        });
    });

    $(document).on('click', '.btn.btn-primary.tambah-data', function() {

        $('form#form-modal').attr("action", "<?= BASEURL; ?>/Siswa/tambah");
        $('input[name=id]').val("");
        $('.btn.btn-primary.form-modal').val("Tambah");
        $('.btn.btn-primary.form-modal').addClass("tombol-tambah");
        $('.btn.btn-primary.form-modal').removeClass("tombol-edit");
        $('#judulModal').html("Tambah Data Siswa");
        $('#nama').val("");
        $('#id').val("");
        $('#tempat_lahir').val("");
        $('#tanggal_lahir').val("");
        $('#agama').val("");
        $('#alamat').val("");
        $('#no_telepon').val("");

    });
    $(document).on('click', "#cari", () => {
        $.ajax({
            url: "<?= BASEURL; ?>/Siswa/cari",
            type: "post",
            data: {
                query: $('#query').val(),
            },
            dataType: "json",
            success: (data) => {

                $('#query').val("");
                $('.container-get-data').empty()
                $.each(data, function(i, item) {
                    $('.container-get-data').append("<li class='list-group-item'>" + data[i].nama + "<a href='<?= BASEURL; ?>/Siswa/detail/" + data[i].id + "'class='badge badge-primary float-right ml-1'>detail</a><a href='#formModal'data-toggle='modal'data-id='" + data[i].id + "'class='badge badge-dark float-right ml-1 edit'>edit</a><a href='<?= BASEURL; ?>/Siswa/delete/" + data[i].id + "'class='badge badge-danger float-right ml-1'onclick='return confirm('yakin?')'>delete</a></li>");
                });
                $('.container-get-data').hide(100, function() {


                    $('.container-get-data').slideDown(500);
                });
            },
            error: function(xhr, ajaxOptions, thrownError) {
                $('.container-get-data').empty()
                $('.container-get-data').append(xhr.responseText);
                $('.container-get-data').hide(100, function() {
                    $('.container-get-data').slideDown(500);
                });


            }
        });
    });


    $(document).on('click', ".btn.btn-primary.form-modal.tombol-tambah", function() {
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
                    dataType: "json",
                    success: (data) => {

                        $('#query').val("");
                        $('.container-get-data').empty()
                        $.each(data, function(i, item) {
                            $('.container-get-data').append("<li class='list-group-item'>" + data[i].nama + "<a href='<?= BASEURL; ?>/Siswa/detail/" + data[i].id + "'class='badge badge-primary float-right ml-1'>detail</a><a href='#formModal'data-toggle='modal'data-id='" + data[i].id + "'class='badge badge-dark float-right ml-1 edit'>edit</a><a href='<?= BASEURL; ?>/Siswa/delete/" + data[i].id + "'class='badge badge-danger float-right ml-1'onclick='return confirm('yakin?')'>delete</a></li>");
                        });
                        $('.container-get-data').hide(100, function() {


                            $('.container-get-data').slideDown(500);
                        });
                    }
                });
            }
        });
    });

    $(document).on('click', ".btn.btn-primary.form-modal.tombol-edit", function() {
        $.ajax({
            url: "<?= BASEURL; ?>/Siswa/update",
            type: "post",
            data: {
                id: $('input[name=id]').val(),
                nama: $('#nama').val(),
                tempat_lahir: $('#tempat_lahir').val(),
                tanggal_lahir: $('#tanggal_lahir').val(),
                agama: $('#agama').val(),
                alamat: $('#alamat').val(),
                no_telepon: $('#no_telepon').val(),
            },
            success: (datas) => {
                $('.flash-data').html(datas);
                $('input[name=id]').val("");
                $('#nama').val("");
                $('#tempat_lahir').val("");
                $('#tanggal_lahir').val("");
                $('#agama').val("");
                $('#alamat').val("");
                $('#no_telepon').val("")
                $.ajax({

                    url: "<?= BASEURL; ?>/Siswa/getDataAjax",
                    type: "get",
                    dataType: "json",
                    success: (data) => {

                        $('#query').val("");
                        $('.container-get-data').empty()
                        $.each(data, function(i, item) {
                            $('.container-get-data').append("<li class='list-group-item'>" + data[i].nama + "<a href='<?= BASEURL; ?>/Siswa/detail/" + data[i].id + "'class='badge badge-primary float-right ml-1'>detail</a><a href='#formModal'data-toggle='modal'data-id='" + data[i].id + "'class='badge badge-dark float-right ml-1 edit'>edit</a><a href='<?= BASEURL; ?>/Siswa/delete/" + data[i].id + "'class='badge badge-danger float-right ml-1'onclick='return confirm('yakin?')'>delete</a></li>");
                        });
                        $('.container-get-data').hide(100, function() {


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