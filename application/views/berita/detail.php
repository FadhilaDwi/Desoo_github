	<!-- content page -->
	<section class="bgwhite p-t-60 p-b-25">
		<div class="container">
			<div class="row">
				<div class="col-md-8 col-lg-9 p-b-80">
					<div class="p-r-50 p-r-0-lg">
						<div class="p-b-40">
							<div class="blog-detail-img wrap-pic-w">
								<img src="<?php echo base_url('assets/upload/image/gambar_berita/'.$berita->gambar_berita) ?>" class="img img-responsive img">
							</div>

							<div class="blog-detail-txt p-t-33">
								<h4 class="p-b-11 m-text24">
									<?php echo $berita->judul_berita ?>
								</h4>

								<div class="s-text8 flex-w flex-m p-b-16">
									<span>
										By Admin
										<span class="m-l-3 m-r-6">|</span>
									</span>

									<span>
										<?php echo date('d-m-Y',strtotime($berita->waktu_post)) ?>
										<span class="m-l-3 m-r-6">|</span>
									</span>

									<span>
										<?php echo $berita->kategori_berita ?>
									</span>
								</div>

								<p class="p-b-25">
									<?php echo $berita->isi_berita ?>
								</p>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-4 col-lg-3 p-b-30">
					<div class="rightbar">
						<!-- Search -->
						<div class="pos-relative bo11 of-hidden">
							<input class="s-text7 size16 p-l-23 p-r-50" type="text" name="search-product" placeholder="Search">

							<button class="flex-c-m size5 ab-r-m color1 color0-hov trans-0-4">
								<i class="fs-13 fa fa-search" aria-hidden="true"></i>
							</button>
						</div>

						<!-- Categories -->
						<h4 class="m-text23 p-t-56 p-b-34">
							Categories
						</h4>

						<ul>
							<li class="p-t-6 p-b-8 bo6">
								<a href="#" class="s-text13 p-t-5 p-b-5">
									Pembangunan
								</a>
							</li>

							<li class="p-t-6 p-b-8 bo7">
								<a href="#" class="s-text13 p-t-5 p-b-5">
									Bantuan
								</a>
							</li>

							<li class="p-t-6 p-b-8 bo7">
								<a href="#" class="s-text13 p-t-5 p-b-5">
									Kasus
								</a>
							</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
	</section>