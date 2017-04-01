<?php

include('component/com-transaksi.php');

include('component/com-kamar.php');

?>

<section class="content-header">
	<center><font size="4"><font color="black"><b>CHECKOUT TAMU WARGA NEGARA ASING</b></font></font></center>
</section>

<section class="content">
	<div class="box">
		<div class="box-body">
			<?php if(!empty($tamu_inhouse)) { ?>
			<div class="row">
				<?php foreach($tamu_inhouse as $tamu_inhouse) { ?>
				<div class="col-sm-3">
					<div class="small-box bg-red">
						<div class="inner">
							<h3><?php echo $tamu_inhouse['nomor_kamar']; ?></h3>
							<p><?php echo $tamu_inhouse['nama_kamar_tipe']; ?></p>
							
							<p><?php echo $tamu_inhouse['prefix'].'. '.$tamu_inhouse['nama_tamu']; ?></p>

						</div>
						<div class="icon">
							<i class="fa fa-bed"></i>
						</div>
						<a class="small-box-footer" href="?module=transaksi/checkout-proses&transaksi=<?php echo $tamu_inhouse['id_transaksi_kamar']; ?>">Pilih Kamar</a>
					</div>
				</div>
				<?php } ?>
			</div>
			<?php } else { ?>
			<div class="alert alert-warning">
				<h4>Mohon Maaf</h4>
				Untuk sementara, tidak ada kamar yang terpakai.
			</div>
			<?php } ?>
		</div>
	</div>
</section> </br>

<?php

include('component/com-transaksi.php');

include('component/com-kamar.php');

?>
<center><font size="4"><font color="black"><b>CHECKOUT TAMU WARGA NEGARA INDONESIA</b></font></font></center>
<section class="content">
	<div class="box">
		<div class="box-body">
			<?php if(!empty($tamu_inhouse_wni)) { ?>
			<div class="row">
				<?php foreach($tamu_inhouse_wni as $tamu_inhouse_wni) { ?>
				<div class="col-sm-3">
					<div class="small-box bg-red">
						<div class="inner">
							<h3><?php echo $tamu_inhouse_wni['nomor_kamar']; ?></h3>
							<p><?php echo $tamu_inhouse_wni['nama_kamar_tipe']; ?></p>
							
						<p><?php echo $tamu_inhouse_wni['nama_lengkap_wni']; ?></p>
						</div>
						<div class="icon">
							<i class="fa fa-bed"></i>
						</div>
						<a class="small-box-footer" href="?module=transaksi/checkout-proses-wni&transaksi=<?php echo $tamu_inhouse_wni['id_transaksi_kamar']; ?>">Pilih Kamar</a>
					</div>
				</div>
				<?php } ?>
			</div>
			<?php } else { ?>
			<div class="alert alert-warning">
				<h4>Mohon Maaf</h4>
				Untuk sementara, tidak ada kamar yang terpakai.
			</div>
			<?php } ?>
		</div>
	</div>
</section>
