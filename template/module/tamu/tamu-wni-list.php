<?php

include('component/com-tamu-wni.php');

?>
<link href="template/bootstrap/css/footable.core.css" rel="stylesheet" type="text/css" />
	<link href="template/bootstrap/css/footable.metro.css" rel="stylesheet" type="text/css" />
	<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap.no-icons.min.css" rel="stylesheet">
	<script type="text/javascript" async="" src="template/bootstrap/search/search.js"></script>
<section class="content-header">
	<h1>Buku Tamu <span class="small">Administrasi tamu hotel</span></h1>
</section>

<section class="content">
	<div class="box">
		<div class="box-header">
			<a class="btn btn-info" href="?module=tamu/tamu-wni-add">Tambah Tamu Indonesia</a>
		</div>
	<div class="box-body">
			<input type="search" class="light-table-filter" data-table="footable" placeholder="CARI TAMU" />
	 <table class="footable">
		
				<thead>
					<tr>
						<th>Nama Tamu</th>
						<th>Tipe Indentitas</th>
						<th>No Indenti / No Hp</th>
						<th>Pekerjaan</th>
						<th>Alamat</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($tamu_wni as $tamu_wni) { ?>
					<tr>
						<td><?php echo $tamu_wni['nama_lengkap_wni']; ?></td>
						<td><?php echo $tamu_wni['tipe_identitas_wni']; ?></td>
						<td><?php echo $tamu_wni['nomor_identitas_wni']; ?></td>
						<td><?php echo $tamu_wni['pekerjaan_wni']; ?></td>
						<td><?php echo $tamu_wni['alamat_jalan_wni']; ?></td>
						<td>
							<a class="btn btn-xs btn-info" href="?module=tamu/tamu-wni-update&tamu=<?php echo $tamu_wni['id_tamu_wni']; ?>">Update</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</section>