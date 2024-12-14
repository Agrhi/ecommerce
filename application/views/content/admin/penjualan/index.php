<section class="section">
    <div class="card">
        <div class="card-header">
            <?= $title; ?>
        </div>
        <div class="card-body">
            <?php echo validation_errors(); ?>
            <table class="table" id="asetr">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Toko</th>
                        <th>Barang</th>
                        <th>Stok</th>
                        <th>Harga</th>
                        <th>Jumlah Terjual</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($penjualan as $pjul) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $pjul->namastan; ?></td>
                            <td>Kopi Toratima</td>
                            <td><?= $pjul->stok; ?></td>
                            <td><?= $pjul->harga; ?></td>
                            <td><?= $pjul->jual; ?></td>
                            <td class="text-center">
                                <button class="btn icon btn-success" type="button" data-bs-toggle="modal" data-bs-target="#edit<?= $pjul->idjualan ?>"><i class="bi bi-pencil"></i></button>
                                <!-- <button class="btn icon btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete<= $pjul->idjualan ?>"><i class="fa fa-trash-alt"></i></button> -->
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>

<!-- Modal Edit Peminjam -->
<?php foreach ($penjualan as $pjul) { ?>
    <div class="modal fade text-left" id="edit<?= $pjul->idjualan ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Update Jualan </h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="<?= base_url('penjualan/edit') ?>" method="POST" enctype="multipart/form-data">
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-md-12 col-12">
                                <div class="form-group">
                                    <label>Nama Pemilik</label>
                                    <input type="text" name="idjualan" value="<?= $pjul->idjualan ?>" class="form-control" hidden>
                                    <input type="text" name="nik" value="<?= $pjul->nik ?>" class="form-control" hidden>
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
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <input type="file" name="gambar" class="form-control" id="preview_gambar" oninvalid="this.setCustomValidity('Gambar Wajib Diisi !!!')" oninput="setCustomValidity('')" required>
                                </div>
                            </div>
                            <div class="col-sm-6 mt-3">
                                <div class="form-group">
                                    <img src="<?= base_url('assets/foto/' . $pjul->gambar) ?>" id="gambar_load" width="200px">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-sm-6">
                                <div class="form-group">
                                    <label>Gambar</label>
                                    <input type="file" name="gambar" class="form-control" id="preview_gambar" oninvalid="this.setCustomValidity('Gambar Wajib Diisi !!!')" oninput="setCustomValidity('')" required>
                                </div>
                            </div>
                            <div class="col-sm-6 mt-3">
                                <div class="form-group">
                                    <img src="<?= base_url('assets/foto/' . $pjul->gambar) ?>" id="gambar_load" width="200px">
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
<?php } ?>
<!-- End Modal -->

<script>
    $(document).ready(function() {
        $('#aset').DataTable();
        $('#asetr').DataTable();
    });
</script>

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