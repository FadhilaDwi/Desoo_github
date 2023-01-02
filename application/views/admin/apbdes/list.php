<p>
  <a href="<?php echo base_url('admin/apbdes/tambah') ?>" class="btn btn-warning btn-lg">
    <i class="fa fa-plus"></i> Tambah Anggaran
  </a>
</p>

<!-- Small boxes (Stat box) -->
<div class="row">
  <div class="col-lg-6 col-12">
    <!-- small box -->
    <div class="small-box bg-success">
      <div class="inner">
        <h3>Rp <?php echo number_format($sum_pendapatan,2,",",".") ?></h3>

        <p>Pendapatan</p>
      </div>
      <div class="icon">
        <i class="fa fa-sign-in-alt"></i>
      </div>
    </div>
  </div>
  <!-- ./col -->
  <div class="col-lg-6 col-12">
    <!-- small box -->
    <div class="small-box bg-danger">
      <div class="inner">
        <h3>Rp <?php echo number_format($sum_belanja,2,",",".") ?></h3>

        <p>Belanja</p>
      </div>
      <div class="icon">
        <i class="fa fa-sign-out-alt"></i>
      </div>
    </div>
  </div>
  <!-- ./col -->
</div>

<div class="row">
  <div class="col-12">
    <!-- small box -->
    <div class="small-box bg-primary">
      <div class="inner">
        <h3>Rp <?php echo number_format($sisa_anggaran,2,",",".") ?></h3>

        <p>Sisa Anggaran</p>
      </div>
      <div class="icon">
        <i class="fa fa-chart-pie"></i>
      </div>
    </div>
  </div>
</div>

<div class="row">
  <div class="col-lg-6 col-12">
    <!-- TABLE: LATEST ORDERS -->
    <div class="card">
      <div class="card-header border-transparent">
        <h3 class="card-title">Pendapatan</h3>

        <div class="card-tools">
          <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-minus"></i>
          </button>
        </div>
      </div>
      <!-- /.card-header -->
      <div class="card-body p-0">
        <div class="table-responsive">
          <table class="table table-bordered table-sm text-center" style="font-size: 15px;">
            <thead>
              <tr class="bg badge-success text-center">
                <th>No</th>
                <th>Bidang</th>
                <th>Sub Bidang</th>
                <th>Nama Anggaran</th>
                <th>Nominal</th>
                <!-- <th>Tanggal</th> -->
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach ($pendapatan as $pendapatan) { ?>
              <tr>
                <td>
                <div class="btn-group">
                  <button type="button" class="btn btn-outline-success dropdown-toggle dropdown-icon" data-toggle="dropdown">
                    <span class="sr-only">Toggle Dropdown</span><?php echo $no ?>
                  </button>
                  <div class="dropdown-menu" role="menu">
                    <a class="dropdown-item bg-info" href="<?php echo base_url('admin/apbdes/edit/'.$pendapatan->id_anggaran) ?>">Edit Data</a>
                    <a class="dropdown-item bg-danger" onclick="return confirm('Yakin ingin menghapus data ini?')" href="<?php echo base_url('admin/apbdes/delete/'.$pendapatan->id_anggaran) ?>">Delete Data</a>
                  </div>
                </div>
                </td>
                <td><?php echo $pendapatan->bidang ?></td>
                <td><?php echo $pendapatan->sub_bidang ?></td>
                <td><?php echo $pendapatan->nama_anggaran ?></td>
                <td><?php echo number_format($pendapatan->nominal,2,",",".") ?></td>
                <!-- <td><?php echo date('d-m-Y',strtotime($pendapatan->waktu_post)) ?></td> -->
              </tr>
              <?php
              $no++; 
              }
              ?>
            </tbody>
          </table>
        </div>
        <!-- /.table-responsive -->
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>

  <div class="col-lg-6 col-12">
  <!-- TABLE: LATEST ORDERS -->
  <div class="card">
    <div class="card-header border-transparent">
      <h3 class="card-title">Belanja</h3>

      <div class="card-tools">
        <button type="button" class="btn btn-tool" data-card-widget="collapse">
          <i class="fas fa-minus"></i>
        </button>
      </div>
    </div>
    <!-- /.card-header -->
    <div class="card-body p-0">
      <div class="table-responsive">
        <table class="table table-bordered table-sm text-center" style="font-size: 15px;">
            <thead>
              <tr class="bg badge-danger text-center">
                <th>No</th>
                <th>Bidang</th>
                <th>Sub Bidang</th>
                <th>Nama Anggaran</th>
                <th>Nominal</th>
                <!-- <th>Tanggal</th> -->
              </tr>
            </thead>
            <tbody>
              <?php $no=1; foreach ($belanja as $belanja) { ?>
              <tr>
                <td>
                  <div class="btn-group">
                    <button type="button" class="btn btn-outline-success dropdown-toggle dropdown-icon" data-toggle="dropdown">
                      <span class="sr-only">Toggle Dropdown</span><?php echo $no ?>
                    </button>
                    <div class="dropdown-menu" role="menu">
                      <a class="dropdown-item bg-info" href="<?php echo base_url('admin/apbdes/edit/'.$belanja->id_anggaran) ?>">Edit Data</a>
                      <a class="dropdown-item bg-danger" onclick="return confirm('Yakin ingin menghapus data ini?')" href="<?php echo base_url('admin/apbdes/delete/'.$belanja->id_anggaran) ?>">Delete Data</a>
                    </div>
                  </div>
                </td>
                <td><?php echo $belanja->bidang ?></td>
                <td><?php echo $belanja->sub_bidang ?></td>
                <td><?php echo $belanja->nama_anggaran ?></td>
                <td><?php echo number_format($belanja->nominal,2,",",".") ?></td>
                <!-- <td><?php echo date('d-m-Y',strtotime($belanja->waktu_post)) ?></td> -->
              </tr>
              <?php
              $no++; 
              }
              ?>
            </tbody>
          </table>
      </div>
      <!-- /.table-responsive -->
    </div>
    <!-- /.card-body -->
  </div>
  <!-- /.card -->
</div>