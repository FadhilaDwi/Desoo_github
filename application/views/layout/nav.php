	<!-- Header -->
	<header class="header1">
		<!-- Header desktop -->
		<div class="container-menu-header">
			<div class="topbar">
				<div class="topbar-social">
					<!-- <a href="<?php echo $site->facebook ?>" class="topbar-social-item fa fa-facebook"></a>
					<a href="<?php echo $site->instagram ?>" class="topbar-social-item fa fa-instagram"></a> -->
					<span class="topbar-email">
						<a class="topbar-social-item fa fa-map-marker"></a> <?php echo $site->kode_pos ?>
					</span>
				</div>

				<span class="topbar-child1">
					<?php echo $site->alamat ?>
				</span>

				<div class="topbar-child2">
					<span class="topbar-email">
						<?php echo $site->email ?>
					</span>
				</div>
			</div>
			<div class="wrap_header">

				<!-- Logo -->
				<a href="<?php echo base_url() ?>" class="logo m-text2 text-left">
					<img src="<?php echo base_url('assets/upload/image/'.$site->logo) ?>" alt="<?php echo $site->namaweb ?> | <?php echo $site->tagline ?>">
				</a>

				<!-- Menu -->
				<div class="wrap_menu">
					<nav class="menu">
						<ul class="main_menu">
							<!-- home -->
							<li>
								<a href="<?php echo base_url() ?>">Home</a>
							</li>

							<li>
								<a href="<?php 	echo base_url('surat') ?>">Layanan Surat</a>
							</li>

							<li>
								<a href="<?php echo base_url('berita') ?>">Berita</a>
							</li>

							<li>
								<a href="<?php echo base_url('pemdes') ?>">Pemerintahan Desa</a>
							</li>

							<li>
								<a href="<?php echo base_url('galeri') ?>">Galeri</a>
							</li>

							<li>
								<a href="<?php echo base_url('statistik') ?>">Statistik</a>
							</li>

							<!-- <li>
								<a href="<?php echo base_url('apbdes') ?>">APBDes</a>
							</li> -->
						</ul>
					</nav>
				</div>

				<!-- Header Icon -->
				<div class="header-icons">
					<?php if($this->session->userdata('nik')){ ?>
						<a href="<?php echo base_url('dashboard') ?>" class="header-wrapicon1 dis-block">
							<img src="<?php echo base_url() ?>assets/public/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
							<?php echo $this->session->userdata('nama_penduduk'); ?>
						</a>
						<span class="linedivide2"></span>
						<a href="<?php echo base_url('masuk/logout') ?>" class="header-wrapicon1 dis-block">
							<i class="fa fa-sign-out"></i>
						</a>
					<?php } else { ?>
						<a href="<?php echo base_url('dashboard') ?>" class="header-wrapicon1 dis-block">
							<img src="<?php echo base_url() ?>assets/public/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
						</a>
					<?php } ?>
				</div>
			</div>
		</div>

		<!-- Header Mobile -->
		<div class="wrap_header_mobile">
			<!-- Logo moblie -->
			<a href="<?php echo base_url() ?>" class="logo-mobile m-text2 text-left">
				<img src="<?php echo base_url('assets/upload/image/'.$site->logo) ?>"alt="<?php echo $site->namaweb ?> | <?php echo $site->tagline ?>">
			</a>

			<!-- Button show menu -->
			<div class="btn-show-menu">
				<!-- Header Icon mobile -->
				<div class="header-icons-mobile">
					<!---------------------------------------------------------------------------------------------------------------------------------------------->
					<?php if($this->session->userdata('nik')){ ?>
						<a href="<?php echo base_url('dashboard') ?>" class="header-wrapicon1 dis-block">
							<img src="<?php echo base_url() ?>assets/public/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
						</a>
						<span class="linedivide2"></span>
						<a href="<?php echo base_url('masuk/logout') ?>" class="header-wrapicon1 dis-block">
							<i class="fa fa-sign-out"></i>
						</a>
					<?php } else { ?>
						<a href="<?php echo base_url('dashboard') ?>" class="header-wrapicon1 dis-block">
							<img src="<?php echo base_url() ?>assets/public/images/icons/icon-header-01.png" class="header-icon1" alt="ICON">
						</a>
					<?php } ?>
					<!---------------------------------------------------------------------------------------------------------------------------------------------->
				</div>

				<div class="btn-show-menu-mobile hamburger hamburger--squeeze">
					<span class="hamburger-box">
						<span class="hamburger-inner"></span>
					</span>
				</div>
			</div>
		</div>

		<!-- Menu Mobile -->
		<div class="wrap-side-menu" >
			<nav class="side-menu">
				<ul class="main-menu">
					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<span class="topbar-child1">
							<?php echo $site->alamat ?>
						</span>
					</li>

					<li class="item-topbar-mobile p-l-20 p-t-8 p-b-8">
						<div class="topbar-child2-mobile">
							<span class="topbar-email">
								<?php echo $site->email ?>
							</span>
						</div>
					</li>

					<li class="item-topbar-mobile p-l-10 p-t-8 p-b-8">
						<div class="topbar-social-mobile">
							<!-- <a href="<?php echo $site->facebook ?>" class="topbar-social-item fa fa-facebook"></a>
							<a href="<?php echo $site->instagram ?>" class="topbar-social-item fa fa-instagram"></a> -->
							<span class="topbar-email">
								<a class="topbar-social-item fa fa-map-marker"></a> <?php echo $site->kode_pos ?>
							</span>
						</div>
					</li>
					<!-- Mobile Home Page -->
					<li class="item-menu-mobile">
						<a href="<?php echo base_url() ?>">Home</a>
					</li>
					
					<li class="item-menu-mobile">
						<a href="<?php 	echo base_url('surat') ?>">Layanan Surat</a>
					</li>

					<li class="item-menu-mobile">
						<a href="<?php echo base_url('berita') ?>">Berita</a>
					</li>

					<li class="item-menu-mobile">
						<a href="<?php echo base_url('pemdes') ?>">Pemerintahan Desa</a>
					</li>

					<li class="item-menu-mobile">
						<a href="<?php echo base_url('galeri') ?>">Galery</a>
					</li>

					<li class="item-menu-mobile">
						<a href="<?php echo base_url('statistik') ?>">Statistik</a>
					</li>

					<!-- <li class="item-menu-mobile">
						<a href="<?php echo base_url('apbdes') ?>">APBDes</a>
					</li> -->
				</ul>
			</nav>
		</div>
	</header>