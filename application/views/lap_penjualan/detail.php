
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title>DOAIBU | Invoice</title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
  <!-- Bootstrap 3.3.7 -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE/bower_components/bootstrap/dist/css/bootstrap.min.css">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE/bower_components/font-awesome/css/font-awesome.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE/bower_components/Ionicons/css/ionicons.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?= base_url() ?>assets/AdminLTE/dist/css/AdminLTE.min.css">

  <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
  <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
  <!--[if lt IE 9]>
  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
  <![endif]-->

  <!-- Google Font -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,600,700,300italic,400italic,600italic">
</head>
<body onload="window.print()">
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-xs-12">
        <h2 class="page-header">
          <i class="fa fa-globe"></i> <b>DOA</b>IBU, Inc.
          <small class="pull-right"><b>Date :</b> <?= date("Y-m-d") ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        <strong><u>Data Pelanggan :</u></strong>
        <address>
          <b>ID Pelanggan :</b> <?= $pelanggan['id_pelanggan'] ?><br>
          <b>Nama Pelanggan :</b> <?= $pelanggan['nama_lengkap'] ?><br>
          <b>Alamat :</b> <?= $pelanggan['alamat'] ?><br>
          <b>No. Telepon :</b> <?= $pelanggan['no_telepon'] ?><br>
        </address>
      </div>
      <div class="col-sm-4 invoice-col">
      </div>
      <div class="col-sm-4 invoice-col">
        <strong><u>Data Invoice :</u></strong><br>
        <b>ID Penjualan :</b> <?= $penjualan['id_penjualan'] ?><br>
        <b>Tgl. Penjualan :</b> <?= $penjualan['tanggal'] ?><br>
        <b>Kasir :</b> <?= $penjualan['nama_lengkap'] ?>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-xs-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>ID Barang</th>
            <th>Nama Barang</th>
            <th>Satuan</th>
            <th>Harga</th>
            <th>Qty</th>
            <th>Subtotal</th>
          </tr>
          </thead>
          <tbody>
          <?php foreach($penjualan_detail as $pd){ ?>
          <tr>
            <td><?= $pd['id_barang'] ?></td>
            <td><?= $pd['nama_barang'] ?></td>
            <td><?= $pd['satuan'] ?></td>
            <td><?= $pd['harga'] ?></td>
            <td><?= $pd['qty'] ?></td>
            <td><?= $pd['subtotal'] ?></td>
          </tr>
          <?php } ?>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-xs-6">
      </div>
      <!-- /.col -->
      <div class="col-xs-6">

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Total :</th>
              <td><?= $penjualan['total'] ?></td>
            </tr>
            <tr>
              <th>Bayar :</th>
              <td><?= $penjualan['bayar'] ?></td>
            </tr>
            <tr>
              <th>Kembali :</th>
              <td><?= $penjualan['kembali'] ?></td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
</body>
</html>
