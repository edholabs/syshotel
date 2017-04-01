<?php

// List & View Kamar
$kamar_booking=$database->select('kamar_booking',[
	'[><]kamar_tipe'=>'id_kamar_tipe'
	],[
	'kamar_booking.id_kamar_booking',
	'kamar_booking.no_kamar_booking',
	'kamar_booking.status_booking',
	'kamar_tipe.id_kamar_tipe',
	'kamar_tipe.harga_malam',
	'kamar_tipe.harga_orang',
	'kamar_tipe.nama_kamar_tipe'
	],[
	'ORDER'=>'no_kamar_booking'
	]);


$total_kamar=$database->count('kamar_booking');

$kamar_tersedia_booking=$database->select('kamar_booking',[
	'[><]kamar_tipe'=>'id_kamar_tipe'
	],[
	'kamar_booking.id_kamar_booking',
	'kamar_booking.no_kamar_booking',
	'kamar_booking.status_booking',
	'kamar_tipe.id_kamar_tipe',
	'kamar_tipe.harga_malam',
	'kamar_tipe.harga_orang',
	'kamar_tipe.nama_kamar_tipe'
	],[
	'ORDER'=>'no_kamar_booking',
	'status_booking'=>'TERSEDIA'
	]);


$total_tersedia_booking=$database->count('kamar_booking',['status_booking'=>'TERSEDIA']);

$kamar_terpakai_booking=$database->select('kamar_booking',[
	'[><]kamar_tipe'=>'id_kamar_tipe'
	],[
	'kamar_booking.id_kamar_booking',
	'kamar_booking.no_kamar_booking',
	'kamar_booking.status_booking',
	'kamar_tipe.id_kamar_tipe',
	'kamar_tipe.harga_malam',
	'kamar_tipe.harga_orang',
	'kamar_tipe.nama_kamar_tipe'
	],[
	'ORDER'=>'no_kamar_booking',
	'status_booking'=>'BOOKING'
	]);

$total_terpakai_booking=$database->count('kamar_booking',['status_booking'=>'BOOKING']);

if(!empty($_GET['kamar'])){

	$view_kamar_booking=$database->get('kamar_booking',[
		'[><]kamar_tipe'=>'id_kamar_tipe'
		],[
		'kamar_booking.id_kamar_booking',
		'kamar_booking.no_kamar_booking',
		'kamar_booking.status_booking',
		'kamar_tipe.id_kamar_tipe',
		'kamar_tipe.harga_malam',
		'kamar_tipe.nama_kamar_tipe'
		],[
		'id_kamar_booking'=>$_GET['kamar'],
		]);
}

if(isset($_POST['booking-cek'])) {

	$booking_transaksi_kamar=$database->select('kamar_booking',[
		'[><]kamar_tipe'=>'id_kamar_tipe',
		],[
		'kamar_booking.id_kamar_booking',
		'kamar_booking.no_kamar_booking',
		'kamar_booking.status_booking',
		'kamar_tipe.id_kamar_tipe',
		'kamar_tipe.harga_malam',
		'kamar_tipe.harga_orang',
		'kamar_tipe.nama_kamar_tipe'
		],[
		'ORDER'=>'no_kamar_booking',
		]);
}

// Tambah Kamar Booking & Tipe Kamar
if(isset($_POST['kamar-booking-add'])){

	$database->insert('kamar_booking',[
		'no_kamar_booking'=>$_POST['no_kamar_booking'],
		'id_kamar_tipe'=>$_POST['id_kamar_tipe'],
		'status_booking'=>'TERSEDIA'
		]);
}

// ubah status kamar booking
if(isset($_POST['status-kamar-booking'])){

	$database->update('kamar_booking',[
		'no_kamar_booking'=>$_POST['no_kamar_booking'],
		'id_kamar_tipe'=>$_POST['id_kamar_tipe'],
		'status_booking'=>$_POST['status_booking']
		],[
		'id_kamar_booking'=>$_POST['id_kamar_booking']
		]);

	$alert='Anda berhasil melakukan perubahan pada kamar '.$_POST['no_kamar_booking'];
}


// Hapus Kamar & Tipe Kamar
if(isset($_POST['kamar-del'])){

	$database->delete('kamar_booking',['id_kamar_booking'=>$_POST['id_kamar_booking']]);

	$alert='Anda telah berhasil melakukan pengapusan kamar';
}



?>
