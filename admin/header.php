<header class="main-header">
        <!-- Logo -->
        <a href="index.php" class="logo">
          <span class="logo-mini"><b>H</b>RM</span>
          <span class="logo-lg"><b>HRM</b> System</span>
        </a>
        <nav class="navbar navbar-static-top" role="navigation">
          <a href="#" class="sidebar-toggle" data-toggle="offcanvas" role="button">
            <span class="sr-only">Toggle navigation</span>
          </a>
          <div class="navbar-custom-menu">
            <ul class="nav navbar-nav">
              <li class="dropdown user user-menu">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                  <img src="<?php echo $_SESSION['gambar']; ?>" class="user-image" style="border: 1px solid white;" alt="User Image">
                  <span class="hidden-xs"><?php echo $_SESSION['fullname']; ?></span>
                </a>
                <ul class="dropdown-menu">
                  <li class="user-header">
                    <img src="<?php echo $_SESSION['gambar']; ?>" class="img-circle" alt="User Image">
                    <p>
                      <?php echo $_SESSION['fullname']; ?>
                      
                    </p>
                  </li>
                  <li class="user-body">
                    <div class="col-xs-4 text-center">
                      <a href="produk.php">Produk</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="#">Transaksi</a>
                    </div>
                    <div class="col-xs-4 text-center">
                      <a href="supplier.php">Supplier</a>
                    </div>
                  </li>
                  <li class="user-footer">
                    <div class="pull-left">
                      <a href="detail-admin.php?hal=edit&kd=<?php echo $_SESSION['user_id'];?>" class="btn btn-default btn-flat">Profile</a>
                    </div>
                    <div class="pull-right">
                    <a href="../logout.php" class="btn btn-default btn-flat" onclick="return confirm ('Apakah Anda Akan Keluar.?');"> Keluar </a>
                    </div>
                  </li>
                </ul>
              </li>
              <li>
                <a href="#" data-toggle="control-sidebar"><i class="fa fa-spin fa-gear"></i></a>
              </li>
            </ul>
          </div>
        </nav>
      </header>