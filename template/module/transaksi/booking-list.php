<?php

include('component/com-booking.php')

?>
<link href="template/bootstrap/css/footable.core.css" rel="stylesheet" type="text/css" />
	<link href="template/bootstrap/css/footable.metro.css" rel="stylesheet" type="text/css" />
	<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap.no-icons.min.css" rel="stylesheet">
	<script type="text/javascript" async="" src="template/bootstrap/search/search.js"></script>
<section class="content-header">
<section class="content-header">
	<h1>Tamu Booking<p><span class="small">Daftar tamu yang Booking</span></h1>
</section>

<section class="content">
	<div class="box">
	<div class="table-responsive">
		<div class="box-body">
			<?php if(!empty($tamu_booking)) { ?>
			<input type="search" class="light-table-filter" data-table="footable" placeholder="CARI TAMU BOOKING" />
	 <table class="footable">
				<thead>
					<tr>
					    <th>Tgl</th>
					    <th>Nama Tamu</th>
						<th>No Telp</th>
						<th>Warga Negara</th> 
						<th>No Kamar</th>
						<th>Jenis Kamar</th>
						<th>Harga Kamar</th>
						<th>Tgl Check-In</th>
						<th>Deposit</th>
						<th>Booking via</th>
						<th>Status</th>
						<th></th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($tamu_booking as $tamu_booking) { ?>
					<tr>
						<td><?php echo date('d M Y'); ?></td>
						<td><?php echo $tamu_booking['nama_lengkap']; ?></td>
						<td><?php echo $tamu_booking['notlp_booking']; ?></td>
						<td><?php echo $tamu_booking['warga_negara']; ?></td>
						<td><?php echo $tamu_booking['no_kamar_booking']; ?></td>
						<td><?php echo $tamu_booking['nama_kamar_tipe']; ?></td>
						<td><?php echo $tamu_booking['harga_malam']; ?></td>

						<td><?php echo $tamu_booking['tanggal_checkin']; ?></td>
						<td>Rp <?php echo number_format($tamu_booking['deposit']); ?></td>
						<td><?php echo $tamu_booking['keterangan']; ?></td>
						<td>
						<?php
						{
								$status='red';
							}
								?>
						<span class="badge bg-<?php echo $status; ?>"><?php echo $tamu_booking['status']; ?></span></td>
						 <td>
        <a class="glyphicon glyphicon-check" type="button" href="?module=transaksi/booking-delete&transaksi=<?php echo $tamu_booking['id_booking_kamar']; ?>"></a>
      </td>

					</tr>
					<?php } ?>
				</tbody>
			</table>
			<?php } else { ?>
			<div class="alert alert-warning">
				<h4>Mohon maaf</h4>
				Untuk sementara tidak ada tamu yang Booking
			</div>
			<?php } ?>
		</div>
	</div>
</section>
