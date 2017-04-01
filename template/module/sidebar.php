<aside class="main-sidebar">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
          <!-- Sidebar user panel -->
          <div class="user-panel">
            <div class="pull-left image">
              <img src="template/images/<?php echo $_SESSION['images']; ?>" class="img-circle" alt="User Image" />
            </div>
            <div class="pull-left info">
              <p><?php echo $_SESSION['nama']; ?></p>
              <span class="small"><?php echo date('l. d M Y'); ?></span>
              
            </div>
          </div>

          <!-- sidebar menu: : style can be found in sidebar.less -->
          <ul class="sidebar-menu">
            <li class="header">RESERVASI</li>
            <li>
              <a href="index.php">
                <i class="fa fa-dashboard"></i> <span>Dashboard</span>
              </a>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-key"></i>
                <span>Check In / Out</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?module=transaksi/checkin"><i class="fa fa-circle-o"></i> Check In</a></li>
                <li><a href="?module=transaksi/checkout"><i class="fa fa-circle-o"></i> Check Out</a></li>
                <li><a href="?module=transaksi/checkin-list"><i class="fa fa-circle-o"></i>Tamu WNA Menginap</a></li>
                <li><a href="?module=transaksi/checkin-list-wni"><i class="fa fa-circle-o"></i>Tamu WNI Menginap</a></li>
              </ul>
              <li class="treeview">
              <a href="#">
                <i class="fa fa-book"></i>
                <span>Room Services</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?module=transaksi/pesan-layanan"><i class="fa fa-circle-o"></i> Pesan Layanan / Produk</a></li>
                <li><a href="?module=kamar/kamar-kotor"><i class="fa fa-circle-o"></i> Pembersihan Kamar</a></li>
              </ul>
            </li>
            <li class="header">BOOKING | LAPORAN RESERVASI</li>
            <li>
             
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-phone-square"></i>
                <span>Reservasi Booking Dan Laporan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                 <li><a href="?module=transaksi/booking"><i class="fa fa-circle-o"></i>Booking</a></li>
                 <li><a href="?module=kamar/list-kamar-booking"><i class="fa fa-circle-o"></i> Ubah Status Kamar Booking</a></li>
                 <li><a href="?module=transaksi/booking-list"><i class="fa fa-circle-o"></i> Daftar Tamu Booking</a></li>
                <li><a href="?module=laporan/transaksi"><i class="fa fa-circle-o"></i> Transaksi Kamar</a></li>
              </ul>
            </li>
            <?php if($_SESSION['batasan']<=3) { ?>
            <li class="header">ADMINISTRASI HOTEL</li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-bed"></i>
                <span>Kamar</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?module=kamar/kamar-list"><i class="fa fa-circle-o"></i> Lihat Kamar</a></li>
                <li><a href="?module=kamar/kamar-add"><i class="fa fa-circle-o"></i> Tambah Kamar</a></li>
                <li><a href="?module=kamar/tipe-list"><i class="fa fa-circle-o"></i> Tipe Kamar</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-cutlery"></i>
                <span>Layanan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?module=layanan/layanan-list"><i class="fa fa-circle-o"></i> Lihat Layanan</a></li>
                <li><a href="?module=layanan/layanan-add"><i class="fa fa-circle-o"></i> Tambah Layanan</a></li>
                <li><a href="?module=layanan/kategori-list"><i class="fa fa-circle-o"></i> Kategori Layanan</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-suitcase"></i>
                <span>Buku Tamu WNA & WNI</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?module=tamu/tamu-list"><i class="fa fa-circle-o"></i> Lihat Tamu</a></li>
                <li><a href="?module=tamu/tamu-add"><i class="fa fa-circle-o"></i> Tambah Tamu Baru</a></li>
                <li><a href="?module=tamu/tamu-wni-add"><i class="fa fa-circle-o"></i> Tambah Tamu wni</a></li>
                 <li><a href="?module=tamu/tamu-wni-list"><i class="fa fa-circle-o"></i> Lihat Tamu Wni</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-user"></i>
                <span>User Manager</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?module=user/user-list"><i class="fa fa-circle-o"></i> Lihat Pengguna</a></li>
                <li><a href="?module=user/user-add"><i class="fa fa-circle-o"></i> Tambah User Baru</a></li>
              </ul>
            </li>
              <li class="treeview">
              <a href="#">
                <i class="fa fa-building"></i>
                <span>Hotel Management</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?module=perusahaan/perusahaan"><i class="fa fa-circle-o"></i> Lihat / Update Nama Hotel</a></li>
              </ul>
            </li>
            <li class="treeview">
              <a href="#">
                <i class="fa fa-bar-chart"></i>
                <span>Laporan</span>
                <i class="fa fa-angle-left pull-right"></i>
              </a>
              <ul class="treeview-menu">
                <li><a href="?module=laporan/transaksi"><i class="fa fa-circle-o"></i> Transaksi Kamar</a></li>
                <li><a href="?module=laporan/transaksi-layanan"><i class="fa fa-circle-o"></i> Transaksi Layanan</a></li>
                <li><a href="?module=laporan/cetak-bukutamu"><i class="fa fa-circle-o"></i> Daftar Buku Tamu</a></li>
              </ul>
            </li>
            <?php if($_SESSION['batasan']==1) { ?>
            <?php } } ?>
          </ul>
        </section>
        <!-- /.sidebar -->
      </aside>
