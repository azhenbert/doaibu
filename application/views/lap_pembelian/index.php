<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    List Laporan Pembelian
    <small>Laporan Pembelian</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Laporan Pembelian</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box">

    <div class="box-body">

      <table id="table_lap_pembelian" class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
          <th>ID PEMBELIAN</th>
          <th>SUPPLIER</th>
          <th>TOTAL</th>
          <th>TANGGAL</th>
          <th>BUYER</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach($lap_pembelian as $b){ ?>
        <tr>
          <td><a href="<?= base_url() ?>laporan_pembelian/detail/<?= $b['id_pembelian'] ?>" target="_blank"><?= $b['id_pembelian'] ?></a></td>
          <td><?= $b['nama_supplier'] ?></td>
          <td><?= $b['total'] ?></td>
          <td><?= $b['tanggal'] ?></td>
          <td><?= $b['nama_lengkap'] ?></td>
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
