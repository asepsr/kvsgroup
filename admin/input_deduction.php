<?php 
session_start();
if (empty($_SESSION['username'])){
header('location:../index.php');	
} else {
include "../conn.php";
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>HRMS (Human Resource Management System)</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="../css/font-awesome.min.css">
		<link rel="stylesheet" href="../css/ionicons.min.css">
		<link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
		<link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
		<link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
		<link rel="stylesheet" href="../plugins/morris/morris.css">
		<link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
		<link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
		<link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker-bs3.css">
		<link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
		<link rel="stylesheet" href="../plugins/datatables/dataTables.bootstrap.css"/>
	</head>
	<body class="hold-transition skin-blue sidebar-mini">
		<div class="wrapper">
			<?php include "header.php"; ?>
			<?php include "menu.php"; ?>
			<?php
			$timeout = 10; // Set timeout minutes
			$logout_redirect_url = "../index.php"; // Set logout URL

			$timeout = $timeout * 60; // Converts minutes to seconds
			if (isset($_SESSION['start_time'])) {
			$elapsed_time = time() - $_SESSION['start_time'];
			if ($elapsed_time >= $timeout) {
			session_destroy();
			echo "<script>alert('Session Anda Telah Habis!'); window.location = '$logout_redirect_url'</script>";
			}
			}
			$_SESSION['start_time'] = time();
			?>
			<?php } ?>
		<div class="content-wrapper">
			<section class="content-header">
				<h1>
					Data Record <small>HRMS</small>
				</h1>
				<ol class="breadcrumb">
					<li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
					<li class="active">Record</li>
				</ol>
			</section>
			<section class="content">
				<div class="row">
					<section class="col-lg-12 connectedSortable">
						<div class="box box-primary">
						<div class="box-header">
							<i class="ion ion-clipboard"></i>
							<h3 class="box-title">Data Record Finger Karyawan</h3>
							<div class="box-tools pull-right">
							</div> 
						</div>
						<div class="box-body">
							<?php
								if(isset($_GET['aksi']) == 'delete'){
								$id = $_GET['id'];
								$cek = mysqli_query($koneksi, "SELECT * FROM absen WHERE id_absen='$id'");
								if(mysqli_num_rows($cek) == 0){
									echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data tidak ditemukan.</div>';
								}else{
									$delete = mysqli_query($koneksi, "DELETE FROM absen WHERE id_absen='$id'");
									if($delete){
										echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data berhasil dihapus.</div>';
									}else{
										echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button> Data gagal dihapus.</div>';
									}
								}
								}
							?>
							<div class="table">
							<table id="lookup" class="table table-bordered table-hover">  
								<thead bgcolor="eeeeee" align="center">   
									<tr>
										<th>Nama</th>
										<th>Tanggal</th>
										<th>Jam Kerja</th>
										<th>Scan Masuk</th>
										<th>Scan Keluar</th>
										<th>Terlambat</th>
										<th>Absent</th>
										<th>Pulang Cepat</th>
										<th>Jml Kehadiran</th>
										<th>Depertement</th>
										<th>keterangan</th>
										<th class="text-center"> Action </th> 
									</tr>
								</thead>
								<tbody>
								</tbody>
							</table>
							<b>Note : Data ini di Ambil Dari mesin finger print</b>  
							</div>
						</div>
						<div class="box-footer clearfix no-border">
						  <a href="input-member.php" class="btn btn-sm btn-default pull-right"><i class="fa fa-plus"></i> Tambah Member</a>
						  </div>
						</div>
					</section>
				</div>
			</section>
		</div>
		<?php include "footer.php"; ?>

		<?php include "sidecontrol.php"; ?>
		<div class="control-sidebar-bg"></div>
		</div>
		<script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
		<script src="../bootstrap/js/bootstrap.min.js"></script>
		<script src="../plugins/datatables/jquery.dataTables.min.js"></script>
		<script src="../plugins/datatables/dataTables.bootstrap.min.js"></script>
		<script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
		<script src="../plugins/fastclick/fastclick.min.js"></script>
		<script src="../dist/js/app.min.js"></script>
		<script src="../dist/js/demo.js"></script>
		<script>
		$(document).ready(function() {
		var dataTable = $('#lookup').DataTable( {
			"processing": true,
			"serverSide": true,
			"ajax":{
				url :"ajaxin-grid-data.php", // json datasource
				type: "post",  // method  , by default get
				error: function(){  // error handling
					$(".lookup-error").html("");
					$("#lookup").append('<tbody class="employee-grid-error"><tr><th colspan="3">No data found in the server</th></tr></tbody>');
					$("#lookup_processing").css("display","none");
					
				}
			}
		} );
		} );
		</script>
	</body>
</html>
