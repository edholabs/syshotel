<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<?php if(session()->getFlashdata('msg')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('msg') ?></div>
<?php endif; ?>
<?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<div class="card card-primary card-outline">
  <div class="card-header">
    <button class="btn btn-primary" data-toggle="modal" data-target="#addServiceModal"><i class="fas fa-plus"></i> Tambah Layanan</button>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>Nama Layanan</th>
                <th>Harga (Rp)</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($services as $s): ?>
            <tr>
                <td><?= $s['name'] ?></td>
                <td>Rp <?= number_format($s['price'],0,',','.') ?></td>
                <td>
                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editServiceModal<?= $s['id'] ?>"><i class="fas fa-edit"></i></button>
                    <a href="/services/delete/<?= $s['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus layanan ini?')"><i class="fas fa-trash"></i></a>
                </td>
            </tr>

            <!-- Modal Edit Layanan -->
            <div class="modal fade" id="editServiceModal<?= $s['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <form action="/services/update/<?= $s['id'] ?>" method="post">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Layanan</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                        <label>Nama Layanan</label>
                        <input type="text" name="name" class="form-control" value="<?= $s['name'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Harga (Rp)</label>
                        <input type="number" name="price" class="form-control" value="<?= $s['price'] ?>" required>
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                  </div>
                </div>
                </form>
              </div>
            </div>
            <?php endforeach; ?>
        </tbody>
    </table>
  </div>
</div>

<!-- Modal Add Layanan -->
<div class="modal fade" id="addServiceModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="/services/store" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Layanan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label>Nama Layanan</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Harga (Rp)</label>
            <input type="number" name="price" class="form-control" required>
        </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
        <button type="submit" class="btn btn-primary">Simpan</button>
      </div>
    </div>
    </form>
  </div>
</div>

<?= $this->endSection() ?>
