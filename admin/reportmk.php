<?php
	include "../koneksi.php";
	session_start();
?>
<style type="text/css">
<!--
#logo {
	position:absolute;
	width:5905px;
	height:208px;
	z-index:1;
	background-color: #0000CC;
	left: 7px;
}
#Layer1 {
	position:absolute;
	width:210px;
	height:25px;
	z-index:1;
	left: 169px;
	top: 169px;
}
.style2 {
	color: #FFFFFF;
	font-weight: bold;
	font-size: large;
}
#Layer2 {
	position:absolute;
	width:202px;
	height:25px;
	z-index:2;
}
#Layer3 {
	position:absolute;
	width:384px;
	height:67px;
	z-index:2;
	left: 10px;
	top: 248px;
}
#Layer4 {
	position:absolute;
	width:121px;
	height:28px;
	z-index:2;
	left: 8px;
	top: 208px;
	background-color: #999999;
}
#Layer5 {
	position:absolute;
	width:239px;
	height:25px;
	z-index:3;
	left: 130px;
	top: 209px;
	background-color: #999999;
}
.style3 {
	font-family: Georgia, "Times New Roman", Times, serif;
	color: #FFFFFF;
	font-size: xx-large;
	font-weight: bold;
}
.style4 {font-size: 18px}
.style5 {
	font-size: medium;
	font-family: Arial, Helvetica, sans-serif;
}
#Layer6 {
	position:absolute;
	width:137px;
	height:34px;
	z-index:4;
	left: 8px;
	top: 216px;
	background-color: #666666;
}
#Layer7 {
	position:absolute;
	width:198px;
	height:34px;
	z-index:5;
	left: 145px;
	top: 216px;
	background-color: #666666;
}
#Layer8 {
	position:absolute;
	width:224px;
	height:34px;
	z-index:6;
	left: 611px;
	top: 216px;
	background-color: #666666;
}
#Layer9 {
	position:absolute;
	width:265px;
	height:34px;
	z-index:7;
	background-color: #666666;
	left: 343px;
	top: 216px;
}
#Layer10 {
	position:absolute;
	width:200px;
	height:33px;
	z-index:8;
	left: 849px;
	top: 10px;
}
#Layer11 {
	position:absolute;
	width:421px;
	height:34px;
	z-index:8;
	left: 794px;
	top: 27px;
}
.style44 {
	font-family: Arial, Helvetica, sans-serif;
	font-weight: bold;
	color:#FF0000;
	font-size: medium;
}
.style46 {font-family: Arial, Helvetica, sans-serif; font-weight: bold; color:#FFFFFF; }
#logo #Layer11 div .style40 {
	color: #F03;
}
.style64 {font-family: Arial, Helvetica, sans-serif}
.style65 {font-size: 12px}
.style68 {font-size: 12px; color: #FFFFFF; font-family: Arial, Helvetica, sans-serif; font-weight: bold; }
.style69 {font-size: 12px; font-family: Arial, Helvetica, sans-serif; }
.style95 {color: #000000}
#Layer12 {
	position:absolute;
	width:268px;
	height:34px;
	z-index:8;
	left: 608px;
	top: 216px;
	background-color: #666666;
}
.style97 {
	color: #FFFFFF;
	font-weight: bold;
}
.style98 {
	color: #000000;
	font-size: medium;
	font-family: Arial, Helvetica, sans-serif;
}
.style100 {
	font-size: medium;
	font-family: Arial, Helvetica, sans-serif;
	color: #FFFFFF;
	font-weight: bold;
}
-->
</style>
<script type="text/JavaScript">
<!--

function MM_preloadImages() { //v3.0
  var d=document; if(d.images){ if(!d.MM_p) d.MM_p=new Array();
    var i,j=d.MM_p.length,a=MM_preloadImages.arguments; for(i=0; i<a.length; i++)
    if (a[i].indexOf("#")!=0){ d.MM_p[j]=new Image; d.MM_p[j++].src=a[i];}}
}
//-->
</script>
<body onLoad="MM_preloadImages('../Pict/132904Log_MGL.png')"><form name="form1" method="post" action="">
  <div id="logo">
    <p><img src="../Pict/172271logo.jpeg" width="157" height="134" /><span class="style3">KVS GROUP</span></p>
    
    <div class="style100"id="Layer11">
	<div align="right">
	   
	   <span class="style100"><span class="style93">
	   <?php
	$nama=$_SESSION['username'];
	$cari_nama=mysqli_query($konn,"select * from user where username='$nama'");
	$ambil_nama=mysqli_fetch_array($cari_nama,MYSQLI_ASSOC);
	?>
	   <?php echo $ambil_nama['Name'];?></a> |<span class="style100"><a href="#"> <?php echo date("l, j F Y") ?></a> | </span><span class="style46"><span class="style44"><a href="../logout.php" class="style40"onClick="document.location='script.php?perintah=logout'">Logout</a></span></span> </div>
	</div>
  </div>
    <div class="style2" id="Layer1">
      <div align="left" class="style4">Master List </div>
  </div>
  </div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>


<div id="Layer12">
  <div align="center" class="style97"><a href="reportmgl.php" class="style98">Report Master List MGL </a></div>
</div>
<h2>&nbsp;</h2>
<p>&nbsp;</p>
<h2>Search By Byer</h2>
<p>&nbsp;</p>
<form id="form2" name="form2" method="get" action="">
  <p>
    <select name="byer" id="byer">
      <option value="0">choose</option>
      <option value="BONWORTH">BONWORTH</option>
      <option value="CALIFORNIA">CALIFORNIA</option>
      <option value="GIII-CK">GIII-CK</option>
      <option value="GIII-DKNY">GIII-DKNY</option>
      <option value="PT MELADY">PT MELADY</option>
    </select>
    <input type="submit" name="tombol" value="Review" id="tombol" />
  <a href="reportmk.php"> Reset</a></p>
</form>

<form name="form3" method="get"action="">
  <p>
    <input name="week" type="date" id="week" size="17">
    <input name="tekan" type="submit" id="tekan" value="Review" />
  
</form>
<p>&nbsp; </p>


<table width="5813" height="104" border="1">
  <tr bgcolor="#0000CC" class="style4">
    <th width="19" height="45"><span class="style68">no</span></th>
    <th width="70"><span class="style68">Byer</span></th>
    <th width="155"><span class="style68">Marketing Handling</span></th>
    <th width="95"><span class="style68">Ord cnfrmdt</span></th>
    <th width="138"><span class="style68">Update Masterlist </span></th>
    <th width="167"><span class="style68">Ocf Number </span></th>
    <th width="122"><span class="style68">Bom dt</span></th>
    <th width="105"><span class="style68">Last fabric po</span></th>
    <th width="95"><span class="style68">Last Po Fin</span></th>
    <th width="110"><span class="style68">Last posew</span></th>
    <th width="117"><span class="style68">Pcd_dt</span></th>
    <th width="131"><span class="style68">Style No</span></th>
    <th width="130"><span class="style68">Product</span></th>
    <th width="251"><span class="style68">Description</span></th>
    <th width="181"><span class="style68">Special_process</span></th>
    <th width="125"><span class="style68">Byer Po</span></th>
    <th width="115"><span class="style68">Wash Status</span></th>
    <th width="116"><span class="style68">Color</span></th>
    <th width="83"><span class="style68">Qty_pcs</span></th>
    <th width="95"><span class="style68">Qty_dz</span></th>
    <th width="142"><span class="style68">Delivery Date</span></th>
    <th width="156"><span class="style68">Week Delivery </span></th>
    <th width="135"><span class="style68">Ext Date </span></th>
    <th width="168"><span class="style68">Ext Status </span></th>
    <th width="177"><span class="style68">Fob</span></th>
    <th width="145"><span class="style68">D/N</span></th>
    <th width="127"><span class="style68">Ho_Overhead</span></th>
    <th width="162"><span class="style68">Ttlfob(+dn)Amount</span></th>
    <th width="123"><span class="style68">Ttl Ho-O Amount</span></th>
    <th width="119"><span class="style68">Ldp</span></th>
    <th width="123"><span class="style68">Ttl Ldp Amount</span></th>
    <th width="147"><span class="style68">Fabref</span></th>
    <th width="116"><span class="style68">Cnsp/dz</span></th>
    <th width="90"><span class="style68">Fabqty_yd</span></th>
    <th width="126"><span class="style68">Fab_pxyd</span></th>
    <th width="144"><span class="style68">Fabric Amount_usd</span></th>
    <th width="250"><span class="style68">Supp Name</span></th>
    <th width="145"><span class="style68">Term</span></th>
    <th width="141"><span class="style68">Fabric Status</span></th>
    <th width="159"><span class="style68">fabric type</span></th>
    <th width="199"><span class="style68">Folded/Hanger</span></th>
    <th width="43">&nbsp;</th>
  </tr>
  <?php
   if(isset($_GET['tombol'])){
	   $byer=$_GET['byer'];
	   $tombol=$_GET['tombol'];
	   $cari="select * from tbl_masterlistmk where id_byer='$byer'";
   }else{
	   $cari="select * from tbl_masterlistmk";
   }
   
  	$cari_data=mysqli_query($konn,$cari);
	while($ambil_data=mysqli_fetch_array($cari_data,MYSQLI_ASSOC)){
  ?>
  <?php
   if(isset($_GET['tekan'])){
	   $week=$_GET['week'];
	   $tekan=$_GET['tekan'];
	   $cari="select * from tbl_masterlistmk where week_num='$week'";
   }else{
	   $cari="select * from tbl_masterlistmk";
   }
   
  	$cari_data=mysqli_query($konn,$cari);
	while($ambil_data=mysqli_fetch_array($cari_data,MYSQLI_ASSOC)){
  ?>
  
  <tr>
    <th height="53"><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['nomorin'];?></div>
    </div></th>
    <th><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['id_byer'];?></div>
    </div></th>
    <th><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['mkt_name'];?></div>
    </div></th>
    <th><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['ord_cnfrmdt'];?></div>
    </div></th>
    <th><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['update_masterlist'];?></div>
    </div></th>
    <th><div align="justify" class="style65" style64>
      <div align="center"><?php echo $ambil_data['ocf_number'];?></div>
    </div></th>
    <th><div align="center"><span class="style69"><?php echo $ambil_data['bom_date'];?></span></div></th>
    <th><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['last_pofab'];?></div>
    </div></th>
    <th><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['last_pofin'];?></div>
    </div></th>
    <th><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['last_posew'];?></div>
    </div></th>
    <th><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['pcd_dt'];?></div>
    </div></th>
    <th><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['style'];?></div>
    </div></th>
    <th><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['product'];?></div>
    </div></th>
    <th><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['description'];?></div>
    </div></th>
    <th><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['special_process'];?></div>
    </div></th>
    <th><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['buyerpo'];?></div>
    </div></th>
    <th><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['wash_status'];?></div>
    </div></th>
    <th><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['id_color'];?></div>
    </div></th>
    <th><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['qty_pcs'];?></div>
    </div></th>
    <th><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['qty_dz'];?></div>
    </div></th>
    <th><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['deldate'];?></div>
    </div></th>
    <th><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['week_num'];?></div>
    </div></th>
    <th><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['ext_date'];?></div>
    </div></th>
    <th><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['ext_status'];?></div>
    </div></th>
    <th><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['fob'];?></div>
    </div></th>
    <th><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['D/N'];?></div>
    </div></th>
    <th><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['ho_overhead'];?></div>
    </div></th>
    <th><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['TtlFOB(+DN)amount'];?></div>
    </div></th>
    <th><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['ttlho'];?></div>
    </div></th>
    <th><div align="center"><?php echo $ambil_data['ldp'];?></div></th>
    <th><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['ttlldp'];?></div>
    </div></th>
    <th><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['fabref'];?></div>
    </div></th>
    <th><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['CNSP/ Dz'];?></div>
    </div></th>
    <th><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['fabqty_YD'];?></div>
    </div></th>
    <th><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['Fab_pxyd'];?></div>
    </div></th>
    <th><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['fabricamount_usd'];?></div>
    </div></th>
    <th><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['supp_name'];?></div>
    </div></th>
    <th><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['TERM'];?></div>
    </div></th>
    <th><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['fab_stat'];?></div>
    </div></th>
    <th><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['fab_type'];?></div>
    </div></th>
    <th><div align="justify" class="style65 style64">
      <div align="center"><?php echo $ambil_data['Folded_Hanger'];?></div>
    </div></th>
  </tr>
  <?php } ?>
  <?php } ?>
</table>
<div class="style5"id="Layer7">
<div align="center" class="style3"><a href="#"?input=input&quot;><span class="main_menu_list style5 style95">Report Master List MK</span></a></div>
</div>
<p>&nbsp;</p>
  <input name="button" type="button" onClick="window.print()" value="Print " />
  <div class="style5"id="Layer6">
  <div align="center" class="style3"><a href="../indeksuppv.php"?home=home;><span class="main_menu style5 style95">Dashboard</span></a></div>
  </div></div>
  <div class="style5"id="Layer9">
  <div align="center" class="style3"><a href="reportpo.php"?input&quot;><span class="main_menu_list style5 style95">Report Purchase Order</span></a></div>
  </div></div>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
  <p>&nbsp;</p>
</form>
