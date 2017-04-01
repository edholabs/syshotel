<?php

include('component/com-kamar.php');

include('component/com-kamar-booking.php');

include('component/com-transaksi.php');

include('component/com-booking.php')

?>
<section class="content-header">
    <h1>Welcome <font color="red"><?php echo $_SESSION['nama']; ?>
                      <small><?php echo $_SESSION['jabatan']; ?></small></font></h1>
</section>
<MARQUEE BGCOLOR=black>
<font color="white">SELAMAT DATANG DI SYSTEM INFORMASI NEW MELATI HOTEL GORONTALO</font> |<font color="yellow">"Bekerja Lebih Keras Tidak Efektif Dari Bekerja  
                                    Lebih Pintar...!"</font> | <font color="red">JIKA ADA MASALAH HUBUNGI PROGRAMMER DEVELOPER root@edholabs.id / 085342365617 (edho)

</MARQUEE>
<section class="content">
    <div class="row">
        <div class="col-sm-3">
            <div class="small-box bg-blue">
                <div class="inner">
                    <h3><?php echo $total_terpakai_booking; ?></h3>
                    <p>Kamar Booking</p>
                </div>
                <div class="icon">
                    <i class="fa fa-hotel"></i>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="small-box bg-red">
                <div class="inner">
                    <h3><?php echo $total_terpakai; ?></h3>
                    <p>Kamar Terpakai</p>
                </div>
                <div class="icon">
                    <i class="fa fa-bed"></i>
                </div>
            </div>
        </div>
        <div class="col-sm-3">
            <div class="small-box bg-purple">
                <div class="inner">
                    <h3><?php echo $total_tersedia; ?></h3>
                    <p>Kamar Tersedia</p>
                </div>
                <div class="icon">
                    <i class="fa fa-bed"></i>
                </div>          
            </div>
        </div>
        <div class="col-sm-3">
            <div class="small-box bg-aqua">
                <div class="inner">
                    <h3><?php echo $total_kotor; ?></h3>
                    <p>Kamar Kotor</p>
                </div>
                <div class="icon">
                    <i class="fa fa-bed"></i>
                </div>
            </div>
        </div>
    </div>
    <div class="box">
        <div class="box-body">
        <div class="box-header">
            <a class="btn btn-info" href="?module=tamu/tamu-add">Tambah Tamu WNA</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-info" href="?module=tamu/tamu-wni-add">Tambah Tamu WNI</a>
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<a class="btn btn-info" href="?module=transaksi/booking-list">Daftar Tamu Booking</a> </div>
        <h4 class="box-title">KAMAR YANG TERSEDIA</h4>
            <?php if(!empty($kamar_tersedia)) { ?>
            <div class="row">
                <?php foreach($kamar_tersedia as $kamar_tersedia) { ?>
                <div class="col-sm-2">
                    <div class="small-box bg-purple">
                        <div class="inner">
                            <h3><?php echo $kamar_tersedia['nomor_kamar']; ?></h3>
                            <p><?php echo $kamar_tersedia['nama_kamar_tipe']; ?></p>
                        </div>
                        <div class="icon">
                            <i class="fa fa-bed"></i>
                        </div>
                        <a class="small-box-footer" href="?module=transaksi/checkin-add&kamar=<?php echo $kamar_tersedia['id_kamar']; ?>"></a>
                    </div>
                </div>
                <?php } ?>
            </div>
            <?php } else { ?>
            <div class="alert alert-warning">
                <h4>Mohon Maaf</h4>
                tidak ada kamar yang tersedia
            </div>
            <?php } ?>
        </div>
    </div>
    <div class="row">
        <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Daftar Tamu WNA Menginap</h3>
                </div>
                <div class="box-body">
                    <?php if(!empty($tamu_inhouse)) { ?>
                    <table class="table table-sriped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th># Room</th>
                                <th>Tanggal / Waktu Check-In</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($tamu_inhouse as $tamu_inhouse) { ?>
                            <tr>
                                <td><?php echo $tamu_inhouse['prefix'].'. '.$tamu_inhouse['nama_tamu']; ?></td>
                                <td><?php echo $tamu_inhouse['nomor_kamar']; ?></td>
                                <td><?php echo $tamu_inhouse['tanggal_checkin'].' - '.$tamu_inhouse['waktu_checkin']; ?></td>
                            </tr>
                            <?php } ?>

                        </tbody>
                    </table>

                    <?php } else { ?>
                    <div class="alert alert-warning">
                        <h4>Mohon maaf</h4>
                        tidak ada tamu yang Menginap.
                    </div>
                    <?php } ?>
                     <div class="row">
                     <div class="col-md-12">
            <div class="box">
                <div class="box-header with-border">
                    <h3 class="box-title">Daftar Tamu WNI Menginap</h3>
                </div>
                <div class="box-body">
                    <?php if(!empty($tamu_inhouse_wni)) { ?>
                    <table class="table table-sriped">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th># Room</th>
                                <th>Tanggal / Waktu Check-In</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($tamu_inhouse_wni as $tamu_inhouse_wni) { ?>
                            <tr>
                                <td><?php echo $tamu_inhouse_wni['nama_lengkap_wni']; ?></td>
                                <td><?php echo $tamu_inhouse_wni['nomor_kamar']; ?></td>
                                <td><?php echo $tamu_inhouse_wni['tanggal_checkin'].' - '.$tamu_inhouse_wni['waktu_checkin']; ?></td>
                            </tr>
                            <?php } ?>

                        </tbody>
                    </table>
                    <?php } else { ?>
                    <div class="alert alert-warning">
                        <h4>Mohon maaf</h4>
                        tidak ada tamu WNI yang Menginap.
                    </div>
                    </div>
                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
</section>
