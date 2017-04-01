<?php

include('component/com-kamar-booking.php');

?>
<script>
function printContent(el){
    var restorepage = document.body.innerHTML;
    var printcontent = document.getElementById(el).innerHTML;
    document.body.innerHTML = printcontent;
    window.print();
    document.body.innerHTML = restorepage;
}
</script>
<section class="content-header">
	<h1>LIHAT KAMAR BOOKING SESUAI TANGGAL TERSEDIA</h1>
</section>

<section class="content">
	<form action="" method="post">
		<div class="row">
			<div class="col-sm-3">
				<div class="form-group">
					<input id="checkin" data-date-format="yyyy-mm-dd" class="form-control" name="tanggal-start" placeholder="TANGGAL KAMAR TERSEDIA" />
				</div>
			</div>
			<div class="col-sm-3">
				<button class="btn btn-success" type="submit" name="booking-cek">Lihat Kamar</button>
				
			</div>
		</div>
	</form>
	<?php if(isset($_POST['booking-cek'])) { ?>

	<div class="box">
		<div class="box-body">
		<div class="row">
				<?php foreach($kamar_tersedia_booking as $kamar_tersedia_booking) { ?>
				<div class="col-sm-3">
					<div class="small-box bg-blue">
						<div class="inner">
							<h3><?php echo $kamar_tersedia_booking['no_kamar_booking']; ?></h3>
							<p><?php echo $kamar_tersedia_booking['nama_kamar_tipe']; ?></p>
						</div>
						<div class="icon">
							<i class="fa fa-bed"></i>
						</div>
						<a class="small-box-footer" href="?module=transaksi/booking-add&kamar=<?php echo $kamar_tersedia_booking['id_kamar_booking']; ?>">Pilih Kamar</a>
					</div>
				</div>
				<?php } ?>
				</tbody>
				<tfoot>
				

				</tfoot>
	</div>
	</div>
	<?php } ?>
</section>
