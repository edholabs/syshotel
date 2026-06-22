<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="card card-primary card-outline">
  <div class="card-header">
    <a href="/transactions/create" class="btn btn-primary"><i class="fas fa-plus"></i> Transaksi Baru (Check-in)</a>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Invoice</th>
                <th>Tamu</th>
                <th>Kamar</th>
                <th>Check In</th>
                <th>Check Out</th>
                <th>Status</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($transactions as $t): ?>
            <tr>
                <td><?= $t['invoice_number'] ?></td>
                <td><?= $t['guest_name'] ?? '-' ?></td>
                <td><?= $t['room_number'] ?></td>
                <td><?= date('d M Y H:i', strtotime($t['check_in_date'])) ?></td>
                <td><?= $t['check_out_date'] ? date('d M Y H:i', strtotime($t['check_out_date'])) : '-' ?></td>
                <td>
                    <?php 
                    $badge = 'info';
                    if($t['status'] == 'check_out') $badge = 'success';
                    if($t['status'] == 'canceled') $badge = 'danger';
                    ?>
                    <span class="badge badge-<?= $badge ?>"><?= strtoupper($t['status']) ?></span>
                </td>
                <td>
                    <a href="/transactions/show/<?= $t['id'] ?>" class="btn btn-sm btn-info"><i class="fas fa-eye"></i> Detail</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
  </div>
</div>
<?= $this->endSection() ?>
