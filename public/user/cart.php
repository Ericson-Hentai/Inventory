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
						<h4 class="page-title">Cart</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Tables</a></li>
							<li class="breadcrumb-item active" aria-current="page">Cart Tables</li>
						</ol>

					</div>
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Cart List Table</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
                                    <!-- id="example" -->
										<table class="table table-striped table-bordered" style="width:100%">
											<thead>
												<tr>
                                                    <th class="wd-15p">ID</th>
                                                    <th class="wd-15p">Image</th>
                                                    <th class="wd-15p">Item</th>
                                                    <th class="wd-15p">Quantity</th>
                                                    <th class="wd-15p">Total Price</th>
												</tr>
											</thead>
											<tbody>
                                          
                                            <?php 
                                   
                                        // var_dump($_SESSION['cart']);
                                        if(isset($_SESSION['cart'])){

                                                foreach($_SESSION['cart'] as $cart){
                                                $n++;
                                                if($cart['qty'] != 0){
                                        ?>
										
												<tr>
                                                    <td><?= $n; ?></td>
                                                    <td><img src="<?= asset . "/assets/productimg/" . $cart['productimage']; ?>" width="100" height="100" class="img-responsive m-auto" alt=""></td>
                                                    <td><?= $cart['productname']; ?></td>
                                                    <td>
                                                    <form class="form-inline" action="<?= direction ."/app/Controller/AddToCartController.php" ?>" method="POST">
                                                            <input type="hidden"name="productid" value="<?= $cart['proID']; ?>">
                                                            <input type="hidden" class="form-control" name="productrealid" value="<?= $cart['id']; ?>">
                                                            <?php $quantity = $_SESSION['cart'][$id]; ?>
                                                            <?= var_dump($quantity) ?>
                                                        <!-- <div class="form-group"> -->
                                                            <input type="number" class="form-control" name="updatequantity" value="<?= $cart['qty']; ?>">
                                                           
                                                        <!-- </div>
                                                        <div class="form-group"> -->
                                                            <button type="submit" class="btn btn-info btn-sm mr-1" name="btnupdatequantity">Update</button>
                                                        <!-- </div> -->
                                                        <button type="button" class="btn btn-danger btn-sm btnremovecart" id="<?= $cart['proID'] ?>">Remove</button>
                                                        </form>
                                                        
                                                    </td>
                                                    <?php $tottal = $cart['qty'] * $cart['price']; ?>
													<td><?= 'Php ' .number_format($tottal, 2); ?></td>
													
													<!-- <td>
                                                    
													<button type="button" class="btn btn-info btn-sm btnupdateuser" id="<?= $cart['proID'] ?>">Update</button>
                                                    </td> -->
												
                                                    </tr>
													
                                                <?php 
                                                $total = $total + $tottal;
                                                        }
                                                    }
                                                //} 
                                                ?>
                                                <?php $_SESSION['totalprice'] = isset($_SESSION['totalprice']) ? $_SESSION['totalprice'] : $total; ?>
                                                <tr>
                                                    <td colspan="4" class="text-right font-weight-bold">Total Price</td>
                                                    <td colspan="1" class="text-right">Php <?= number_format($total,2) ?></td>
                                                </tr>
											<?php } ?>
											</tbody>
                                        </table>
                                        
                                        <?php if(isset($_SESSION['cart']) && !empty($_SESSION['cart'])){ ?>
                                        <div class="pull-right">
                                            <a href="#" class="btn btn-danger btn-md btncancelscart" >Empty Cart!!!</a>
                                            <a href="#" class="btn btn-success btn-md" data-toggle="modal" data-target="#checkout_modal">Check Out</a>
                                        </div>
                                        <?php } ?>
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
  
    
    <div class="modal fade" id="checkout_modal" tabindex="-1" role="dialog"  aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
                            <h5 class="modal-title" id="example-checkout_modal">CheckOut Form</h5><br>
                            
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
                      
                            <form method="POST" action="<?= direction . "/app/Controller/AddToCartController.php"; ?>">
                                <input type="hidden" class="form-control" id="orderid" name="orderid">

                            <div class="alert alert-primary text-center">
                                *** Click the submit button to confirm your order ***
                            </div>
                            <div class="alert alert-success text-center">
                                *** The payment is COD! ***
                            </div>
                        <div class="alert alert-warning">
                            *** Please wait for our call/text or email for confirmation. Thank You! ***
                        </div>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary" name="btnorder">Submit</button>
						</div>
						</form>
					</div>
				</div>
            </div>
            
</body>
</html>

<?php 

include "../view/footer.php";

?>

<style>
.table td.fit, 
.table th.fit {
    white-space: nowrap;
    width: 1%;
}
</style>

<script type="text/javascript">
	$(document).ready(function() {
		$('.btnremovecart').on('click', function(e) {
			var confirmation = confirm('Are Your Sure to Remove this in Your Cart!');
			const productid = e.target.id;
			if(confirmation == true){
				var addcarturl = "<?= direction . "/app/Controller/AddToCartController.php"; ?>";
			$.ajax({
				type: "POST",
				url: addcarturl,
				data: {removecartproductid: productid},
				success: function(data){
					var data = JSON.parse(data);

					if(data.type == 'success'){
						alert(data.message);
                        window.location.reload();
					}else{
						alert('not Add');
					}
				}
			});
			}else{
				return false;
			}
		});

        $('.btncancelscart').on('click', function() {
			var confirmation = confirm('Are Your Sure to Cancel All Product in Your Cart!');
            var answer = "yes";
			if(confirmation == true){
				var cancelcarturl = "<?= direction . "/app/Controller/AddToCartController.php"; ?>";
			$.ajax({
				type: "POST",
				url: cancelcarturl,
				data: {cancelcart: answer},
				success: function(data){
					var data = JSON.parse(data);
					if(data.type == 'success'){
						alert(data.message);
                        window.location.reload();
					}else{
						alert('not Add');
					}
				}
			});
			}else{
				return false;
			}
		});

	});
</script>

<script type="text/javascript">
	var sessub1 = "<?= $_SESSION['ordernotcomplete'] ?>";

	if(sessub1){
		$(document).ready(function(){
			Swal.fire({
				position: 'top-end', 
				icon: 'error',
				title: 'Order Not Complete!',
				showConfirmButton: false,
				timer: 1500
				});
		});
		<?php unset($_SESSION['ordernotcomplete']) ?>
	}
</script>