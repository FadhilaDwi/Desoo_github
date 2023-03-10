<?php
//loading konfigurasi website
$site   = $this->konfigurasi_model->listing();
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title><?php echo $title ?></title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!--===============================================================================================-->
  <!-- icon web -->
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/upload/image/'.$site->icon) ?>"
  />
  <!--===============================================================================================-->
  <!-- seo google -->
  <meta name="keywords" content="<?php echo $site->keywords ?>">
  <meta name="description" content="<?php echo $title ?>, <?php echo $site->deskripsi ?>">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/public/vendor/bootstrap/css/bootstrap.min.css">

  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/public/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/public/fonts/themify/themify-icons.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/public/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/public/fonts/elegant-font/html-css/style.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/public/vendor/animate/animate.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/public/vendor/css-hamburgers/hamburgers.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/public/vendor/animsition/css/animsition.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/public/vendor/select2/select2.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/public/vendor/daterangepicker/daterangepicker.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/public/vendor/slick/slick.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/public/vendor/lightbox2/css/lightbox.min.css">
  <!--===============================================================================================-->
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/public/css/util.css">
  <link rel="stylesheet" type="text/css" href="<?php echo base_url() ?>assets/public/css/main.css">
  <!--===============================================================================================-->

  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!--===============================================================================================-->
  <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>

  <!-- pagination style -->
  <style type="text/css" media="screen">
    /* ul.pagination	{
    padding: 0 2px;
    background-color: #e6554000;
    border-radius: 15px;
  } */
  .pagination a, .pagination b, .pagination-black a, .pagination-black b {
    padding:  10px 20px;
    text-decoration: none;
    float: left;
  }
  .pagination	a {
    background-color: #4f7942;
    color: white;
    font-weight: bolder;
    font-family: inherit;
    margin-right: 7px;
  }
  .pagination b {
    background-color: #4f7942;
    border-radius: 10px;
    color: white;
    margin-right: 7px;

  }
  .pagination a:hover{
    background-color: #e5e5e5;
    border-radius: 10px;
    color: black;
  }


  .pagination-black	a {
    background-color: #060606;
    color: white;
    font-weight: bolder;
    font-family: inherit;
    margin-right: 7px;
  }
  .pagination-black b {
    background-color: #060606;
    border-radius: 10px;
    color: white;
    margin-right: 7px;

  }
  .pagination-black a:hover{
    background-color: #e5e5e5;
    border-radius: 10px;
    color: black;
  }

  .circle{
    display: inline-block;
    border-radius: 60px;
    box-shadow: 0 0 2px #888;
    padding: 0.5em 0.6em;
  }
  .btn-search{
    margin-left: 11px;
    background-color: #4f7942;
    border-color: #3f3d56;
    color: white;

  }
  .btn-search-black{
    margin-left: 11px;
    background-color: #212529;
    border-color: #3f3d56;
    color: white;

  }
</style>

</head>
<body class="animsition">
