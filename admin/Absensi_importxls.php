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
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Karyawan
            <small>HRMS</small>
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
                  <h3 class="box-title">Import Data Karyawan</h3>
                  <div class="box-tools pull-right">
                  </div> 
                <div class="box-body">
                <div class="alert alert-warning alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Pastikan file excel yang akan di import merupakan excel 2003 (.xls) untuk format import excel anda bisa download <a href="format_import/datakaryawan.xls"> di sini </a></div>
                                        <?php
//koneksi ke database, username,password  dan namadatabase menyesuaikan 
//mysql_connect('localhost', 'username', 'password');
//mysql_select_db('namadatabase');
 
//memanggil file excel_reader
require "excel_reader.php";
 
//jika tombol import ditekan
if(isset($_POST['submit'])){
 
    $target = basename($_FILES['filepegawaiall']['name']) ;
    move_uploaded_file($_FILES['filepegawaiall']['tmp_name'], $target);
    
    $data = new Spreadsheet_Excel_Reader($_FILES['filepegawaiall']['name'],false);
    
//    menghitung jumlah baris file xls
    $baris = $data->rowcount($sheet_index=0);
    
//    jika kosongkan data dicentang jalankan kode berikut
    $drop = isset( $_POST["drop"] ) ? $_POST["drop"] : 0 ;
    if($drop == 1){
//             kosongkan tabel pegawai
             $truncate ="TRUNCATE TABLE absen";
             mysqli_query($koneksi, $truncate);
    };
    
//    import data excel mulai baris ke-2 (karena tabel xls ada header pada baris 1)
    for ($i=2; $i<=$baris; $i++)
    {
//       membaca data (kolom ke-1 sd terakhir)
      $id_absen		= $data->val($i, 1);
      $nama			= $data->val($i, 2);
      $tanggal		= $data->val($i, 3);
      $jam_kerja	= $data->val($i, 4);
      $scanMasuk	= $data->val($i, 5);
      $scanPulang	= $data->val($i, 6); 
      $terlambat	= $data->val($i, 7);    
      $absent		= $data->val($i, 8); 
      $pulangCepat	= $data->val($i, 9);
      $jmlKehadiran	= $data->val($i, 10);
      $dept			= $data->val($i, 11);    
      $ket			= $data->val($i, 12);    
      $remaks_izin	= $data->val($i, 13);    
      $remaks_duty	= $data->val($i, 14);    
 
//      setelah data dibaca, masukkan ke tabel pegawai sql
      $query = "INSERT INTO absen (id_absen, nama, tanggal, jam_kerja, scanMasuk, scanPulang, terlambat, absent, pulangCepat, jmlKehadiran, dept, ket, remaks_izin, remaks_duty) VALUES 
                      ('$id_absen','$nama','$tanggal','$jam_kerja','$scanMasuk','$scanPulang','$terlambat','$absent','$pulangCepat','$jmlKehadiran','$dept','$ket','$remaks_izin','$remaks_duty')";
      $hasil = mysqli_query($koneksi, $query);
    }
    
    if(!$hasil){
//          jika import gagal
          die(mysqli_error());
      }else{
//          jika impor berhasil
          echo '<div class="alert alert-success alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data berhasil di import</div>';
    }
    
//    hapus file xls yang udah dibaca
    unlink($_FILES['filepegawaiall']['name']);
}
 
?>
 
<form name="myForm" id="myForm" onSubmit="return validateForm()" action="Absensi_importxls.php" method="post" enctype="multipart/form-data">
    <input type="file" id="filepegawaiall" class="form-control" name="filepegawaiall" required /><br />
    <input type="submit" name="submit" class="brn btn-sm btn-success" value="Import" /><br/>
    <label><input type="checkbox" name="drop" value="1" /> <u>Kosongkan tabel sql terlebih dahulu.</u> </label>
</form>
 
<script type="text/javascript">
//    validasi form (hanya file .xls yang diijinkan)
    function validateForm()
    {
        function hasExtension(inputID, exts) {
            var fileName = document.getElementById(inputID).value;
            return (new RegExp('(' + exts.join('|').replace(/\./g, '\\.') + ')$')).test(fileName);
        }
 
        if(!hasExtension('filepegawaiall', ['.xls'])){
            alert("Hanya file XLS (Excel 2003) yang diijinkan.");
            return false;
        }
    }
</script
                </div><!-- /.box-body -->
              </div><!-- /.box -->

            </section><!-- /.Left col -->
          </div><!-- /.row (main row) -->

        </section><!-- /.content -->
      </div><!-- /.content-wrapper -->
      <?php include "footer.php"; ?>

      <?php include "sidecontrol.php"; ?>
      <!-- Add the sidebar's background. This div must be placed
           immediately after the control sidebar -->
      <div class="control-sidebar-bg"></div>
    </div><!-- ./wrapper -->

    <!-- jQuery 2.1.4 -->
    <script src="../plugins/jQuery/jQuery-2.1.4.min.js"></script>
    <!-- jQuery UI 1.11.4 -->
    <script src="../css/jquery-ui.min.js"></script>
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
