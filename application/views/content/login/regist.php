<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi - Kopi Toratima</title>
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/main/app.css">
    <link rel="stylesheet" href="<?= base_url() ?>/assets/css/pages/auth.css">
    <link rel="shortcut icon" href="<?= base_url() ?>/assets/images/logo/favicon.jpg" type="image/x-icon">
    <link rel="shortcut icon" href="<?= base_url() ?>/assets/images/logo/favicon.jpg" type="image/png">

    <!-- CDN Js -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

    <!-- CDN SwetAlert -->
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div id="auth">

        <div class="row h-100">
            <div class="col-lg-3 d-none d-lg-block">
                <div id="auth-right" style="background: #6c757d;">

                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div id="auth-left" style="padding: 1rem 1rem;">
                    <div style="text-align: center;">
                        <img src="<?= base_url(); ?>/assets/images/logo/favicon.jpg" alt="Logo" width="20%">
                        <h3 class="auth-title text-secondary" style="align-items: center;">Registrasi</h3>
                    </div>
                    <form role="form" action="<?= base_url('login/registrasi'); ?>" method="post" enctype="multipart/form-data">
                        <div class="row">
                            <div class="form-group col-md-6 position-relative mb-3">
                                <label for="">Nama Toko</label>
                                <input type="text" name="namastan" class="form-control" placeholder="Nama Toko" oninvalid="this.setCustomValidity('Nama Toko Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                            </div>
                            <div class="form-group col-md-6 position-relative mb-3">
                                <label for="">Nama Pemilik</label>
                                <input type="text" name="nama" class="form-control" placeholder="Nama Pemilik" oninvalid="this.setCustomValidity('Nama Pemilik Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                            </div>
                            <div class="form-group col-md-6 position-relative mb-3">
                                <label for="">NIK</label>
                                <input type="text" name="nik" class="form-control" placeholder="NIK" oninvalid="this.setCustomValidity('NIK Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                            </div>
                            <div class="form-group col-md-6 position-relative mb-3">
                                <label for="">Nomor Hp</label>
                                <input type="text" name="nohp" class="form-control" placeholder="Nomor Hp" oninvalid="this.setCustomValidity('Nomor Hp Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                            </div>
                            <div class="form-group col-md-6 position-relative mb-3">
                                <label for="">Alamat</label>
                                <input type="text" name="alamat" class="form-control" placeholder="Alamat" oninvalid="this.setCustomValidity('Alamat Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                            </div>
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>SKU</label>
                                    <input type="file" name="gambar" class="form-control" id="preview_gambar" oninvalid="this.setCustomValidity('Gambar Wajib Diisi !!!')" oninput="setCustomValidity('')" required>
                                </div>
                            </div>
                            <div class="form-group col-md-6 position-relative mb-3">
                                <label for="">Username</label>
                                <input type="text" name="username" class="form-control" placeholder="Username" oninvalid="this.setCustomValidity('Username Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                            </div>
                            <div class="form-group col-md-6 position-relative mb-3">
                                <label for="">Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password" oninvalid="this.setCustomValidity('Nama Lengkap Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                            </div>
                        </div>
                        <div class="col-sm-6 mt-3">
                            <div class="form-group">
                                <img src="<?= base_url('assets/gambar/nofoto.png') ?>" id="gambar_load" width="200px">
                            </div>
                        </div>
                        <button class="btn btn-secondary btn-block btn-lg shadow-lg mt-2">Registrasi</button>
                    </form>
                    <?php
                    if ($this->session->flashdata('pesan')) { ?>
                        <a href="<?= base_url('') ?>" class="btn btn-secondary btn-block btn-lg shadow-lg mt-2">Halaman Awal</a>
                    <?php } ?>
                </div>
            </div>
            <div class="col-lg-3 d-none d-lg-block">
                <div id="auth-right" style="background: #6c757d;">

                </div>
            </div>
        </div>

    </div>


</body>

<script>
    function bacaGambar(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            reader.onload = function(e) {
                $('#gambar_load').attr('src', e.target.result);
            }
            reader.readAsDataURL(input.files[0]);
        }
    }

    $('#preview_gambar').change(function() {
        bacaGambar(this);
    });
</script>

<script>
    <?php
    if (isset($this->session->swetalert)) {
    ?>
        Swal.fire(<?= $this->session->swetalert ?>);
    <?php
    }
    ?>
</script>

</html>