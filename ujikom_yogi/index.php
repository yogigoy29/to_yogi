<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
	<head>
	<title>Login Aplikasi Pembayaran SPP</title>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="description" content="Aplikasi SPP">
	<meta name="author" content="Aplikasi SPP">
	<link rel="stylesheet" href="css/bootstrap-4_4_1.min.css">
	<link rel="stylesheet" href="css/style_login.css">
	</head>
	<body>
		<!-- SweetAlert2 -->
	  <div class="info-data" data-infodata="<?php if(isset($_SESSION['info'])){ echo $_SESSION['info']; } unset($_SESSION['info']); ?>"></div>

		<div class="kotak">
			<form class="form-signin" action="proses.php" method="post" >
				<alt="SPP Login" width="50px" height="50px" style="margin-left:110px;">
				<br>
				<div style="margin-left:30px;margin-bottom:15px;"><b>Aplikasi Pembayaran SPP</b></div>
				<div class="input-group mb-0 px-3">
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="fas fa-user text-primary"></i></div>
					</div>
					<input type="text" id="username" name="username" class="form-control form-control-sm" placeholder="Username" autocomplete="off" autofocus="on" required>
				</div>
				
				<div class="input-group mb-1 px-3">
					<div class="input-group-prepend">
						<div class="input-group-text"><i class="fas fa-key text-primary"></i></div>
					</div>
					<input type="password" id="password" name="password" class="form-control form-control-sm" placeholder="Password" autocomplete="off" required>
				</div>
			
				<button class="btn btn-sm btn-success ml-3" type="submit"><i class="fas fa-lock mx-2"></i> Sign in</button>
			</form>
			
		</div>
		<script src="js/jquery/jquery.min.js"></script>
		<script src="js/fontawesome-5_7_2.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
	  <script src="js/style-sweetalert2.js"></script>
	</body>
</html>