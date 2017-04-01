<?php

//List & View Tamu

$tamu=$database->select('tamu','*');

if(!empty($_GET['tamu'])) {

	$tamu_view=$database->get('tamu','*',['id_tamu'=>$_GET['tamu']]);
}

//Insert Tamu

if(isset($_POST['tamu-add'])) {

	$tgl_lahir=date_create($_POST['tgl_lahir']);

	$tgl_identi=date_create($_POST['tgl_identi']);

	$database->insert('tamu',[
		'prefix'=>$_POST['prefix'],
		'nama_tamu'=>$_POST['nama_tamu'],
		'tipe_identitas'=>$_POST['tipe_identitas'],
		'nomor_identitas'=>$_POST['nomor_identitas'],
		'warga_negara'=>$_POST['warga_negara'],
		'alamat_jalan'=>$_POST['alamat_jalan'],
		'nomor_telp'=>$_POST['nomor_telp'],
		'jenis_kelamin'=>$_POST['jenis_kelamin'],
		'pekerjaan'=>$_POST['pekerjaan'],
		'jenis_visa'=>$_POST['jenis_visa'],
		'tujuan_wisata'=>$_POST['tujuan_wisata'],
		'tgl_lahir'=>$_POST['tgl_lahir'],
		'tgl_identi'=>$_POST['tgl_identi'],
		'tmp_pem_imgran'=>$_POST['tmp_pem_imgran'],
		]);
}

//Update Tamu

if(isset($_POST['tamu-update'])) {

	$database->update('tamu',[
		'prefix'=>$_POST['prefix'],
		'nama_tamu'=>$_POST['nama_tamu'],
		'nama_belakang'=>$_POST['nama_belakang'],
		'tipe_identitas'=>$_POST['tipe_identitas'],
		'nomor_identitas'=>$_POST['nomor_identitas'],
		'warga_negara'=>$_POST['warga_negara'],
		'alamat_jalan'=>$_POST['alamat_jalan'],
		'nomor_telp'=>$_POST['nomor_telp'],
		'jenis_visa'=>$_POST['jenis_visa'],
		'jenis_kelamin'=>$_POST['jenis_kelamin'],
		'pekerjaan'=>$_POST['pekerjaan'],
		'tujuan_wisata'=>$_POST['tujuan_wisata'],
		'tgl_lahir'=>$_POST['tgl_lahir'],
		'tgl_identi'=>$_POST['tgl_identi'],
		'tmp_pem_imgran'=>$_POST['tmp_pem_imgran'],
		],[
		'id_tamu'=>$_POST['id_tamu']
		]);
}

// Delete Tamu

if(isset($_POST['tamu-del'])) {

	$database->delete('tamu',['id_tamu'=>$_POST['id_tamu']]);
}

?>