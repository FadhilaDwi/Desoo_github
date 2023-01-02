<!-- Title Page -->
	<section class="bg-title-page p-t-50 p-b-40 flex-col-c-m" style="background-image: url(<?php echo base_url() ?>assets/upload/image/sliderhome/berita.png);">
		<h2 class="l-text2 t-center">
			<?php echo $title ?>
		</h2>
		<p class="m-text13 t-center">
			<?php echo $site->namaweb ?> | <?php echo $site->tagline ?>
		</p>
	</section>

	<!-- content page -->
	<section class="blog bgwhite p-t-80 p-b-60">
		<div class="container">
			<div class="row">
				<?php foreach($berita as $berita) { ?>
					<div class="col-sm-10 col-md-4 p-b-30 m-l-r-auto">
						<!-- Block3 -->
						<div class="block3">
							<a href="<?php echo base_url('berita/detail/'.$berita->id_berita) ?>" class="block3-img dis-block hov-img-zoom">
								<img src="<?php echo base_url('assets/upload/image/gambar_berita/'.$berita->gambar_berita) ?>" class="img img-responsive img" height="250">
							</a>

							<div class="block3-txt p-t-14">
								<h4 class="p-b-7">
									<a href="<?php echo base_url('berita/detail/'.$berita->id_berita) ?>" class="m-text11">
										<?php echo $berita->judul_berita ?>
									</a>
								</h4>

								<span class="s-text6">By</span> <span class="s-text7">Admin</span>
								<span class="s-text6">on</span> <span class="s-text7"><?php echo date('d-m-Y',strtotime($berita->waktu_post)) ?></span>

								<p class="s-text8 p-t-16">
									<?php echo substr($berita->isi_berita, 0, 120) ?>...
								</p>
							</div>
						</div>
					</div>
				<?php } ?>
			</div>
		</div>
	</section>