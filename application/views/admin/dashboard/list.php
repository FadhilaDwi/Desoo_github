<!-- Small boxes (Stat box) -->
<h3 class="mb-3">Pengajuan Surat</h3>
<div class="row">

  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-warning">
      <div class="inner">
        <h3><?php echo $total_menunggu ?></h3>

        <p>Pengajuan Menunggu</p>
      </div>
      <div class="icon">
        <i class="ion ion-email-unread"></i>
      </div>
      <a href="<?php echo base_url('admin/pengajuan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->

  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-orange">
      <div class="inner">
        <h3><?php echo $total_diproses ?></h3>

        <p>Pengajuan Diproses</p>
      </div>
      <div class="icon">
        <i class="ion ion-email"></i>
      </div>
      <a href="<?php echo base_url('admin/pengajuan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->

  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-teal">
      <div class="inner">
        <h3><?php echo $total_selesai ?></h3>

        <p>Pengajuan Selesai</p>
      </div>
      <div class="icon">
        <i class="ion ion-paper-airplane"></i>
      </div>
      <a href="<?php echo base_url('admin/pengajuan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->

  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-light">
      <div class="inner">
        <h3><?php echo $total_pengajuan ?></h3>

        <p>Total Pengajuan Surat</p>
      </div>
      <div class="icon">
        <i class="ion ion-folder"></i>
      </div>
      <a href="<?php echo base_url('admin/pengajuan') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>
<!-- /.row -->

<h3 class="mb-3">Penduduk</h3>
<div class="row">
  <div class="col-lg-6 col-12">
    <!-- small box -->
    <div class="small-box bg-olive">
      <div class="inner">
        <h3><?php echo $total_penduduk ?></h3>

        <p>Total Jumlah Penduduk</p>
      </div>
      <div class="icon">
        <i class="ion ion-person-stalker"></i>
      </div>
      <a href="<?php echo base_url('admin/penduduk') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->

  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-cyan">
      <div class="inner">
        <h3><?php echo $total_laki ?></h3>

        <p>Laki-laki</p>
      </div>
      <div class="icon">
        <i class="ion ion-man"></i>
      </div>
      <a href="<?php echo base_url('admin/penduduk') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->

  <div class="col-lg-3 col-6">
    <!-- small box -->
    <div class="small-box bg-fuchsia">
      <div class="inner">
        <h3><?php echo $total_perempuan ?></h3>

        <p>Perempuan</p>
      </div>
      <div class="icon">
        <i class="ion ion-woman"></i>
      </div>
      <a href="<?php echo base_url('admin/penduduk') ?>" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
    </div>
  </div>
  <!-- ./col -->
</div>
<!-- /.row -->

<div>
  <canvas id="myChart"></canvas>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
  // === include 'setup' then 'config' above ===

  const config = {
    type: 'line',
    data,
    options: {}
  };

  const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
  ];
  const data = {
    labels: labels,
    datasets: [{
      label: 'My First dataset',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: [0, 10, 5, 2, 20, 30, 45],
    }]
  };

  var myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>
