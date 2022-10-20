<section class="section">
    <div class="card">
        <div class="card-header">
            <?= $title; ?>
        </div>
        <div class="card-body">
            <?php echo validation_errors(); ?>
            <table class="table" id="pembeli">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama Lengkap</th>
                        <th>Nama Toko</th>
                        <th>Nama Barang</th>
                        <th class="text-center">status</th>
                    </tr>
                </thead>
                <tbody>
                    <?php $no = 1;
                    foreach ($pembeli as $pbl) { ?>
                        <tr>
                            <td><?= $no++; ?></td>
                            <td><?= $pbl->nik; ?></td>
                            <td><?= $pbl->nohp; ?></td>
                            <td><?= $pbl->namastan; ?></td>
                            <td>Kopi Toratima</td>
                            <td>
                            <button class="btn icon btn-info" type="button" data-bs-toggle="modal" data-bs-target="#detail<?= $pbl->idpembeli ?>"><i class="bi bi-eye"></i></button>
                                <?php if ($pbl->status == '0') { ?>
                                    <a href="<?= base_url('pembeli/send/'. $pbl->idpembeli) ?>" class="btn btn-danger" type="button">Memesan ...</a>
                                <?php } else if ($pbl->status == '1') { ?>
                                    <a href="<?= base_url('pembeli/done/'. $pbl->idpembeli) ?>" class="btn btn-success" type="button">Mengirim ...</a>
                                <?php } else if ($pbl->status == '2') { ?>
                                    Paket Diterima
                                <?php } ?>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>

</section>

<!-- Modal Detail -->
<?php foreach ($beli as $bel) { ?>
<div class="modal fade" id="detail<?= $bel->idpembeli ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail Pembeli</h5>
                <button type="button" class="btn-close text-dark" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="card">
                <div class="mt-4 ms-4">
                <div class="card card-profile card-plain">
                        <div class="row">
                            <div class="col-md-4 d-flex align-items-center">
                                <div class="card card-profile card-plain">
                                    <div class="card-body text-center bg-white shadow border-radius-lg p-3 position-relative z-index-1">
                                        <a href="javascript:;">
                                            <img class="w-100 h-auto border-radius-md" src="<?= base_url('assets/ktp/' . $bel->ktp) ?>">
                                        </a>
                                        <h5 class="mt-3 mb-1 d-md-block d-none"><?= $bel->nik ?></h5>
                                        <p class="mb-0 text-xs font-weight-bolder text-warning text-gradient text-uppercase"><?= $bel->nama ?></p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-8 ps-0 my-auto">
                                <div class="card-body text-left">
                                    <div class="row">
                                        <div class="col-5">Nama Pembeli</div>
                                        <div class="col-2">:</div>
                                        <div class="col-4"><strong><?= $bel->nama ?></strong></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5">NIK KTP</div>
                                        <div class="col-2">:</div>
                                        <div class="col-4"><strong><?= $bel->nik ?></strong></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5">Alamat Toko</div>
                                        <div class="col-2">:</div>
                                        <div class="col-4"><?= $bel->alamat ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5">Nomor Hp</div>
                                        <div class="col-2">:</div>
                                        <div class="col-4"><?= $bel->nohp ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5">Jumlah Pesanan</div>
                                        <div class="col-2">:</div>
                                        <div class="col-4"><?= $bel->jml ?></div>
                                    </div>
                                    <div class="row">
                                        <div class="col-5">Nama Toko</div>
                                        <div class="col-2">:</div>
                                        <div class="col-4"><?= $bel->namastan ?></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php } ?>
<!-- End Modal -->

<script>
    $(document).ready(function() {
        $('#pembeli').DataTable();
    });
</script>