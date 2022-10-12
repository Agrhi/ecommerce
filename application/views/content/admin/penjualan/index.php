<section class="section">
    <div class="card">
        <div class="card-header">
            <?= $title; ?>
        </div>
        <div class="card-body">
            <div style="text-align: right;">
                <button type="button" class="btn btn-outline-primary" onclick="tes()">Tambah Data</button>
            </div>
            <br>
            <?php echo validation_errors(); ?>
            <?php
            if ($this->session->flashdata('pesan')) {
                echo '<div class="alert alert-success" role="alert">
                        Success ! ';
                echo $this->session->flashdata('pesan');
                echo '</div>';
            }
            if ($this->session->flashdata('error')) {
                echo '<div class="alert alert-danger" role="alert">
                        Error ! ';
                echo $this->session->flashdata('error');
                echo '</div>';
            }
            ?>
            <table class="table" id="user">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama Toko</td>
                        <td>Barang</td>
                        <td>Stok</td>
                        <td>Harga</td>
                        <td>Jumlah Terjual</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $no = 1;
                        foreach ($penjualan as $pjul) {
                        ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $pjul->namastan; ?></td>
                        <td>Kopi Toratima</td>
                        <td><?= $pjul->stok; ?></td>
                        <td><?= $pjul->harga; ?></td>
                        <td><?= $pjul->jual; ?></td>
                        <td>
                            <button class="btn icon btn-success" type="button" data-bs-toggle="modal" data-bs-target="#edit<?= $pjul->idjualan ?>"><i class="bi bi-pencil"></i></button>
                            <button class="btn icon btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete<?= $pjul->idjualan ?>"><i class="fa fa-trash-alt"></i></button>
                        </td>
                        </td>
                    </tr>
                <?php } ?>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

</section>

<!-- Modal Edit Peminjam -->
<php foreach ($penjualan as $pjul) { ?>
    <div class="modal fade text-left" id="edit<?= $pjul->idjualan ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Update Jualan </h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="<?= base_url('penjualan/edit/' . $pjul->idjualan) ?>" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label>Nama Pemilik</label>
                                    <input type="text" name="nama" value="<?= $pjul->nama ?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label>Nama Toko</label>
                                    <input type="text" name="namastan" value="<?= $pjul->namastan ?>" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <input type="text" name="namabarang" value="Kopi Toratima" class="form-control" readonly>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label>Stok</label>
                                    <input type="number" name="stok" value="<?= $pjul->stok ?>" class="form-control" placeholder="Stok" oninvalid="this.setCustomValidity('Stok Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label>Harga</label>
                                    <input type="number" name="harga" value="<?= $pjul->harga ?>" class="form-control" placeholder="Harga" oninvalid="this.setCustomValidity('Harga Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1">
                            <span class="d-none d-sm-block">Update</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <php } ?>

        <!-- End Modal -->

        <!-- Modal Detail -->
        <!-- <php foreach ($pinjam as $p) { ?>
    <div class="modal fade text-left" id="detail<?= $p->idpeminjaman ?>" tabindex="-1" role="dialog" aria-labelledby="modalDetail" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalDetail">Detail Data Peminjaman <?= $p->nama; ?></h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5">NIK</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-6"><?= $p->nik; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">Nama Lengkap</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-6"><?= $p->nama; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">Alamat</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-6"><?= $p->alamat; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">Dusun</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-6"><?= $p->dusun; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">Jenis Aset</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-6"><?= $p->namaaset; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">Jumlah Aset</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-6"><?= $p->jml; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">Peminjaman</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-6"><?= $p->tglpinjam; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">Pengembalian</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-6"><?= $p->tglkembali; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">Status</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-6">
                            <?php if ($p->status == 1) {
                                echo 'Pinjam';
                            } else {
                                echo 'Dikembalikan';
                            } ?>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                </div>
            </div>
        </div>
    </div>
<php } ?> -->
        <!-- End Modal -->

        <!-- Modal Hapus -->
        <!-- <php foreach ($pinjam as $p) { ?>
    <div class="modal fade text-left" id="delete<?= $p->idpeminjaman ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Hapus Data Peminjam </h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <span>Apakah Anda Yakin Ingin Menghapus Data <?= $p->nama; ?> ?</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <a href="<?= base_url('peminjaman/delete/' . $p->idpeminjaman . '/' . $p->jml . '/' . $p->idaset) ?>" class="btn bg-primary text-white">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<php } ?> -->
        <!-- End Modal -->

        <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            function tes() {
                Swal.fire('Any fool can use a computer');
            }
        </script>