refresh_data_keranjang();

$('#supplier').autocomplete({
  source: "pembelian/get_supplier_autocomplete",
  select: function (event, ui) {
    $('[name="supplier"]').val(ui.item.label);
    $('[name="alamat"]').val(ui.item.alamat);
    $('[name="no_telepon"]').val(ui.item.no_telepon);
  }
});

$('#barang').autocomplete({
  source: "pembelian/get_barang_autocomplete",
  select: function (event, ui) {
    $('[name="barang"]').val(ui.item.label);
    $('[name="satuan"]').val(ui.item.satuan);
    $('[name="stok"]').val(ui.item.stok);
    $('[name="qty"]').val("1");
  }
});

function refresh_data_keranjang(){
  $('#keranjang').DataTable({
    "ajax": "pembelian/data_keranjang",
    "sAjaxDataProp" : "",
    "columns" : [
      {"data" : "id_barang"},
      {"data" : "nama_barang"},
      {"data" : "satuan"},
      {"data" : "harga"},
      {"data" : "qty"},
      {"data" : "subtotal"},
      {"render": function ( data, type, row, meta ) {
        return '<a onclick="hapus_keranjang(\'' + row.id_barang + '\')" class="btn btn-primary btn-xs"><span class="fa fa-close"></span></a>';}}
    ],
    "destroy" : true,
    "responsive" : true
  });
  total_harga();
}

function tambah_keranjang(){
  var id_pembelian=$('[name="id_pembelian"]').val();
  var barang=$('[name="barang"]').val();
  var satuan=$('[name="satuan"]').val();
  var stok=$('[name="stok"]').val();
  var qty=$('[name="qty"]').val();
  var harga=$('[name="harga"]').val();
  $.ajax({
    type : "POST",
    url  : "pembelian/tambah_keranjang",
    dataType : "JSON",
    data : {id_pembelian:id_pembelian, barang:barang, satuan:satuan, stok:stok, qty:qty, harga:harga}
  });
  $('[name="barang"]').val('');
  $('[name="satuan"]').val('');
  $('[name="harga"]').val('');
  $('[name="stok"]').val('');
  $('[name="qty"]').val('');
  refresh_data_keranjang();
}

function hapus_keranjang(id_barang){
  $.ajax({
    type : "POST",
    url  : "pembelian/hapus_keranjang",
    dataType : "JSON",
    data : {id_barang: id_barang}
  });
  refresh_data_keranjang();
}

function total_harga(){
  $.getJSON("pembelian/total_harga",function(jd){
    if(jd.subtotal){
      $('[name="total"]').val(jd.subtotal);
    }
    else {
      $('[name="total"]').val('');
    }
  });
}

function simpan_pembelian(){
  var id_pembelian=$('[name="id_pembelian"]').val();
  var id_supplier=$('[name="supplier"]').val();
  var total=$('[name="total"]').val();
  $.ajax({
    type : "POST",
    url  : "pembelian/simpan_pembelian",
    dataType : "JSON",
    data : {id_pembelian:id_pembelian, id_supplier:id_supplier, total:total}
  });
  alert('Transaksi Pembelian berhasil!');
  window.location = "pembelian";
}
