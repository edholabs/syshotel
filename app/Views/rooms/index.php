<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<?php if(session()->getFlashdata('msg')): ?>
    <div class="alert alert-success"><?= session()->getFlashdata('msg') ?></div>
<?php endif; ?>
<?php if(session()->getFlashdata('error')): ?>
    <div class="alert alert-danger"><?= session()->getFlashdata('error') ?></div>
<?php endif; ?>

<div class="card card-primary card-outline card-outline-tabs">
  <div class="card-header p-0 border-bottom-0">
    <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
      <li class="nav-item">
        <a class="nav-link active" id="tabs-rooms-tab" data-toggle="pill" href="#tabs-rooms" role="tab" aria-controls="tabs-rooms" aria-selected="true">Data Kamar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" id="tabs-types-tab" data-toggle="pill" href="#tabs-types" role="tab" aria-controls="tabs-types" aria-selected="false">Tipe Kamar</a>
      </li>
    </ul>
  </div>
  <div class="card-body">
    <div class="tab-content" id="custom-tabs-four-tabContent">
      
      <!-- TAB ROOMS -->
      <div class="tab-pane fade show active" id="tabs-rooms" role="tabpanel" aria-labelledby="tabs-rooms-tab">
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addRoomModal"><i class="fas fa-plus"></i> Tambah Kamar</button>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>No. Kamar</th>
                    <th>Tipe Kamar</th>
                    <th>Harga/Malam</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($rooms as $r): ?>
                <tr>
                    <td><?= $r['room_number'] ?></td>
                    <td><?= $r['type_name'] ?></td>
                    <td>Rp <?= number_format($r['price'],0,',','.') ?></td>
                    <td>
                        <?php 
                        $badge = 'success';
                        if($r['status'] == 'terisi') $badge = 'danger';
                        if($r['status'] == 'kotor') $badge = 'warning';
                        if($r['status'] == 'perbaikan') $badge = 'secondary';
                        ?>
                        <span class="badge badge-<?= $badge ?>"><?= strtoupper($r['status']) ?></span>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editRoomModal<?= $r['id'] ?>"><i class="fas fa-edit"></i></button>
                        <a href="/rooms/delete/<?= $r['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus kamar ini?')"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>

                <!-- Modal Edit Kamar -->
                <div class="modal fade" id="editRoomModal<?= $r['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <form action="/rooms/update/<?= $r['id'] ?>" method="post">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Edit Kamar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                            <label>Nomor Kamar</label>
                            <input type="text" name="room_number" class="form-control" value="<?= $r['room_number'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Tipe Kamar</label>
                            <select name="room_type_id" class="form-control" required>
                                <?php foreach($types as $t): ?>
                                    <option value="<?= $t['id'] ?>" <?= ($t['id'] == $r['room_type_id']) ? 'selected' : '' ?>><?= $t['name'] ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label>Status</label>
                            <select name="status" class="form-control" required>
                                <option value="tersedia" <?= ($r['status'] == 'tersedia') ? 'selected' : '' ?>>Tersedia</option>
                                <option value="terisi" <?= ($r['status'] == 'terisi') ? 'selected' : '' ?>>Terisi</option>
                                <option value="kotor" <?= ($r['status'] == 'kotor') ? 'selected' : '' ?>>Kotor</option>
                                <option value="perbaikan" <?= ($r['status'] == 'perbaikan') ? 'selected' : '' ?>>Perbaikan</option>
                            </select>
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

      <!-- TAB TYPES -->
      <div class="tab-pane fade" id="tabs-types" role="tabpanel" aria-labelledby="tabs-types-tab">
        <button class="btn btn-primary mb-3" data-toggle="modal" data-target="#addTypeModal"><i class="fas fa-plus"></i> Tambah Tipe Kamar</button>
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama Tipe</th>
                    <th>Deskripsi</th>
                    <th>Harga/Malam</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach($types as $t): ?>
                <tr>
                    <td><?= $t['name'] ?></td>
                    <td><?= $t['description'] ?></td>
                    <td>Rp <?= number_format($t['price'],0,',','.') ?></td>
                    <td>
                        <button class="btn btn-sm btn-info" data-toggle="modal" data-target="#editTypeModal<?= $t['id'] ?>"><i class="fas fa-edit"></i></button>
                        <a href="/rooms/deleteType/<?= $t['id'] ?>" class="btn btn-sm btn-danger" onclick="return confirm('Yakin hapus tipe ini?')"><i class="fas fa-trash"></i></a>
                    </td>
                </tr>

                <!-- Modal Edit Tipe -->
                <div class="modal fade" id="editTypeModal<?= $t['id'] ?>" tabindex="-1" role="dialog" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                    <form action="/rooms/updateType/<?= $t['id'] ?>" method="post">
                    <div class="modal-content">
                      <div class="modal-header">
                        <h5 class="modal-title">Edit Tipe Kamar</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span>
                        </button>
                      </div>
                      <div class="modal-body">
                        <div class="form-group">
                            <label>Nama Tipe</label>
                            <input type="text" name="name" class="form-control" value="<?= $t['name'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Harga (Rp)</label>
                            <input type="number" name="price" class="form-control" value="<?= $t['price'] ?>" required>
                        </div>
                        <div class="form-group">
                            <label>Deskripsi</label>
                            <textarea name="description" class="form-control" rows="3"><?= $t['description'] ?></textarea>
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
  </div>
</div>

<!-- Modal Add Kamar -->
<div class="modal fade" id="addRoomModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="/rooms/store" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Kamar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label>Nomor Kamar</label>
            <input type="text" name="room_number" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Tipe Kamar</label>
            <select name="room_type_id" class="form-control" required>
                <?php foreach($types as $t): ?>
                    <option value="<?= $t['id'] ?>"><?= $t['name'] ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="form-group">
            <label>Status</label>
            <select name="status" class="form-control" required>
                <option value="tersedia">Tersedia</option>
                <option value="terisi">Terisi</option>
                <option value="kotor">Kotor</option>
                <option value="perbaikan">Perbaikan</option>
            </select>
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

<!-- Modal Add Tipe Kamar -->
<div class="modal fade" id="addTypeModal" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <form action="/rooms/storeType" method="post">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Tambah Tipe Kamar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="form-group">
            <label>Nama Tipe</label>
            <input type="text" name="name" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Harga (Rp)</label>
            <input type="number" name="price" class="form-control" required>
        </div>
        <div class="form-group">
            <label>Deskripsi</label>
            <textarea name="description" class="form-control" rows="3"></textarea>
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
