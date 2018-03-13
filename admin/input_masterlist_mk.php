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
    <title>MasterList</title>
    <!-- Tell the browser to be responsive to screen width -->
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <!-- Bootstrap 3.3.5 -->
    <link rel="stylesheet" href="../bootstrap/css/bootstrap.min.css">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="../css/font-awesome.min.css">
    <!-- Ionicons -->
    <link rel="stylesheet" href="../css/ionicons.min.css">
    <!-- Theme style -->
    <link rel="stylesheet" href="../dist/css/AdminLTE.min.css">
    <!-- AdminLTE Skins. Choose a skin from the css/skins
         folder instead of downloading all of them to reduce the load. -->
    <link rel="stylesheet" href="../dist/css/skins/_all-skins.min.css">
    <!-- iCheck -->
    <link rel="stylesheet" href="../plugins/iCheck/flat/blue.css">
    <!-- Morris chart -->
    <link rel="stylesheet" href="../plugins/morris/morris.css">
    <!-- jvectormap -->
    <link rel="stylesheet" href="../plugins/jvectormap/jquery-jvectormap-1.2.2.css">
    <!-- Date Picker -->
    <link rel="stylesheet" href="../plugins/datepicker/datepicker3.css">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="../plugins/daterangepicker/daterangepicker-bs3.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet" href="../plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.min.css">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
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
   <script>
	function hitung(){
		var fob = document.getElementById("fob").value;
		var dn =  document.getElementById("dn").value;
		var qty = document.getElementById("qty").value;
		
		var hasil;
		hasil=(parseInt(fob)+parseInt(dn))*parseInt(qty);
		var ttl=document.getElementById("ttldn");
		ttl.value=hasil;
	}
