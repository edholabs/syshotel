<?php

include('component/com-kamar.php');

?>

<section class="content-header">
	<h1>Pembersihan Kamar<span class="small">  Ubah</span></h1>
</section>

<section class="content">
	<?php if(isset($_POST['pembersihan-kamar'])) { ?>
	<div class="alert alert-success">
		<h4>Berhasil</h4>
		Anda berhasil melakukan perubahan kamar. 
		<a href="?module=kamar/kamar-list">Kembali Ke List Kamar</a><h3>Notice : </br>Cek Kembali Kamar apakah sudah tersedia atau tidak</h3>
	</div>
	<?php } else { ?>
	<form action="" method="post">
		<div class="box">
			<div class="box-body">
				<div class="row">
					<div class="col-sm-4">
						<div class="form-group">
							<label>Nomor Kamar</label>
							<input class="form-control" name="nomor_kamar" value="<?php echo $kamar_view['nomor_kamar']; ?>" readonly />
						</div>
						<div class="form-group">
							<label>Tipe Kamar</label>
							<input class="form-control" value="<?php echo $kamar_view['nama_kamar_tipe']; ?>" disabled />
							<select class="form-control" name="id_kamar_tipe">
								<option value="<?php echo $kamar_view['id_kamar_tipe']; ?>">Hanya Untuk Admin</option>
								<?php foreach ($kamar_tipe as $kamar_tipe) { ?>
								
								<?php } ?>
							</select>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Maximal Orang Dewasa</label>
							<input class="form-control" value="<?php echo $kamar_view['max_dewasa']; ?> Orang" disabled />
							<select class="form-control" name="max_dewasa">
								<option value="<?php echo $kamar_view['max_dewasa']; ?>"readonly />Hanya Untuk Admin</option>
	
							</select>
						</div>
						<div class="form-group">
							<label>Maximal Anak-anak</label>
							<input class="form-control" value="<?php echo $kamar_view['max_anak']; ?> Orang" disabled />
							<select class="form-control" name="max_anak">
								<option value="<?php echo $kamar_view['max_anak']; ?>"readonly />Hanya Untuk Admin</option>
								
							</select>
						</div>
					</div>
					<div class="col-sm-4">
						<div class="form-group">
							<label>Status Kamar</label>
							<input class="form-control" value="<?php echo $kamar_view['status_kamar']; ?>" disabled />
							<select class="form-control" name="status_kamar">
								<option value="<?php echo $kamar_view['status_kamar']; ?>">-- Pilih --</option>
								<option value="TERSEDIA">TERSEDIA</option>
								<option value="TERPAKAI">TERPAKAI</option>
								<option value="KOTOR">KOTOR</option>
							</select>
						</div>
					</div>
				</div>
			</div>
			<div class="box-footer">
				<input type="hidden" name="id_kamar" value="<?php echo $kamar_view['id_kamar']; ?>" />
				<button class="btn btn-success" type="submit" name="pembersihan-kamar">Update Kamar</button>
				<a class="btn btn-warning" href="?module=kamar/kamar-kotor">Batal</a>
			</div>
		</div>
	</form>
	<?php } ?>
</content>
