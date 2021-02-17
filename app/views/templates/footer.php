<script src="<?= BASEURL; ?>/assets/js/bootstrap.js"></script>
<script src="<?= BASEURL; ?>/assets/js/bootstrap.js.map"></script>




<script>
    $(document).on('click', ".badge.badge-danger.float-right.ml-1.hapus", function() {
        let confirm;
        confirm = window.confirm('Yakin akan di hapus?');
        if (confirm == true) {
            const id = $(this).data('id');
            $.ajax({
                url: "<?= BASEURL; ?>/Siswa/delete",
                data: {
                    id: id,
                },
                type: "POST",
                success: function(dataFlash) {
                    $('.flash-data').hide(100, function() {
                        $('.flash-data').html(dataFlash);
                        $('.flash-data').fadeIn(500)
                    });
                    $.ajax({

                        url: "<?= BASEURL; ?>/Siswa/getDataAjax",
                        type: "get",
                        dataType: "json",
                        success: (data) => {
                            $('.col-md-4.form-short-data').empty();
                            $('ul.list-group.mt-4.container-get-data').removeClass("text-light");
                            $('#query').val("");
                            $('.container-get-data').empty()
                            $('.container-get-data').hide(100, function() {
                                $('.col-md-4.form-short-data').append('<b class="mt-2 mb-2"> Urutkan Data </b><form><select name="sort-data" id="short-data" class="form-group form-control"><option value="az">A - Z</option><option value="za">Z - A</option></select></form>');
                                $.each(data, function(i, item) {
                                    $('.container-get-data').append("<li class='list-group-item'>" + data[i].nama + "<a href='<?= BASEURL; ?>/Siswa/detail/" + data[i].id + "'class='badge badge-primary float-right ml-1'>detail</a><a href='#formModal'data-toggle='modal'data-id='" + data[i].id + "'class='badge badge-dark float-right ml-1 edit'>edit</a><a href='#'data-id='" + data[i].id + "'class='badge badge-danger float-right ml-1 hapus'>hapus</a></li>");
                                });
                                $('.container-get-data').fadeIn(500);
                            });
                        }
                    });
                }
            });
        } else {
            $('.flash-data').hide(100, function() {
                $('.flash-data').html('<div class="alert alert-danger alert-dismissible fade show" role="alert">Anda Tidak menghapus data<button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button></div>');
                $('.flash-data').fadeIn(500)
            });
        }

    });
    $(document).on('click', ".badge.badge-dark.float-right.ml-1.edit", function() {

        $('form#form-modal').attr("action", "<?= BASEURL; ?>/Siswa/update");
        $('.btn.btn-primary.form-modal').val("Edit");
        $('#judulModal').html("Edit Data Siswa");
        $('.btn.btn-primary.form-modal').addClass("tombol-edit");
        $('.btn.btn-primary.form-modal').removeClass("tombol-tambah");
        const id = $(this).data('id');
        // console.log(id);
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
                $('ul.list-group.mt-4.container-get-data').removeClass("text-light");
                if (data.length !== 0) {
                    $('#query').val("");
                    $('.container-get-data').empty()
                    $('.container-get-data').hide(100, function() {
                        $.each(data, function(i, item) {
                            $('.container-get-data').append("<li class='list-group-item'>" + data[i].nama + "<a href='<?= BASEURL; ?>/Siswa/detail/" + data[i].id + "'class='badge badge-primary float-right ml-1'>detail</a><a href='#formModal'data-toggle='modal'data-id='" + data[i].id + "'class='badge badge-dark float-right ml-1 edit'>edit</a><a href='#'data-id='" + data[i].id + "'class='badge badge-danger float-right ml-1 hapus'>hapus</a></li>");
                        });

                        $('.container-get-data').fadeIn(500);
                    });
                }
            },
            error: function(xhr) {
                $('.container-get-data').empty();
                $('ul.list-group.mt-4.container-get-data').addClass("text-light");
                $('.container-get-data').hide(100, function() {
                    $('.container-get-data').append(xhr.responseText);
                    $('.container-get-data').fadeIn(500);
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
                $('.flash-data').empty();
                $('.flash-data').hide(100, function() {
                    $('.flash-data').html(datas);
                    $('.flash-data').fadeIn(500)
                });

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
                        $('.col-md-4.form-short-data').empty();
                        $('ul.list-group.mt-4.container-get-data').removeClass("text-light");


                        $('#query').val("");
                        $('.container-get-data').empty()

                        $('.container-get-data').hide(100, function() {
                            $('.col-md-4.form-short-data').append('<b class="mt-2 mb-2"> Urutkan Data </b><form><select name="sort-data" id="short-data" class="form-group form-control"><option value="az">A - Z</option><option value="za">Z - A</option></select></form>');
                            $.each(data, function(i, item) {
                                $('.container-get-data').append("<li class='list-group-item'>" + data[i].nama + "<a href='<?= BASEURL; ?>/Siswa/detail/" + data[i].id + "'class='badge badge-primary float-right ml-1'>detail</a><a href='#formModal'data-toggle='modal'data-id='" + data[i].id + "'class='badge badge-dark float-right ml-1 edit'>edit</a><a href='#'data-id='" + data[i].id + "'class='badge badge-danger float-right ml-1 hapus'>hapus</a></li>");

                            });
                            $('.container-get-data').fadeIn(500);
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
                $('.flash-data').empty();
                $('.flash-data').hide(100, function() {
                    $('.flash-data').html(datas);
                    $('.flash-data').fadeIn(500)
                });
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
                        $('ul.list-group.mt-4.container-get-data').removeClass("text-light");
                        $('#query').val("");
                        $('.container-get-data').empty()

                        $('.container-get-data').hide(100, function() {

                            $.each(data, function(i, item) {
                                $('.container-get-data').append("<li class='list-group-item'>" + data[i].nama + "<a href='<?= BASEURL; ?>/Siswa/detail/" + data[i].id + "'class='badge badge-primary float-right ml-1'>detail</a><a href='#formModal'data-toggle='modal'data-id='" + data[i].id + "'class='badge badge-dark float-right ml-1 edit'>edit</a><a href='#'data-id='" + data[i].id + "'class='badge badge-danger float-right ml-1 hapus'>hapus</a></li>");
                            });
                            $('.container-get-data').fadeIn(500);
                        });
                    }
                });
            }
        });
    });

    $(document).on('change', 'select.form-group.form-control', () => {
        let data = $('select.form-group.form-control').val();
        $.ajax({
            url: "<?= BASEURL ?>/Siswa/shortData",
            type: "post",
            data: {
                short: data,
            },
            dataType: "json",
            success: (data) => {
                $('ul.list-group.mt-4.container-get-data').removeClass("text-light");
                $('.container-get-data').empty()

                $('.container-get-data').hide(100, function() {

                    $.each(data, function(i, item) {
                        $('.container-get-data').append("<li class='list-group-item'>" + data[i].nama + "<a href='<?= BASEURL; ?>/Siswa/detail/" + data[i].id + "'class='badge badge-primary float-right ml-1'>detail</a><a href='#formModal'data-toggle='modal'data-id='" + data[i].id + "'class='badge badge-dark float-right ml-1 edit'>edit</a><a href='#'data-id='" + data[i].id + "'class='badge badge-danger float-right ml-1 hapus'>hapus</a></li>");
                    });
                    $('.container-get-data').fadeIn(500);
                });
            }
        });
    });
    $(document).on('click', '.btn.btn-primary.reload-data', () => {
        $('.btn.btn-primary.reload-data').attr('disabled', true);
        $('.btn.btn-primary.reload-data').addClass('btn-secondary');
        $('.btn.btn-primary.reload-data').append('<img src="<?= BASEURL; ?>/img/gif/loading.gif" class="img-gif ml-1 rounded-circle"width="20px"height="20px"></img>');
        setTimeout(() => {
            $('.btn.btn-primary.reload-data').attr('disabled', false);
            $('img.img-gif').remove();
            $('.btn.btn-primary.reload-data').removeClass('btn-secondary');

        }, 5000);
        $.ajax({

            url: "<?= BASEURL; ?>/Siswa/getDataAjax",
            type: "get",
            dataType: "json",
            success: (data) => {
                $('ul.list-group.mt-4.container-get-data').removeClass("text-light");
                $('#query').val("");
                $('.container-get-data').empty()

                $('.container-get-data').hide(100, function() {

                    $.each(data, function(i, item) {
                        $('.container-get-data').append("<li class='list-group-item'>" + data[i].nama + "<a href='<?= BASEURL; ?>/Siswa/detail/" + data[i].id + "'class='badge badge-primary float-right ml-1'>detail</a><a href='#formModal'data-toggle='modal'data-id='" + data[i].id + "'class='badge badge-dark float-right ml-1 edit'>edit</a><a href='#'data-id='" + data[i].id + "'class='badge badge-danger float-right ml-1 hapus'>hapus</a></li>");
                    });
                    $('.container-get-data').fadeIn(500);
                });
            }
        });
    });
</script>
</body>

</html>