<section class="section">
    <div class="card">
        <div class="card-header">
            <?= $title; ?>
        </div>
        <div class="card-body">
            <div style="text-align: right;">
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modaladdpeminjam">Tambah Data</button>
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
                        <td>Nama Lengkap</td>
                        <td>Nama Barang</td>
                        <td>Jumlah</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $no = 1;
                        foreach ($pinjam as $p) {
                        ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $p->nama; ?></td>
                        <td><?= $p->namaaset; ?></td>
                        <td><?= $p->jml; ?></td>
                        <td><?php if ($p->status == 1) {
                                echo 'Pinjam';
                            } else {
                                echo 'Dikembalikan';
                            } ?></td>
                        <td>
                            <?php if ($p->status == 1) { ?>
                                <button class="btn icon btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#detail<?= $p->idpeminjaman ?>"><svg class="svg-inline--fa fa-book fa-w-14 fa-fw select-all" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="book" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                        <path fill="currentColor" d="M448 360V24c0-13.3-10.7-24-24-24H96C43 0 0 43 0 96v320c0 53 43 96 96 96h328c13.3 0 24-10.7 24-24v-16c0-7.5-3.5-14.3-8.9-18.7-4.2-15.4-4.2-59.3 0-74.7 5.4-4.3 8.9-11.1 8.9-18.6zM128 134c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm0 64c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm253.4 250H96c-17.7 0-32-14.3-32-32 0-17.6 14.4-32 32-32h285.4c-1.9 17.1-1.9 46.9 0 64z"></path>
                                    </svg></i></button>
                                <button class="btn icon btn-success" type="button" data-bs-toggle="modal" data-bs-target="#edit<?= $p->idpeminjaman ?>"><i class="bi bi-pencil"></i></button>
                                <button class="btn icon btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete<?= $p->idpeminjaman ?>"><i class="fa fa-trash-alt"></i></button>
                                <a href="<?= base_url('peminjaman/updatest/') . $p->idpeminjaman . '/' . $p->idaset . '/' . $p->jml ?>" class="btn icon btn-primary">Proses</a>
                            <?php } else { ?>
                                <svg class="svg-inline--fa fa-check-circle fa-w-16 fa-fw select-all" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="check-circle" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M504 256c0 136.967-111.033 248-248 248S8 392.967 8 256 119.033 8 256 8s248 111.033 248 248zM227.314 387.314l184-184c6.248-6.248 6.248-16.379 0-22.627l-22.627-22.627c-6.248-6.249-16.379-6.249-22.628 0L216 308.118l-70.059-70.059c-6.248-6.248-16.379-6.248-22.628 0l-22.627 22.627c-6.248 6.248-6.248 16.379 0 22.627l104 104c6.249 6.249 16.379 6.249 22.628.001z"></path>
                                </svg>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

</section>

<!-- Modal Tambah Peminjam -->
<div class="modal fade text-left" id="modaladdpeminjam" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Tambah Peminjam </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <div class="modal-body">
                <form action="<?= base_url('peminjaman/add') ?>/add" method="POST">
                    <div class="row">
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Nama Lengkap</label>
                                <input type="text" name="nama" id="nama" class="form-control" placeholder="Nama Lengkap" oninvalid="this.setCustomValidity('Nama Lengkap Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>NIK</label>
                                <input type="number" name="nik" id="nik" class="form-control" placeholder="NIK" oninvalid="this.setCustomValidity('Nama Lengkap Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Alamat</label>
                                <input type="text" name="alamat" id="alamat" class="form-control" placeholder="Alamat" oninvalid="this.setCustomValidity('Nama Lengkap Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Dusun</label>
                                <input type="text" name="dusun" id="dusun" class="form-control" placeholder="Dusun" oninvalid="this.setCustomValidity('Nama Lengkap Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Nama Barang</label>
                                <select name="idaset" class="form-control" onkeypress='return harusHuruf(event)' oninvalid="this.setCustomValidity('Input Wajib Diisi !!!')" oninput="setCustomValidity('')" required>
                                    <option value="">Select</option>
                                    <?php foreach ($aset as $as) { ?>
                                        <option value="<?= $as->idaset ?>"><?= $as->namaaset ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Jumlah Barang</label>
                                <input type="number" name="jml" id="jml" class="form-control" placeholder="Jumlah Barang yang di Pinjam" oninvalid="this.setCustomValidity('Jumlah Barang Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Tanggal Pinjam</label>
                                <input type="date" name="tglpinjam" id="tglpinjam" class="form-control" placeholder="Tanggal Pinjam" oninvalid="this.setCustomValidity('Nama Lengkap Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                            </div>
                        </div>
                        <div class="col-md-6 col-12">
                            <div class="form-group">
                                <label>Tenggal Kembali</label>
                                <input type="date" name="tglkembali" id="tglkembali" class="form-control" placeholder="Tenggal Kembali" oninvalid="this.setCustomValidity('Nama Lengkap Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                            </div>
                        </div>
                        <!-- <div class="col-md-6 col-12">
                        <div class="form-group">
                            <label>Proses</label>
                            <select class="form-control" id="proses" name="proses" oninvalid="this.setCustomValidity('Status Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                <option value="">Select</option>
                                <option value="Pinjam">Pinjam</option>
                                <option value="Kembali">Kembali</option>
                            </select>
                        </div>
                    </div> -->
                    </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                    <span class="d-none d-sm-block">Close</span>
                </button>
                <button type="submit" class="btn btn-primary ml-1">
                    <span class="d-none d-sm-block">Simpan</span>
                </button>
            </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal Edit Peminjam -->
<?php foreach ($pinjam as $p) { ?>
    <div class="modal fade text-left" id="edit<?= $p->idpeminjaman ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Ubah Peminjam </h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="<?= base_url('peminjaman/edit/' . $p->idpeminjaman) ?>" method="POST">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label>Nama Lengkap</label>
                                    <input type="text" name="nama" value="<?= $p->nama ?>" class="form-control" placeholder="Nama Lengkap" oninvalid="this.setCustomValidity('Nama Lengkap Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label>NIK</label>
                                    <input type="number" name="nik" value="<?= $p->nik ?>" class="form-control" placeholder="NIK" oninvalid="this.setCustomValidity('NIK Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label>Alamat</label>
                                    <input type="text" name="alamat" value="<?= $p->alamat ?>" class="form-control" placeholder="Alamat" oninvalid="this.setCustomValidity('Alamat Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label>Dusun</label>
                                    <input type="text" name="dusun" value="<?= $p->dusun ?>" class="form-control" placeholder="Dusun" oninvalid="this.setCustomValidity('Dusun Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label>Nama Barang</label>
                                    <select disabled="true" name="idaset" class="form-control" onkeypress='return harusHuruf(event)' oninvalid="this.setCustomValidity('Aset Wajib Diisi !!!')" oninput="setCustomValidity('')" required>
                                        <?php foreach ($aset as $as) {
                                            $selected = '';
                                            if ($as->idaset == $as->namaaset) {
                                                $selected = 'selected';
                                            }
                                        ?>
                                            <option value="<?= $as->idaset ?>" <?= $selected ?>><?= $as->namaaset ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label>Jumlah</label>
                                    <input type="text" name="jml" value="<?= $p->jml ?>" class="form-control" placeholder="Jumlah Aset" oninvalid="this.setCustomValidity('Jumlah Aset Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label>Tanggal Pinjam</label>
                                    <input type="date" name="tglpinjam" value="<?= $p->tglpinjam ?>" class="form-control" placeholder="Tanggal Pinjam" oninvalid="this.setCustomValidity('Tanggal Pinjam Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                </div>
                            </div>
                            <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label>Tenggal Kembali</label>
                                    <input type="date" name="tglkembali" value="<?= $p->tglkembali ?>" class="form-control" placeholder="Tenggal Kembali" oninvalid="this.setCustomValidity('Tanggal Kembali Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                </div>
                            </div>
                            <!-- <div class="col-md-6 col-12">
                                <div class="form-group">
                                    <label>Proses</label>
                                    <select class="form-control" name="proses" oninvalid="this.setCustomValidity('Status Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                                        <?php if ($p->proses == 'Pinjam') { ?>
                                            <option value="Pinjam" selected>Pinjam</option>
                                            <option value="Kembali">Kembali</option>
                                        <?php } else if ($p->proses == 'Kembali') { ?>
                                            <option value="Pinjam">Pinjam</option>
                                            <option value="Kembali" selected>Kembali</option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div> -->
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1">
                            <span class="d-none d-sm-block">Ubah</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
<!-- End Modal -->

<!-- Modal Detail -->
<?php foreach ($pinjam as $p) { ?>
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
<?php } ?>
<!-- End Modal -->

<!-- Modal Hapus -->
<?php foreach ($pinjam as $p) { ?>
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
<?php } ?>
<!-- End Modal -->