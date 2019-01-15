<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    List Laporan Penjualan
    <small>Laporan Penjualan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Laporan Penjualan</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box">

    <div class="box-body">

      <table id="table_lap_pembelian" class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
          <th>ID PENJUALAN</th>
          <th>PELANGGAN</th>
          <th>TOTAL</th>
          <th>TANGGAL</th>
          <th>KASIR</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach($lap_penjualan as $p){ ?>
        <tr>
          <td><a href="<?= base_url() ?>laporan_penjualan/detail/<?= $p['id_penjualan'] ?>" target="_blank"><?= $p['id_penjualan'] ?></a></td>
          <td><?= $p['nama_pelanggan'] ?></td>
          <td><?= $p['total'] ?></td>
          <td><?= $p['tanggal'] ?></td>
          <td><?= $p['nama_kasir'] ?></td>
        </tr>
        <?php } ?>

        </tbody>
      </table>
    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->