</script>
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <h1>
            Master List
            <small>MK</small>
          </h1>
          <ol class="breadcrumb">
            <li><a href="../index.php"><i class="fa fa-dashboard"></i> Dashboard</a></li>
            <li class="active">Master List </li>
          </ol>
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Main row -->
          <div class="row">
            <!-- Left col -->
            <section class="col-lg-12 connectedSortable">

              <!-- TO DO List -->
              <div class="box box-primary">
                <div class="box-header">
                  <i class="ion ion-clipboard"></i>
                  <h3 class="box-title">Input Master List </h3>
                  <div class="box-tools pull-right">
                  <!-- <form action='admin.php' method="POST">
    	             <div class="input-group" style="width: 230px;">
                      <input type="text" name="qcari" class="form-control input-sm pull-right" placeholder="Cari Usename Atau Nama">
                      <div class="input-group-btn">
                        <button type="submit" class="btn btn-sm btn-default tooltips" data-placement="bottom" data-toggle="tooltip" title="Cari Data"><i class="fa fa-search"></i></button>
                        <a href="admin.php" class="btn btn-sm btn-success tooltips" data-placement="bottom" data-toggle="tooltip" title="Refresh"><i class="fa fa-refresh"></i></a>
                      </div>
                    </div>
                    </form> -->
                  </div> 
                </div><!-- /.box-header -->
                <?php
			if(isset($_POST['input'])){
		
		$styleno=$_POST['styleno'];
		$byer=$_POST['byer'];
		$mkt=$_POST['mkt'];
		$ordmk=$_POST['ordmk'];
		$update=$_POST['update'];
		$ocf=$_POST['ocf'];
		$bom=$_POST['bom'];
		$fabpo=$_POST['fabpo'];
		$posew=$_POST['posew'];
		$pofin=$_POST['pofin'];
		$pofab=$_POST['pofab'];
		$pcd=$_POST['pcd'];
		$smv=$_POST['smv'];
		$produk=$_POST['produk'];
		$desc=$_POST['desc'];
		$progres=$_POST['progres'];
		$washpro=$_POST['washpro'];
		$detw=$_POST['detw'];
		$noof=$_POST['noof'];
		$emb=$_POST['emb'];
		$wash=$_POST['wash'];
		$byerpo=$_POST['byerpo'];
		$color=$_POST['color'];
		$qty=$_POST['qty'];
		$dz=$_POST['dz'];
		$delvdt=$_POST['delvdt']; 
		$week=$_POST['week'];
		$exdt=$_POST['exdt']; 
		$exstat=$_POST['exstat'];
		$ho=$_POST['ho'];
		$fob=$_POST['fob'];
		$dn=$_POST['dn'];
		$ttldn=$_POST['ttldn'];
		$ttlho=$_POST['ttlho'];
		$ldp=$_POST['ldp'];
		$ttlldp=$_POST['ttlldp'];
		$fab=$_POST['fab'];
		$fty=$_POST['fty'];
		$cnsp=$_POST['cnsp']; 
		$ttlcmp=$_POST['ttlcmp'];
		$fabqty=$_POST['fabqty'];
		$pxyd=$_POST['pxyd'];
		$fabusd=$_POST['fabusd'];
		$suppname=$_POST['suppname'];
		$term=$_POST['term'];
		$fabstat=$_POST['fabstat'];
		$fabtype=$_POST['fabtype'];
		$hanger=$_POST['hanger'];
				
                
				$cek = mysqli_query($koneksi, "SELECT * FROM tbl_masterlistmk WHERE style_no='$styleno'");
				if(mysqli_num_rows($cek) == 0){
				$insert = "INSERT INTO tbl_masterlistmk VALUES (
		'$style_no','$byer','$mkt','$ordmk','$fabpo','$update','$ocf','$bom',
		'$pofab','$pofin','$posew','$pcd','$smv','$produk',
		'$desc','$progres','$washpro','$emb','$noof','$detw',
		'$byerpo','$wash','$color','$qty','$dz','$delvdt','$week',
		'$exdt','$exstat','$fob','$dn','$ho','$ttldn','$ttlho',
		'$ldp','$ttlldp','$fab','$fty','$cnsp','$ttlcmp',
		'$fabqty','$pxyd','$fabusd','$suppname','$term',
		'$fabstat','$fabtype','$hanger')";
		
		 $run=mysqli_query($koneksi,$insert) or die(mysqli_error($koneksi));
															
						if($insert){
							echo '<div class="alert alert-info alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Berhasil Di Simpan.</div>';
						}else{
							echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Ups, Data Gagal Di simpan !</div>';
						}
				}else{
					echo '<div class="alert alert-danger alert-dismissable"><button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>Data Sudah Ada..!</div>';
				}
			} 
            
			?>
                <div class="box-body">
				<form class="form-horizontal style-form" action="input_masterlist_mk.php" method="post" enctype="multipart/form-data" name="form1" id="form1">
				<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Style No </label>
						<div class="col-sm-4">
							<input name="styleno" type="text" id="styleno" class="form-control" placeholder="styleno" autocomplete="off"  />
						</div>
				  </div>
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Buyer</label>
						<div class="col-sm-4">
							<select id="byer" name="byer" class="form-control" >
			<option value="0" selected="selected">choose buyer</option>
          <option value="CALIFORNIA">CALIFORNIA</option>
          <option value="GIII-CK">GIII-CK</option>
          <option value="GIII-DKNY">GIII-DKNY</option>
          <option value="BONWORTH">BONWORTH</option>
          <option value="GIII-TH">GIII-TH</option>
          <option value="GIII-DK">GIII-DK</option>
          <option value="Jaya Apparel Walmart">JAYA APPAREL WALMART</option>
          <option value="Walmart">WALMART</option>
          <option value="Hansae H &amp; M">HANSAE H &amp; M</option>
          <option value="Hansae Kmart">HANSAE KMART</option>
							</select>  
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Marketing Name </label>
						<div class="col-sm-4">
							<input name="mkt" type="text" id="mkt" class="form-control" placeholder="nama marketing" autocomplete="off" /
						</div>
					</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Ord Confrm Date</label>
						<div class="col-sm-4">
							<input type='text' class="input-group date form-control" data-date="" data-date-format="yyyy-mm-dd" name='ordmk' id="ordmk" placeholder='confrm date'  />					
						</div>
					</div>
				
				<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Update Masterlist </label>
						<div class="col-sm-4">
							<input type='text' class="input-group date form-control" data-date="" data-date-format="yyyy-mm-dd" name='update' id="update" placeholder='masterlist update' />					
						</div>
				  </div>
				<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Ocf Date</label>
						<div class="col-sm-4">
					<input type='text' class="input-group date form-control" data-date="" data-date-format="yyyy-mm-dd" name='ocf' id="ocf" placeholder='ocfdate'  />					
						</div>
				  </div>
				<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">BOM DATE </label>
						<div class="col-sm-4">
							<input type='text' class="input-group date form-control" data-date="" data-date-format="yyyy-mm-dd" name='bom' id="bom" placeholder='bomdate' />					
						</div>
				  </div>
				<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Last Po Sew</label>
						<div class="col-sm-4">
					<input type='text' class="input-group date form-control" data-date="" data-date-format="yyyy-mm-dd" name='posew' id="posew" placeholder='last posew' />					
						</div>
				  </div>
				<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Last Po Fab</label>
						<div class="col-sm-4">
					<input type='text' class="input-group date form-control" data-date="" data-date-format="yyyy-mm-dd" name='pofab' id="pofab" placeholder='last po fabric' />					
						</div>
				  </div>
				<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Last Po Fin</label>
						<div class="col-sm-4">
					<input type='text' class="input-group date form-control" data-date="" data-date-format="yyyy-mm-dd" name='pofin' id="pofin" placeholder='last po fin' />					
						</div>
				  </div>
				<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Pcd Dt</label>
						<div class="col-sm-4">
					<input type='text' class="input-group date form-control" data-date="" data-date-format="yyyy-mm-dd" name='pcd' id="pcd" placeholder='pcd date' />					
						</div>
				  </div>
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Product</label>
						<div class="col-sm-4">
						<select name="produk" id="produk" >
        <option value="0">choose</option>
        <option value="Bloouse">BLOUSE</option>
        <option value="Jacket">JACKET</option>
        <option value="Skirt">SKIRT</option>
        <option value="Blazer">BLAZER</option>
        <option value="Wove">WOVE</option>
        <option value="Short">SHORT</option>
        <option value="Bermuda">BERMUDA</option>
        <option value="Pants">PANTS</option>
        <option value="Capri">CAPRI</option>
        <option value="Shirt">SHIRT</option>
      </select>
					</div>
					</div>
				<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label"> SMV</label>
						<div class="col-sm-4">
							<input name="smv" type="text" id="smv" class="form-control" placeholder="smv" autocomplete="off"  />
						</div>
				  </div>
				<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label"> Description </label>
						<div class="col-sm-4">
				 <textarea name="desc" type="text" id="desc" class="form-control" placeholder="description" autocomplete="off"></textarea>
				 	</div>
				  </div>
				<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Wash Status</label>
						<div class="col-sm-4">
						 <td><input name="wash" type="radio" id="radio" value="washing"  />
        Washing 
          <input type="radio" name="wash" id="radio2" value="nonwashing"  />
