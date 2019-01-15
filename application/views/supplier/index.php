<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    List Supplier
    <small>Data Supplier</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Data Supplier</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box">

    <div class="box-header">
      <a href="<?= base_url() ?>supplier/tambah" class="btn btn-primary btn-sm"><span class="fa fa-plus-circle"></span> Tambah Data</a>

    </div>

    <div class="box-body">

      <table id="table" class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
          <th>ID SUPPLIER</th>
          <th>NAMA SUPPLIER</th>
          <th>ALAMAT</th>
          <th>NO TELEPON</th>
          <th>ACTION</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach($supplier as $s){ ?>
        <tr>
          <td><?php echo $s['id_supplier'] ?></td>
          <td><?php echo $s['nama_supplier'] ?></td>
          <td><?php echo $s['alamat'] ?></td>
          <td><?php echo $s['no_telepon'] ?></td>
          <td>
            <a href="<?= base_url() ?>supplier/edit/<?= $s['id_supplier'] ?>" class="btn btn-warning btn-xs"><span class="fa fa-pencil"></span> Edit</a>
            <a href="<?= base_url() ?>supplier/hapus/<?= $s['id_supplier'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin hapus supplier ?')"><span class="fa fa-trash"></span> Delete</a>
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
