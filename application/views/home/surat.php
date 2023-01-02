<!-- Surat -->
	<section class="blog bgwhite p-t-80 p-b-60">
		<div class="container">
			<div class="sec-title p-b-52">
				<h3 class="m-text5 t-center">
					Layanan Surat
				</h3>
			</div>
			<div class="row">
				<?php foreach($surat as $surat) { ?>
					<div class="col-6 col-md-3 p-b-30 m-l-r-auto ">
						<!-- Block3 -->
						<a href="<?php echo base_url('surat/detail/'.$surat->slug_surat) ?>" class="card text-center">
						<img src="<?php echo base_url() ?>assets/upload/image/letter.png" href="<?php echo base_url() ?>" class="card-img-top" alt="...">
						<div class="card-body">
							<h5 class="card-title"><?php echo $surat->nama_surat ?></h5>
							<p class="card-text"><?php echo $surat->keterangan ?></p>
						</div>
						</a>
					</div>
				<?php } ?>
			</div>
			<div class="row justify-content-center">
				<div class="btn-addcart-product-detail size14 trans-0-4 m-t-10">
					<a href="<?php echo base_url('surat') ?>" class="flex-c-m sizefull bg1 bo-rad-23 hov1 s-text1 trans-0-4">Surat Lainnya</a>
				</div>
			</div>
		</div>
	</section>