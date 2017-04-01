<?php

include('component/com-tamu.php');
?>


<section class="content-header">
	<h1>Tambah Tamu Baru</h1>
<center><font size="6"><font color="black"><b>DATA LIST OF FOREIGN VISITOR</b></font></font></center>
</section>

<section class="content">
	<?php if(isset($_POST['tamu-add'])) { ?>
	<div class="alert alert-success">
		<h4>Berhasil</h4>
		Anda telah berhasil melakukan penambahan data tamu baru. 
		</div>
		<div class="alert alert-info">
		<h4>SILAHKAN CHECKIN TAMU</h4>
		<a href="?module=transaksi/checkin"><b><font color="black">CHECKIN TAMU</font></b></a>
		</div>
	<?php } else { ?>
	<div class="box">

		<form action="" method="post">
			<div class="box-body">
				<div class="col-xs-12" style="padding:20px; background-color:#eees;">
					<div class="col-sm-6">
						<div class="form-group">
							<label>Full Name</label>
							<div class="row">
								<div class="col-sm-3">
									<select class="form-control" name="prefix">
										<option value="Mr">Mr</option>
										<option value="Ms">Ms</option>
										<option value="Mrs">Mrs</option>
									</select>
								</div>
								<div class="col-sm-6">
									<input class="form-control" name="nama_tamu" placeholder="Full Name" required />
								</div>
							</div>
						</div>
						<div class="form-group">
							<label>Identitas</label>
							<div class="row">
								<div class="col-sm-4">
									<select class="form-control" name="tipe_identitas" />
										<option value="PASSPORT">PASSPORT</option>
									</select>
								</div>

								<div class="col-sm-6">
									<input class="form-control" name="nomor_identitas" placeholder="Passport Number" required />
								</div>
							</div>
						</div>
						<label>Valid Until</label>
							<div class="row">
								<div class="col-sm-6">
							<input id="berlaku" class="form-control" name="tgl_identi" data-date-format="dd-mm-yyyy" />
								</div>
									</div> 
									</br>
							<label>Male / Female</label>
							<div class="row">
								<div class="col-sm-5">
									<select class="form-control" name="jenis_kelamin" />
										<option value="MALE">Male</option>
										<option value="FEMALE">Female</option>
									</select>
								</div>
									</div> 
									</br>
							<div class="form-group">
							<label>VISUM</label>
							<div class="row">
								<div class="col-sm-5">
									<select class="form-control" name="jenis_visa" />
										<option value="">---DI PILIH---</option>
										<option value="DIPLOMATIC">DIPLOMATIC</option>
										<option value="OFFICIAL">OFFICIAL</option>
										<option value="TRANSLIT">TRANSLIT</option>
										<option value="VISIT">VISIT</option>
										<option value="STAY">STAY</option>
									</select>
								</div>
								</div>
								</div>
						</div>
						<div class="col-sm-5">
						<div class="form-group">
							<label>Port Of Entry & Date Of Arrival in Indonesia</label>
							<textarea class="form-control" name="tmp_pem_imgran" placeholder="Port Of Entry & Date Of Arrival in Indonesia"></textarea>
						</div>
						</div>

						<div class="col-sm-3">						 
							<label>Nationality</label>
							<input class="form-control" name="warga_negara" required />
						</div>
						<div class="col-sm-3">
								<label>Place / Date Of Birth</label>
									<input id="tgllahir" class="form-control" name="tgl_lahir" data-date-format="dd-mm-yyyy" placeholder="Place / Date Of Birth" />
								</div>
					<div class="col-sm-5">
						<div class="form-group">
							<label>Home Address</label>
							<textarea class="form-control" name="alamat_jalan"></textarea>
						</div>
								
							</div>
							<div class="col-sm-4">
								<label>Handphone</label>
									<input class="form-control" name="nomor_telp" required />
								</div>
							 	<div class="col-sm-4">						 
							<label>Proffesion</label>
							<input class="form-control" name="pekerjaan" required />
						</div>
					 	<div class="col-sm-5">						 
							<label>Destination</label>
							<input class="form-control" name="tujuan_wisata"/>
						</div>
							</div>
						</div>
					</div>
								<div class="box-footer">
				<button class="btn btn-success" type="submit" name="tamu-add">Tambah Tamu</button>
				<a class="btn btn-warning" href="?module=tamu/tamu-list">Batal</a>
			</div>
				</div>
			</div>
		</form>
	</div>
	<?php } ?>
</section>
