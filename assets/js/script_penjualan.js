refresh_data_keranjang();

$('#pelanggan').autocomplete({
  source: "penjualan/get_pelanggan_autocomplete",
  select: function (event, ui) {
    $('[name="pelanggan"]').val(ui.item.label);
    $('[name="alamat"]').val(ui.item.alamat);
    $('[name="no_telepon"]').val(ui.item.no_telepon);
  }
});

$('#barang').autocomplete({
  source: "penjualan/get_barang_autocomplete",
  select: function (event, ui) {
    $('[name="barang"]').val(ui.item.label);
    $('[name="satuan"]').val(ui.item.satuan);
    $('[name="harga"]').val(ui.item.harga);
    $('[name="stok"]').val(ui.item.stok);
    $('[name="qty"]').val("1");
  }
});

function refresh_data_keranjang(){
  $('#keranjang').DataTable({
    "ajax": "penjualan/data_keranjang",
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
  var id_penjualan=$('[name="id_penjualan"]').val();
  var barang=$('[name="barang"]').val();
  var satuan=$('[name="satuan"]').val();
  var stok=$('[name="stok"]').val();
  var qty=$('[name="qty"]').val();
  var harga=$('[name="harga"]').val();
  $.ajax({
    type : "POST",
    url  : "penjualan/tambah_keranjang",
    dataType : "JSON",
    data : {id_penjualan:id_penjualan, barang:barang, satuan:satuan, stok:stok, qty:qty, harga:harga}
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
    url  : "penjualan/hapus_keranjang",
    dataType : "JSON",
    data : {id_barang: id_barang}
  });
  refresh_data_keranjang();
}

function total_harga(){
  $.getJSON("penjualan/total_harga",function(jd){
    if(jd.subtotal){
      $('[name="total"]').val(jd.subtotal);
      kembalian();
    }
    else {
      $('[name="total"]').val('');
    }
  });
}

function kembalian(){
  var bayar = $('[name="bayar"]').val();
  var total = $('[name="total"]').val();
  $('[name="kembali"]').val(bayar-total);
}

function simpan_penjualan(){
  var id_penjualan=$('[name="id_penjualan"]').val();
  var id_pelanggan=$('[name="pelanggan"]').val();
  var total=$('[name="total"]').val();
  var bayar=$('[name="bayar"]').val();
  var kembali=$('[name="kembali"]').val();
  $.ajax({
    type : "POST",
    url  : "penjualan/simpan_penjualan",
    dataType : "JSON",
    data : {id_penjualan:id_penjualan, id_pelanggan:id_pelanggan, total:total, bayar:bayar, kembali:kembali}
  });
  alert('Transaksi Penjualan berhasil!');
  window.location = "penjualan";
}
