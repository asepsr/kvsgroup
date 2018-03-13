<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<title>HRMS (Human Resource Management System)</title>
		<meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
		<link rel="stylesheet" href="bootstrap/css/bootstrap.min.css">
		<link rel="stylesheet" href="dist/css/font-awesome.min.css">
		<link rel="stylesheet" href="dist/css/ionicons.min.css">
		<link rel="stylesheet" href="dist/css/AdminLTE.css">
		<link rel="stylesheet" href="plugins/iCheck/square/blue.css">
	</head>
	<body class="hold-transition" background="HRM.jpg">
		<div class="login-box">
			<div class="login-logo">
				<div class="center" style="border:px solid red;">
					<img style="border:px solid red; width:100px;" class="center" src="172271logo.png">
				</div>
			<a href="index.php" style="color: white;"><b>LOGIN HRMS </b></a>
			</div>
			<div class="login-box-body">
				<p class="login-box-msg"><b>Human Resource Management System</b></p>
				<form action="proseslogin.php" id="login" name="login" method="post">
					<div class="form-group has-feedback">
						<input type="text" id="username" name="username" class="form-control" autocomplete="off" placeholder="Username" required="username">
						<span class="glyphicon glyphicon-user form-control-feedback"></span>
					</div>
					<div class="form-group has-feedback">
						<input type="password" id="password" name="password" class="form-control" autocomplete="off" placeholder="Password" required="password">
						<span class="glyphicon glyphicon-lock form-control-feedback"></span>
					</div>
					<div class="row">
						<div class="col-xs-12">
							<button type="submit" class="btn btn-primary btn-block btn-flat">Sign In</button>
						</div>
					</div>
				</form>
				<center><h5 class="form-signin">Copyright &copy; <a href="kvsindustries.com#" data-toggle="modal" data-target="#contact">KVS GROUP</a> 2017</h5></center> 
			</div>
		</div>


		<script src="plugins/jQuery/jQuery-2.1.4.min.js"></script>
		<script src="bootstrap/js/bootstrap.min.js"></script>
		<script src="plugins/iCheck/icheck.min.js"></script>
		<script>
		$(function () {
		$('input').iCheck({
		checkboxClass: 'icheckbox_square-blue',
		radioClass: 'iradio_square-blue',
		increaseArea: '20%'
		});
		</script>
	</body>
</html>
