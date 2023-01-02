<!-- APBDes -->
<section class="blog bg5 p-t-60 p-b-60">
	<div class="container">
		<div class="sec-title p-b-15">
			<h3 class="m-text5 t-center">
				APBDes
			</h3>
		</div>
		<h5 class="m-text26 t-center p-b-35">
			Pelaksanaan APBDes
		</h5>
		<div class="row p-b-35">
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
		<div class="row justify-content-center">
			<div class="btn-addcart-product-detail size12 trans-0-4 m-t-10">
				<a href="<?php echo base_url('apbdes') ?>" class="flex-c-m sizefull bgwhite bo-rad-23 hov1 s-text2 trans-0-4">Lihat Detail</a>
			</div>
		</div>
	</div>
</section>