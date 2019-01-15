<!-- Content Header (Page header) -->
<section class="content-header">
  <h1>
    Pembelian
    <small>Supply</small>
  </h1>
  <ol class="breadcrumb">
    <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
    <li class="active">Pembelian</li>
  </ol>
</section>

<!-- Main content -->
<section class="content">

  <div class="row">

    <div class="col-md-4">
      <div class="box">
        <div class="box-body">
          <div class="form-group">
            <label>ID PEMBELIAN :</label>
            <?php
              $id_pembelian = 'PB' . str_pad(1 + substr($pembelian['id_pembelian'], 2), 6, '0', STR_PAD_LEFT);
            ?>
            <input type="text" class="form-control" value="<?= $id_pembelian ?>" name="id_pembelian" readonly>
          </div>
          <div class="form-group">
            <label>TANGGAL :</label>
            <input type="text" class="form-control" value="<?= date("Y-m-d") ?>" name="tanggal" readonly>
          </div>
          <div class="form-group">
            <label>SUPPLIER :</label>
            <input type="text" class="form-control" id="supplier" name="supplier" placeholder="ID / Nama Supplier">
          </div>
          <div class="form-group">
            <label>ALAMAT :</label>
            <input type="text" class="form-control" name="alamat" readonly>
          </div>
          <div class="form-group">
            <label>NO TELEPON :</label>
            <input type="text" class="form-control" name="no_telepon" readonly>
          </div>
        </div>
      </div>
    </div>

    <div class="col-md-8">
      <div class="box">
        <div class="box-body">
          <form action="" method="POST">
            <div class="form-group">
              <label>BARANG :</label>
              <input type="text" class="form-control" id="barang" name="barang" placeholder="ID / Nama Barang">
            </div>
            <div class="form-group">
              <label>SATUAN :</label>
              <input type="text" class="form-control" name="satuan" readonly>
            </div>
            <div class="form-group">
              <label>HARGA BELI :</label>
              <input type="text" class="form-control" name="harga">
            </div>
            <div class="form-group">
              <label>STOK :</label>
              <input type="text" class="form-control" name="stok" readonly>
            </div>
            <div class="form-group">
              <label>QTY :</label>
              <input type="number" class="form-control" name="qty">
            </div>

            <a onclick="tambah_keranjang()" class="btn btn-primary"><span class="fa fa-plus"></span>&nbsp;&nbsp;Tambah</a>
          </form>
        </div>
      </div>
    </div>

  </div>

  <div class="box">
    <div class="box-body table-responsive">

      <table id="keranjang" class="table table-bordered table-striped table-hover">
        <thead>
        <tr>
          <th>ID BARANG</th>
          <th>NAMA BARANG</th>
          <th>SATUAN</th>
          <th>HARGA</th>
          <th>QTY</th>
          <th>SUBTOTAL</th>
          <th></th>
        </tr>
        </thead>
        <tbody>

        </tbody>
      </table>

    </div>
  </div>

  <div class="box">
    <div class="box-body table-responsive">

      <div class="form-group">
        <label>TOTAL :</label>
        <input type="text" class="form-control" name="total" readonly>
      </div>

      <a onclick="simpan_pembelian()" class="btn btn-primary pull-right"><span class="fa fa-save"></span>&nbsp;&nbsp;Simpan</a>

    </div>
  </div>

</section>
<!-- /.content -->
