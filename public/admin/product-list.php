<?php require_once(realpath(dirname(__DIR__,2) . '/public/config.php')) ?>
<?php require_once(realpath(dirname(__DIR__,2) . '/app/Controller/admin/ProductController.php')) ?>
<?php 

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
						<h4 class="page-title">Product Tables</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Tables</a></li>
							<li class="breadcrumb-item active" aria-current="page">Product Tables</li>
						</ol>
				
					</div>
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title mx-auto"></div>
									<button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal3">View modal</button>
								</div>

								
								<div class="card-body">
									<div class="table-responsive">
										<table id="example" class="table table-striped table-bordered" style="width:100%">
											<thead>
												<tr>
													<th class="wd-15p">ID</th>
												
													<th class="wd-20p">Product Name</th>
                                                    <th class="wd-15p">Product Description</th>
													<th class="wd-15p">Price</th>
													<th class="wd-15p">Quantity</th>
													<th class="wd-15p">Image</th>
													<th class="wd-10p">Action</th>
												</tr>
											</thead>
											<tbody>
											
											<?php
									
												DBOpen('inventorydb', '127.0.0.1');
												$data = DBGetData2("SELECT * FROM `product` ORDER BY id DESC");
												DBClose();
												foreach($data as $product){
							
													$n++;
												?>
										
												<tr>
													<td><?= $n; ?></td>
													<td><?= $product['product_name']; ?></td>
                                                    <td><?= $product['product_desc']; ?></td>
                                                    <td><?= $product['price']; ?></td>
                                                    <td><?= $product['quantity']; ?></td>
													<td><img src="<?= asset . "/assets/productimg/" . $product['image']; ?>" width="100" height="100" class="img-responsive m-auto" alt=""></td>
													
													<td>
                                                    <button type="button" class="btn btn-danger btn-sm btnproductdelete" id="<?= $product['id']; ?><">Delete</button>
													<button type="button" class="btn btn-info btn-sm  btnproductupdate" id="<?= $product['id']; ?><">Update</button>
                                                    </td>
												
											
													
												<?php } ?>
													
												</tr>
											
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

			<div class="modal fade" id="exampleModal3" tabindex="-1" role="dialog"  aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="example-Modal3">Add New Product</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="POST" action="<?= direction . "/app/Controller/admin/ProductController.php"; ?>" enctype="multipart/form-data">
								<div class="form-group">
									<label for="product-name" class="form-control-label">Product Name:</label>
									<input type="text" class="form-control" id="product-name" name="product_name">
								</div>
								<div class="form-group">
									<label for="product-text" class="form-control-label">Description:</label>
									<textarea class="form-control" name="product_desc" id="product-text"></textarea>
								</div>
								<div class="form-group">
									<label for="product-text" class="form-control-label">Price:</label>
									<input type="number" class="form-control" id="product-price" name="price">
								</div>
								<div class="form-group">
									<label for="product-quantity" class="form-control-label">Quantity:</label>
									<input type="number" class="form-control" id="product-quantity" name="quantity">
								</div>
								<div class="form-group">
									<label for="image-name" class="form-control-label">Product Image:</label>
									<input type="file" class="form-control" id="image-name" name="product_image">
								</div>
							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary" name="addproductbtn">Add New Product</button>
						</div>
						</form>
					</div>
				</div>
			</div>


			<div class="modal fade" id="updateprodmodal" tabindex="-1" role="dialog"  aria-hidden="true">
				<div class="modal-dialog" role="document">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="example-Modal3">Edit Product</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form method="POST" action="<?php echo direction . "/app/Controller/admin/ProductController.php"; ?>" enctype="multipart/form-data">
							<input type="text" class="form-control" id="u_product-id" name="u_product_id">
								<div class="form-group">
									<label for="u_product-name" class="form-control-label">Product Name:</label>
									<input type="text" class="form-control" id="u_product-name" name="u_product_name">
								</div>
								<div class="form-group">
									<label for="u_product-text" class="form-control-label">Description:</label>
									<textarea class="form-control" name="u_product_desc" id="u_product-text"></textarea>
								</div>
								<div class="form-group">
									<label for="u_product-text" class="form-control-label">Price:</label>
									<input type="number" class="form-control" id="u_product-price" name="u_price">
								</div>
								<div class="form-group">
									<label for="u_product-quantity" class="form-control-label">Quantity:</label>
									<input type="number" class="form-control" id="u_product-quantity" name="u_quantity">
								</div>
								<div class="form-group">
									<label for="u_image-name" class="form-control-label">Product Image:</label>
									<input type="file" class="form-control" id="u_image-name" name="u_product_image">
								</div>
							
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
							<button type="submit" class="btn btn-primary" name="updateproductbtn">Update Product</button>
						</div>
						</form>
					</div>
				</div>
			</div>

			
</body>
</html>

<?php include "../view/footer.php"; ?>


<script type="text/javascript">

		$(document).ready(function(){
			var deleteurl = "<?= direction . "/app/Controller/admin/ProductController.php"; ?>";
			$('.btnproductdelete').on('click', function(e){
			var confirmation = confirm("Are You Sure Want to Delete This?");
			if (confirmation == true) {
				$.ajax({
				type: "POST",
				url: deleteurl,
				data: {productdeleteid: e.target.id},
				// dataType: 'json',
				success : function(data){
					var data = JSON.parse(data);
					if(data.type == "error"){
						Swal.fire({
						position: 'top-end', 
						icon: 'error',
						title: 'Product Not Deleted!',
						showConfirmButton: false,
						timer: 1500
						});
					}else{
						Swal.fire({
						position: 'top-end', 
						icon: 'success',
						title: 'Product Deleted!',
						showConfirmButton: false,
						timer: 1500
						});
						location.reload();
						
					}
				}
			});
			} else {
				return false;
			}
	
		});


		$('.btnproductupdate').on('click', function(e){
			var updateid = e.target.id;
			var updateurl = "<?= direction . "/app/Controller/admin/ProductController.php"; ?>";
			$.ajax({
				type: "POST",
				url: updateurl,
				data: {updateid: updateid},
				success: function(data){
					var data = JSON.parse(data);

					$('#updateprodmodal').modal('show');
					$('#u_product-id').val(data[0].id);
					$('#u_product-name').val(data[0].product_name);
					$('#u_product-text').val(data[0].product_desc);
					$('#u_product-price').val(data[0].price);
					$('#u_product-quantity').val(data[0].quantity);
				}
			});
		});

});

</script>

<script type="text/javascript">
	var edidata = "<?= $_SESSION['edidata'] ?>";
	if (edidata) {
		$(document).ready(function() {
			Swal.fire({
				position: 'top-end', 
				icon: 'success',
				title: 'User Updated!',
				showConfirmButton: false,
				timer: 1500
				});
		});
		<?php unset($_SESSION['edidata']) ?>
	}
</script>

<script type="text/javascript">
	var noteditdata = "<?= $_SESSION['noteditdata'] ?>";

	if(noteditdata){
		$(document).ready(function(){
			$('#updateprodmodal').modal('show');
		});
		<?php 
			unset($_SESSION['noteditdata']);
		?>
	}
</script>