<?php

include('component/com-booking.php');

?>

<section class="content-header">
	<h1>Hapus Tamu Booking</h1>
</section>

<section class="content">
	<?php if(isset($_POST['konfirmasi'])) { ?>
	<div class="alert alert-success">
		<h4>Berhasil</h4>
		Anda telah sukses melakukan penghapusan data Tamu booking <b><a href="?module=kamar/list-kamar-booking">Kembali Dan Ubah Status Kamar Booking</a></b>
	</div>
	<?php } else {?>
	<div class="alert alert-warning">
		<h4>Peringatan</h4>
		Bila Anda Sudah Menginput Data Tamu di Resevasi Hotel Silahkan Hapus Data Tamu Booking
		<br/><br/>
		<form action="" method="post">
			<input type="hidden" name="id_booking_kamar" value="<?php echo $booking_view['id_booking_kamar']; ?>" />
			<button class="btn btn-success" type="submit" name="konfirmasi">Ya! Hapus</button>
	</div>
	<?php } ?>
</section>
