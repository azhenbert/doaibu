<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Edit User
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
          <label>ID BARANG :</label>
          <input type="text" class="form-control" value="<?= $barang['id_barang'] ?>" name="id_barang" readonly>
        </div>
        <div class="form-group">
          <label>NAMA BARANG :</label>
          <input type="text" class="form-control" value="<?= $barang['nama_barang'] ?>" name="nama_barang" placeholder="Nama Barang">
        </div>
        <div class="form-group">
          <label>STOK :</label>
          <input type="text" class="form-control" value="<?= $barang['stok'] ?>" name="stok" placeholder="Stok" readonly>
        </div>
        <div class="form-group">
          <label>HARGA :</label>
          <input type="text" class="form-control" value="<?= $barang['harga'] ?>" name="harga" placeholder="Harga">
        </div>
        <div class="form-group">
          <label>SATUAN :</label>
          <select class="form-control" name="satuan">
            <option value="PCS" <?php if($barang['satuan']=="PCS") echo 'selected' ?>>PCS</option>
            <option value="PAK" <?php if($barang['satuan']=="PAK") echo 'selected' ?>>PAK</option>
            <option value="DOS" <?php if($barang['satuan']=="DOS") echo 'selected' ?>>DOS</option>
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
