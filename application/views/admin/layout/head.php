<?php
  //loading konfigurasi website
  $site             = $this->konfigurasi_model->listing();
  $total_menunggu   = $this->pengajuan_model->total_menunggu();
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <title><?php echo $title ?></title>
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
<!--===============================================================================================-->
  <!-- icon web -->
  <link rel="icon" type="image/png" href="<?php echo base_url('assets/upload/image/'.$site->icon) ?>"
  />
<!--===============================================================================================-->
  <!-- Font Awesome -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/fontawesome-free/css/all.min.css">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="<?php echo base_url() ?>assets/admin/dist/css/adminlte.min.css">
  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
  <!-- ckeditor -->
  <script src="<?php echo base_url() ?>assets/ckeditor/ckeditor.js" type="text/javascript"></script>
  <script src="<?php echo base_url() ?>assets/ckeditor/samples/js/sample.js" type="text/javascript"></script>

</head>
<body class="hold-transition sidebar-mini">
<div class="wrapper">