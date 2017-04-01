<?php

//List & View Tamu wni

$tamu_wni=$database->select('tamu_wni','*');

if(!empty($_GET['tamu_wni'])) {

	$tamu_view=$database->get('tamu_wni','*',['id_tamu_wni'=>$_GET['tamu_wni']]);
}

//Insert Tamu wni

if(isset($_POST['tamu-wni-add'])) {

	$tgl_lahir_wni=date_create($_POST['tgl_lahir_wni']);

	$database->insert('tamu_wni',[
		'nama_lengkap_wni'=>$_POST['nama_lengkap_wni'],
		'tipe_identitas_wni'=>$_POST['tipe_identitas_wni'],
		'nomor_identitas_wni'=>$_POST['nomor_identitas_wni'],
		'alamat_jalan_wni'=>$_POST['alamat_jalan_wni'],
		'alamat_kabupaten_wni'=>$_POST['alamat_kabupaten_wni'],
		'alamat_provinsi_wni'=>$_POST['alamat_provinsi_wni'],
		'jenis_kelamin_wni'=>$_POST['jenis_kelamin_wni'],
		'pekerjaan_wni'=>$_POST['pekerjaan_wni'],
		'tgl_lahir_wni'=>$_POST['tgl_lahir_wni'],
		]);
}

//Update Tamu wni

if(isset($_POST['tamu-wni-update'])) {

	$database->update('tamu_wni',[
		'nama_lengkap_wni'=>$_POST['nama_lengkap_wni'],
		'tipe_identitas_wni'=>$_POST['tipe_identitas_wni'],
		'nomor_identitas_wni'=>$_POST['nomor_identitas_wni'],
		'alamat_jalan_wni'=>$_POST['alamat_jalan_wni'],
		'alamat_kabupaten_wni'=>$_POST['alamat_kabupaten_wni'],
		'alamat_provinsi_wni'=>$_POST['alamat_provinsi_wni'],
		'jenis_kelamin_wni'=>$_POST['jenis_kelamin_wni'],
		'pekerjaan_wni'=>$_POST['pekerjaan_wni'],
		'tgl_lahir_wni'=>$_POST['tgl_lahir_wni'],
		],[
		'id_tamu_wni'=>$_POST['id_tamu_wni']
		]);
}

// Delete Tamu

if(isset($_POST['tamu-wni-del'])) {

	$database->delete('tamu_wni',['id_tamu_wni'=>$_POST['id_tamu_wni']]);
}

?>