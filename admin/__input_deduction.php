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
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
    <link rel="stylesheet" href="../plugins/morris/morris.css">
    <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker-bs3.css">
    <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">
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
            Data Attendance
            <small>HRMS</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Data Attendance</li>
          </ol>
        </section>
        <section class="content">
          <div class="row">
            <section class="col-lg-12 connectedSortable">
              <div class="box box-primary">
                <div class="box-header">
                  <i class="ion ion-clipboard"></i>
                  <h3 class="box-title">Input Data Attedance</h3>
                  <div class="box-tools pull-right">
                  <form action='input_deduction.php' method="POST">
    	             <div class="input-group" style="width: 230px;">
                      <input type="text" name="qcari" class="form-control input-sm pull-right" placeholder="Cari Nama">
                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-sm btn-default tooltips" data-placement="bottom" data-toggle="tooltip" title="Cari Data"><i class="fa fa-search"></i></button>
                        <a href="input_deduction.php" class="btn btn-sm btn-success tooltips" data-placement="bottom" data-toggle="tooltip" title="Refresh"><i class="fa fa-refresh"></i></a>
                      </div>
                    </div>
                    </form>
                  </div> 
                </div>
                
                <div class="box-body">	
                  <?php
                    $query1="select * from absen";
                    if(isset($_POST['qcari'])){
	               $qcari=$_POST['qcari'];
	               $query1="SELECT * FROM  absen 
	               where id_absen like '%$qcari%'
	               or nama like '%$qcari%'  ";
                    }
                    $tampil=mysqli_query($koneksi, $query1) or die(mysqli_error());
                    ?>
                  <table id="example" class="table table-responsive table-hover table-bordered">
                  <thead>
                      <tr>
						<th class="text-center">No</th>
						<th class="text-center">Nama</th>
						<th class="text-center">Tanggal</th>
						<th class="text-center">Scan Masuk</th>
						<th class="text-center">Scan Keluar</th>
						<th class="text-center">Terlambat</th>
						<th class="text-center">Absent</th>
						<th class="text-center">Jml Kehadiran</th>
						<th class="text-center">Remaks On Duty</th>
						<th class="text-center">Remaks Izin</th>
						<th class="text-center">Keterangan</th>
						<th class="text-center">Input remaks</th>
						<th class="text-center"> Action </th> 
					</tr>
                  </thead>
                     <?php 
                     $no=0;
                     while($data=mysqli_fetch_array($tampil)){
										if ($data['ket']=='1'){$ket = "<span class='btn-primary' style='padding:5px;'>Cuti</span>";}
										else if ($data['ket']=='2'){$ket = "<span class='btn-pink' style='padding:5px;'>Izin</span>";}
										else if ($data['ket']=='3'){$ket = "<span class='btn btn-sm btn-success' style='padding:5px;'>Sakit</span>";}
										else if ($data['ket']=='4'){$ket = "<span class='btn-danger' style='padding:5px;'>Alpha</span>";}
										else if ($data['ket']=='5'){$ket = "<span class='btn-warning' style='padding:5px;'>Cuti Menikah</span>";}
										else if ($data['ket']=='6'){$ket = "<span class='btn-purple' style='padding:5px;'>Duty</span>";}
										else {$ket = "null";}
                    { $no++; ?>
                    <tbody>
						<tr>
							<td><center><?php echo $no; ?></center></td>
							<td><center><?php echo $data['nama'];?></center></td>
							<td><center><?php echo $data['tanggal'];?></center></td>
							<td><center><?php echo $data['scanMasuk'];?></center></td>
							<td><center><?php echo $data['scanPulang'];?></center></td>
							<td><center><?php echo $data['terlambat'];?></center></td>
							<td><center><?php echo $data['absent'];?></center></td>
							<td><center><?php echo $data['jmlKehadiran'];?></center></td>
							<td><center><?php echo $data['remaks_izin'];?></center></td>
							<td><center><?php echo $data['remaks_duty'];?></center></td>
							<td align="center"> <?php echo $ket; ?> </td>
							<td>
								<!-- 0=null , 1=cuti , 2=izin , 3=sakit , 4=alpha , 5=cuti nikah , 6=duty -->
								<form method="POST" action="aksi_absen.php?module=absen&act=izin&id=<?php echo $data['id_absen']; ?>" enctype='multipart/form-data'>
									<div class="input-group">
										<input type="text" class="form-control" name="remaks_izin" placeholder="Remaks Izin" />
										<div class="input-group-btn">
											<button type="submit" class="btn btn-pink btn-sm" style="width:50px;">
												Izin
											</button>
										</div>
									</div>
								</form>
								<form method="POST" action="aksi_absen.php?module=absen&act=duty&id=<?php echo $data['id_absen']; ?>" enctype='multipart/form-data'>
									<div class="input-group">
										<input type="text" class="form-control" name="remaks_duty" placeholder="Remaks Duty" />
										<div class="input-group-btn">
											<button type="submit" class="btn btn-purple btn-sm" style="width:50px;">
												Duty
											</button>
										</div>
									</div>
								</form>
							</td>
							<td>
								<!-- 0=null , 1=cuti , 2=izin , 3=sakit , 4=alpha -->
								<div class="hidden-sm hidden-xs btn-group">
									<a href="aksi_absen.php?module=absen&act=null&id=<?php echo $data['id_absen']; ?>">
										<button class="btn btn-xs btn-warning"> Null </button>
									</a>
								</div>
								<?php } ?>
								
								<div class="hidden-sm hidden-xs btn-group">
									<a href="aksi_absen.php?module=absen&act=sakit&id=<?php echo $data['id_absen']; ?>">
										<button class="btn btn-xs btn-success"> Sakit </button>
									</a>
								</div>
								<div class="hidden-sm hidden-xs btn-group">
									<a href="aksi_absen.php?module=absen&act=cuti&id=<?php echo $data['id_absen']; ?>">
										<button class="btn btn-xs btn-primary"> Cuti </button>
									</a>
								</div>
								<div class="hidden-sm hidden-xs btn-group">
									<a href="aksi_absen.php?module=absen&act=cuti_nikah&id=<?php echo $data['id_absen']; ?>">
										<button class="btn btn-xs btn-warning"> CN </button>
									</a>
								</div>
								<div class="hidden-sm hidden-xs btn-group">
									<a href="aksi_absen.php?module=absen&act=alpha&id=<?php echo $data['id_absen']; ?>">
										<button class="btn btn-xs btn-danger"> Alpha </button>
									</a>
								</div>
							</td>
						</tr>
							<?php   
								} 
							?>
						</tbody>
					</table>
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
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="../plugins/morris/morris.min.js"></script>
    <script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <script src="../plugins/knob/jquery.knob.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
    <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <script src="../dist/js/app.min.js"></script>
    <script src="../dist/js/pages/dashboard.js"></script>
    <script src="../dist/js/demo.js"></script>
  </body>
</html>
