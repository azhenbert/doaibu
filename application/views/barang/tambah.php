<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Tambah Barang
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
          <?php
            $id_barang = 'B' . str_pad(1 + substr($barang['id_barang'], 1), 7, '0', STR_PAD_LEFT);
          ?>
          <input type="text" class="form-control" value="<?= $id_barang ?>" name="id_barang" readonly>
        </div>
        <div class="form-group">
          <label>NAMA BARANG :</label>
          <input type="text" class="form-control" name="nama_barang" placeholder="Nama Barang">
        </div>
        <div class="form-group">
          <label>STOK :</label>
          <input type="text" class="form-control" name="stok" placeholder="Stok">
        </div>
        <div class="form-group">
          <label>HARGA :</label>
          <input type="text" class="form-control" name="harga" placeholder="Harga">
        </div>
        <div class="form-group">
          <label>SATUAN :</label>
          <select class="form-control" name="satuan">
            <option value="PCS">PCS</option>
            <option value="PAK">PAK</option>
            <option value="DOS">DOS</option>
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
