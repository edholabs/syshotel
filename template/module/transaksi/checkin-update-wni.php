<?php 

include('component/com-kamar.php');

include('component/com-tamu-wni.php');

include('component/com-transaksi.php');

?>

<section class="content-header">
	<h1>Check In <span class="small">Input data tamu</span></h1>
</section>

<section class="content">
	<div class="box">
		<?php if(isset($_POST['checkin-update'])) { ?>
		<div class="alert alert-success">
			<h4>Berhasil</h4>
			Sukses melakukan check-in pada kamar nomor : <?php echo $kamar_view['nomor_kamar']; ?>. 
			<a href="?module=transaksi/checkin-list"><b>Kembali</b></a>
		</div>
		<?php } else { ?>
		<div class="box-header">
			<h3 class="box-title">KAMAR NOMOR : <b><?php echo $kamar_view['nomor_kamar']; ?></b></h3>
		</div>
		<form action="" method="post">
			<div class="box-body">
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							<label># INVOICE</label>
							<input class="form-control" name="nomor_invoice" value="<?php echo $transaksi_kamar_wni['nomor_invoice']; ?>"readonly  />
						</div>
						<div class="alert alert-info">
							<h4><?php echo $kamar_view['nama_kamar_tipe']; ?></h4>
							<ul class="list-unstyled">
								<li>Harga / Malam : <b>Rp <?php echo number_format($kamar_view['harga_malam']); ?></b></li>
								<li>Maximal Orang Dewasa : <b><?php echo $kamar_view['max_dewasa']; ?> Orang</b></li>
								<li>Maximal Anak-anak : <b><?php echo $kamar_view['max_anak']; ?> Orang</b></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label>Nama Tamu</label>
							<input class="form-control" value="<?php echo $transaksi_kamar_wni['nama_lengkap_wni']; ?>" readonly />
							<select class="form-control nama_lengkap_wni" name="id_tamu_wni">
								<option selected="selected" value="<?php echo $transaksi_kamar_wni['id_tamu_wni']; ?>">--Pilih--</option>
								<?php foreach($tamu_wni as $tamu_wni) { ?>
								<option value="<?php echo $tamu_wni['id_tamu_wni']; ?>">
									<?php echo $tamu_wni['nama_lengkap_wni']; ?>
								</option>
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="form-group">
							<label>Jumlah Tamu</label>
							<div class="row">
								<div class="col-sm-6">
									<input class="form-control" value="<?php echo $transaksi_kamar_wni['jumlah_dewasa'].' Orang Dewasa'; ?>" readonly />
									<select class="form-control" name="jumlah_dewasa">
										<option value="<?php echo $transaksi_kamar_wni['jumlah_dewasa']; ?>">- Dewasa -</option>
										<option value="1">1 Orang</option>
										<option value="2">2 Orang</option>
										<option value="3">3 Orang</option>
										<option value="4">4 Orang</option>
										<option value="5">5 Orang</option>
									</select>
								</div>
								<div class="col-sm-6">
									<input class="form-control" value="<?php echo $transaksi_kamar_wni['jumlah_anak'].' Anak-anak'; ?>" readonly />
									<select class="form-control" name="jumlah_anak">
										<option value="<?php echo $transaksi_kamar_wni['jumlah_anak']; ?>">- Anak-anak -</option>
										<option value="1">1 Orang</option>
										<option value="2">2 Orang</option>
										<option value="3">3 Orang</option>
										<option value="4">4 Orang</option>
										<option value="5">5 Orang</option>
									</select>
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Tanggal / Waktu Check-In</label>
							<div class="row">
								<div class="col-sm-6">
									<input id="checkin" class="form-control" name="tanggal_checkin" data-date-format="yyyy-mm-dd" value="<?php echo $transaksi_kamar_wni['tanggal_checkin']; ?>"readonly  />
								</div>
								<div class="col-sm-6">
									<input class="form-control" name="waktu_checkin" value="<?php echo $transaksi_kamar_wni['waktu_checkin']; ?>"readonly  />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Tanggal / Waktu Check-Out</label>
							<div class="row">
								<div class="col-sm-6">
									<input id="checkout" class="form-control" name="tanggal_checkout" data-date-format="yyyy-mm-dd" value="<?php echo $transaksi_kamar_wni['tanggal_checkout']; ?>" />
								</div>
								<div class="col-sm-6">
									<input class="form-control" name="waktu_checkout" value="<?php echo $transaksi_kamar_wni['waktu_checkout']; ?>" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Jumlah Deposit (Rp)</label>
							<input class="form-control" name="deposit" value="<?php echo $transaksi_kamar_wni['deposit']; ?>" />
						</div>
						<div class="form-group">
							<label>Diskon (Rp)</label>
							<input class="form-control" name="diskon" value="<?php echo $transaksi_kamar_wni['diskon']; ?>" />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<input type="hidden" name="id_kamar" value="<?php echo $transaksi_kamar_wni['id_kamar']; ?>" />
				<input type="hidden" name="id_transaksi_kamar" value="<?php echo $transaksi_kamar_wni['id_transaksi_kamar']; ?>" />
				<button class="btn btn-success" type="submit" name="checkin-update">Ubah Data</button>
				<a class="btn btn-warning" href="?module=transaksi/checkin-list">Batal</a>
			</div>
		</form>
		<?php } ?>
	</div>
</section>