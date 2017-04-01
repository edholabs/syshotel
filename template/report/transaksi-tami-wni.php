<?php

include('component/com-transaksi.php');

include('component/com-hitung-transaksi-wni.php');

?>

<div class="row">
        <div class="col-sm-6">
                Ditujukan Kepada :
                <address>
                        <strong><?php echo $transaksi_kamar_wni['nama_lengkap_wni']; ?></strong><br/>
                        Home Address :&nbsp;<?php echo $transaksi_kamar_wni['alamat_jalan_wni']; ?><br/>
                </address>
        </div>
        <div class="col-sm-6">
                <b>NOMOR INVOICE : </b><br/>
                <span class="lead"><?php echo $transaksi_kamar_wni['nomor_invoice']; ?></span><br/><br/>
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
   			<th>Check IN</th>
			<th>Check Out</th>
                        <th>Qty</th>
                        <th>Total</th>
                </tr>
        </thead>
        <tbody>
                <tr>
<td>Room Type : <?php echo $transaksi_kamar_wni['nama_kamar_tipe']; ?></td>
                        <td><?php echo number_format($transaksi_kamar_wni['nomor_kamar']); ?></td>
                        <td>Rp <?php echo number_format($transaksi_kamar_wni['harga_malam']); ?></td>
			<td>Check In<?php echo $transaksi_kamar_wni['tanggal_checkin']; ?></td>
			<td>Check Out<?php echo $transaksi_kamar_wni['tanggal_checkout']; ?></td>
                        <td><?php echo $durasi; ?> Malam</td>
                        <td>Rp <?php echo number_format($transaksi_kamar_wni['total_biaya_kamar']); ?></td></tr>
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
                        <b>Catatan :</b> Harga sudah termasuk ppn 10%.Pihak hotel tidak akan melayani keluhan tamu yang tidak memiliki bukti pembayaran resmi oleh Piha$
                </p>
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
                                <td>Rp <?php echo number_format($transaksi_kamar_wni['diskon']); ?></td>
                        </tr>
                        <tr>
                        <tr>
                        <td>Deposit</td>
                        <td>Rp <?php echo number_format($transaksi_kamar_wni['deposit']); ?></td>
                        </tr>
                        <tr>
                                <td><b>Grand Total</b></td>
                                <td><b>Rp <?php echo number_format($grand_total); ?></b></td>
                        </tr>
                </table>
        </div>
</div>


