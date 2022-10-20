<section class="section">
    <div class="card">
        <div class="card-header">
            <?= $title; ?>
        </div>
        <div class="card-body">
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
                        <th width="30px">No</th>
                        <th>Nama</th>
                        <th>Username</th>
                        <th class="text-center">Status</th>
                        <th class="text-center">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($penjual as $pjl) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $pjl->nama; ?></td>
                            <td><?= $pjl->username; ?></td>
                            <td class="text-center">
                                <?php if ($pjl->active == 1) { ?>
                                    <a type="button" href="<?= base_url('management_penjual/nonaktif/') . $pjl->iduser ?>" class="btn btn-outline-info">Aktif</a>
                                <?php } else if ($pjl->active == 0) { ?>
                                    <a type="button" href="<?= base_url('management_penjual/aktif/') . $pjl->iduser ?>" class="btn btn-outline-danger">Tidak Aktif</a>
                                <?php } ?>
                            </td>
                            <td class="text-center">
                                <button class="btn icon btn-primary" type="button" data-bs-toggle="modal" data-bs-target="#reset<?= $pjl->iduser ?>"><i class="bi bi-arrow-clockwise"></i></button>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>

<!-- Modal Ubah User -->
<?php foreach ($penjual as $pjl) { ?>
    <div class="modal fade text-left" id="reset<?= $pjl->iduser ?>" tabind<x="-1" role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h4 class="modal-title" id="myModalLabel33">Reset Password</h4>
                    <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                        <i data-feather="x"></i>
                    </button>
                </div>
                <form action="<?= base_url('management_penjual/reset/' . $pjl->iduser) ?>" method="POST">
                    <div class="modal-body">
                        <label>Username : </label>
                        <div class="form-group">
                            <input type="text" class="form-control" name="username" value="<?= $pjl->username ?>" placeholder="Username" oninvalid="this.setCustomValidity('Username Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
                        </div>
                        <label>Password : </label>
                        <div class="form-group">
                            <input type="password" class="form-control" name="pass" value="<?= $pjl->pass ?>" placeholder="Password" oninvalid="this.setCustomValidity('Password Wajib Di Isi !!!')" oninput="setCustomValidity('')" required>
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

<script>
    $(document).ready(function() {
        $('#user').DataTable();
    });
</script>