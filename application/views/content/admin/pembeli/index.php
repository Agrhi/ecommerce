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
                        <td>No</td>
                        <td>NIK</td>
                        <td>Nama Lengkap</td>
                        <td>Nama Toko</td>
                        <td>Nama Barang</td>
                        <td>status</td>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <?php
                        $no = 1;
                        foreach ($pembeli as $pbl) {
                        ?>
                    <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $pbl->nik; ?></td>
                        <td><?= $pbl->nohp; ?></td>
                        <td><?= $pbl->namastan; ?></td>
                        <td>Kopi Toratima</td>
                        <td>
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
                </tr>
                </tbody>
            </table>
        </div>
    </div>

</section>


<script>
    $(document).ready(function() {
        $('#pembeli').DataTable();
    });
</script>