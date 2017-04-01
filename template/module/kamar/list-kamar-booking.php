<?php

include('component/com-kamar.php');

include('component/com-kamar-booking.php');

?>
<section class="content-header">
	<h1>Kamar Booking<p> <span class="small">Informasi kamar Booking</span></h1>
</section>

<section class="content">
	<div class="box">
		<div class="box-header">
			
		</div>
		<div class="box-body">
			<table class="table table-striped">
				<thead>
					<tr>
						<th># Kamar</th>
						<th>Tipe Kamar</th>
						<th>Harga / Malam</th>
						<th>Status</th>
					</tr>
				</thead>
				<tbody>
					<?php foreach ($kamar_booking as $kamar_booking) { ?>
					<tr>
						<td><?php echo $kamar_booking['no_kamar_booking']; ?></td>
						<td><?php echo $kamar_booking['nama_kamar_tipe']; ?></td>
						<td>Rp <?php echo number_format($kamar_booking['harga_malam']); ?></td>
						<td>
							<?php

							if($kamar_booking['status_booking']=='TERSEDIA') {

								$status_booking='green';
							}

							if($kamar_booking['status_booking']=='BOOKING') {

								$status_booking='red';
							}


							?>
							<span class="badge bg-<?php echo $status_booking; ?>"><?php echo $kamar_booking['status_booking']; ?></span>
						</td>
						<td>
							<a href="?module=kamar/status-kamar-booking&kamar=<?php echo $kamar_booking['id_kamar_booking']; ?>" class="btn btn-xs btn-info">Update</a>
						</td>
					</tr>
					<?php } ?>
				</tbody>
			</table>
			
		</div>
	</div>
</section>