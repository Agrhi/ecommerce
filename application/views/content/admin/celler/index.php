<section class="section">
    <div class="card">
        <div class="card-header">
            <?= $title; ?>
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
                        <td>Nama Lengkap</td>
                        <td>Nama Toko</td>
                        <td>Alamat</td>
                        <td>Nomor Hp</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $no = 1;
                        foreach ($celler as $cel) {
                        ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $cel->nama; ?></td>
                        <td><?= $cel->namastan; ?></td>
                        <td><?= $cel->alamat; ?></td>
                        <td><?= $cel->nohp; ?></td>
                        <td>
                            <button class="btn icon btn-success" type="button" data-bs-toggle="modal" data-bs-target="#edit<?= $cel->idceller ?>"><i class="bi bi-pencil"></i></button>
                            <button class="btn icon btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete<?= $cel->idceller ?>"><i class="fa fa-trash-alt"></i></button>
                        </td>
                    </tr>
                <?php } ?>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

</section>

<!-- Modal Tambah Aset -->
<!-- <div class="modal fade text-left" id="modaladdaset" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
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
</div> -->
<!-- End Modal -->

<!-- Modal Ubah Aset -->
<!-- <php foreach ($aset as $as) { ?>
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
<php } ?> -->
<!-- End Modal -->

<!-- Modal Hapus -->
<!-- <php foreach ($aset as $as) { ?>
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
<php } ?> -->
<!-- End Modal -->


<script>
    $(document).ready(function() {
        $('#aset').DataTable();
        $('#asetr').DataTable();
    });
</script>