<?php

include('component/com-tamu.php');

include('component/com-transaksi.php');

?>
<html>
	<link href="template/bootstrap/css/footable.core.css" rel="stylesheet" type="text/css" />
	<link href="template/bootstrap/css/footable.metro.css" rel="stylesheet" type="text/css" />
	<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap.no-icons.min.css" rel="stylesheet">
	<script type="text/javascript" async="" src="template/bootstrap/search/search.js"></script>
<section class="content-header">
	<h1>Buku Tamu Asing <span class="small">Daftar Buku Tamu Asing</span></h1>
</section>

<section class="content">
	<div class="box">
		<div class="box-header">
			<a class="btn btn-info" href="?module=tamu/tamu-add">Tambah Tamu Asing</a>
		</div>
	<body>
	<div class="box-body">
	<input type="search" class="light-table-filter" data-table="footable" placeholder="Cari Tamu" />
	 <table class="footable">
		
				<thead>
					<tr>
						<th>Full Name</th>
						<th>Nationality</th>
						<th>Passport Number</th>
						<th>Valid Util</th>
						<th>Proffession</th>
						<th>Visum</th>
						<th>Destination</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($tamu as $tamu) { ?>
					<tr>
						<td><?php echo $tamu['prefix'].'. '.$tamu['nama_tamu']; ?></td>
						<td><?php echo $tamu['warga_negara']; ?></td>
						<td><?php echo $tamu['nomor_identitas']; ?></td>
						<td><?php echo $tamu['tgl_identi']; ?></td>
						<td><?php echo $tamu['pekerjaan']; ?></td>
						<td><?php echo $tamu['jenis_visa']; ?></td>
						<td><?php echo $tamu['tujuan_wisata']; ?></td>
						<td>
							<a class="btn btn-xs btn-info" href="?module=tamu/tamu-update&tamu=<?php echo $tamu['id_tamu']; ?>">Update</a>
						</td>
					</tr>
					<?php } ?>

				</tbody>
			</table>
		</div>
	</div>
</section>

    </html>