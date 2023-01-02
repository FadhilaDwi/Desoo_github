<?php
	$site = $this->konfigurasi_model->listing();
 ?>
 	<!-- Description -->
	<section class="shipping bgwhite p-t-60 p-b-60">
		<div class="flex-w p-l-15 p-r-15">
			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h4 class="m-text12 t-center">
					Layanan Surat 24 jam.
				</h4>

				<a href="<?php echo base_url('surat') ?>" class="s-text11 t-center">
					Klik disini untuk membuat surat secara online kapanpun dan dimanapun.
				</a>
			</div>

			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 bo2 respon2">
				<h4 class="m-text12 t-center">
					Berita-berita Desa Terbaru
				</h4>

				<a href="<?php echo base_url('berita') ?>" class="s-text11 t-center">
					Menampilkan berita-berita terupdate.
				</a>
			</div>

			<div class="flex-col-c w-size5 p-l-15 p-r-15 p-t-16 p-b-15 respon1">
				<h4 class="m-text12 t-center">
					Pemerintahan Desa
				</h4>

				<a href="<?php echo base_url('pemdes') ?>" class="s-text11 t-center">
					Pemerintahan Desa <?php echo $site->namaweb ?>
				</a>
			</div>
		</div>
	</section>

	<!-- Footer -->
	<footer class="bg6 p-t-45 p-b-43 p-l-45 p-r-45">
		<div class="row flex-w p-b-30">

			<div class="col-12 col-md-3 p-t-30 p-l-30 p-r-30">
				<h3 class="s-text12 p-b-20">
					GET IN TOUCH
				</h3>

				<div>
					<p class="s-text7 w-size27">
						<?php echo nl2br($site->alamat) ?>
						<br><i class="fa fa-envelope"></i> <?php echo $site->email ?>
						<br><i class="fa fa-phone"></i> <?php echo $site->telepon ?>
					</p>

					<!-- <div class="flex-m p-t-30">
						<a href="<?php echo $site->facebook ?>" class="topbar-social-item fa fa-facebook"></a>
						<a href="<?php echo $site->instagram ?>" class="topbar-social-item fa fa-instagram"></a>
					</div> -->
				</div>
			</div>

			<div class="col-12 col-md-2 p-t-30 p-l-30 p-r-30">
				<h4 class="s-text12 p-b-20">
					Links
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="<?php echo base_url('surat') ?>" class="s-text7">
							Layanan Surat
						</a>
					</li>

					<li class="p-b-9">
						<a href="<?php echo base_url('berita') ?>" class="s-text7">
							Berita
						</a>
					</li>

					<li class="p-b-9">
						<a href="<?php echo base_url('pemdes') ?>" class="s-text7">
							Pemerintahan Desa
						</a>
					</li>

					<li class="p-b-9">
						<a href="<?php echo base_url('statistik') ?>" class="s-text7">
							Statistik
						</a>
					</li>
				</ul>
			</div>

			<div class="col-12 col-md-7 p-t-30 p-l-30 p-r-30" data-aos="fade-up">
	            <div style="height: 100%">
	              <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d31639.392627706646!2d112.62027036863253!3d-7.583243200014459!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7df467f5231a1%3A0xc87b5dce26e33209!2sManduro%20MG%2C%20Kec.%20Ngoro%2C%20Mojokerto%2C%20Jawa%20Timur!5e0!3m2!1sid!2sid!4v1627397691595!5m2!1sid!2sid" width="100%" height="100%" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
	          	</div>
	        </div>

			<!-- <div class="w-size7 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Help
				</h4>

				<ul>
					<li class="p-b-9">
						<a href="" class="s-text7">
							Track Order
						</a>
					</li>

					<li class="p-b-9">
						<a href="" class="s-text7">
							Returns
						</a>
					</li>

					<li class="p-b-9">
						<a href="" class="s-text7">
							Shipping
						</a>
					</li>

					<li class="p-b-9">
						<a href="" class="s-text7">
							FAQs
						</a>
					</li>
				</ul>
			</div> -->

			<!-- <div class="w-size8 p-t-30 p-l-15 p-r-15 respon4">
				<h4 class="s-text12 p-b-30">
					Newsletter
				</h4>

				<form>
					<div class="effect1 w-size9">
						<input class="s-text7 bg6 w-full p-b-5" type="text" name="email" placeholder="email@example.com">
						<span class="effect1-line"></span>
					</div>

					<div class="w-size2 p-t-20">
						<button class="flex-c-m size2 bg4 bo-rad-23 hov1 m-text3 trans-0-4">
							Subscribe
						</button>
					</div>

				</form>
			</div> -->
		</div>

		<div class="t-center p-l-15 p-r-15">
			<div class="t-center s-text8 p-t-20">
				Copyright © 2020 All rights reserved | <a href="<?php echo base_url() ?>login" target="_blank">Desoo</a>
			</div>
		</div>
	</footer>



	<!-- Back to top -->
	<div class="btn-back-to-top bg0-hov" id="myBtn">
		<span class="symbol-btn-back-to-top">
			<i class="fa fa-angle-double-up" aria-hidden="true"></i>
		</span>
	</div>

	<!-- Container Selection1 -->
	<div id="dropDownSelect1"></div>


<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/public/vendor/jquery/jquery-3.2.1.min.js"></script>
	<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/admin/plugins/datatables/jquery.dataTables.min.js"></script>
	<script src="<?php echo base_url() ?>assets/admin/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
	<script src="<?php echo base_url() ?>assets/admin/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/public/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/public/vendor/bootstrap/js/popper.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/public/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/public/vendor/select2/select2.min.js"></script>
	<script type="text/javascript">
	$(".flash").fadeIn(6000).fadeOut(5000);
		$("#example1").DataTable({
			"responsive": true,
		});

		$(".selection-1").select2({
			minimumResultsForSearch: 20,
			dropdownParent: $('#dropDownSelect1')
		});
	</script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/public/vendor/slick/slick.min.js"></script>
	<script type="text/javascript" src="<?php echo base_url() ?>assets/public/js/slick-custom.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/public/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/public/vendor/lightbox2/js/lightbox.min.js"></script>
<!--===============================================================================================-->
	<script type="text/javascript" src="<?php echo base_url() ?>assets/public/vendor/sweetalert/sweetalert.min.js"></script>
	<script type="text/javascript">
		$('.block2-btn-addcart').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to cart !", "success");
			});
		});

		$('.block2-btn-addwishlist').each(function(){
			var nameProduct = $(this).parent().parent().parent().find('.block2-name').html();
			$(this).on('click', function(){
				swal(nameProduct, "is added to wishlist !", "success");
			});
		});
	</script>
<!--===============================================================================================-->
	<script src="<?php echo base_url() ?>assets/public/js/main.js"></script>

</body>
</html>
