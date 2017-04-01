<?php

include('component/com-tamu-wni.php');
?>

<section class="content-header">
	<h1>Tambah Tamu Warga Negara Indonesia</h1>
</section>

<section class="content">
	<?php if(isset($_POST['tamu-wni-add'])) { ?>
		<h4>Untuk Checkin Tamu</h4>
		<div class="alert alert-info">
		<a href="?module=transaksi/checkin"><b>Checkin Tamu</b></a>
		</div>
	<?php } else { ?>
	<div class="box">
		<form action="" method="post">
			<div class="box-body">
				<div class="col-xs-12" style="padding:20px; background-color:#eees;">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Nama Tamu</label>
							<div class="row">
								<div class="col-sm-6">
									<input class="form-control" name="nama_lengkap_wni" placeholder="Nama Depan" required />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Identitas</label>
							<div class="row">
								<div class="col-sm-3">
									<select class="form-control" name="tipe_identitas_wni" />
										<option value="KTP">KTP</option>
										<option value="KTP">SIM</option>
										<option value="KTP">Nomor Telepon</option>
									</select>
								</div>

								<div class="col-sm-6">
									<input class="form-control" name="nomor_identitas_wni" placeholder="Nomor Identitas Atau No TLP" required />
								</div>
							</div>
						</div>
					<label>Jenis Kelamin</label>
							<div class="row">
								<div class="col-sm-5">
									<select class="form-control" name="jenis_kelamin_wni" />
										<option value="PRIA">PRIA</option>
										<option value="WANITA">WANITA</option>
									</select>
								</div>
									</div> 
								</div>
					<div class="col-sm-5">
						<div class="form-group">
							<label>Alamat</label>
							<textarea class="form-control" name="alamat_jalan_wni"></textarea>
						</div>

						<div class="form-group">
							<div class="row">
								<div class="col-sm-6">
									<input class="form-control" name="alamat_kabupaten_wni" placeholder="Kabupaten / Kota" />
								</div>
								<div class="col-sm-6">
									<input class="form-control" name="alamat_provinsi_wni" placeholder="Provinsi" />
								</div>
							</div>
						</div>
							</div>
							 <div class="col-sm-4">						 
							<label>Pekerjaan</label>
							<input class="form-control" name="pekerjaan_wni" required />
						</div>
						<div class="col-sm-4">						 
							<label>Tanggal Lahir</label>
							<input id="checkin" class="form-control" name="tgl_lahir_wni" data-date-format="dd-mm-yyyy" placeholder="tanggal lahir" />
						</div>
							</div>
						</div>
					</div>
								<div class="box-footer">
				<button class="btn btn-success" type="submit" name="tamu-wni-add">Tambah Tamu</button>
				<a class="btn btn-warning" href="?module=tamu/tamu-wni-list">Batal</a>
			</div>
				</div>
			</div>
		</form>
	</div>
	<?php } ?>
</section>