Non Washing 
<input name="wash" type="radio" value="specialwashing"  />
Special Washing </td>
					</div>
				  </div>
				<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label"> Special Process </label>
						<div class="col-sm-4">
	 <textarea name="progres" type="text" id="progres" class="form-control" placeholder="spesial process" autocomplete="off"></textarea>
				 	</div>
				  </div>
				<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Wash Process</label>
						<div class="col-sm-4">
					<input name="washpro" type="text" id="washpro" class="form-control" placeholder="wash process" autocomplete="off" />
						</div>
				  </div>
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Fabric PO</label>
						<div class="col-sm-4">
					<input name="fabpo" type="text" id="fabpo" class="form-control" placeholder="fabric po" autocomplete="off" />
						</div>
					</div>
						<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label"></label>
						<div class="col-sm-4">
					<select name="detw" size="1" multiple="MULTIPLE" id="detw">
        <option value="Denim">DENIM</option>
        <option value="Twill">TWILL</option>
      </select>
						</div>
					</div>
				<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Embroidery</label>
						<div class="col-sm-4">
						 <td><input name="emb" type="radio" id="emb" value="YES"/> YES
			<input name="noof" type="text" id="noof" class="form-control" placeholder="No.Of Embroidery Stitches" autocomplete="off" />

          <input type="radio" name="emb" id="emb" value="NO" /> No
					</div>
				  </div>
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Buyer PO</label>
						<div class="col-sm-4">
					<input name="byerpo" type="text" id="byerpo" class="form-control" placeholder="buyer po" autocomplete="off" />
						</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Color</label>
						<div class="col-sm-4">
					<input name="color" type="text" id="color" class="form-control" placeholder="color" autocomplete="off"  />
						</div>
					</div>
					<div class="form-group">


						<label class="col-sm-2 col-sm-2 control-label">Season </label>
						<div class="col-sm-4">
					<select name="exstat" id="exstat">
          <option value="0">choose</option>
          <option value="Fall">FALL</option>
          <option value="Spring">SPRING</option>
          <option value="Summer">SUMMER</option>
          <option value="Winter">WINTER</option>
        </select>
					</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Week Delivery </label>
						<div class="col-sm-4">
					<input name="week" type="text" id="week" class="form-control" placeholder="week delivery" autocomplete="off" />
					</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Qty Dz</label>
						<div class="col-sm-4">
					<input name="qty" type="text" id="qty" class="form-control" placeholder="qty dz" autocomplete="off" />
					</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Qty Pcs </label>
						<div class="col-sm-4">				
				<input name="dz" type="text" id="dz" class="form-control" placeholder="qty pcs" autocomplete="off" onKeyUp="hitung();" />
					</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Delivery Date</label>
						<div class="col-sm-4">
					<input type='text' class="input-group date form-control" data-date="" data-date-format="yyyy-mm-dd" name='delvdt' id="delvdt" placeholder='delivery date' />					
						</div>
				  </div> 
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Ext Date</label>
						<div class="col-sm-4">
					<input type='text' class="input-group date form-control" data-date="" data-date-format="yyyy-mm-dd" name='exdt' id="exdt" placeholder='ext date' />					
						</div>
				  </div>
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Fob</label>
						<div class="col-sm-4">
					<input name="fob" type="text" id="fob" class="form-control" placeholder="fob" autocomplete="off" onKeyUp="hitung();"/>
					</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">D/N</label>
						<div class="col-sm-4">
					<input name="dn" type="text" id="dn" class="form-control" placeholder="dn" autocomplete="off"  onKeyUp="hitung();" />
					</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Ho Overhead </label>
						<div class="col-sm-4">
					<input name="ho" type="text" id="ho" class="form-control" placeholder="ho overhead" autocomplete="off" />
					</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">TTL Fob(+DN) Amount </label>
						<div class="col-sm-4">
					<input name="ttldn" type="text" id="ttldn" class="form-control" placeholder="$" autocomplete="off"/>
					</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">TTL HO-O Amount</label>
						<div class="col-sm-4">
					<input name="ttlho" type="text" id="ttlho" class="form-control" placeholder="$" autocomplete="off" />
					</div>
					</div>
				<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">LDP</label>
						<div class="col-sm-4">
					<input name="ldp" type="text" id="ldp" class="form-control" placeholder="$" autocomplete="off" />
					</div>
				  </div>
				<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">TTL LDP Amount</label>
						<div class="col-sm-4">
					<input name="ttlldp" type="text" id="ttlldp" class="form-control" placeholder="$" autocomplete="off" />
					</div>
				  </div>	
				<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Fab ref </label>
						<div class="col-sm-4">
					<input name="fab" type="text" id="fab" class="form-control" placeholder="$" autocomplete="off"/>
					</div>
				  </div>			
				<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Fty Cmp</label>
						<div class="col-sm-4">
					<input name="fty" type="text" id="fty" class="form-control" placeholder="$" autocomplete="off" />
					</div>
				  </div>
				<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Cnsp / Pcs </label>
						<div class="col-sm-4">
					<input name="cnsp" type="text" id="cnsp" class="form-control" placeholder="$" autocomplete="off" />
					</div>
				  </div>
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Ttl Cmp Amount</label>
						<div class="col-sm-4">
					<input name="ttlcmp" type="text" id="ttlcmp" class="form-control" placeholder="$" autocomplete="off"  />
					</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Fab Qty(YD)</label>
						<div class="col-sm-4">
					<input name="fabqty" type="text" id="fabqty" class="form-control" placeholder="$" autocomplete="off"  />
					</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Fab px/yd</label>
						<div class="col-sm-4">
					<input name="pxyd" type="text" id="pxyd" class="form-control" placeholder="$" autocomplete="off" />
					</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Fabric Amount USD </label>
						<div class="col-sm-4">
					<input name="fabusd" type="text" id="fabusd" class="form-control" placeholder="$" autocomplete="off"  />
					</div>
					</div>
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Supp Name </label>
						<div class="col-sm-4">
						<select name="suppname" id="suppname">
						<option value="0">choose</option>
        <option value="Esmetex">ESMETEX</option>
        <option value="Atmc">ATMC</option>
        <option value="Fabtrends">FABTRENDS</option>
        <option value="Beginning Indo">BEGINNING INDO</option>
        <option value="Laishi Textile">LAISHI TEXTILE</option>
        <option value="Hangzhou Che">HANGZHOU CHE</option>
        <option value="Zelouf West">ZELOUF WEST</option>
        <option value="Nemanbrothe">NEMANBROTHE</option>
        <option value="Bonita Fab">BONITA FAB</option>
        <option value="Shaoxing Cou">SHAOXING COU</option>
        <option value="Beginning Industries Co Ltd">BEGINNING INDUSTRI CO LTD</option>
        <option value="Cameron">CAMERON</option>
        <option value="Changzhou City Hengfeng">CHANGZHOU CITY HENGFENG</option>
        <option value="Winnitex Ltd">WINNITEX LTD</option>
        <option value="Ld Textile">LD TEXTILE</option>
        <option value="United Textile">UNITED TEXTILE</option>
        <option value="New Focus">NEW FOCUS</option>
        <option value="Bm Textile">BM TEXTILE</option>
        <option value="Global P &amp; M">GLOBAL P &amp; M</option>
        <option value="Comtextile">COMTEXTILE</option>
        <option value="Grandtex">GRANDTEX</option>
        <option value="Tatfung">TATFUNG</option>
            </select>
					</div>
					</div>
				<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Term </label>
						<div class="col-sm-4">
					<input name="term" type="text" id="term" class="form-control" placeholder="term" autocomplete="off" />
					</div>
				  </div>
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Fab Status </label>
						<div class="col-sm-4">
						 <td> <input name="fabstat" type="radio" value="sourch"  />
        Sourch
        <input name="fabstat" type="radio" value="dropship"  />
        Dropship
        <input name="fabstat" type="radio" value="nominated" />
      Nominated</label></td>
					</div>
					</div>
				<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Fab Type </label>
						<div class="col-sm-4">
					<input name="fabtype" type="text" id="fabtype" class="form-control" placeholder="fabtype" autocomplete="off"  />
					</div>
				  </div>
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label">Foldedd/Hanger</label>
						<div class="col-sm-4">
					<input name="hanger" type="text" id="hanger" class="form-control" placeholder="foldedd hanger" autocomplete="off"  />
					</div>
					</div>
					
					<div class="form-group">
						<label class="col-sm-2 col-sm-2 control-label"></label>
				  <div class="col-sm-10">
						  <input type="submit" name="input" value="Simpan" class="btn btn-sm btn-primary" />
				    &nbsp;
					 <a href="simpan_MK.php"class="btn btn-sm btn-danger">Batal </a></div>
					    
					</div>
				</form>
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
    <script>
	//options method for call datepicker
	$(".input-group.date").datepicker({ autoclose: true, todayHighlight: true });
    </script>
	
  </body>
</html>
