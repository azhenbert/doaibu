<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    List User
    <small>Data User</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Data User</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box">

    <div class="box-header">
      <a href="<?= base_url() ?>user/tambah" class="btn btn-primary btn-sm"><span class="fa fa-plus-circle"></span> Tambah Data</a>

    </div>

    <div class="box-body">

      <table id="table" class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
          <th>NIK</th>
          <th>NAMA LENGKAP</th>
          <th>JABATAN</th>
          <th>ACTION</th>
        </tr>
        </thead>
        <tbody>

        <?php foreach($users as $u){ ?>
        <tr>
          <td><?php echo $u['nik'] ?></td>
          <td><?php echo $u['nama_lengkap'] ?></td>
          <td><?php echo $u['jabatan'] ?></td>
          <td>
            <a href="<?= base_url() ?>user/edit/<?= $u['nik'] ?>" class="btn btn-warning btn-xs"><span class="fa fa-pencil"></span> Edit</a>
            <a href="<?= base_url() ?>user/hapus/<?= $u['nik'] ?>" class="btn btn-danger btn-xs" onclick="return confirm('Yakin hapus user ?')"><span class="fa fa-trash"></span> Delete</a>
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
