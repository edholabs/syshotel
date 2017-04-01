<?php

include('component/com-transaksi.php')

?>
<link href="template/bootstrap/css/footable.core.css" rel="stylesheet" type="text/css" />
	<link href="template/bootstrap/css/footable.metro.css" rel="stylesheet" type="text/css" />
	<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap.no-icons.min.css" rel="stylesheet">
	<script type="text/javascript" async="" src="template/bootstrap/search/search.js"></script>
<section class="content-header">
	<h1>Tamu In-House<p> <span class="small">Daftar tamu Asing yang sedang menginap</span></h1>
</section>

<section class="content">
	<div class="box">
		<div class="box-body">
			<?php if(!empty($tamu_inhouse)) { ?>
			<input type="search" class="light-table-filter" data-table="footable" placeholder="CARI TAMU" />
	 <table class="footable">
				<thead>
					<tr>
						<th>Tanggal</th>
						<th># Room</th>
						<th>Full Name</th>
						<th>Tanggal Check-In</th>
						<th>Tanggal Check-Out</th>
						<th>Jumlah Deposit</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($tamu_inhouse as $tamu_inhouse) { ?>
					<tr>
						<td><?php echo date('d M Y'); ?></td>
						<td><?php echo $tamu_inhouse['nomor_kamar']; ?></td>
						<td><?php echo $tamu_inhouse['prefix'].'. '.$tamu_inhouse['nama_tamu']; ?></td>
						<td><?php echo $tamu_inhouse['tanggal_checkin']; ?></td>
						<td><?php echo $tamu_inhouse['tanggal_checkout']; ?></td>
						<td>Rp <?php echo number_format($tamu_inhouse['deposit']); ?></td>
						<td><a class="btn btn-xs btn-primary" href="?module=transaksi/checkin-update&transaksi=<?php echo $tamu_inhouse['id_transaksi_kamar']; ?>&kamar=<?php echo $tamu_inhouse['id_kamar']; ?>">ubah durasi</a></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<?php } else { ?>
			<div class="alert alert-warning">
				<h4>Mohon maaf</h4>
				Untuk sementara tidak ada tamu Asing yang sedang menginap.
			</div>
			<?php } ?>
		</div>
	</div>
</section>