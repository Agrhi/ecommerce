<section class="section">
  <div class="card">
    <div class="card-header">
      <?= $title; ?>
    </div>
    <div class="card-body">
      <div class="row">
        <div class="col-md-10">
          <div class="p-2">
            <select class="form-select form-select-lg" id="select" aria-label=".form-select-lg example">
              <option value="0">Pilih Jenis Laporan</option>
              <option value="1" <?= ($select === "1") ? $selected = 'selected' : '' ?>>Tampilkan Data Aset Desa</option>
              <option value="2" <?= ($select === "2") ? $selected = 'selected' : '' ?>>Tampilkan Data Aset Desa Yang Rusak</option>
              <option value="3" <?= ($select === "3") ? $selected = 'selected' : '' ?>>Tampilkan Data Seluru Peminjaman</option>
              <option value="4" <?= ($select === "4") ? $selected = 'selected' : '' ?>>Tampilkan Data Berdasarkan Bulan</option>
            </select>
          </div>
        </div>
        <div class="col-md-2">
          <a href="<?= base_url('laporan/cetak/') . $select .  '/' . $bln ?>" type="button" target="blank" class="btn btn-primary rounded-pill m-2" id="add"><i class="fa fa-print me-2"></i>Cetak</a>
        </div>
      </div>
      <div class="p-2" id="divhide">
        <select class="form-select form-select-lg" id="bulan" aria-label=".form-select-lg example">
          <option value="0" selected disabled>Open this select Moon</option>
          <option value="01" <?= ($bln === "01") ? $selected = 'selected' : '' ?>>Januari</option>
          <option value="02" <?= ($bln === "02") ? $selected = 'selected' : '' ?>>Februari</option>
          <option value="03" <?= ($bln === "03") ? $selected = 'selected' : '' ?>>Maret</option>
          <option value="04" <?= ($bln === "04") ? $selected = 'selected' : '' ?>>April</option>
          <option value="05" <?= ($bln === "05") ? $selected = 'selected' : '' ?>>Mei</option>
          <option value="06" <?= ($bln === "06") ? $selected = 'selected' : '' ?>>Juni</option>
          <option value="07" <?= ($bln === "07") ? $selected = 'selected' : '' ?>>Juli</option>
          <option value="08" <?= ($bln === "08") ? $selected = 'selected' : '' ?>>Agustus</option>
          <option value="09" <?= ($bln === "09") ? $selected = 'selected' : '' ?>>September</option>
          <option value="10" <?= ($bln === "10") ? $selected = 'selected' : '' ?>>Oktober</option>
          <option value="11" <?= ($bln === "11") ? $selected = 'selected' : '' ?>>November</option>
          <option value="12" <?= ($bln === "12") ? $selected = 'selected' : '' ?>>Desember</option>
        </select>
      </div>
    </div>
  </div>
</section>

<?php if ($select == 1) { ?>
  <section class="section">
    <div class="card">
      <div class="card-header">
        Stok Aset Desa
      </div>
      <div class="card-body">
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
              </td>
            </tr>
          <?php } ?>
          </tr>
          </tbody>
        </table>
      </div>
    </div>

  </section>
<?php } else if ($select == 2) { ?>
  <section class="section">
    <div class="card">
      <div class="card-header">
        Aset yang Rusak
      </div>
      <div class="card-body">
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
<?php } else if ($select == 3) { ?>
  <section class="section">
    <div class="card">
      <div class="card-header">
        <?= $title; ?>
      </div>
      <div class="card-body">
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
              foreach ($aset as $p) {
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
                  <svg class="fa-w-16 fa-fw" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                    <path d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zm97.9-320l-17 17-47 47 47 47 17 17L320 353.9l-17-17-47-47-47 47-17 17L158.1 320l17-17 47-47-47-47-17-17L192 158.1l17 17 47 47 47-47 17-17L353.9 192z" />
                  </svg>
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
<?php } else if ($select == 4) { ?>
  <section class="section">
    <div class="card">
      <div class="card-header">
        <?= $title; ?>
      </div>
      <div class="card-body">
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
              foreach ($aset as $p) {
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
                  <svg class="fa-w-16 fa-fw" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 512 512">
                    <!--! Font Awesome Pro 6.2.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
                    <path d="M256 512c141.4 0 256-114.6 256-256S397.4 0 256 0S0 114.6 0 256S114.6 512 256 512zm97.9-320l-17 17-47 47 47 47 17 17L320 353.9l-17-17-47-47-47 47-17 17L158.1 320l17-17 47-47-47-47-17-17L192 158.1l17 17 47 47 47-47 17-17L353.9 192z" />
                  </svg>
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
<?php } ?>


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
  let bln = <?= $bln; ?>;
  if (bln != '') {
    $('#bulan').change(function() {
      let id = 4;
      let bulan = $('#bulan').val();
      if (bulan == 0) {
        location.reload();
      } else {
        window.location.href = '<?= base_url('laporan/get/') ?>' + id + '/' + bulan;
      }
    });
  }
</script>

<script>
  $(document).ready(function() {
    if (<?= $select; ?> == 4) {
      $('#divhide').show();
    } else {
      $('#divhide').hide();
    }
  });

  // Fungsi Select
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