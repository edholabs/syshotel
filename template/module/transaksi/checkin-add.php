<?php 

include('component/com-kamar.php');

include('component/com-tamu.php');

include('component/com-tamu-wni.php');

include('component/com-transaksi.php');

$nomor_invoice='INV-'.date('dmY').'-'.(rand(1,1000));

?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
  <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>

<section class="content-header">
	<h1>Check In <span class="small">Input data tamu</span></h1>
</section>

<section class="content">
	<div class="box">
		<?php if(isset($_POST['checkin'])) { ?>
		<div class="alert alert-success">
			<h4>Berhasil</h4>
			Sukses melakukan checkin pada kamar nomor : <?php echo $kamar_view['nomor_kamar']; ?>. 
			<a href="?module=transaksi/checkin"><b>Kembali</b></a>
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
							<input class="form-control" name="nomor_invoice" value="<?php echo $nomor_invoice; ?>" />
						</div>
						<div class="alert alert-info">
							<h4><?php echo $kamar_view['nama_kamar_tipe']; ?></h4>
							<ul class="list-unstyled">
								<li>Harga / Malam : <b>Rp <?php echo number_format($kamar_view['harga_malam']); ?></b></li>
								<li>Maximal Orang Dewasa : <b><?php echo $kamar_view['max_dewasa']; ?> Orang</b></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label>Nama Tamu Wna</label>
							<select class="form-control nama_tamu" name="id_tamu">
								<option selected="selected">Daftar Tamu Asing</option>
								<?php foreach($tamu as $tamu) { ?>
								<option value="<?php echo $tamu['id_tamu']; ?>">
									<?php echo $tamu['prefix'].'. '.$tamu['nama_tamu']; ?>
								</option>
								<?php } ?>
							</select>
						</div>
						</div>
							<div class="col-sm-3">
						<div class="form-group">
							<label>Nama Tamu Wni</label>
							<select class="form-control nama_tamu" name="id_tamu_wni">
								<option selected="selected">Daftar Tamu Asing</option>
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
									<select class="form-control" name="jumlah_dewasa">
										<option value="0">- Dewasa -</option>
										<option value="1">1 Orang</option>
										<option value="2">2 Orang</option>
										<option value="3">3 Orang</option>
										<option value="4">4 Orang</option>
										<option value="5">5 Orang</option>
									</select>
								</div>
								<div class="col-sm-6">
									<select class="form-control" name="jumlah_anak">
										<option value="0">- Anak-anak -</option>
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
									<input class="form-control" name="tanggal_checkin" value="<?php echo date('Y-m-d'); ?>" readonly />
								</div>
								<div class="col-sm-6">
									<input class="form-control" name="waktu_checkin" value="<?php echo date('H:i:a'); ?>" readonly />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Tanggal / Waktu Check-Out</label>
							<div class="row">
								<div class="col-sm-6">
									<input id="checkout" class="form-control" name="tanggal_checkout" data-date-format="yyyy-mm-dd" />
								</div>
								<div class="col-sm-6">
									<input class="form-control" name="waktu_checkout" value="12:00" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Jumlah Deposit (Rp)</label>
							<input class="form-control" name="deposit"/>
						</div>
						<div class="form-group">
							<label>Diskon (Rp)</label>
							<input class="form-control" name="diskon" />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<input type="hidden" name="id_kamar" value="<?php echo $kamar_view['id_kamar']; ?>" />
				<button class="btn btn-success" type="submit" name="checkin">Check In</button>
				<a class="btn btn-warning" href="index.php?">Batal</a>
			</div>
		</form>
		<?php } ?>
	</div>
</section>
</body>
</html>
