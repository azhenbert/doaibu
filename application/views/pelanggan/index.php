<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    List Pelanggan
    <small>Data Pelanggan</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Data Pelanggan</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box">

    <div class="box-header">
      <a href="<?= base_url() ?>pelanggan/tambah" class="btn btn-primary btn-sm"><span class="fa fa-plus-circle"></span> Tambah Data</a>

    </div>

    <div class="box-body">

      <table id="table" class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
          <th>ID PELANGGAN</th>
          <th>NAMA LENGKAP</th>
          <th>ALAMAT</th>
          <th>NO TELEPON</th>
          <th>ACTION</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach($pelanggan as $p){ ?>
        <tr>
          <td><?php echo $p['id_pelanggan'] ?></td>
          <td><?php echo $p['nama_lengkap'] ?></td>
          <td><?php echo $p['alamat'] ?></td>
          <td><?php echo $p['no_telepon'] ?></td>
          <td>
            <a href="<?= base_url() ?>pelanggan/edit/<?= $p['id_pelanggan'] ?>" class="btn btn-warning btn-xs"><span class="fa fa-pencil"></span> Edit</a>
            <a href="<?= base_url() ?>pelanggan/hapus/<?= $p['id_pelanggan'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin hapus pelanggan ?')"><span class="fa fa-trash"></span> Delete</a>
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
