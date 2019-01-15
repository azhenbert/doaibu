<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Ganti Password
    <small>Change Password</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Ganti Password</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="box">

    <div class="box-body">

      <?php if($this->session->flashdata('msg_ok')) { ?>
      <div class="alert alert-success alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fa fa-check"></i><?= $this->session->flashdata('msg_ok'); ?>
      </div>
      <?php } ?>

      <?php if($this->session->flashdata('msg_error')) { ?>
      <div class="alert alert-danger alert-dismissible">
        <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
        <i class="icon fa fa-check"></i><?= $this->session->flashdata('msg_error'); ?>
      </div>
      <?php } ?>

      <form action="" method="POST">
        <div class="form-group">
          <label>Password Lama :</label>
          <input type="password" class="form-control" name="password_lama" required>
        </div>
        <div class="form-group">
          <label>Password Baru :</label>
          <input type="password" class="form-control" name="password_baru" required>
        </div>
        <div class="form-group">
          <label>Konfirmasi Password Baru :</label>
          <input type="password" class="form-control" name="password_baru2" required>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">Submit</button>
      </form>

    </div>
    <!-- /.box-body -->
  </div>
  <!-- /.box -->

</section>
<!-- /.content -->
