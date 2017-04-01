<?php

include('component/com-transaksi.php');

include('component/com-hitung-transaksi.php');

?>

<div class="row">
	<div class="col-sm-6">
		Ditujukan Kepada :
		<address>
			<strong><?php echo $transaksi_kamar['prefix'].'. '.$transaksi_kamar['nama_tamu']; ?></strong><br/>
			Home Address :&nbsp;<?php echo $transaksi_kamar['alamat_jalan']; ?><br/>
		</address>
	</div>
	<div class="col-sm-6">
		<b>NOMOR INVOICE : </b><br/>
		<span class="lead"><?php echo $transaksi_kamar['nomor_invoice']; ?></span><br/><br/>
		<b>Tanggal Terbit :</b><br/>
		<span class="lead"><?php echo date('d M Y'); ?></span>
	</div>
</div>

<h3>RINCIAN TAGIHAN</h3>
<table class="table table-bordered table-striped table-responsive">
	<thead>
		<tr>
			<th>Produk / Layanan</th>
			<th>No Kamar</th>
			<th>Harga</th>
			<th>Qty</th>
			<th>Total</th>
		</tr>
	</thead>
	<tbody>
		<tr>
			<td>Room Type : <?php echo $transaksi_kamar['nama_kamar_tipe']; ?></td>
			<td><?php echo number_format($transaksi_kamar['nomor_kamar']); ?></td>
			<td>Rp <?php echo number_format($transaksi_kamar['harga_malam']); ?></td>
			<td><?php echo $durasi; ?> Malam</td>
			<td>Rp <?php echo number_format($transaksi_kamar['total_biaya_kamar']); ?></td>
		</tr>
		<?php foreach($transaksi_layanan as $transaksi_layanan) { ?>
		<tr>
			<td><?php echo $transaksi_layanan['nama_layanan']; ?></td>
			<td>Rp <?php echo number_format($transaksi_layanan['harga_layanan']); ?></td>
			<td><?php echo $transaksi_layanan['jumlah'].'&nbsp;'.$transaksi_layanan['satuan']; ?></td>
			<td>Rp <?php echo number_format($transaksi_layanan['total']); ?></td>
		</tr>
		<?php } ?>
	</tbody>
</table>

<div class="row">
	<div class="col-sm-6">
		<p class="text-muted well well-sm no-shadow">
			<b>Catatan :</b> Harga sudah termasuk ppn 10%.Pihak hotel tidak akan melayani keluhan tamu yang tidak memiliki bukti pembayaran resmi oleh Pihak Hotel,terima kasih
		</p>
	</div>
	<div class="col-sm-6">
		<table class="table table-bordered table-responsive">
			<tr>
				<td><b>Sub Total</b></td>
				<td>Rp <?php echo number_format($subtotal); ?></td>
			</tr>
			<tr>
				<td>Diskon</td>
				<td>Rp <?php echo number_format($transaksi_kamar['diskon']); ?></td>
			</tr>
			<tr>
			<tr>
			<td>Deposit</td>
			<td>Rp <?php echo number_format($transaksi_kamar['deposit']); ?></td>
			</tr>
			<tr>
				<td><b>Grand Total</b></td>
				<td><b>Rp <?php echo number_format($grand_total); ?></b></td>
			</tr>
		</table>
	</div>
</div>
