<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/bootstrap.css">
    <link rel="stylesheet" href="<?= BASEURL; ?>/assets/css/bootstrap.css.map">
    <title><?= $data['judul'] ?></title>
</head>

<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container">
            <a class="navbar-brand" href="<?= BASEURL; ?>/Home">CRUD Native</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-link active" href="<?= BASEURL; ?>/Home">Home</a>
                    <a class="nav-link" href="<?= BASEURL; ?>/About">About</a>
                    <a class="nav-link" href="<?= BASEURL; ?>/Siswa">Siswa</a>

                </div>
            </div>
        </div>
    </nav>