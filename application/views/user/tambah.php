<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Tambah User
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

    <div class="box-body">

      <?php if($this->session->flashdata('msg')) { ?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fa fa-check"></i><?= $this->session->flashdata('msg'); ?>
      </div>
      <?php } ?>

      <form action="" method="POST">
        <div class="form-group">
          <label>NIK :</label>
          <?php
          if (!$users['nik'])
          {
            $users['nik'] = date('Y').'000';
          }
          ?>
          <input type="text" class="form-control" value="<?= $users['nik']+1 ?>" name="nik" readonly>
        </div>
        <div class="form-group">
          <label>NAMA LENGKAP :</label>
          <input type="text" class="form-control" name="nama_lengkap" placeholder="Nama Lengkap">
        </div>
        <div class="form-group">
          <label>JABATAN :</label>
          <select class="form-control" name="jabatan">
            <option value="ADMIN">ADMIN</option>
            <option value="PEMBELIAN">PEMBELIAN</option>
            <option value="PENJUALAN">PENJUALAN</option>
          </select>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </form>

    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->
