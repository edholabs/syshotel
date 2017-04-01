<?php
include('component/com-kamar-booking.php');

?>
<section class="content-header">
	<h1>Ubah Status Kamar Booking<span class="small"></br></span></h1>
</section>

<section class="content">
	<?php if(isset($_POST['status-kamar-booking'])) { ?>
	<div class="alert alert-success">
		<h4>Berhasil</h4>
		Anda berhasil melakukan perubahan kamar Booking. 
		<a href="?module=kamar/list-kamar-booking">Kembali</a>
	</div>
	<?php } else { ?>
	<form action="" method="post">
		<div class="box">
			<div class="box-body">
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label>Nomor Kamar</label>
							<input class="form-control" name="no_kamar_booking" value="<?php echo $view_kamar_booking['no_kamar_booking']; ?>" readonly />
						</div>
						<div class="form-group">
							<label>Tipe Kamar</label>
							<input class="form-control" value="<?php echo $view_kamar_booking['nama_kamar_tipe']; ?>" disabled />
							<select class="form-control" name="id_kamar_tipe">
								<option value="<?php echo $view_kamar_booking['id_kamar_tipe']; ?>">Hanya Untuk Admin</option>
								<?php foreach ($kamar_tipe as $kamar_tipe) { ?>
								
								<?php } ?>
							</select>
					</div>
					
							<label>Status Kamar</label>
							<input class="form-control" value="<?php echo $view_kamar_booking['status_booking']; ?>" disabled />

							<select class="form-control" name="status_booking">
								<option value="<?php echo $view_kamar_booking['status_booking']; ?>">-- Pilih --</option>
								<option value="TERSEDIA">TERSEDIA</option>
								<option value="BOOKING">BOOKING</option>
							</select>
							</div>
						</div>
					</div>
			<div class="box-footer">
				<input type="hidden" name="id_kamar_booking" value="<?php echo $view_kamar_booking['id_kamar_booking']; ?>" />
				<button class="btn btn-success" type="submit" name="status-kamar-booking">Update Status Kamar</button>
				<a class="btn btn-warning" href="index.php">Batal</a>
			</div>
		</div>
	</form>
	<?php } ?>
</content>