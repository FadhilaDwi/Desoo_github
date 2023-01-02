<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?php echo base_url('admin/dashboard') ?>" class="brand-link">
    <img src="<?php echo base_url('assets/upload/image/icon.png')?>"
    alt="AdminLTE Logo"
    class="brand-image img-circle elevation-3"
    style="opacity: 1">
    <span class="brand-text font-weight-light"><b>Desoo</b></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?php echo base_url() ?>assets/admin/dist/img/user2-160x160.jpg" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><b><?php echo $this->session->userdata('nama'); ?></b></a>
        <a href="#" class="d-block text-xs"><?php echo $this->session->userdata('jabatan'); ?></a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
        with font-awesome or any other icon font library -->

        <!-- MENU DASHBOARD -->
        <li class="nav-item">
          <a href="<?php echo base_url('admin/dashboard') ?>" class="nav-link">
            <i class="nav-icon fa fa-chart-line"></i>
            <p>DASHBOARD</p>
          </a>
        </li>

        <!-- MENU DASHBOARD -->
        <li class="nav-item">
          <a href="<?php echo base_url('') ?>" class="nav-link">
            <i class="nav-icon fa fa-home"></i>
            <p>HALAMAN UTAMA</p>
          </a>
        </li>

        <!-- MENU PENGAJUAN -->
        <li class="nav-item">
          <a href="<?php echo base_url('admin/pengajuan') ?>" class="nav-link">
            <i class="nav-icon fa fa-envelope-open"></i>
            <p>PENGAJUAN SURAT
              <span class="badge badge-warning right"><?php echo $total_menunggu->total ?></span>
            </p>
          </a>
        </li>


        <!-- MENU SURAT -->
        <li class="nav-item">
          <a href="<?php echo base_url('admin/surat') ?>" class="nav-link">
            <i class="nav-icon fas fa-envelope"></i>
            <p>SURAT</p>
          </a>
        </li>

        <!-- MENU USER -->
        <li class="nav-item">
          <a href="<?php echo base_url('admin/user') ?>" class="nav-link">
            <i class="nav-icon fas fa-user"></i>
            <p>ADMIN</p>
          </a>
        </li>

        <!-- MENU PENDUDUK -->
        <li class="nav-item">
          <a href="<?php echo base_url('admin/penduduk') ?>" class="nav-link">
            <i class="nav-icon fas fa-users"></i>
            <p>PENDUDUK</p>
          </a>
        </li>

        <!-- MENU BERITA -->
        <li class="nav-item">
          <a href="<?php echo base_url('admin/berita') ?>" class="nav-link">
            <i class="nav-icon fas fa-newspaper"></i>
            <p>BERITA DESA</p>
          </a>
        </li>

        <!-- MENU PEMDES -->
        <li class="nav-item">
          <a href="<?php echo base_url('admin/pemdes') ?>" class="nav-link">
            <i class="nav-icon fa fa-gavel"></i>
            <p>PEMERINTAHAN DESA</p>
          </a>
        </li>

        <!-- MENU PENGADUAN -->
        <li class="nav-item">
          <a href="<?php echo base_url('admin/pengaduan') ?>" class="nav-link">
            <i class="nav-icon fa fa-exclamation-triangle"></i>
            <p>PENGADUAN PENDUDUK</p>
          </a>
        </li>

        <!-- MENU APBDes -->
        <!-- <li class="nav-item">
        <a href="<?php echo base_url('admin/apbdes') ?>" class="nav-link">
        <i class="nav-icon fa fa-chart-pie"></i>
        <p>APBDes</p>
      </a>
    </li> -->

    <!-- MENU KONFIGURASI -->
    <li class="nav-item has-treeview">
      <a href="#" class="nav-link">
        <i class="nav-icon fas fa-wrench"></i>
        <p>
          KONFIGURASI DESA
          <i class="right fas fa-angle-left"></i>
        </p>
      </a>
      <ul class="nav nav-treeview">
        <li class="nav-item">
          <a href="<?php echo base_url('admin/konfigurasi') ?>" class="nav-link">
            <i class="fa fa-home nav-icon text-info"></i>
            <p>Konfigurasi Umum</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('admin/konfigurasi/logo') ?>" class="nav-link">
            <i class="fa fa-image nav-icon text-info"></i>
            <p>Konfigurasi Logo</p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?php echo base_url('admin/konfigurasi/icon') ?>" class="nav-link">
            <i class="fa fa-icons nav-icon text-info"></i>
            <p>Konfigurasi Icon</p>
          </a>
        </li>
      </ul>
    </li>
  </ul>
</nav>
<!-- /.sidebar-menu -->
</div>
<!-- /.sidebar -->
</aside>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1><?php echo $title ?></h1>
        </div>
        <div class="col-sm-6">
          <!-- <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">DataTables</li>
          </ol> -->
        </div>
      </div>
    </div>
  </section>
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-body">
