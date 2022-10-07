<div class="page-content">
    <section class="row">
        <div class="col-12">
            <div class="row">
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple mb-2">
                                        <i class="fa fa-user-check"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Jumlah Data Peminjam</h6>
                                    <h3 class="font-extrabold mb-0"><?= $peminjam->nilai; ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple mb-2">
                                        <i class="fa fa-window-restore"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Jumlah Aset Bagus</h6>
                                    <h3 class="font-extrabold mb-0"><?= $aset->bagus; ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple mb-2">
                                        <i class="fa fa-window-restore"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Jumlah Aset Rusak</h6>
                                    <h3 class="font-extrabold mb-0"><?= $aset->rusak; ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-4 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple mb-2">
                                        <i class="fa fa-users"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Jumlah User Aktif</h6>
                                    <h3 class="font-extrabold mb-0"><?= $total_user; ?></h3>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="card">
        <div class="card-body px-4">
            <div class="row">
                <div class="col-md-9" style="text-align: justify;">
                    <p>Sistem Informasi Pendataan Aset Desa atau disebut SIPEDES merupakan suatu sistem yang dapat digunakan untuk mencatat segala aset desa baik yang masih layak pakai maupun yang rusak. Sistem ini juga digunakan untuk mengarsipkan data seorang yang telah melakukan peminjaman aset, Sistem ini digunakan pada desa Nambaru Kabupaten Parigi Moutong, Provinsi Sulawesi Tengah.</p>
                </div>
                <div class="col-md-3" style="text-align: center;">
                    <img src="<?= base_url(); ?>/assets/images/logo/favicon.png" alt="Logo" width="60%">
                </div>
            </div>
        </div>
    </div>
</div>