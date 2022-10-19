<section class="section">
    <div class="card">
        <div class="card-header">
            <?= $title; ?>
        </div>
        <div class="card-body">
        <?php if ($this->session->userdata('role') == 1) { ?>
            <div style="text-align: right;">
                <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#modaladdceller">Tambah Data</button>
            </div>
            <br>
            <?php } elseif ($this->session->userdata('role') == 2) { ?>

<?php } ?>
            <?php echo validation_errors(); ?>
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
                            <!-- <button class="btn icon btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete<= $cel->idceller ?>"><i class="fa fa-trash-alt"></i></button> -->
                        </td>
                    </tr>
                <?php } ?>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

</section>

<!-- Modal Add -->
<div class="modal fade" id="modaladdceller" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Add Agen Penjual</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <?php echo form_open_multipart('celler/add'); ?>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Nama Toko</label>
                        <input type="text" name="namastan" class="form-control" placeholder="Nama Toko" oninvalid="this.setCustomValidity('Nama Toko Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Nama Pemilik</label>
                        <input type="text" name="nama" class="form-control" placeholder="Nama Pemilik" oninvalid="this.setCustomValidity('Nama Pemilik Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">NIK</label>
                        <input type="number" name="nik" class="form-control" placeholder="NIK" oninvalid="this.setCustomValidity('NIK Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Nomor Hp</label>
                        <input type="number" name="nohp" class="form-control" placeholder="Nomor Hp" oninvalid="this.setCustomValidity('Nomor Hp Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" class="form-control" placeholder="Alamat" oninvalid="this.setCustomValidity('Alamat Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label>SKU</label>
                            <input type="file" name="gambar" class="form-control" id="preview_gambar" oninvalid="this.setCustomValidity('Gambar Wajib Diisi !!!')" oninput="setCustomValidity('')" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Username</label>
                        <input type="text" name="username" class="form-control" placeholder="Username" oninvalid="this.setCustomValidity('Username Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Password</label>
                        <input type="password" name="password" class="form-control" placeholder="Password" oninvalid="this.setCustomValidity('Nama Lengkap Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                    </div>
                </div>

                <div class="row">
                    <div class="col-sm-4 mt-3">
                        <div class="form-group">
                            <img src="<?= base_url('assets/gambar/nofoto.png') ?>" id="gambar_load" width="200px">
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Save</button>
            </div>
            <?php echo form_close();?>
        </div>
    </div>
</div>
<!-- End Modal -->

<!-- Modal Edit -->
<?php foreach ($celler as $cel) { ?>

<div class="modal fade" id="edit<?= $cel->idceller ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit Data Agen</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">

                <?php
                echo form_open_multipart('celler/edit/' . $cel->idceller);
                ?>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label>Nama Toko</label>
                        <input type="text" name="namastan" value="<?= $cel->namastan ?>" class="form-control" placeholder="Nama Toko" oninvalid="this.setCustomValidity('Nama Toko Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Nama Pemilik</label>
                        <input type="text" name="nama" value="<?= $cel->nama ?>" class="form-control" placeholder="Nama Pemilik" oninvalid="this.setCustomValidity('Nama Pemilik Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">NIK</label>
                        <input type="number" name="nik" value="<?= $cel->nik ?>" class="form-control" placeholder="NIK" oninvalid="this.setCustomValidity('NIK Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                    </div>
                    <div class="form-group col-md-6">
                        <label for="">Nomor Hp</label>
                        <input type="number" name="nohp" value="<?= $cel->nohp ?>" class="form-control" placeholder="Nomor Hp" oninvalid="this.setCustomValidity('Nomor Hp Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                    </div>
                </div>

                <div class="row">
                    <div class="form-group col-md-6">
                        <label for="">Alamat</label>
                        <input type="text" name="alamat" value="<?= $cel->alamat ?>" class="form-control" placeholder="Alamat" oninvalid="this.setCustomValidity('Alamat Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                    </div>
                    <div class="form-group col-md-6">
                        <div class="form-group">
                            <label>SKU</label>
                            <input type="file" name="gambar" class="form-control" id="preview_gambar" oninvalid="this.setCustomValidity('Gambar Wajib Diisi !!!')" oninput="setCustomValidity('')">
                        </div>
                    </div>
                </div>

            <div class="row">
                <div class="col-sm-4 mt-3">
                    <div class="form-group">
                        <img src="<?= base_url('assets/gambar/' . $cel->sku) ?>" id="gambar_load" width="200px">
                    </div>
                </div>
            </div>

        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Edit</button>
        </div>
        <?php
        echo form_close();
        ?>
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

<script>
    <?php
    if (isset($this->session->swetalert)) {
    ?>
        Swal.fire(<?= $this->session->swetalert ?>);
    <?php
    }
    ?>
</script>