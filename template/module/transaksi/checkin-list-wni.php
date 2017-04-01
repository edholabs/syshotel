<?php

include('component/com-transaksi.php')

?>
<link href="template/bootstrap/css/footable.core.css" rel="stylesheet" type="text/css" />
	<link href="template/bootstrap/css/footable.metro.css" rel="stylesheet" type="text/css" />
	<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap.no-icons.min.css" rel="stylesheet">
	<script type="text/javascript" async="" src="template/bootstrap/search/search.js"></script>
<section class="content-header">
	<h1>Tamu In-House<p> <span class="small">Daftar Tamu Indonesia Yang Menginap</span></h1>
</section>

<section class="content">
	<div class="box">
		<div class="box-body">
			<?php if(!empty($tamu_inhouse_wni)) { ?>
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
					<?php foreach($tamu_inhouse_wni as $tamu_inhouse_wni) { ?>
					<tr>
						<td><?php echo date('d M Y'); ?></td>
						<td><?php echo $tamu_inhouse_wni['nomor_kamar']; ?></td>
						<td><?php echo $tamu_inhouse_wni['nama_lengkap_wni']; ?></td>
						<td><?php echo $tamu_inhouse_wni['tanggal_checkin']; ?></td>
						<td><?php echo $tamu_inhouse_wni['tanggal_checkout']; ?></td>
						<td>Rp <?php echo number_format($tamu_inhouse_wni['deposit']); ?></td>
						<td><a class="btn btn-xs btn-primary" href="?module=transaksi/checkin-update-wni&transaksi=<?php echo $tamu_inhouse_wni['id_transaksi_kamar']; ?>&kamar=<?php echo $tamu_inhouse_wni['id_kamar']; ?>">Ubah Durasi</a></td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			<?php } else { ?>
			<div class="alert alert-warning">
				<h4>Mohon maaf</h4>
				Untuk sementara tidak ada tamu indonesia yang sedang menginap.
			</div>
			<?php } ?>
		</div>
	</div>
</section>