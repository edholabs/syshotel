<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-md-6">
        <div class="card card-primary card-outline">
            <div class="card-header">
                <h3 class="card-title">Form Check-in Tamu</h3>
            </div>
            <form action="/transactions/store" method="post">
                <div class="card-body">
                    <div class="form-group">
                        <label>Pilih Tamu</label>
                        <select name="guest_id" class="form-control" required>
                            <option value="">-- Pilih Tamu --</option>
                            <?php foreach($guests as $g): ?>
                                <option value="<?= $g['id'] ?>"><?= $g['identity_number'] ?> - <?= $g['name'] ?></option>
                            <?php endforeach; ?>
                        </select>
                        <small><a href="/guests">Tambah Tamu Baru</a> jika belum ada.</small>
                    </div>
                    <div class="form-group">
                        <label>Pilih Kamar (Tersedia)</label>
                        <select name="room_id" class="form-control" required>
                            <option value="">-- Pilih Kamar --</option>
                            <?php foreach($rooms as $r): ?>
                                <option value="<?= $r['id'] ?>"><?= $r['room_number'] ?> (<?= $r['type_name'] ?>) - Rp <?= number_format($r['price'],0,',','.') ?> / Malam</option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="form-group">
                        <label>Tanggal & Jam Check-in</label>
                        <input type="datetime-local" name="check_in_date" class="form-control" value="<?= date('Y-m-d\TH:i') ?>" required>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Proses Check-in</button>
                    <a href="/transactions" class="btn btn-default float-right">Batal</a>
                </div>
            </form>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
