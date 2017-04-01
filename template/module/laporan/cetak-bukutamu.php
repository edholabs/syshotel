<?php

include('component/com-tamu.php');

?>

<section class="content-header">
	<h1>Buku Tamu <span class="small">Daftar Buku Tamu Warga Negara Asig</span></h1>
</section>

<section class="content">
	<div class="box">
	<div class="box-body">
			<table class="table table-striped table-hover">
		
				<thead>
					<tr>
						<th>Full Name</th>
						<th>Nationality</th>
						<th>Date Of Birth</th>
						<th>Indentitas</th>
						<th>Passport Number</th>
						<th>Valid Until</th>
						<th>Proffesion</th>
						<th>Visum</th>
						<th>Destination</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($tamu as $tamu) { ?>
					<tr>
						<td><?php echo $tamu['prefix'].'. '.$tamu['nama_tamu']; ?></td>
						<td><?php echo $tamu['warga_negara']; ?></td>
						<td><?php echo $tamu['tgl_lahir']; ?></td>
						<td><?php echo $tamu['tipe_identitas']; ?></td>
						<td><?php echo $tamu['nomor_identitas']; ?></td>
						<td><?php echo $tamu['tgl_identi']; ?></td>
						<td><?php echo $tamu['pekerjaan']; ?></td>
						<td><?php echo $tamu['jenis_visa']; ?></td>
						<td><?php echo $tamu['tujuan_wisata']; ?></td>
						<td>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</section>