<?php

include('component/com-user.php');

?>
<link href="template/bootstrap/css/footable.core.css" rel="stylesheet" type="text/css" />
	<link href="template/bootstrap/css/footable.metro.css" rel="stylesheet" type="text/css" />
	<link href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.2.2/css/bootstrap.no-icons.min.css" rel="stylesheet">
	<script type="text/javascript" async="" src="template/bootstrap/search/search.js"></script>
<section class="content-header">
	<h1>Pengguna<p> <span class="small">Administrasi pengguna system</span></h1>
</section>

<section class="content">
	<div class="box">
		<div class="box-header">
			<a class="btn btn-info" href="?module=user/user-add">Tambah User</a>
		</div>
		<div class="box-body">
	 <input type="search" class="light-table-filter" data-table="footable" placeholder="CARI USER" />
	 <table class="footable">
				<thead>
					<tr>
						<th>Nama User</th>
						<th>User Role</th>
						<th>Jabatan</th>
						<th>Nomor Telp / Handphone</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach($user as $user) { ?>
					<tr>
						<td><?php echo $user['nama']; ?></td>
						<td><?php echo $user['role_name']; ?></td>
						<td><?php echo $user['jabatan']; ?></td>
						<td><?php echo $user['nomor_telp']; ?></td>
						<td>
							<a class="btn btn-xs btn-info" href="?module=user/user-update&user=<?php echo $user['id_user']; ?>">Update</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
		</div>
	</div>
</section>