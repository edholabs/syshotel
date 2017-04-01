<?php
//booking view

$tamu_booking=$database->select('booking','*');

if(!empty($_GET['transaksi'])) {

        $booking_view=$database->get('booking','*',['id_booking_kamar'=>$_GET['transaksi']]);
}




// booking
$tamu_booking=$database->select('booking',[
	'[><]kamar_booking'=>'id_kamar_booking',
	'[><]kamar_tipe'=>'id_kamar_tipe'
	],[
	'booking.id_booking_kamar',
	'booking.id_kamar_booking',
	'booking.tanggal_checkin',
	'booking.deposit',
	'booking.nama_lengkap',
	'booking.keterangan',
	'booking.notlp_booking',
	'booking.warga_negara',
	'kamar_tipe.id_kamar_tipe',
	'kamar_tipe.nama_kamar_tipe',
	'kamar_tipe.harga_malam',
	'kamar_booking.id_kamar_booking',
	'kamar_booking.no_kamar_booking',
	'booking.status'

	],[
	'status'=>'BOOKING'
	]);

if(!empty($_GET['transaksi'])) {

	$booking=$database->get('booking',[
		'[><]kamar_booking'=>'id_kamar_booking',
		'[><]kamar_tipe'=>'id_kamar_tipe',
		],[
		'kamar_booking.id_kamar_booking',
		'kamar_booking.no_kamar_booking',
		'kamar_tipe.id_kamar_tipe',
		'kamar_tipe.nama_kamar_tipe',
		'kamar_tipe.harga_malam',
		'booking.nama_lengkap',
		'booking.keterangan',
		'booking.warga_negara',
		'booking.notlp_booking',
		'booking.id_booking_kamar',
		'booking.tanggal_checkin',
		'booking.deposit',
		],[
		'id_kamar_booking'=>$_GET['transaksi']
		]);
}


// booking In Tamu

if(isset($_POST['booking'])) {

	$tanggal_checkin=date_create($_POST['tanggal_checkin']);

	$database->insert('booking',[
		'id_user'=>$_SESSION['id_user'],
		'tanggal'=>date('Y-m-d'),
		'nama_lengkap'=>$_POST['nama_lengkap'],
		'keterangan'=>$_POST['keterangan'],
		'notlp_booking'=>$_POST['notlp_booking'],
		'warga_negara'=>$_POST['warga_negara'],
		'id_kamar_booking'=>$_POST['id_kamar_booking'],
		'tanggal_checkin'=>$_POST['tanggal_checkin'],
		'deposit'=>$_POST['deposit'],
		'status'=>'BOOKING'
		]);
$database->update('kamar_booking',[
		'status_booking'=>'BOOKING'
		],[
		'id_kamar_booking'=>$_POST['id_kamar_booking']
		]);
		
}

// Ubah Data Guest In House

if(isset($_POST['booking-update'])) {

	$tanggal_checkin=date_create($_POST['tanggal_checkin']);

	$database->update('booking',[
		'tanggal'=>date('Y-m-d'),
		'nama_lengkap'=>$_POST['nama_lengkap'],
		'keterangan'=>$_POST['keterangan'],
		'notlp_booking'=>$_POST['notlp_booking'],
		'warga_negara'=>$_POST['warga_negara'],
		'id_kamar_booking'=>$_POST['id_kamar_booking'],
		'tanggal_checkin'=>$_POST['tanggal_checkin'],
		'deposit'=>$_POST['deposit'],
		],[
		'id_booking_kamar'=>$_POST['id_booking_kamar']
		]);
}

//delete

if(isset($_POST['konfirmasi'])) {

	$database->delete('booking',['id_booking_kamar'=>$_POST['id_booking_kamar']]);


}


?>
