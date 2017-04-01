<?php

if(isset($_POST['laporan-transaksi'])) {

	$laporan_transaksi=$database->select('transaksi_kamar',[
		'[><]user'=>'id_user',
		'[><]kamar'=>'id_kamar',
		'[><]kamar_tipe'=>'id_kamar_tipe',
		],[
		'transaksi_kamar.id_transaksi_kamar',
		'transaksi_kamar.tanggal',
		'transaksi_kamar.nomor_invoice',
		'transaksi_kamar.total_biaya_kamar',
		'transaksi_kamar.status',
		'kamar.id_kamar',
		'kamar_tipe.nama_kamar_tipe',
		'kamar.nomor_kamar',
		'user.nama'
		],[
		'transaksi_kamar.tanggal[<>]'=>[$_POST['tanggal-start'],$_POST['tanggal-end']]
		]);

		$total_laporan_transaksi=$database->sum('transaksi_kamar','total_biaya_kamar',[
		'tanggal[<>]'=>[$_POST['tanggal-start'],$_POST['tanggal-end']]
		]);
}

//transaksi layanan


if(isset($_POST['laporan-layanan'])) {

	$laporan_layanan=$database->select('transaksi_layanan',[
		'[><]layanan'=>'id_layanan',
		'[><]user'=>'id_user',
		'[><]transaksi_kamar'=>'id_transaksi_kamar',
		'[><]kamar'=>'id_kamar'
		],[
		'transaksi_layanan.id_transaksi_layanan',
		'transaksi_layanan.tanggal',
		'transaksi_layanan.waktu',
		'transaksi_layanan.jumlah',
		'transaksi_layanan.total',
		'layanan.id_layanan',
		'layanan.nama_layanan',
		'layanan.satuan',
		'layanan.harga_layanan',
		'kamar.id_kamar',
		'kamar.nomor_kamar',
		'user.nama'
		],[
		'transaksi_layanan.tanggal[<>]'=>[$_POST['tanggal-start'],$_POST['tanggal-end']]
		]);

	$total_laporan_layanan=$database->sum('transaksi_layanan','total',[
		'tanggal[<>]'=>[$_POST['tanggal-start'],$_POST['tanggal-end']]
		]);
}

?>