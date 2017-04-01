<?php

// Hitung Transaksi Kamar wni

$checkin=date_create($transaksi_kamar_wni['tanggal_checkin']);

$checkout=date_create($transaksi_kamar_wni['tanggal_checkout']);

$durasi=date_diff($checkin,$checkout)->format('%a');

$subtotal_kamar=$durasi * $transaksi_kamar_wni['harga_malam'];

$subtotal=$subtotal_kamar;

$sublayanan=$subtotal_layanan;

$grand_total=$subtotal - $transaksi_kamar_wni['diskon'] - $transaksi_kamar_wni['deposit'] + $sublayanan;

?>