<?php

include('component/com-laporan.php');


?>
<div class="col-sm-6">
		<b>Tanggal Terbit :</b><br/>
		<span class="lead"><?php echo date('d M Y'); ?></span>
	</div>
</div>
<div class="box">
		<div class="box-body">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th>Tanggal Transaksi</th>
						<th>Operator</th>
						<th>Nomor Invoice</th>
						<th>Tipe Kamar</th>
						<th>No Kamar</th>
						<th>Keterangan</th>
						<th>Total Biaya Kamar</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($laporan_transaksi as $laporan_transaksi) { ?>
					<tr>
						<td><?php echo $laporan_transaksi['tanggal']; ?></td>
						<td><?php echo $laporan_transaksi['nama']; ?></td>
						<td><?php echo $laporan_transaksi['nomor_invoice']; ?></td>
						<td><?php echo $laporan_transaksi['nama_kamar_tipe']; ?></td>
						<td><?php echo $laporan_transaksi['nomor_kamar']; ?></td>
						<td><?php echo $laporan_transaksi['status']; ?></td>
						<td>Rp <?php echo number_format($laporan_transaksi['total_biaya_kamar']); ?></td>
					</tr>
					<?php } ?>
				</tbody>
				<tfoot>
					<tr>
						<td colspan="3"><span class="lead">Total Pendapatan : <b>Rp <?php echo number_format($total_laporan_transaksi); ?></b></span></td>
					</tr>
				</tfoot>
			</table>
		</div>
	</div>
