<?php require_once(realpath(dirname(__DIR__,1) . '/public/config.php')) ?>
<?php require_once(realpath(dirname(__DIR__,1) . '/app/Controller/UserContoller.php')) ?>
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
		<title>Invertory System</title>
		<link rel="stylesheet" href="resources/assets/fonts/fonts/font-awesome.min.css">

		<!-- Font Family -->
		<link href="https://fonts.googleapis.com/css?family=Comfortaa:300,400,700" rel="stylesheet">

		<!-- Dashboard Css -->
		<link href="resources/assets/css/dashboard.css" rel="stylesheet" />

		<!-- c3.js Charts Plugin -->
		<link href="resources/assets/plugins/charts-c3/c3-chart.css" rel="stylesheet" />

		<!-- Custom scroll bar css-->
		<link href="resources/assets/plugins/scroll-bar/jquery.mCustomScrollbar.css" rel="stylesheet" />

		<!---Font icons-->
		<link href="resources/assets/plugins/iconfonts/plugin.css" rel="stylesheet" />

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


							
												<h1>Register</h1>
												<p class="text-muted">Create account</p>
									<form action="<?php echo direction . "/app/Controller/UserContoller.php"; ?>"  method="POST" enctype="multipart/form-data">
                                        <div class="form-group">
                                            <label for="fullname">Full Name</label>
											<input type="text" class="form-control" required id="fullname" name="fullname"
											value="<?= $_POST['fullname'] ?? '' ?>" aria-describedby="emailHelp" placeholder="Enter Full Name">
                                    
                                        </div>

                                        <div class="form-group">
                                            <label for="address">Address</label>
											<input type="text" class="form-control" required id="address" name="address"
											value="<?= $_POST['address'] ?? '' ?>"  placeholder="Enter Your Address">
											
                                        </div>

                                        <div class="form-group">
                                            <label for="contact_no">Contact Number</label>
											<input type="number" class="form-control" required id="contact_no" name="contact_no"
											value="<?= $_POST['contact_no'] ?? '' ?>"  placeholder="Enter Contact Number">
											
                                        </div>

                                        <div class="form-group">
                                            <label for="user_img">Choose Image</label>
                                            <input type="file" class="form-control" required id="user_img" name="user_image">
											<?php if(isset($_SESSION['img_error'])) { ?>
												<p class="text-danger"><?= $_SESSION['img_error'] ?></p>
											<?php } ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="email">Email</label>
											<input type="email" class="form-control" required id="email" name="email"
											value="<?= $_POST['email'] ?? '' ?>" aria-describedby="emailHelp" placeholder="Enter email">
											<?php if(isset($_SESSION['email_error'])) { ?>
												<p class="text-danger"><?= $_SESSION['email_error'] ?></p>
											
											<?php } ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Password</label>
                                            <input type="password" class="form-control" required id="password" name="password" placeholder="Enter Password">
                                            <?php if(isset($_SESSION['error_password'])) { ?>
												<p class="text-danger"><?= $_SESSION['error_password'] ?></p>
											<?php } ?>
                                        </div>

                                        <div class="form-group">
                                            <label for="password">Confirm Password</label>
                                            <input type="password" class="form-control" required id="cpassword" name="confpassword" placeholder="Enter to Confirm Password">
                                        </div>


                
                                        <button type="submit" class="btn btn-primary bg-dark" name="btnreguser">Register</button>
									</form>
									
									<div class="row">
										
										<div class="col-12 mt-1">
											<a href="login.php">Already Have Account? Login Here </a>
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
		<script src="resources/assets/js/vendors/jquery-3.2.1.min.js"></script>
		<script src="resources/assets/js/vendors/bootstrap.bundle.min.js"></script>
		<script src="resources/assets/js/vendors/jquery.sparkline.min.js"></script>
		<script src="resources/assets/js/vendors/selectize.min.js"></script>
		<script src="resources/assets/js/vendors/jquery.tablesorter.min.js"></script>
		<script src="resources/assets/js/vendors/circle-progress.min.js"></script>
		<script src="resources/assets/plugins/rating/jquery.rating-stars.js"></script>
		<!-- Custom scroll bar Js-->
		<script src="resources/assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

		<!-- Custom Js-->
	</body>
</html>
