<?php

include('component/com-user.php');

?>

<section class="content-header">
	<h1>Hapus user</h1>
</section>

<section class="content">
	<?php if(isset($_POST['user-del'])) { ?>
	<div class="alert alert-success">
		<h4>Berhasil</h4>
		Anda telah sukses melakukan penghapusan data user. <b><a href="?module=user/user-list">Kembali</a></b>
	</div>
	<?php } else {?>
	<div class="alert alert-warning">
		<h4>Peringatan</h4>
		Apakah anda yakin untuk menghapus user ???<?php echo $user_view['nama']; ?> ? (data yang sudah dihapus tidak dapat dikembalikan lagi)
		<br/><br/>
		<form action="" method="post">
			<input type="hidden" name="id_user" value="<?php echo $user_view['id_user']; ?>" />
			<button class="btn btn-success" type="submit" name="user-del">Ya! Hapus</button>
			<a class="btn btn-info" href="?module=user/user-update&user=<?php echo $user_view['id_user']; ?>">Batal</a>
		</form>
	</div>
	<?php } ?>
</section>