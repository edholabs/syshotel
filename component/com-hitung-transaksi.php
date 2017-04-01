<?php

// Hitung Transaksi Kamar

$checkin=date_create($transaksi_kamar['tanggal_checkin']);

$checkout=date_create($transaksi_kamar['tanggal_checkout']);

$durasi=date_diff($checkin,$checkout)->format('%a');

$subtotal_kamar=$durasi * $transaksi_kamar['harga_malam'];

$subtotal=$subtotal_kamar;

$sublayanan=$subtotal_layanan;

$grand_total=$subtotal - $transaksi_kamar['diskon'] - $transaksi_kamar['deposit'] + $sublayanan;

?>