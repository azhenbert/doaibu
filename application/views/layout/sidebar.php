<!-- Left side column. contains the sidebar -->
<aside class="main-sidebar">
  <!-- sidebar: style can be found in sidebar.less -->
  <section class="sidebar">
    <!-- Sidebar user panel -->
    <div class="user-panel">
      <div class="pull-left image">
        <img src="<?= base_url() ?>assets/img/user.png" class="img-circle" alt="User Image">
      </div>
      <div class="pull-left info">
        <p><?= $this->session->userdata('nama_lengkap') ?></p>
        <a href="#"><i class="fa fa-circle text-success"></i> <?= $this->session->userdata('jabatan') ?></a>
      </div>
    </div>
    <!-- sidebar menu: : style can be found in sidebar.less -->
    <ul class="sidebar-menu" data-widget="tree">
      <li class="header">MAIN NAVIGATION</li>
      <?php if(in_array($this->session->userdata('jabatan'), array('ADMIN','PEMBELIAN'))){ ?>
      <li><a href="<?= base_url() ?>pembelian"><i class="fa fa-shopping-cart"></i> <span>Pembelian</span></a></li>
      <?php } ?>
      <?php if(in_array($this->session->userdata('jabatan'), array('ADMIN','PENJUALAN'))){ ?>
      <li><a href="<?= base_url() ?>penjualan"><i class="fa fa-dollar"></i> <span>Penjualan</span></a></li>
      <?php } ?>
      <?php if(in_array($this->session->userdata('jabatan'), array('ADMIN','PEMBELIAN','PENJUALAN'))){ ?>
      <li><a href="<?= base_url() ?>barang"><i class="fa fa-tags"></i> <span>Data Barang</span></a></li>
      <?php } ?>
      <?php if(in_array($this->session->userdata('jabatan'), array('ADMIN','PENJUALAN'))){ ?>
      <li><a href="<?= base_url() ?>pelanggan"><i class="fa fa-users"></i> <span>Data Pelanggan</span></a></li>
      <?php } ?>
      <?php if(in_array($this->session->userdata('jabatan'), array('ADMIN','PEMBELIAN'))){ ?>
      <li><a href="<?= base_url() ?>supplier"><i class="fa fa-industry"></i> <span>Data Supplier</span></a></li>
      <?php } ?>
      <?php if(in_array($this->session->userdata('jabatan'), array('ADMIN'))){ ?>
      <li><a href="<?= base_url() ?>user"><i class="fa fa-graduation-cap"></i> <span>Data User</span></a></li>
      <?php } ?>
      <?php if(in_array($this->session->userdata('jabatan'), array('ADMIN','PEMBELIAN','PENJUALAN'))){ ?>
      <li class="treeview">
        <a href="#">
          <i class="fa fa-book"></i> <span>Laporan</span>
          <span class="pull-right-container">
            <i class="fa fa-angle-left pull-right"></i>
          </span>
        </a>
        <ul class="treeview-menu">
          <?php if(in_array($this->session->userdata('jabatan'), array('ADMIN','PEMBELIAN'))){ ?>
          <li><a href="<?= base_url() ?>laporan_pembelian"><i class="fa fa-circle-o"></i> Laporan Pembelian</a></li>
          <?php } ?>
          <?php if(in_array($this->session->userdata('jabatan'), array('ADMIN','PENJUALAN'))){ ?>
          <li><a href="<?= base_url() ?>laporan_penjualan"><i class="fa fa-circle-o"></i> Laporan Penjualan</a></li>
          <?php } ?>
        </ul>
      </li>
      <?php } ?>
    </ul>
  </section>
  <!-- /.sidebar -->
</aside>
