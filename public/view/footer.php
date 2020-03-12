<!-- Dashboard js -->
<script src="../resources/assets/js/vendors/jquery-3.2.1.min.js"></script>
<!-- <script
  src="https://code.jquery.com/jquery-3.4.1.js"
  integrity="sha256-WpOohJOqMqqyKL9FccASB9O0KwACQJpFTUBLTYOVvVU="
  crossorigin="anonymous"></script> -->
<script src="../resources/assets/js/vendors/bootstrap.bundle.min.js"></script>
<script src="../resources/assets/js/vendors/jquery.sparkline.min.js"></script>
<script src="../resources/assets/js/vendors/selectize.min.js"></script>
<script src="../resources/assets/js/vendors/jquery.tablesorter.min.js"></script>
<script src="../resources/assets/js/vendors/circle-progress.min.js"></script>
<script src="../resources/assets/plugins/rating/jquery.rating-stars.js"></script>


<!-- Fullside-menu Js-->
<script src="../resources/assets/plugins/fullside-menu/jquery.slimscroll.min.js"></script>
<script src="../resources/assets/plugins/fullside-menu/waves.min.js"></script>
<script src="../resources/assets/plugins/toggle-sidebar/sidemenu.js"></script>

<!-- Echarts Js-->
<script src="../resources/assets/plugins/echarts/echarts.js"></script>
<script src="../resources/assets/js/index1.js"></script>

<!-- Input Mask Plugin -->
<script src="../resources/assets/plugins/input-mask/jquery.mask.min.js"></script>


<!--Morris.js Charts Plugin -->
<script src="../resources/assets/plugins/am-chart/amcharts.js"></script>
<script src="../resources/assets/plugins/am-chart/serial.js"></script>


<!--Select2 js -->
<script src="../resources/assets/plugins/select2/select2.full.min.js"></script>

<!-- Timepicker js -->
<script src="../resources/assets/plugins/time-picker/jquery.timepicker.js"></script>
<script src="../resources/assets/plugins/time-picker/toggles.min.js"></script>

<!-- Datepicker js -->
<script src="../resources/assets/plugins/date-picker/spectrum.js"></script>
<script src="../resources/assets/plugins/date-picker/jquery-ui.js"></script>
<script src="../resources/assets/plugins/input-mask/jquery.maskedinput.js"></script>

<!-- Inline js -->
<script src="../resources/assets/js/select2.js"></script>
<!-- file uploads js -->
<script src="../resources/assets/plugins/fileuploads/js/dropify.js"></script>

<!-- Custom scroll bar Js-->
<script src="../resources/assets/plugins/scroll-bar/jquery.mCustomScrollbar.concat.min.js"></script>

<!-- Search Js-->
<script src="../resources/assets/js/prefixfree.min.js"></script>

<!-- Custom Js-->
<script src="../resources/assets/js/custom.js"></script>

<!-- Back to top -->
<a href="#top" id="back-to-top" style="display: inline;"><i class="fa fa-angle-up"></i></a>


<!-- c3.js Charts Plugin -->
<script src="../resources/assets/plugins/charts-c3/d3.v5.min.js"></script>
<script src="../resources/assets/plugins/charts-c3/c3-chart.js"></script>


<!-- Index Scripts -->
<script src="../resources/assets/js/index.js"></script>
<script src="../resources/assets/js/index2.js"></script>


<!-- Custom Js-->
<script src="../resources/assets/js/custom.js"></script>


<!-- Data tables -->
<script src="../resources/assets/plugins/datatable/jquery.dataTables.min.js"></script>
<script src="../resources/assets/plugins/datatable/dataTables.bootstrap4.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
<!-- Data table js -->
		<script>
			


		</script>


<script type="text/javascript">
	$(document).ready(function() {
		$('.dropify').dropify({
			messages: {
				'default': 'Drag and drop a file here or click',
				'replace': 'Drag and drop or click to replace',
				'remove': 'Remove',
				'error': 'Ooops, something wrong appended.'
			},
			error: {
				'fileSize': 'The file size is too big (2M max).'
			}
		});
		$(function(e) {
			$('#example').DataTable();
		});

		const Toast = Swal.mixin({
		toast: true,
		position: 'top-end',
		showConfirmButton: false,
		timer: 3000,
		timerProgressBar: true,
		onOpen: (toast) => {
			toast.addEventListener('mouseenter', Swal.stopTimer)
			toast.addEventListener('mouseleave', Swal.resumeTimer)
			}
		});


	});
</script>

<!--footer-->
<footer class="footer">
	<div class="container">
		<div class="row align-items-center flex-row-reverse">
			<div class="col-md-12 col-sm-12 mt-3 mt-lg-0 text-center">
				Copyright © 2018 <a href="#">Inventory</a>. Designed by <a href="#">Spruko</a> All rights reserved.
			</div>
		</div>
	</div>
</footer>
<!-- End Footer-->
</div>


			
