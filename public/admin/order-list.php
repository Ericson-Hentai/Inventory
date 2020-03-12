<?php require_once(realpath(dirname(__DIR__,2) . '/public/config.php')) ?>
<?php 
session_start();

if(!isset($_SESSION['admin_login']))
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
												
													<th class="wd-20p">Full Name</th>
													<th class="wd-15p">Product Item</th>
                                                    <!-- <th class="wd-15p">Quantity</th> -->
                                                    
                                                    <th class="wd-15p">Total Price</th>
													<th class="wd-15p">Status</th>
													<th class="wd-10p">Action</th>
												</tr>
											</thead>
											<tbody>
											<?php 
											DBOpen('inventorydb', '127.0.0.1');
											$data = DBGetData2("SELECT * FROM `orders` ORDER BY date_ordered DESC");
											DBClose();
											foreach($data as $order){
						
												$n++;
											
											?>
										
												<tr>
													<td><?= $n++ ?></td>
													<td><?= $order['fullname'] ?></td>
                                                    <td><?= $order['item'] ?></td>
                                                    <td>Php <?= number_format($order['total_price'], 2)  ?></td>
                                                    <td><?= $order['status'] ?></td>
													<td>
														<?php if($order['status'] == "unconfirmed") {?>
														<button type="button" class="btn btn-success btn-sm btnconfirmedorder" id="<?= $order['id'] ?>">Confirmed</button>
														<?php } ?>
														<?php if($order['status'] == "confirmed") {?>
														<button type="button" class="btn btn-primary btn-sm btndeliverorder" id="<?= $order['id'] ?>">Deliver</button>
														<?php } ?>
                                                    </td>								
												</tr>
											<?php  } ?>
											
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

$(document).ready(function(){
			var confirmurl = "<?= direction . "/app/Controller/admin/OrderController.php"; ?>";
			$('.btnconfirmedorder').on('click', function(e){
			var confirmation = confirm("Are You Sure to Confirmed Order?");
			if (confirmation == true) {
				$.ajax({
				type: "POST",
				url: confirmurl,
				data: {confirmorderid: e.target.id},
				success : function(data){
					var data = JSON.parse(data);
					if(data.type == "success"){
						alert(data.message)
						window.location.reload();
					}else{
						alert(data.message);
					}
				}
			});
			} else {
				return false;
			}
	
		});

		var confirmurl = "<?= direction . "/app/Controller/admin/OrderController.php"; ?>";
			$('.btnconfirmedorder').on('click', function(e){
			var confirmation = confirm("Are You Sure this Order was Delivered?");
			if (confirmation == true) {
				$.ajax({
				type: "POST",
				url: confirmurl,
				data: {confirmorderid: e.target.id},
				success : function(data){
					var data = JSON.parse(data);
					if(data.type == "success"){
						alert(data.message)
						window.location.reload();
					}else{
						alert(data.message);
					}
				}
			});
			} else {
				return false;
			}
	
		});

		
			$('.btndeliverorder').on('click', function(e){
				var deliverurl = "<?= direction . "/app/Controller/admin/OrderController.php"; ?>";
			var confirmation = confirm("Are You Sure to Confirmed Order?");
			if (confirmation == true) {
				$.ajax({
				type: "POST",
				url: deliverurl,
				data: {deliverorderid: e.target.id},
				success : function(data){
					var data = JSON.parse(data);
					if(data.type == "success"){
						alert(data.message)
						window.location.reload();
					}else{
						alert(data.message);
					}
				}
			});
			} else {
				return false;
			}
	
		});
});

</script>