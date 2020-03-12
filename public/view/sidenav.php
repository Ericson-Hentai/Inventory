<!-- Sidebar menu-->
				<div class="app-sidebar__overlay" data-toggle="sidebar"></div>
				<aside class="app-sidebar">
					<div class="app-sidebar__user">
					<?php if(isset($_SESSION['user_login'])){ ?>
						<div class="dropdown user-pro-body">
							<div>
								<img src="<?= '../resources/assets/userimg/' . $_SESSION['user_details'][0]['image'] ?>" alt="user-img" class="avatar avatar-md brround">
							</div>
							<div class="user-info">
								<div class="mb-2">
								<a href="#" class="" data-toggle="" aria-haspopup="true" aria-expanded="false"> <span class="font-weight-semibold text-white">Welcome</span> <?= $_SESSION['user_details'][0]['fullname'] ?>  </a>
								<br><span class="text-gray"></span>
								</div>
							</div>
						</div>
						<?php } ?>

					<?php if(isset($_SESSION['admin_login'])){ ?>
						<div class="dropdown user-pro-body">
							<div>
								<img src="" alt="user-img" class="avatar avatar-md brround">
							</div>
							<div class="user-info">
								<div class="mb-2">
								<a href="#" class="" data-toggle="" aria-haspopup="true" aria-expanded="false"> <span class="font-weight-semibold text-white">Welcome</span> <?= $_SESSION['admin_credentials'][0]['fullname'] ?>  </a>
								<br><span class="text-gray"></span>
								</div>
							</div>
						</div>
						<?php } ?>
					</div>
					<ul class="side-menu">
						<?php if(isset($_SESSION['admin_login'])){ ?>
						<li class="slide">
							<a class="side-menu__item" href="index.php"><i class="side-menu__icon fa fa-tachometer"></i><span class="side-menu__label">Dashboard</span></a>	
						</li>
						<li class="slide">
							<a class="side-menu__item" href="register-buyer.php"><i class="side-menu__icon fa fa-user"></i><span class="side-menu__label">Register buyer</span></a>
						</li>
						<li class="slide">
							<a class="side-menu__item" href="product-list.php"><i class="side-menu__icon fa fa-list-ol"></i><span class="side-menu__label">Product List</span></a>
						</li>
						
						<li class="slide">
							<a class="side-menu__item" href="order-list.php"><i class="side-menu__icon fa fa-list"></i><span class="side-menu__label">Order List</span></a>
						</li>

						<li class="slide">
							<a class="side-menu__item" href="#"
							onclick="event.preventDefault();
                            document.getElementById('admin-logout-form').submit();"><i class="side-menu__icon si si-logout">
							</i><span class="side-menu__label">Log Out</span></a>
						</li>
						<form id="admin-logout-form" action="<?php echo direction . "/app/Controller/admin/AuthenticationController.php" ;?> " method="POST" style="display: none;">
                            <input type="hidden" value="" name="admininputlogout">
						</form>

						<?php } ?>

						<?php if(isset($_SESSION['user_login'])){ ?>
						<li class="slide">
							<a class="side-menu__item" href="index.php"><i class="side-menu__icon fa fa-tachometer"></i><span class="side-menu__label">Dashboard</span></a>	
						</li>
						<li class="slide">
							<a class="side-menu__item" href="shop.php"><i class="side-menu__icon fa fa-user"></i><span class="side-menu__label">Products</span></a>
						</li>
						<!-- <li class="slide">
							<a class="side-menu__item" href="order-history.php"><i class="side-menu__icon fa fa-shopping-cart"></i><span class="side-menu__label">Cart</span></a>
						</li> -->
						<li class="slide">
							<a class="side-menu__item" href="order-history.php"><i class="side-menu__icon fa fa-shopping-cart"></i><span class="side-menu__label">Order History</span></a>
						</li>
						<!-- <li class="slide">
							<a class="side-menu__item" href="user.php"><i class="side-menu__icon fa fa-credit-card-alt"></i><span class="side-menu__label">Checkout</span></a>
						</li> -->
						<?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){ ?>
						<li class="slide">
							<a class="side-menu__item" href="cart.php"><i class="side-menu__icon fa fa-shopping-cart"></i><span class="side-menu__label">Cart</span></a>
						</li>
						<?php } ?>
						<li class="slide">
							<a class="side-menu__item" href="#"
							onclick="event.preventDefault();
                            document.getElementById('user-logout-form').submit();"><i class="side-menu__icon si si-logout">
							</i><span class="side-menu__label">Log Out</span></a>
						</li>
						<form id="user-logout-form" action="<?php echo direction . '/app/Controller/AuthenticationController.php';?> " method="POST" style="display: none;">
                            <input type="hidden" value="" name="userinputlogout">
						</form>
						
						<?php }
						?>
						
					</ul>
				</aside>

				