<?php require_once(realpath(dirname(__DIR__,2) . '/public/config.php')) ?>
<?php 
session_start();

if(!isset($_SESSION['admin_login']))
{
	header("Location: index.php");
}
include "../view/header.php";
include "../view/sidenav.php";
include "../view/topnav.php";
?>

<!doctype html>
<html lang="en" dir="ltr">

<body class="app sidebar-mini rtl">
	<div id="global-loader" ></div>
	<div class="page">
		<div class="page-main">
			<div class="app-content  my-3 my-md-5">
				<div class="side-app">
					<div class="page-header">
						<h4 class="page-title">Dashboard</h4>
					</div>
					<div class="row row-cards">
						<div class="col-sm-12 col-lg-6 col-xl-3">
							<div class="card card-img-holder">
								<div class="card-body list-icons">
									<div class="clearfix">
										<div class="float-left  mt-2">
											<span class="text-warning ">
												<i class="si si-people"></i>
											</span>
										</div>
										<div class="float-right text-right">
											<p class="card-text text-muted font-weight-semibold mb-1">Users</p>
											<h2></h2>
										</div>
									</div>
									<div class="card-footer p-0">
										<p class="text-muted mb-0 pt-4"><i class="si si-arrow-down-circle text-warning mr-1" aria-hidden="true"></i>Today's Product Availabe</p>
									</div>
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</div>
		</div>
	</div>
</body>
</html>

<?php 

include "../view/footer.php";

?>