<section class="section">
    <div class="card">
        <div class="card-header">
            Stok Aset Desa
        </div>
        <div class="card-body">
            <div style="text-align: right;">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaladdaset">Tambah Data</button>
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
            ?>
            <table class="table" id="aset">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama Barang</td>
                        <td>Jumlah Stok</td>
                        <td>Tersisa</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $no = 1;
                        foreach ($aset as $as) {
                        ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $as->namaaset; ?></td>
                        <td><?= $as->stok; ?></td>
                        <td><?= $as->bagus; ?></td>
                        <td>
                            <button class="btn icon btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#detail<?= $as->idaset ?>"><svg class="svg-inline--fa fa-book fa-w-14 fa-fw select-all" aria-hidden="true" focusable="false" data-prefix="fas" data-icon="book" role="img" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512" data-fa-i2svg="">
                                    <path fill="currentColor" d="M448 360V24c0-13.3-10.7-24-24-24H96C43 0 0 43 0 96v320c0 53 43 96 96 96h328c13.3 0 24-10.7 24-24v-16c0-7.5-3.5-14.3-8.9-18.7-4.2-15.4-4.2-59.3 0-74.7 5.4-4.3 8.9-11.1 8.9-18.6zM128 134c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm0 64c0-3.3 2.7-6 6-6h212c3.3 0 6 2.7 6 6v20c0 3.3-2.7 6-6 6H134c-3.3 0-6-2.7-6-6v-20zm253.4 250H96c-17.7 0-32-14.3-32-32 0-17.6 14.4-32 32-32h285.4c-1.9 17.1-1.9 46.9 0 64z"></path>
                                </svg></i></button>
                            <button class="btn icon btn-success" type="button" data-bs-toggle="modal" data-bs-target="#edit<?= $as->idaset ?>"><i class="bi bi-pencil"></i></button>
                            <button class="btn icon btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete<?= $as->idaset ?>"><i class="fa fa-trash-alt"></i></button>
                        </td>
                    </tr>
                <?php } ?>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

</section>

<section class="section">
    <div class="card">
        <div class="card-header">
            Aset yang Rusak
        </div>
        <div class="card-body">
            <div style="text-align: right;">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaladdasetr">Tambah Data</button>
            </div>
            <br>
            <?php echo validation_errors(); ?>
            <?php
            if ($this->session->flashdata('pesanrusak')) {
                echo '<div class="alert alert-success" role="alert">
                        Success ! ';
                echo $this->session->flashdata('pesanrusak');
                echo '</div>';
            }
            ?>
            <table class="table" id="asetr">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama Barang</td>
                        <td>Jumlah Aset yang Rusak</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $no = 1;
                        foreach ($rusak as $as) {
                        ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $as->namaaset; ?></td>
                        <td><?= $as->rusak; ?></td>
                    </tr>
                <?php } ?>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

</section>

<!-- Modal Tambah Aset Rusak -->
<div class="modal fade text-left" id="modaladdasetr" tabindex="-1" role="dialog" aria-labelledby="asetrusakID" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="asetrusakID">Tambah Aset Rusak</h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= base_url('aset') ?>/addrusak" method="POST">
                <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Barang</label>
                        <select name="idaset" class="form-control" onkeypress='return harusHuruf(event)' oninvalid="this.setCustomValidity('Input Wajib Diisi !!!')" oninput="setCustomValidity('')" required>
                            <option value="">Select</option>
                            <?php foreach ($aset as $as) { ?>
                                <option value="<?= $as->idaset ?>"><?= $as->namaaset ?></option>
                            <?php } ?>
                        </select>
                    </div>
                    <label>Jumlah Aset Rusak : </label>
                    <div class="form-group">
                        <input type="number" class="form-control" name="rusak" id="rusak" placeholder="Jumlah Aset Rusak" oninvalid="this.setCustomValidity('Username Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span>Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal Tambah Aset -->
<div class="modal fade text-left" id="modaladdaset" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Tambah Aset </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= base_url('aset') ?>/add" method="POST">
                <div class="modal-body">
                    <label>Nama Barang : </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="namaaset" id="namaaset" placeholder="Nama Barang" oninvalid="this.setCustomValidity('Nama Lengkap Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                    </div>
                    <label>Stok : </label>
                    <div class="form-group">
                        <input type="number" class="form-control" name="stok" id="stok" placeholder="Stok" oninvalid="this.setCustomValidity('Username Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                        <i class="bx bx-check d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Simpan</span>
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal Ubah Aset -->
<?php foreach ($aset as $as) { ?>
    <div class="modal fade text-left" id="edit<?= $as->idaset ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Ubah Aset </h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="<?= base_url('aset/edit/' . $as->idaset) ?>" method="POST">
                    <div class="modal-body">
                        <label>Nama Barang : </label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="namaaset" value="<?= $as->namaaset ?>" placeholder="Nama Barang" oninvalid="this.setCustomValidity('Nama Lengkap Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                        </div>
                        <label>Stok : </label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="stok" value="<?= $as->stok ?>" placeholder="Stok" oninvalid="this.setCustomValidity('Username Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                            <i class="bx bx-x d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Close</span>
                        </button>
                        <button type="submit" class="btn btn-primary ml-1" data-bs-dismiss="modal">
                            <i class="bx bx-check d-block d-sm-none"></i>
                            <span class="d-none d-sm-block">Ubah</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
<?php } ?>
<!-- End Modal -->

<!-- Modal Hapus -->
<?php foreach ($aset as $as) { ?>
    <div class="modal fade text-left" id="delete<?= $as->idaset ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Hapus Aset </h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <span>Apakah Anda Yakin Ingin Menghapus Data <?= $as->namaaset; ?> ?</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <a href="<?= base_url('aset/delete/' . $as->idaset) ?>" class="btn bg-primary text-white">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- End Modal -->

<!-- Modal Detail -->
<?php foreach ($aset as $as) { ?>
    <div class="modal fade text-left" id="detail<?= $as->idaset ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="modalDetail">Detail Data <?= $as->namaaset; ?></h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5">Nama Aset</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-6"><?= $as->namaaset; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">Jumlah Stok</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-6"><?= $as->stok; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">Jumlah Tersisa</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-6"><?= $as->bagus; ?></div>
                    </div>
                    <div class="row">
                        <div class="col-md-5">Jumlah Rusak</div>
                        <div class="col-md-1">:</div>
                        <div class="col-md-6"><?= $as->rusak; ?></div>
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

<script>
    $(document).ready(function() {
        $('#aset').DataTable();
        $('#asetr').DataTable();
    });
</script>