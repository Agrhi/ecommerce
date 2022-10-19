<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Kopi Toratima - Shope</title>

    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/main/app.css" />
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/logo/favicon.jpg" type="image/x-icon" />
    <link rel="shortcut icon" href="<?= base_url(); ?>/assets/images/logo/favicon.jpg" type="image/png" />

    <link rel="stylesheet" href="<?= base_url(); ?>/assets/css/shared/iconly.css" />

    <!-- CDN Js -->
    <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
</head>

<body>
    <div id="app">
        <div id="main" class="layout-horizontal">
            <header class="mb-5">
                <div class="header-top">
                    <div class="container">
                        <div class="logo">
                            <h3> Kopi Toratima</h3>
                        </div>
                        <div class="header-top-right">
                            <h3>Toko : <?= $celler->namastan; ?></h3>
                        </div>
                    </div>
                </div>
                <nav class="main-navbar">
                    <div class="container">
                        <ul>
                            <li class="menu-item">
                                <a href="" class="menu-link">
                                    <span class="text-primary">Detail Penjualan</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </nav>
            </header>

            <div class="content-wrapper container">
                <div class="page-heading">
                    <h3>Detail Penjualan</h3>
                </div>
                <div class="page-content">
                    <section class="row">
                        <div class="col-6 col-lg-12 col-md-6">
                            <div class="card">
                                <div class="card-body px-4 py-4-5" style="text-align: center;">
                                    <div class="row">
                                        <div class="col-md-12 col-lg-12 col-xl-12 justify-content-start">
                                            <div class=" purple mb-2">
                                                <img width="50%" class="img-fluid mb-3" src="<?= base_url() ?>/assets/foto/<?= $celler->gambar; ?>" alt="">
                                            </div>
                                        </div>
                                        <div class="col-md-8 col-lg-12 col-xl-12 col-xxl-7">
                                            <h3 class="text-muted font-semibold">
                                                <?= $celler->namastan; ?>
                                            </h3>
                                            <h3 class="font-extrabold mb-2">Rp. <?= $celler->harga; ?></h3>
                                            <h3 class="text-muted font-semibold">
                                                Alamat : <?= $celler->alamat; ?>
                                            </h3>
                                            <h3 class="text-muted font-semibold">
                                                Nomor Hp : <?= $celler->nohp; ?>
                                            </h3>
                                            <button class="btn btn-danger btn-lg shadow-lg mt-2" data-bs-toggle="modal" data-bs-target="#idbeli">Kembali</button>
                                            <button class="btn btn-primary btn-lg shadow-lg mt-2" data-bs-toggle="modal" data-bs-target="#idbeli">Beli</button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </section>
                </div>
            </div>

        </div>
    </div>

    <div class="modal fade text-left" id="idbeli" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Form Pemesanan </h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="<?= base_url('home/jual') ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6">
                                <label>NIK : </label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nik" placeholder="NIK" oninvalid="this.setCustomValidity('NIK Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                    <input type="text" class="form-control" name="idceller" value="<?= $celler->idceller; ?>" hidden>
                                    <input type="text" class="form-control" name="idjualan" value="<?= $celler->idjualan; ?>" hidden>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Nama Lengkap : </label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="nama" placeholder="Nama Lengkap" oninvalid="this.setCustomValidity('Nama Lengkap Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Alamat : </label>
                                <div class="form-group">
                                    <input type="text" class="form-control" name="alamat" placeholder="Alamat" oninvalid="this.setCustomValidity('Alamat Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>No HP : </label>
                                <div class="form-group">
                                    <input type="number" class="form-control" name="nohp" placeholder="No HP" oninvalid="this.setCustomValidity('No HP Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Jumlah Pesanan : </label>
                                <div class="form-group">
                                    <input type="number" class="form-control" name="jml" placeholder="Jumlah Pesanan" oninvalid="this.setCustomValidity('Jumlah Pesanan Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <label>Upload KTP : </label>
                                <div class="form-group">
                                    <input type="file" class="form-control" id="preview_gambar" name="ktp" oninvalid="this.setCustomValidity('Upload KTP Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                </div>
                            </div>
                            <div class="col-md-4">
                                <div class="form-group">
                                    <img src="<?= base_url('assets/gambar/nofoto.png') ?>" id="gambar_load" width="200px">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-secondary shadow-lg mt-2">Beli</button>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <script src="<?= base_url(); ?>/assets/js/bootstrap.js"></script>
    <script src="<?= base_url(); ?>/assets/js/app.js"></script>
    <script src="<?= base_url(); ?>/assets/js/pages/horizontal-layout.js"></script>

    <script src="<?= base_url(); ?>/assets/extensions/apexcharts/apexcharts.min.js"></script>
    <script src="<?= base_url(); ?>/assets/js/pages/dashboard.js"></script>

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

</body>

</html>