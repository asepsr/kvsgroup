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
  </head>
  <body class="hold-transition skin-blue sidebar-mini">
    <div class="wrapper">

      <?php include "header.php"; ?>
      <!-- Left side column. contains the logo and sidebar -->
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
            Attendance
            <small>HRMS</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Admin</li>
          </ol>
        </section>
        <section class="content">
          <div class="row">
            <section class="col-lg-12 connectedSortable">
              <div class="box box-primary">
                <div class="box-header">
                  <i class="ion ion-clipboard"></i>
                  <h3 class="box-title">Rekap Attendance</h3>
                  <div class="box-tools pull-right">
                  <form action='admin.php' method="POST">
    	             <div class="input-group" style="width: 230px;">
                      <input type="text" name="qcari" class="form-control input-sm pull-right" placeholder="Cari Usename Atau Nama">
                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-sm btn-default tooltips" data-placement="bottom" data-toggle="tooltip" title="Cari Data"><i class="fa fa-search"></i></button>
                        <a href="admin.php" class="btn btn-sm btn-success tooltips" data-placement="bottom" data-toggle="tooltip" title="Refresh"><i class="fa fa-refresh"></i></a>
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
						<th>Nama</th>
						<th>Present</th>
						<th>Terlambat</th>
						<th>Deduction late</th>
						<th>Pulang Cepat</th>
						<th>Deduction early</th>
						<th>Cuti</th>
						<th>Izin</th>
						<th>Sick Leave</th>
						<th>Alpha</th>
						<th>Total Present (Day)</th>
						<th>Total Deduction (Day)</th>
					</tr>
                  </thead>
					<?php
						$no=1;
						$sql_tampil = "
							SELECT 
								absen.nama as nama_inti,
								absen.remaks_izin as remaks_izin,
								absen.remaks_duty as remaks_duty,
								count(nama) as tot_present,
								count(nama) as absent
							FROM 
								absen
							GROUP BY nama
						";
						$tampil	= mysqli_query($koneksi, $sql_tampil) or die(mysqli_error());
						while ($data=mysqli_fetch_array($tampil)){
							$nama_inti = $data['nama_inti'];
					?>
                    <tbody>
                    <tr>
					<td><?php echo $data['nama_inti']; ?> </td>
                    <td><?php echo $data['tot_present']; ?> </td>
					<td> 
						<?php											
							$sql1 	= "SELECT count(terlambat) as tot_terlambat, nama FROM absen WHERE terlambat !='' AND terlambat IS NOT NULL AND nama='".$nama_inti."' GROUP BY nama";
							$result=mysqli_query($koneksi,$sql1) or die(mysqli_error());
							  while($row = mysqli_fetch_array($result))
								
									echo  $row['tot_terlambat'];
								
						?> 
					</td>
						
					<td>
					<?php
						$deduc_late = "SELECT count(terlambat) as tot_terlambat, nama FROM absen WHERE terlambat !='' AND terlambat IS NOT NULL AND nama='".$nama_inti."' GROUP BY nama";
						$result=mysqli_query($koneksi,$deduc_late) or die(mysqli_error());
						$row = mysqli_fetch_array($result);
						$total_late = $row['tot_terlambat'];
						$ded_late = $total_late;
							if($ded_late <= 4){
								echo "0";
							}
								else if ($ded_late == 5){
									echo "0.5";
								}
								else if ($ded_late <=10){
									echo "1";
								}
								else if ($ded_late <= 15){
									echo "1.5";
								}
								else if ($ded_late <= 20){
									echo "2";
								}
								else if ($ded_late <= 25){
									echo "2.5";
								}
							else {
								echo "";
							}
							
					?>		
					</td>
					<td>
					<?php											
						$sql1 	= "SELECT count(pulangCepat) as tot_pulangCepat, nama FROM absen WHERE pulangCepat !='' AND pulangCepat IS NOT NULL AND nama='".$nama_inti."' GROUP BY nama";
						$result=mysqli_query($koneksi,$sql1) or die(mysqli_error());
						  while($row = mysqli_fetch_array($result))
							
								echo  $row['tot_pulangCepat'];
							
					?> 
					</td>
					<td>
					<?php
						$deduc_early = "SELECT count(pulangCepat) as tot_pulangCepat, nama FROM absen WHERE pulangCepat !='' AND pulangCepat IS NOT NULL AND nama='".$nama_inti."' GROUP BY nama";
						$result=mysqli_query($koneksi,$deduc_early) or die(mysqli_error());
						$row = mysqli_fetch_array($result);
						$total_early = $row['tot_pulangCepat'];
						$ded_early = $total_early;
							if($ded_early <= 4){
								echo "0";
							}
								else if ($ded_early == 5){
									echo "0.5";
								}
								else if ($ded_early <=10){
									echo "1";
								}
								else if ($ded_early <= 15){
									echo "1.5";
								}
								else if ($ded_early <= 20){
									echo "2";
								}
								else if ($ded_early <= 25){
									echo "2.5";
								}
							else {
								echo "";
							}
							
					?>		
					</td>
					<td> 
					<?php 
						$sql="SELECT count(ket) as tot_cuti, nama FROM absen WHERE ket = '1' AND nama='".$nama_inti."' GROUP BY nama";
						$result=mysqli_query($koneksi,$sql) or die(mysqli_error());
						  while($row = mysqli_fetch_array($result))
							
								echo  $row['tot_cuti'];
							
					?>
					</td>
				<td> 
					<?php											
					$sql4 	= "SELECT count(ket) as tot_izin, nama FROM absen WHERE ket = '2' AND nama='".$nama_inti."' GROUP BY nama";
					$result=mysqli_query($koneksi,$sql4) or die(mysqli_error());
					  while($row = mysqli_fetch_array($result))
					
							echo  $row['tot_izin'];
						
					?> 
				</td>
				<td> 
					<?php											
					$sql5 	= "SELECT count(ket) as tot_sakit, nama FROM absen WHERE ket = '3' AND nama='".$nama_inti."' GROUP BY nama";
					$result=mysqli_query($koneksi,$sql5) or die(mysqli_error());
					  while($row = mysqli_fetch_array($result))
					
							echo  $row['tot_sakit'];
						
					?> 
				</td>
				<td> 
					<?php											
					$sql6 	= "SELECT count(ket) as tot_alpha, nama FROM absen WHERE Absent = 'True' AND nama='".$nama_inti."' GROUP BY nama";
					$result=mysqli_query($koneksi,$sql6) or die(mysqli_error());
					  while($row = mysqli_fetch_array($result))
						
							echo  $row['tot_alpha'];
						
					?> 
				</td>
				<td> 
				<?php
						echo  $row['tot_sakit'] ;
						echo  $row['tot_alpha'];
				?>
				</td>
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
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
      $.widget.bridge('uibutton', $.ui.button);
    </script>
    <!-- Bootstrap 3.3.5 -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
    <!-- Morris.js charts -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
    <script src="../plugins/morris/morris.min.js"></script>
    <!-- Sparkline -->
    <script src="../plugins/sparkline/jquery.sparkline.min.js"></script>
    <!-- jvectormap -->
    <script src="../plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
    <script src="../plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
    <!-- jQuery Knob Chart -->
    <script src="../plugins/knob/jquery.knob.js"></script>
    <!-- daterangepicker -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.2/moment.min.js"></script>
    <script src="../plugins/daterangepicker/daterangepicker.js"></script>
    <!-- datepicker -->
    <script src="../plugins/datepicker/bootstrap-datepicker.js"></script>
    <!-- Bootstrap WYSIHTML5 -->
    <script src="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
    <!-- Slimscroll -->
    <script src="../plugins/slimScroll/jquery.slimscroll.min.js"></script>
    <!-- FastClick -->
    <script src="../plugins/fastclick/fastclick.min.js"></script>
    <!-- AdminLTE App -->
    <script src="../dist/js/app.min.js"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="../dist/js/pages/dashboard.js"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="../dist/js/demo.js"></script>
  </body>
</html>
