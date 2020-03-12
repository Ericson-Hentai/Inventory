<?php require_once(realpath(dirname(__DIR__,2) . '/public/config.php')) ?>

<?php 
session_start();

if(!isset($_SESSION['user_login']))
{
	header("Location: index.php");
}
include "../../app/Controller/utils.php";
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
						<h4 class="page-title">Order Tables</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Tables</a></li>
							<li class="breadcrumb-item active" aria-current="page">Order Tables</li>
						</ol>

					</div>
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Order List Table</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="example" class="table table-striped table-bordered" style="width:100%">
											<thead>
												<tr>
													<th class="wd-15p">ID</th>
                                                    <th class="wd-15p">Item's</th>
                                        
													<th class="wd-15p">Total Price</th>
													<th class="wd-15p">Date ordered</th>
													<th class="wd-15p">Status</th>
													<th class="wd-10p">Action</th>
												</tr>
											</thead>
											<tbody>
											
											<?php 
											$userid = $_SESSION['user_details'][0]['id'];
											DBOpen('inventorydb', '127.0.0.1');
											$data = DBGetData2("SELECT * FROM `orders` WHERE `user_id` = '$userid' ");
											DBClose();
											foreach($data as $order){
												$n++;
											?>
												<tr>
												<td><?=  $n ?></td>
													<td><?=  $order['item'] ?></td>
                                                    <td>Php <?= number_format($order['total_price'], 2) ?></td>
													<td><?=  $order['date_ordered'] ?></td>
													<td><?=  $order['status'] ?></td>
												
													
													<td>
                                                    <!-- <button type="button" class="btn btn-danger btn-sm btndeletesuer" id=>Delete</button> -->
													<button type="button" class="btn btn-info btn-sm btnupdateuser" id=>View</button>
                                                    </td>
												
											
			
													
												</tr>
											<?php } ?>
											</tbody>
										</table>
									</div>
								</div>
								<!-- table-wrapper -->
							</div>
							<!-- section-wrapper -->
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
	var sessub1 = "<?= $_SESSION['ordercomplete'] ?>";

	if(sessub1){
		$(document).ready(function(){
			Swal.fire({
				position: 'top-end', 
				icon: 'success',
				title: 'Order Complete!',
				showConfirmButton: false,
				timer: 1500
				});
		});
		<?php unset($_SESSION['ordercomplete']) ?>
	}
</script>