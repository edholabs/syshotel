<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title><?= $title ?></title>
  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Theme style -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/admin-lte@3.2/dist/css/adminlte.min.css">
</head>
<body>
<div class="wrapper p-4">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <i class="fas fa-globe"></i> Syshotel v2.
          <small class="float-right">Tanggal: <?= date('d/m/Y') ?></small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info mt-4">
      <div class="col-sm-4 invoice-col">
        Dari
        <address>
          <strong>Syshotel Melati</strong><br>
          Jl. Merdeka No. 123<br>
          Telp: (021) 123-4567<br>
          Email: info@syshotel.com
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        Kepada
        <address>
          <strong><?= $transaction['guest_name'] ?></strong><br>
          <?= $transaction['address'] ?><br>
          Telp: <?= $transaction['phone'] ?>
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Invoice #<?= $transaction['invoice_number'] ?></b><br>
        <br>
        <b>Kamar:</b> <?= $transaction['room_number'] ?> (<?= $transaction['type_name'] ?>)<br>
        <b>Check-in:</b> <?= date('d M Y H:i', strtotime($transaction['check_in_date'])) ?><br>
        <b>Check-out:</b> <?= date('d M Y H:i', strtotime($transaction['check_out_date'])) ?><br>
        <b>Resepsionis:</b> <?= $transaction['receptionist'] ?>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row mt-4">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
            <th>Deskripsi</th>
            <th>Harga/Unit</th>
            <th>Qty</th>
            <th>Subtotal</th>
          </tr>
          </thead>
          <tbody>
          <!-- Harga Kamar -->
          <?php
            $in = new \DateTime($transaction['check_in_date']);
            $out = new \DateTime($transaction['check_out_date']);
            $diff = $in->diff($out)->days;
            if ($diff == 0) $diff = 1;
          ?>
          <tr>
            <td>Penginapan Kamar <?= $transaction['room_number'] ?> (<?= $diff ?> Malam)</td>
            <td>Rp <?= number_format($transaction['price_per_night'],0,',','.') ?></td>
            <td><?= $diff ?></td>
            <td>Rp <?= number_format($transaction['total_room_price'],0,',','.') ?></td>
          </tr>
          
          <!-- Layanan -->
          <?php foreach($details as $d): ?>
          <tr>
            <td>Layanan: <?= $d['service_name'] ?></td>
            <td>Rp <?= number_format($d['price'],0,',','.') ?></td>
            <td><?= $d['qty'] ?></td>
            <td>Rp <?= number_format($d['subtotal'],0,',','.') ?></td>
          </tr>
          <?php endforeach; ?>
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-6">
        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
          Terima kasih telah menginap di Syshotel Melati. Kami berharap dapat melayani Anda kembali di masa mendatang.
        </p>
      </div>
      <!-- /.col -->
      <div class="col-6">
        <p class="lead">Tagihan Berakhir: <?= date('d/m/Y') ?></p>

        <div class="table-responsive">
          <table class="table">
            <tr>
              <th style="width:50%">Total Kamar:</th>
              <td>Rp <?= number_format($transaction['total_room_price'],0,',','.') ?></td>
            </tr>
            <tr>
              <th>Total Layanan:</th>
              <td>Rp <?= number_format($transaction['total_service'],0,',','.') ?></td>
            </tr>
            <tr>
              <th>Grand Total:</th>
              <td><b>Rp <?= number_format($transaction['grand_total'],0,',','.') ?></b></td>
            </tr>
          </table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->
<!-- Page specific script -->
<script>
  window.addEventListener("load", window.print());
</script>
</body>
</html>
