<?php require_once(realpath(dirname(__DIR__,1) . '/public/config.php')) ?>
<?php require_once(realpath(dirname(__DIR__,1) . '/app/Controller/AuthenticationController.php')) ?>
<?php

if(isset($_SESSION['user_login']) || !empty($_SESSION['user_data']))
{
	header("Location: user/index.php");
}
 ?>


<!doctype html>
<html lang="en" dir="ltr">
  <head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">

		<meta name="msapplication-TileColor" content="#0061da">
		<meta name="theme-color" content="#1643a3">
		<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent"/>
		<meta name="apple-mobile-web-app-capable" content="yes">
		<meta name="mobile-web-app-capable" content="yes">
		<meta name="HandheldFriendly" content="True">
		<meta name="MobileOptimized" content="320">
		<link rel="icon" href="favicon.ico" type="image/x-icon"/>
		<link rel="shortcut icon" type="image/x-icon" href="favicon.ico" />

		<!-- Title -->
		<title>Inventory System</title>
		<link rel="stylesheet" href="<?php echo asset . "/assets/fonts/fonts/font-awesome.min.css" ?>">

		<!-- Font Family -->
		<link href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,700" rel="stylesheet">

		<!-- Dashboard Css -->
		<link href="<?php echo asset . "/assets/css/dashboard.css" ?> " rel="stylesheet" />

		<!-- c3.js Charts Plugin -->
		<link href="<?php echo asset . "/assets/plugins/charts-c3/c3-chart.css" ?> " rel="stylesheet" />

		<!-- Custom scroll bar css-->
		<link href="<?php echo asset . "/assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" ?>" rel="stylesheet" />
		<!---Font icons-->
		<link href="<?php echo asset . "/assets/plugins/iconfonts/plugin.css" ?> " rel="stylesheet" />

  </head>
	<body class="login-img">
		<div class="page">
			<div class="page-single">
				<div class="container">
					<div class="row">
						<div class="col mx-auto">
							<div class="row justify-content-center">
								<div class="col-md-8">
									<div class="card-group mb-0">
										<div class="card p-4">
											<div class="card-body">
											<?php echo realpath(dirname(__FILE__,1)) ."<br>"; ?>
											<?php echo realpath(dirname(__DIR__,1)) ."<br>"; ?> 
											<?php echo realpath("index.php") ."<br>"; ?>
											<?php

// $Projectname = dirname(__DIR__);
// $Projectname = explode('\\', $Projectname);
// $Projectname = $Projectname[5];


// $isSecure = false;
// if (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on') {
// 	$isSecure = true;
// } elseif (!empty($_SERVER['HTTP_X_FORWARDED_PROTO']) && $_SERVER['HTTP_X_FORWARDED_PROTO'] == 'https' || !empty($_SERVER['HTTP_X_FORWARDED_SSL']) && $_SERVER['HTTP_X_FORWARDED_SSL'] == 'on') {
// 	$isSecure = true;
// }

// $REQUEST_PROTOCOL = $isSecure ? 'https://' : 'http://';

// echo $REQUEST_PROTOCOL ."<br>";

// echo $_SERVER['HTTP_HOST'] ."/" ."<br>";

// echo $Projectname ."/public/resources" ."<br>";
// echo asset . "/assets/plugins/charts-c3/c3-chart.css" ."<br>";
//  echo direction . "<br>";
//  echo direction . "/app/Controller/AuthenticationController.php" ."<br>";
?>
												<h1>Login</h1>
												<p class="text-muted">Sign In to your account</p>
												<form method="POST" action="<?php echo  direction . "/app/Controller/AuthenticationController.php"; ?>">

													<div class="input-group mb-3">
														<span class="input-group-addon"><i class="fa fa-user"></i></span>
														<input type="text" class="form-control" name="email" placeholder="Email" 
														>
													
													</div>
													<?php if(isset($_SESSION['error'])) { ?>
															<p class="text-danger"><?= $_SESSION['error'] ?></p>
														<?php } ?>
													<div class="input-group mb-4">
														<span class="input-group-addon"><i class="fa fa-lock"></i></span>
														<input type="password" class="form-control" name="password" placeholder="Password">
													</div>
													<div class="row">
														<div class="col-12">
															<button type="submit" name="btnlogin" class="btn btn-primary btn-block bg-dark">Login</button>
														</div>

													</div>


												</form>

												<div class="row">
														
														<div class="col-12 mt-1">
															<a href="register.php">No Account? Register Here </a>
														</div>
														
													</div>
											
											</div>
										</div>
										<div class="card text-white bg-dark py-5 d-md-down-none login-trasnparent">
											<div class="text-center mb-6">
								<img src="resources/assets/images/brand/unnamed.png" class="" alt="">
							</div>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		

		<!-- Dashboard js -->
		<script src="<?php echo asset . "/assets/js/vendors/jquery-3.2.1.min.js" ?>"></script>
		<script src="<?php echo asset . "/assets/js/vendors/bootstrap.bundle.min.js" ?>"></script>
		<script src="<?php echo asset . "/assets/js/vendors/jquery.sparkline.min.js" ?>"></script>
		<script src="<?php echo asset . "/assets/js/vendors/selectize.min.js" ?>"></script>
		<script src="<?php echo asset . "/assets/js/vendors/jquery.tablesorter.min.js" ?>"></script>
		<script src="<?php echo asset . "/assets/js/vendors/circle-progress.min.js" ?>"></script>
		<script src="<?php echo asset . "/assets/plugins/rating/jquery.rating-stars.js" ?>"></script>
		<!-- Custom scroll bar Js-->
		<script src="<?php echo asset . "/assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js" ?>"></script>
        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
		<!-- Custom Js-->
	</body>
</html>


<script type="text/javascript">
	var sessub1 = "<?= $_SESSION['registersubmit'] ?>";

	if(sessub1){
		$(document).ready(function(){
			Swal.fire({
				position: 'top-end', 
				icon: 'success',
				title: 'Register Complete!',
				showConfirmButton: false,
				timer: 1500
				});
		});
		<?php unset($_SESSION['registersubmit']) ?>
	}
</script>