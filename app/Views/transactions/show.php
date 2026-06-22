<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<?php if(session()->getFlashdata('msg')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('msg') ?></div>
<?php endif; ?>

<div class="row">
    <div class="col-md-4">
        <!-- Detail Info -->
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Informasi Transaksi</h3>
            </div>
            <div class="card-body p-0">
                <table class="table table-sm">
                    <tr><th>Invoice</th><td><?= $transaction['invoice_number'] ?></td></tr>
                    <tr><th>Status</th>
                        <td>
                            <?php 
                            $badge = 'info';
                            if($transaction['status'] == 'check_out') $badge = 'success';
                            if($transaction['status'] == 'canceled') $badge = 'danger';
                            ?>
                            <span class="badge badge-<?= $badge ?>"><?= strtoupper($transaction['status']) ?></span>
                        </td>
                    </tr>
                    <tr><th>Tamu</th><td><?= $transaction['guest_name'] ?></td></tr>
                    <tr><th>Kamar</th><td><?= $transaction['room_number'] ?></td></tr>
                    <tr><th>Harga / Malam</th><td>Rp <?= number_format($transaction['price_per_night'],0,',','.') ?></td></tr>
                    <tr><th>Check In</th><td><?= date('d M Y H:i', strtotime($transaction['check_in_date'])) ?></td></tr>
                    <?php if($transaction['status'] == 'check_out'): ?>
                        <tr><th>Check Out</th><td><?= date('d M Y H:i', strtotime($transaction['check_out_date'])) ?></td></tr>
                    <?php endif; ?>
                </table>
            </div>
            <?php if($transaction['status'] == 'check_in'): ?>
            <div class="card-footer">
                <button class="btn btn-success btn-block" data-toggle="modal" data-target="#checkoutModal">PROSES CHECK-OUT</button>
            </div>
            <?php elseif($transaction['status'] == 'check_out'): ?>
            <div class="card-footer">
                <a href="/transactions/print/<?= $transaction['id'] ?>" target="_blank" class="btn btn-primary btn-block"><i class="fas fa-print"></i> Cetak Invoice</a>
            </div>
            <?php endif; ?>
        </div>
    </div>
    
    <div class="col-md-8">
        <!-- Layanan Tambahan -->
        <div class="card card-info card-outline">
            <div class="card-header">
                <h3 class="card-title">Layanan Tambahan (Room Service)</h3>
                <?php if($transaction['status'] == 'check_in'): ?>
                <div class="card-tools">
                    <button class="btn btn-sm btn-primary" data-toggle="modal" data-target="#addServiceModal"><i class="fas fa-plus"></i> Tambah Layanan</button>
                </div>
                <?php endif; ?>
            </div>
            <div class="card-body p-0">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th>Layanan</th>
                            <th>Harga</th>
                            <th>Qty</th>
                            <th>Subtotal</th>
                            <?php if($transaction['status'] == 'check_in'): ?>
                            <th>Aksi</th>
                            <?php endif; ?>
                        </tr>
                    </thead>
                    <tbody>
                        <?php if(empty($details)): ?>
                            <tr><td colspan="5" class="text-center">Belum ada layanan tambahan</td></tr>
                        <?php else: ?>
                            <?php foreach($details as $d): ?>
                            <tr>
                                <td><?= $d['service_name'] ?></td>
                                <td>Rp <?= number_format($d['price'],0,',','.') ?></td>
                                <td><?= $d['qty'] ?></td>
                                <td>Rp <?= number_format($d['subtotal'],0,',','.') ?></td>
                                <?php if($transaction['status'] == 'check_in'): ?>
                                <td>
                                    <a href="/transactions/deleteService/<?= $transaction['id'] ?>/<?= $d['id'] ?>" class="btn btn-xs btn-danger" onclick="return confirm('Hapus layanan?')"><i class="fas fa-trash"></i></a>
                                </td>
                                <?php endif; ?>
                            </tr>
                            <?php endforeach; ?>
                        <?php endif; ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <th colspan="3" class="text-right">Total Layanan:</th>
                            <th colspan="2">Rp <?= number_format($transaction['total_service'],0,',','.') ?></th>
                        </tr>
                        <?php if($transaction['status'] == 'check_out'): ?>
                        <tr>
                            <th colspan="3" class="text-right">Total Kamar:</th>
                            <th colspan="2">Rp <?= number_format($transaction['total_room_price'],0,',','.') ?></th>
                        </tr>
                        <tr>
                            <th colspan="3" class="text-right">GRAND TOTAL:</th>
                            <th colspan="2">Rp <?= number_format($transaction['grand_total'],0,',','.') ?></th>
                        </tr>
                        <?php endif; ?>
                    </tfoot>
                </table>
            </div>
        </div>
    </div>
</div>

<?php if($transaction['status'] == 'check_in'): ?>
<!-- Modal Add Service -->
<div class="modal fade" id="addServiceModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="/transactions/addService/<?= $transaction['id'] ?>" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Layanan ke Kamar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label>Pilih Layanan</label>
            <select name="service_id" class="form-control" required>
                <?php foreach($services as $s): ?>
                    <option value="<?= $s['id'] ?>"><?= $s['name'] ?> - Rp <?= number_format($s['price'],0,',','.') ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Quantity (Jumlah)</label>
            <input type="number" name="qty" class="form-control" value="1" min="1" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Tambah</button>
      </div>
    </div>
    </form>
  </div>
</div>

<!-- Modal Checkout -->
<div class="modal fade" id="checkoutModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="/transactions/checkout/<?= $transaction['id'] ?>" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Konfirmasi Check-out</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <p>Apakah Anda yakin tamu akan check-out sekarang? Sistem akan mengkalkulasi tagihan berdasarkan hari menginap dan layanan tambahan.</p>
        <div class="form-group">
            <label>Tanggal & Waktu Check-out</label>
            <input type="datetime-local" name="check_out_date" class="form-control" value="<?= date('Y-m-d\TH:i') ?>" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-success">Proses Check-out</button>
      </div>
    </div>
    </form>
  </div>
</div>
<?php endif; ?>

<?= $this->endSection() ?>
