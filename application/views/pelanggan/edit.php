<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Edit Pelanggan
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

    <div class="box-body">

      <?php if($this->session->flashdata('msg')) { ?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fa fa-check"></i><?= $this->session->flashdata('msg'); ?>
      </div>
      <?php } ?>

      <form action="" method="POST">
        <div class="form-group">
          <label>ID PELANGGAN :</label>
          <input type="text" class="form-control" value="<?= $pelanggan['id_pelanggan'] ?>" name="id_pelanggan" readonly>
        </div>
        <div class="form-group">
          <label>NAMA LENGKAP :</label>
          <input type="text" class="form-control" name="nama_lengkap" value="<?= $pelanggan['nama_lengkap'] ?>">
        </div>
        <div class="form-group">
          <label>ALAMAT :</label>
          <input type="text" class="form-control" name="alamat" value="<?= $pelanggan['alamat'] ?>">
        </div>
        <div class="form-group">
          <label>NO TELEPON :</label>
          <input type="text" class="form-control" name="no_telepon" value="<?= $pelanggan['no_telepon'] ?>">
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </form>

    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->
