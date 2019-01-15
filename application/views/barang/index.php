<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    List Barang
    <small>Data Barang</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Data Barang</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box">

    <div class="box-header">
      <a href="<?= base_url() ?>barang/tambah" class="btn btn-primary btn-sm"><span class="fa fa-plus-circle"></span> Tambah Data</a>

    </div>

    <div class="box-body table-responsive">

      <table id="table" class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
          <th>ID BARANG</th>
          <th>NAMA BARANG</th>
          <th>STOK</th>
          <th>HARGA</th>
          <th>SATUAN</th>
          <th>ACTION</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach($barang as $b){ ?>
        <tr>
          <td><?php echo $b['id_barang'] ?></td>
          <td><?php echo $b['nama_barang'] ?></td>
          <td><?php echo $b['stok'] ?></td>
          <td><?php echo $b['harga'] ?></td>
          <td><?php echo $b['satuan'] ?></td>
          <td>
            <a href="<?= base_url() ?>barang/edit/<?= $b['id_barang'] ?>" class="btn btn-warning btn-xs"><span class="fa fa-pencil"></span> Edit</a>
            <a href="<?= base_url() ?>barang/hapus/<?= $b['id_barang'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin hapus user ?')"><span class="fa fa-trash"></span> Delete</a>
          </td>
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
