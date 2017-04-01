<?php

include('component/com-tamu.php');

?>

<section class="content-header">
	<h1>Tambah Tamu Baru</h1>
</section>

<section class="content">
	<?php if(isset($_POST['tamu-update'])) { ?>
	<div class="alert alert-success">
		<h4>Berhasil</h4>
		Berhasil Mengubah Data Tamu WNA
		<a href="?module=tamu/tamu-list"><b>Kembali</b></a>
	</div>
	<?php } else { ?>
	<div class="box">
		<form action="" method="post">
			<div class="box-body">
				<div class="row">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Full Name</label>
							<div class="row">
								<div class="col-sm-3">
									<input class="form-control" name="prefix" value="<?php echo $tamu_view['prefix']; ?>" readonly />
								</div>
								<div class="col-sm-4">
									<input class="form-control" name="nama_depan" value="<?php echo $tamu_view['nama_tamu']; ?>" />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Identitas</label>
							<div class="row">
								<div class="col-sm-3">
									<input class="form-control" name="tipe_identitas" value="<?php echo $tamu_view['tipe_identitas']; ?>" readonly />
								</div>
								<div class="col-sm-6">
									<input class="form-control" name="nomor_identitas" value="<?php echo $tamu_view['nomor_identitas']; ?>"readonly />
								</div>
							</div>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
								<label>Valid Until</label>
									<input class="form-control" name="tgl_identi"  value="<?php echo $tamu_view['tgl_identi']; ?>"readonly />
								</div>	
								</div>	
								</div>	
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<label>VISUM</label>
									<input class="form-control" name="jenis_visa" value="<?php echo $tamu_view['jenis_visa']; ?>"readonly />

								</div>	
								</div>	
								</div>	
							<div class="form-group">
							<label>Nationality</label>
							<div class="row">
								<div class="col-sm-4">
									<input class="form-control" name="warga_negara" value="<?php echo $tamu_view['warga_negara']; ?>" />
								</div>
							</div>
						</div>
					</div>
					<div class="col-sm-5">
						<div class="form-group">
							<label>Port Of Entry & Date Of Arrival in Indonesia</label>
							<textarea class="form-control" name="tmp_pem_imgran"><?php echo $tamu_view['tmp_pem_imgran']; ?></textarea>
						</div>
						</div>
					<div class="col-sm-5">
						<div class="form-group">
							<label>Home Address</label>
							<textarea class="form-control" name="alamat_jalan"><?php echo $tamu_view['alamat_jalan']; ?></textarea>
						</div>
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
								<label>Place / Date Of Birth</label>
									<input class="form-control" name="tgl_lahir" value="<?php echo $tamu_view['tgl_lahir']; ?>"readonly />
								</div>	
								</div>	
								</div>	
						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<label>Proffesion</label>
									<input class="form-control" name="pekerjaan" value="<?php echo $tamu_view['pekerjaan']; ?>" />
								</div>	
								</div>	
								</div>
							<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<label>Destional</label>
									<input class="form-control" name="tujuan_wisata" value="<?php echo $tamu_view['tujuan_wisata']; ?>" />
								</div>	
								</div>	
								</div>		
					</div>
				</div>
			</div>
			<div class="box-footer">
				<input type="hidden" name="id_tamu" value="<?php echo $tamu_view['id_tamu']; ?>" />
				<button class="btn btn-success" type="submit" name="tamu-update">Update Tamu</button>
				<a class="btn btn-danger" href="?module=tamu/tamu-delete&tamu=<?php echo $tamu_view['id_tamu']; ?>">Hapus</a>
				<a class="btn btn-warning" href="?module=tamu/tamu-list">Batal</a>
			</div>
		</form>
	</div>
	<?php } ?>
</section>