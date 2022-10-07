<section class="section">
    <div class="card">
        <div class="card-header">
            <?= $title; ?>
        </div>
        <div class="card-body">
                <div class="p-2">
                    <select class="form-select form-select-lg" id="select" aria-label=".form-select-lg example">
                        <option value="0">Pilih Jenis Laporan</option>
                        <option value="1">Tampilkan Data Aset Desa</option>
                        <option value="2">Tampilkan Data Aset Desa Yang Rusak</option>
                        <option value="3">Tampilkan Data Seluru Peminjaman</option>
                        <option value="4">Tampilkan Data Berdasarkan Bulan</option>
                    </select>
                </div>
                <div class="p-2" id="divhide">
                    <select class="form-select form-select-lg" id="bulan" aria-label=".form-select-lg example">
                        <option value="0" selected disabled>Open this select Moon</option>
                        <option value="01">Januari</option>
                        <option value="02">Februari</option>
                        <option value="03">Maret</option>
                        <option value="04">April</option>
                        <option value="05">Mei</option>
                        <option value="06">Juni</option>
                        <option value="07">Juli</option>
                        <option value="08">Agustus</option>
                        <option value="09">September</option>
                        <option value="10">Oktober</option>
                        <option value="11">November</option>
                        <option value="12">Desember</option>
                    </select>
                </div>
        </div>
    </div>
</section>

<script>
    $(document).ready(function() {
        $('#divhide').hide();
    });

    $('#select').change(function() {
        let id = $('#select').val();
        if (id == 0) {
            location.reload();
        } else {
            if (id == 4) {
                $('#divhide').show();
                $('#bulan').change(function() {
                    let bulan = $('#bulan').val();
                    if (bulan == 0) {
                        location.reload();
                    } else {
                        window.location.href = '<?= base_url('laporan/get/') ?>' + id + '/' + bulan;
                    }
                });
            } else {
                $('#divhide').hide();
                window.location.href = '<?= base_url('laporan/get/') ?>' + id;
            }
        }
    });
</script>