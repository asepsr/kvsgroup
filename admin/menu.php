<aside class="main-sidebar">
	<section class="sidebar">
		<div class="user-panel">
			<div class="pull-left image">
				<img src="<?php echo $_SESSION['gambar']; ?>" height="200" width="200" style="border: 2px solid white;" class="img-circle" alt="User Image">
			</div>
			<div class="pull-left info">
				<p><?php echo $_SESSION['fullname']; ?></p>
				<a href="index.php"><i class="fa fa-circle text-success"></i> Online</a>
			</div>
		</div><br />
		<ul class="sidebar-menu">
			<li class="header">MENU HRM SYSTEM</li>
			<li class="active treeview">
				<a href="index.php">
				<i class="fa fa-dashboard"></i> <span>Dashboard</span>
				</a>
			</li>

			<li>
				<a href="#">
					<i class="fa fa-user"></i> <span>Karyawan</span> <i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="member.php"><i class="fa fa-circle-o"></i> Karyawan</a></li>
					<li><a href="input-member.php"><i class="fa fa-circle-o"></i> Input Karyawan</a></li>
					<li><a href="member_importxls.php"><i class="fa fa-circle-o"></i> Import Data Excel</a></li>
					<li><a href="kontrak-karyawan.php"><i class="fa fa-circle-o"></i> Sisa Masa Kerja</a></li>
				</ul>
			</li>
			<li>
				<a href="#">
				<i class="fa fa-file"></i> <span>Cetak ID Card</span> <i class="fa fa-angle-left pull-right"></i>
				</a>
				<ul class="treeview-menu">
					<li><a href="cetak-idcard.php"><i class="fa fa-circle-o"></i> Cetak ID Card</a></li>
				</ul>
			</li>
			<?php $tampil=mysqli_query($koneksi, "select * from user order by user_id desc");
			$total=mysqli_num_rows($tampil);
			?>
			<li>
				<a href="#">
					<i class="fa fa-lock"></i> <span>Admin</span>
					<small class="label pull-right bg-yellow"><?php echo $total; ?></small>
				</a>
				<ul class="treeview-menu">
					<li><a href="admin.php"><i class="fa fa-circle-o"></i> Admin</a></li>
					<li><a href="input-admin.php"><i class="fa fa-circle-o"></i> Tambah Admin</a></li>
				</ul>
			</li>
			<li>
				<a href="#">
					<i class="fa fa-lock"></i> <span>Data Attendance</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="absensi.php"><i class="fa fa-circle-o"></i>Record Attendance</a></li>
					<li><a href="input_deduction.php"><i class="fa fa-circle-o"></i> Input Data Attendance</a></li>
					<li><a href="rekap_attendance.php"><i class="fa fa-circle-o"></i> Rekap Data Attendance</a></li>
				</ul>
			</li>
			<li>
				<a href="#">
					<i class="fa fa-file"></i> <span>MasterList</span>
				</a>
				<ul class="treeview-menu">
					<li><a href="input_masterlist_mk.php"><i class="fa fa-circle-o"></i>Input Master List MK</a></li>
					<li><a href="input_deduction.php"><i class="fa fa-circle-o"></i> Input Master List MGL</a></li>
				</ul>
			</li>
		</ul>
	</section>
</aside>