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
						<h4 class="page-title">Register Buyer Tables</h4>
						<ol class="breadcrumb">
							<li class="breadcrumb-item"><a href="#">Tables</a></li>
							<li class="breadcrumb-item active" aria-current="page">Register Buyer Tables</li>
						</ol>

					</div>
					<div class="row">
						<div class="col-md-12 col-lg-12">
							<div class="card">
								<div class="card-header">
									<div class="card-title">Register Buyers Table</div>
								</div>
								<div class="card-body">
									<div class="table-responsive">
										<table id="example" class="table table-striped table-bordered" style="width:100%">
											<thead>
												<tr>
													<th class="wd-15p">ID</th>
												
													<th class="wd-20p">Name</th>
                                                    <th class="wd-15p">Contact Number</th>
                                                    <th class="wd-15p">Address</th>
													<th class="wd-15p">Image</th>
													<th class="wd-10p">Action</th>
												</tr>
											</thead>
											<tbody>
											
												<?php
												DBOpen('inventorydb', '127.0.0.1');
												$data = DBGetData2("SELECT * FROM `user_details` ORDER BY id DESC");
												DBClose();
												foreach($data as $user){
							
													$n++;
												?>
												<tr>
													<td><?= $n  ?></td>
													<td><?= $user['fullname'] ?></td>
                                                    <td><?= $user['contact_no'] ?></td>
                                                    <td><?= $user['address'] ?></td>
													<td><img src="<?= '../resources/assets/userimg/' . $user['image'] ?>" width="100" height="100" class="img-responsive m-auto" alt=""></td>
													
													<td>
                                                    <button type="button" class="btn btn-danger btn-sm btndeletesuer" id=<?= $user['user_id']  ?>>Delete</button>
													<button type="button" class="btn btn-info btn-sm btnupdateuser" id="<?= $user['user_id']  ?>" >View Profile</button>
                                                    </td>
												
											
													
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