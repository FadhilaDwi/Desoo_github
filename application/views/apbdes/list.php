<!-- Title Page -->
<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url() ?>assets/upload/image/sliderhome/apbdes.png);">
	<h2 class="l-text2 t-center">
		<?php echo $title ?>
	</h2>
	<p class="m-text13 t-center">
		<?php echo $site->namaweb ?> | <?php echo $site->tagline ?>
	</p>
</section>

<section class="blog bgwhite p-t-80 p-b-10">
	<div class="container">
		<div class="row">
			<div class="col-12 col-lg-4">
				<!-- Block3 -->
				<div class="card">
				  <img src="<?php echo base_url() ?>assets/upload/image/apbdes/2.png" class="card-img-top" alt="pendapatan">
				  <div class="card-body">
				    <h3 class="card-title">Rp <?php echo number_format($sum_pendapatan,2,",",".") ?></h3>
				    <h4 class="card-text">Pendapatan</h4>
				  </div>
				</div>
			</div>

			<div class="col-12 col-lg-4">
				<!-- Block3 -->
				<div class="card">
				  <img src="<?php echo base_url() ?>assets/upload/image/apbdes/1.png" class="card-img-top" alt="pendapatan">
				  <div class="card-body">
				    <h3 class="card-title">Rp <?php echo number_format($sum_belanja,2,",",".") ?></h3>
				    <h4 class="card-text">Belanja</h4>
				  </div>
				</div>
			</div>

			<div class="col-12 col-lg-4">
				<!-- Block3 -->
				<div class="card">
				  <img src="<?php echo base_url() ?>assets/upload/image/apbdes/3.png" class="card-img-top" alt="pendapatan">
				  <div class="card-body">
				    <h3 class="card-title">Rp <?php echo number_format($sisa_anggaran,2,",",".") ?></h3>
				    <h4 class="card-text">Sisa Anggaran</h4>
				  </div>
				</div>
			</div>
		</div>
	</div>
</section>

<section class="blog bgwhite p-t-10 p-b-60">
	<div class="container">
		<div class="row">
		  <div class="col-lg-6 col-12">
		    <!-- TABLE: LATEST ORDERS -->
		    <div class="card">
		      <div class="card-header border-transparent">
		      <h5 class="card-title">Daftar Pendapatan</h5>
		      </div>
		      <!-- /.card-header -->
		      <div class="card-body p-0">
		        <div class="table-responsive">
		          <table class="text table table-sm table-bordered" style="font-size: 12px;">
		            <thead>
		              <tr class="bg bg-success">
		                <th class="text-center">No</th>
		                <th class="text-center">Bidang</th>
		                <th class="text-center">Sub Bidang</th>
		                <th class="text-center">Nama Anggaran</th>
		                <th class="text-center">Nominal</th>
		                <!-- <th class="text-center">Tanggal</th> -->
		              </tr>
		            </thead>
		            <tbody>
		              <?php $no=1; foreach ($pendapatan as $pendapatan) { ?>
		              <tr>
		                <td class="text-center"><?php echo $no ?></td>
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
		    <h5 class="card-title">Daftar Belanja</h5>
		    </div>
		    <!-- /.card-header -->
		    <div class="card-body p-0">
		      <div class="table-responsive">
		        <table class="table table-bordered table-sm" style="font-size: 12px;">
		            <thead>
		              <tr class="bg bg-danger">
		                <th class="text-center">No</th>
		                <th class="text-center">Bidang</th>
		                <th class="text-center">Sub Bidang</th>
		                <th class="text-center">Nama Anggaran</th>
		                <th class="text-center">Nominal</th>
		                <!-- <th class="text-center">Tanggal</th> -->
		              </tr>
		            </thead>
		            <tbody>
		              <?php $no=1; foreach ($belanja as $belanja) { ?>
		              <tr>
		                <td class="text-center"><?php echo $no ?></td>
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
		</div>
	</div>
</section>