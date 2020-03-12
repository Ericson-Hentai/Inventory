<?php require_once(realpath(dirname(__DIR__,2) . '/public/config.php')); ?>
<?php require(util); ?>
<?php 
session_start();

if(!isset($_SESSION['user_login']))
{
	header("Location: ../index.php");
}
if(!isset($_GET['product']) || empty($_GET['product']))
{
	redir(direction . "/public/user/shop.php");
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
				<div class="app-header header py-1 d-flex">
					<div class="container-fluid">
						<div class="d-flex">
							<a class="header-brand" href="index.html">
								<img src="" class="header-brand-img" alt="Plight logo">
							</a>
							<a aria-label="Hide Sidebar" class="app-sidebar__toggle" data-toggle="sidebar" href="#"></a>
							<div class="mt-2">
								<div class="searching mt-3 ml-2">
									<a href="javascript:void(0)" class="search-open mt-3">
										<i class="fa fa-search text-white"></i>
									</a>
									<div class="search-inline">
										<form>
											<input type="text" class="form-control" placeholder="Search here">
											<button type="submit">
												<i class="fa fa-search"></i>
											</button>
											<a href="javascript:void(0)" class="search-close">
												<i class="fa fa-times"></i>
											</a>
										</form>
									</div>
								</div>
							</div>
							<div class="d-flex order-lg-2 ml-auto">
								<div class="dropdown d-none d-md-flex mt-1" >
									<a  class="nav-link icon full-screen-link">
										<i class="fe fe-maximize floating"  id="fullscreen-button"></i>
									</a>
								</div>
								<div class="dropdown d-none d-md-flex mt-1">
									<a class="nav-link icon" data-toggle="dropdown">
										<i class="fe fe-bell floating"></i>
										<span class="nav-unread bg-danger"></span>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow">
										<a href="#" class="dropdown-item d-flex pb-3">
											<div class="notifyimg">
												<i class="fa fa-thumbs-o-up"></i>
											</div>
											<div>
												<strong>Someone likes our posts.</strong>
												<div class="small text-muted">3 hours ago</div>
											</div>
										</a>
										<a href="#" class="dropdown-item d-flex pb-3">
											<div class="notifyimg">
												<i class="fa fa-commenting-o"></i>
											</div>
											<div>
												<strong> 3 New Comments</strong>
												<div class="small text-muted">5  hour ago</div>
											</div>
										</a>
										<a href="#" class="dropdown-item d-flex pb-3">
											<div class="notifyimg">
												<i class="fa fa-cogs"></i>
											</div>
											<div>
												<strong> Server Rebooted.</strong>
												<div class="small text-muted">45 mintues ago</div>
											</div>
										</a>
										<div class="dropdown-divider"></div>
										<a href="#" class="dropdown-item text-center">View all Notification</a>
									</div>
								</div>
								<div class="dropdown d-none d-md-flex mt-1">
									<a class="nav-link icon" data-toggle="dropdown">
										<i class="fe fe-grid floating"></i>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow p-0">
										<ul class="drop-icon-wrap p-0 m-0">
											<li>
												<a href="email.html" class="drop-icon-item">
													<i class="fe fe-mail"></i>
													<span class="block"> E-mail</span>
												</a>
											</li>
											<li>
												<a href="calendar2.html" class="drop-icon-item">
													<i class="fe fe-calendar"></i>
													<span class="block">calendar</span>
												</a>
											</li>
											<li>
												<a href="maps.html" class="drop-icon-item">
													<i class="fe fe-map-pin"></i>
													<span class="block">map</span>
												</a>
											</li>
											<li>
												<a href="cart.html" class="drop-icon-item">
													<i class="fe fe-shopping-cart"></i>
													<span class="block">Cart</span>
												</a>
											</li>
											<li>
												<a href="chat.html" class="drop-icon-item">
													<i class="fe fe-message-square"></i>
													<span class="block">chat</span>
												</a>
											</li>
											<li>
												<a href="profile.html" class="drop-icon-item">
													<i class="fe fe-phone-outgoing"></i>
													<span class="block">contact</span>
												</a>
											</li>
										</ul>
									</div>
								</div>
								<div class="dropdown mt-1">
									<a href="#" class="nav-link pr-0 leading-none" data-toggle="dropdown">
										<span class="avatar avatar-md brround" style="background-image: url(assets/images/faces/female/25.jpg)"></span>
									</a>
									<div class="dropdown-menu dropdown-menu-right dropdown-menu-arrow ">
										<div class="text-center">
											<a href="#" class="dropdown-item text-center font-weight-sembold user">Siu Waid</a>
											<span class="text-center user-semi-title text-dark">web designer</span>
											<div class="dropdown-divider"></div>
										</div>
										<a class="dropdown-item" href="#">
											<i class="dropdown-icon mdi mdi-account-outline "></i> Profile
										</a>
										<a class="dropdown-item" href="#">
											<i class="dropdown-icon  mdi mdi-settings"></i> Settings
										</a>
										<a class="dropdown-item" href="#">
											<span class="float-right"><span class="badge badge-primary">6</span></span>
											<i class="dropdown-icon mdi  mdi-message-outline"></i> Inbox
										</a>
										<a class="dropdown-item" href="#">
											<i class="dropdown-icon mdi mdi-comment-check-outline"></i> Message
										</a>
										<div class="dropdown-divider"></div>
										<a class="dropdown-item" href="#">
											<i class="dropdown-icon mdi mdi-compass-outline"></i> Need help?
										</a>
										<a class="dropdown-item" href="login.html">
											<i class="dropdown-icon mdi  mdi-logout-variant"></i> Sign out
										</a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>

				<!-- Sidebar menu-->
			
				<?php
					$id =  $_GET['product'];
					DBOpen('inventorydb', '127.0.0.1');
					$product = DBGetData2("SELECT * FROM `product` WHERE `id` = '$id' ");
					DBClose();
		
					?>
				<div class="app-content  my-3 my-md-5">
					<div class="side-app">
						<div class="page-header">
							<h4 class="page-title">Shop</h4>
							<ol class="breadcrumb">
								<li class="breadcrumb-item"><a href="#">Shopping</a></li>
								<li class="breadcrumb-item active" aria-current="page">Products</li>
							</ol>

						</div>
						<div class="row row-cards">
							<div class="col-md-12 wrapper wrapper-content animated fadeInRight">
								<div class="ibox card">
									 <div class="card-header">
										<h5 class="card-title">Items in your cart</h5>
									</div>
									<div class="card-body">
										<div class="ibox-content">
											<div class="row">
												<div class="col-md-12 col-lg-5">
													<div class="cart-product-imitation">
														<img src="<?=  asset ."/assets/productimg/" . $product[0]['image']; ?> " >
													</div>
												</div>
												<div class="col-md-12 col-lg-7">
													<div class="card-body p-5">
														<h3>
														<a href="#" class="text-navy">
															<?= $product[0]['product_name']; ?>
														</a>
														</h3>
										
														<dl class="small m-b-none">
															<dt>Description</dt>
															<dd><?= $product[0]['product_desc']; ?></dd>
														</dl>
														<h4>Php <?= number_format($product[0]['price'], 2); ?></h4>
														<!-- <a href="" class="mt-2 btn btn-sm btn-pill btn-primary">Buy Now</a> -->
														<a href="" class="mt-2 btn btn-sm btn-pill btn-outline-primary btnaddtocart2" id="<?= $product[0]['id']; ?>">Add to cart</a>

													</div>
												</div>
											</div>
										</div>

							
									</div>
									<div class="ibox-content card-footer text-right">
										<a href="shop.php" class="btn btn-white"><i class="fa fa-arrow-left"></i> Back</a>
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

<script type="text/javascript">
	$(document).ready(function() {
		$('.btnaddtocart2').on('click', function(e) {
			var confirmation = confirm('Are Your Sure to Add this in Your Cart!');
			const productid = e.target.id;
			if(confirmation == true){
				var addcarturl = "<?= direction . "/app/Controller/AddToCartController.php"; ?>";
			$.ajax({
				type: "POST",
				url: addcarturl,
				data: {addcartproductid: productid},
				success: function(data){
					var data = JSON.parse(data);

					if(data.type == 'success'){
						alert(data.message);
						window.location.href = '<?= direction . "/public/user/cart.php"; ?>';
					}else{
						alert('not Add');
					}
				}
			});
			}else{
				return false;
			}
		})
	});
</script>