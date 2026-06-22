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
    <button class="btn btn-primary" data-toggle="modal" data-target="#addGuestModal"><i class="fas fa-plus"></i> Tambah Tamu</button>
  </div>
  <div class="card-body">
    <table class="table table-bordered table-striped">
        <thead>
            <tr>
                <th>No. Identitas (KTP/Paspor)</th>
                <th>Nama Tamu</th>
                <th>No. Telepon</th>
                <th>Alamat</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach($guests as $g): ?>
            <tr>
                <td><?= $g['identity_number'] ?></td>
                <td><?= $g['name'] ?></td>
                <td><?= $g['phone'] ?></td>
                <td><?= $g['address'] ?></td>
                <td>
                    <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editGuestModal<?= $g['id'] ?>"><i class="fas fa-edit"></i></button>
                    <a href="/guests/delete/<?= $g['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus tamu ini?')"><i class="fas fa-trash"></i></a>
                </td>
            </tr>

            <!-- Modal Edit Tamu -->
            <div class="modal fade" id="editGuestModal<?= $g['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
              <div class="modal-dialog" role="document">
                <form action="/guests/update/<?= $g['id'] ?>" method="post">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title">Edit Tamu</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <div class="form-group">
                        <label>No. Identitas</label>
                        <input type="text" name="identity_number" class="form-control" value="<?= $g['identity_number'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Nama Lengkap</label>
                        <input type="text" name="name" class="form-control" value="<?= $g['name'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>No. Telepon</label>
                        <input type="text" name="phone" class="form-control" value="<?= $g['phone'] ?>" required>
                    </div>
                    <div class="form-group">
                        <label>Alamat</label>
                        <textarea name="address" class="form-control" rows="3"><?= $g['address'] ?></textarea>
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

<!-- Modal Add Tamu -->
<div class="modal fade" id="addGuestModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="/guests/store" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Tamu Baru</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label>No. Identitas</label>
            <input type="text" name="identity_number" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Nama Lengkap</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>No. Telepon</label>
            <input type="text" name="phone" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Alamat</label>
            <textarea name="address" class="form-control" rows="3"></textarea>
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
