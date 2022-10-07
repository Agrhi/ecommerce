<section class="section">
    <div class="card">
        <div class="card-header">
            <?= $title; ?>
        </div>
        <div class="card-body">
            <div style="text-align: right;">
                <button type="button" class="btn btn-outline-primary" data-bs-toggle="modal" data-bs-target="#modaladduser">Tambah Data</button>
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
            <table class="table" id="user">
                <thead>
                    <tr>
                        <td>No</td>
                        <td>Nama</td>
                        <td>Username</td>
                        <td>Akses</td>
                        <td>Status</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $no = 1;
                        foreach ($user as $u) {
                        ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $u->nama; ?></td>
                        <td><?= $u->username; ?></td>
                        <td>
                            <?php if ($u->role == 1) {
                                echo 'Admin';
                            } else if ($u->role == 2) {
                                echo 'Pengelolah';
                            } ?>
                        </td>
                        <td>
                            <?php if ($u->active == 1) { ?>
                                <a type="button" href="<?= base_url('management_user/nonaktif/') . $u->iduser ?>" class="btn btn-outline-info">Aktif</a>
                            <?php } else if ($u->active == 0) { ?>
                                <a type="button" href="<?= base_url('management_user/aktif/') . $u->iduser ?>" class="btn btn-outline-danger">Tidak Aktif</a>
                            <?php } ?>
                        </td>
                        <td>
                            <button class="btn icon btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#edit<?= $u->iduser ?>"><i class="bi bi-pencil"></i></button>
                            <button class="btn icon btn-danger" type="button" data-bs-toggle="modal" data-bs-target="#delete<?= $u->iduser ?>"><i class="fa fa-trash-alt"></i></button>
                        </td>
                    </tr>
                <?php } ?>
                </tr>
                </tbody>
            </table>
        </div>
    </div>

</section>

<!-- Modal Tambah User -->
<div class="modal fade text-left" id="modaladduser" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title" id="myModalLabel33">Tambah User </h4>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <i data-feather="x"></i>
                </button>
            </div>
            <form action="<?= base_url('management_user') ?>/add" method="POST">
                <div class="modal-body">
                    <label>Nama Lengkap : </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="nama" id="nama" placeholder="Nama Lengkap" oninvalid="this.setCustomValidity('Nama Lengkap Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                    </div>
                    <label>Username : </label>
                    <div class="form-group">
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" oninvalid="this.setCustomValidity('Username Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                    </div>
                    <label>Password : </label>
                    <div class="form-group">
                        <input type="password" class="form-control" name="pass" id="pass" placeholder="Password" oninvalid="this.setCustomValidity('Password Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                    </div>
                    <label>Pilih Status : </label>
                    <div class="form-group">
                        <select class="form-control" id="active" name="active" oninvalid="this.setCustomValidity('Status Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                            <option value="">Select</option>
                            <option value="1">Active</option>
                            <option value="0">Non Active</option>
                        </select>
                    </div>
                    <label>Pilih Akses : </label>
                    <div class="form-group">
                        <select class="form-control" id="role" name="role">
                            <option value="">Select</option>
                            <option value="1">Super Admin</option>
                            <option value="2">Pengelolah</option>
                        </select>
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

<!-- Modal Ubah User -->
<?php foreach ($user as $u) { ?>
    <div class="modal fade text-left" id="edit<?= $u->iduser ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Ubah User </h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="<?= base_url('management_user/edit/' . $u->iduser) ?>" method="POST">
                    <div class="modal-body">
                        <label>Nama Lengkap : </label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="nama" value="<?= $u->nama ?>" placeholder="Nama Lengkap" oninvalid="this.setCustomValidity('Nama Lengkap Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                        </div>
                        <label>Username : </label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" value="<?= $u->username ?>" placeholder="Username" oninvalid="this.setCustomValidity('Username Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                        </div>
                        <label>Password : </label>
                        <div class="form-group">
                            <input type="password" class="form-control" name="pass" value="<?= $u->pass ?>" placeholder="Password" oninvalid="this.setCustomValidity('Password Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                        </div>
                        <label>Pilih Akses : </label>
                        <div class="form-group">
                            <select class="form-control" id="role" name="role">
                                <?php if ($u->role == 1) { ?>
                                    <option value="1" selected>Super Admin</option>
                                    <option value="2">Pengelola</option>
                                <?php } else if ($u->role == 2) { ?>
                                    <option value="1">Super Admin</option>
                                    <option value="2" selected>Pengelola</option>
                                <?php } ?>
                            </select>
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
<?php foreach ($user as $u) { ?>
    <div class="modal fade text-left" id="delete<?= $u->iduser ?>" tabindex="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Hapus User </h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <div class="modal-body">
                    <span>Apakah Anda Yakin Ingin Menghapus Data <?= $u->nama; ?> ?</span>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-light-secondary" data-bs-dismiss="modal">
                        <i class="bx bx-x d-block d-sm-none"></i>
                        <span class="d-none d-sm-block">Close</span>
                    </button>
                    <a href="<?= base_url('management_user/delete/' . $u->iduser) ?>" class="btn bg-primary text-white">Hapus</a>
                </div>
            </div>
        </div>
    </div>
<?php } ?>
<!-- End Modal -->

<script>
    $(document).ready(function() {
        $('#user').DataTable();
    });
</script>