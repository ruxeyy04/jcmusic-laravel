<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<title>Product</title>
	<link rel="stylesheet" href="/css/custom.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" href="https://cdn.datatables.net/1.13.4/css/dataTables.bootstrap4.min.css">
	<link rel="stylesheet" type="text/css" href="/css/home_carou.css" />
</head>

<body>


	<div class="wrapper">


		<div class="body-overlay"></div>

		<!-------------------------sidebar------------>
		<!-- Sidebar  -->
		@include('admin\sidebar')




		<!--------page-content---------------->

		<div id="content">

			<!--top--navbar----design--------->

			<div class="top-navbar">
				<div class="xp-topbar">

					<!-- Start XP Row -->
					<div class="row">
						<!-- Start XP Col -->
						<div class="col-2 col-md-1 col-lg-1 order-2 order-md-1 align-self-center">
							<div class="xp-menubar">
								<span class="material-icons text-white">signal_cellular_alt</span>
							</div>
						</div>
						<!-- End XP Col -->



						<!-- Start XP Col -->

						<!-- End XP Col -->

					</div>
					<!-- End XP Row -->

				</div>
				<div class="xp-breadcrumbbar text-center">
					<h4 class="page-title">MODIFY PRODUCTS</h4>
				</div>

			</div>



			<!--------main-content------------->
			<div class="main-content">
				<div class="row">
					<div class="col-md-12">
						<div class="table-wrapper">

							<div class='table-wrapper-scroll-y my-custom-scrollbar table-responsive'>
								<table class="table table-striped table-hover" id="productTableMod">
									<thead>
										<tr>
											<td>Image</td>
											<td>Prod No.</td>
											<td>Name</td>
											<td>Brand</td>
											<td>Model</td>
											<td>Year Released</td>
											<td>Type</td>
											<td>Price</td>
											<td>Status</td>
											<td>Action</td>
										</tr>
									</thead>
									<tbody class="prodData">

									</tbody>
								</table>
							</div>

						</div>
					</div>
				</div>
			</div>
			<!-- Modal -->
			<div class="modal fade" id="editProd" tabindex="-1" aria-labelledby="editProd" aria-hidden="true">
				<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
							<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								<span aria-hidden="true">&times;</span>
							</button>
						</div>
						<div class="modal-body">
							<form action="" id="editProduct">
								<div class="row mt-3">
									<div class="col-md-12">
										<label class="labels">Picture</label>
										<div class="input-group mb-3">
											<div class="input-group-prepend">
												<span class="input-group-text" id="inputGroupFileAddon01">Upload</span>
											</div>
											<div class="custom-file">
												<input type="file" class="custom-file-input" id="inputGroupFile01"
													aria-describedby="inputGroupFileAddon01" name="image">
												<label class="custom-file-label" for="inputGroupFile01">Choose
													file</label>
											</div>
										</div>
									</div>

									<div id="preview-container" class="col-md-12">
										<label class="labels">Preview</label>
										<img id="preview-image" src="#" alt="Preview Image" class="img-thumbnail">
									</div>
									<div class="col-md-12">
										<label class="labels">Instrument Name</label>
										<input type="text" class="form-control" value="" name="name" required>
									</div>
									<div class="col-md-12">
										<label class="labels">Instrument Type</label>
										<select name="type" id="" class="form-control" required>
											<option value="String">String</option>
											<option value="Percussion">Percussion</option>
											<option value="Wind">Wind</option>
										</select>
									</div>
									<div class="col-md-12">
										<label class="labels">Year Released:</label>
										<input type="text" class="form-control" value="" name="year" required>
									</div>
									<div class="col-md-12">
										<label class="labels">Instrument Model:</label>
										<input type="text" class="form-control" value="" name="model" required>
									</div>
									<div class="col-md-12">
										<label class="labels">Brand:</label>
										<input type="text" class="form-control" value="" name="brand" required>
									</div>
									<div class="col-md-12">
										<label class="labels">Price :</label>
										<input type="number" class="form-control" value="" name="price" required>
									</div>
									<input type="hidden" name="insid">
									<div class="col-md-12">
										<label class="labels">Status :</label>
										<select name="status" id="" class="form-control">
											<option value="Available">Available</option>
											<option value="Not Available">Not Available</option>
										</select>
									</div>
								</div>
								<div class="d-flex justify-content-center m-3">
									<button class="btn btn-info" type="submit">Update Product</button>
								</div>
							</form>
						</div>
						<div class="modal-footer">
							<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
						</div>
					</div>
				</div>
			</div>
			<!---footer---->
			<footer class="footer">
				<div class="container-fluid">
					<div class="footer-in">
						<p class="mb-0">Copyright &copy 2022. JC Music.</p>
					</div>
				</div>
			</footer>
		</div>
	</div>



	<!-- jQuery first, then Popper.js, then Bootstrap JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.0/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
	<script src="/js/jquery.cookie.min.js"></script>
	<script src="/js/main.js"></script>
	<script src="/js/login/admin.js"></script>
	<script src="/js/page/products.js"></script>
	<script src="/js/page/editprod.js"></script>
</body>

</html>