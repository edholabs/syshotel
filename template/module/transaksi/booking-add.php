<?php 

include('component/com-kamar-booking.php');

include('component/com-booking.php');

?>

<script language="javascript">
    function hanyaAngka(e, decimal) { 
    var key;
    var keychar;
     if (window.event) {
         key = window.event.keyCode;
     } else
     if (e) {
         key = e.which;
     } else return true;
    
    keychar = String.fromCharCode(key);
    if ((key==null) || (key==0) || (key==8) ||  (key==9) || (key==13) || (key==27) ) {
        return true;
    } else 
    if ((("0123456789").indexOf(keychar) > -1)) {
        return true; 
    } else 
    if (decimal && (keychar == ".")) {
        return true; 
    } else return false; 
    }
</script>
<section class="content-header">
	<h1>Booking HMS Input data tamu</span></h1>
</section>

<section class="content">
	<div class="box">
		<?php if(isset($_POST['booking'])) { ?>
		<div class="alert alert-success">
			<h4>Berhasil</h4>
			Sukses melakukan booking pada kamar nomor : <?php echo $view_kamar_booking['no_kamar_booking']; ?>. 
			<a href="?module=transaksi/booking"><b>Kembali</b></a>
		</div>
		<?php } else { ?>
		<div class="box-header">
			<h3 class="box-title">KAMAR NOMOR : <b><?php echo $view_kamar_booking['no_kamar_booking']; ?></b></h3>
		</div>
		<form action="" method="post">
			<div class="box-body">
				<div class="row">
					<div class="col-sm-3">
						<div class="form-group">
							
						</div>
						<div class="alert alert-error">
							<h4><?php echo $view_kamar_booking['nama_kamar_tipe']; ?></h4>
							<ul class="list-unstyled">
								<li>Harga / Malam : <b>Rp <?php echo number_format($view_kamar_booking['harga_malam']); ?></b></li>
							</ul>
						</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label>Nama Tamu</label>
								<input class="form-control" name="nama_lengkap" required />
							</select>
						</div>
					</div>

					<div class="col-sm-5">
						<div class="form-group">
						<div class='row'>
							<label>Booking via (WEBSITE,TRAVELOKA,TELEPON DAN AGODA)</label>
							<textarea class="form-control" name="keterangan"></textarea>
						</div>
					</div>
					</div>
					<div class="col-sm-3">
						<div class="form-group">
							<label>No Telepon</label>
								<input class="form-control" name="notlp_booking" onkeypress="return hanyaAngka(event, false)" required />
							</select>
						</div>
					</div>	
					<div class="col-sm-3">
						<div class="form-group">
						<div class="row">
							<label>Warga Negara</label>
								<input class="form-control" name="warga_negara" required />
							</select>
						</div>
					</div>
					</div>				
					<div class="col-sm-5">
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">

								</div>
								<div class="col-sm-6">
									
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Tanggal Booking</label>
							<div class="row">
								<div class="col-sm-6">
									<input id="checkin" class="form-control" name="tanggal_checkin" data-date-format="yyyy-mm-dd" />
								</div>
							</div>
						</div>
				
						<div class="form-group">
							<label>Jumlah Deposit (Rp)</label>
							<input class="form-control" name="deposit" required />
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<input type="hidden" name="id_kamar_booking" value="<?php echo $view_kamar_booking['id_kamar_booking']; ?>" />
				<button class="btn btn-success" type="submit" name="booking">Booking</button>
				<a class="btn btn-warning" href="?module=transaksi/booking">Batal</a>
			</div>
		</form>
		<?php } ?>
	</div>
</section>
