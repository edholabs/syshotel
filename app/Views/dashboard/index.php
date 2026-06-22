<?= $this->extend('layout/template') ?>

<?= $this->section('content') ?>
<div class="row">
    <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-info">
        <div class="inner">
        <h3><?= $totalTransactions ?></h3>
        <p>Total Transaksi</p>
        </div>
        <div class="icon">
        <i class="ion ion-bag"></i>
        </div>
        <a href="/transactions" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-success">
        <div class="inner">
        <h3><?= $occupancyRate ?><sup style="font-size: 20px">%</sup></h3>
        <p>Okupansi Kamar</p>
        </div>
        <div class="icon">
        <i class="ion ion-stats-bars"></i>
        </div>
        <a href="/rooms" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
        <div class="inner">
        <h3><?= $totalGuests ?></h3>
        <p>Total Tamu</p>
        </div>
        <div class="icon">
        <i class="ion ion-person-add"></i>
        </div>
        <a href="/guests" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-danger">
        <div class="inner">
        <h3><?= $totalServices ?></h3>
        <p>Layanan Aktif</p>
        </div>
        <div class="icon">
        <i class="ion ion-pie-graph"></i>
        </div>
        <a href="/services" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
    </div>
    <!-- ./col -->
</div>
<!-- /.row -->

<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Selamat Datang di Syshotel v2</h3>
            </div>
            <div class="card-body">
                Sistem Informasi Hotel Melati (Versi 2.0). Silakan gunakan menu di sebelah kiri untuk mengelola data master dan transaksi.
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
