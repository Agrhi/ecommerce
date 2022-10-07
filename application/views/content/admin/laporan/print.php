<body onload="window.print();">
  <div class="container text-center">
    <h3 class="mt-4"><?= $title; ?></h3>

    <?php if ($select == 1) { ?>
      <table class="table" id="aset">
        <thead>
          <tr>
            <td>No</td>
            <td>Nama Barang</td>
            <td>Jumlah Stok</td>
            <td>Tersisa</td>
            <td>Rusak</td>
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
            <td><?= $as->rusak; ?></td>
          </tr>
        <?php } ?>
        </tr>
        </tbody>
      </table>
    <?php } else if ($select == 2) { ?>
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
    <?php } else if ($select == 3) { ?>
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
    <?php } else if ($select == 4) { ?>
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
    <?php } ?>
  </div>
</body>