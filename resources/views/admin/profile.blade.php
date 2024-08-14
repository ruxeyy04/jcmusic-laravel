<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Required meta tags -->
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
	<title>Profile</title>
	<link rel="stylesheet" href="/css/custom.css">
	<link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600&display=swap" rel="stylesheet">
	<link href="https://fonts.googleapis.com/css2?family=Material+Icons" rel="stylesheet">
	<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Open+Sans">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
	<link rel="stylesheet" type="text/css" href="/css/home_carou.css" />
	<link rel="stylesheet" href="/css/profile.css">
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
					<h4 class="page-title">PROFILE</h4>
				</div>

			</div>



			<!--------main-content------------->
			<div class="main-content">
				<form id="profile">
					<div class="container border-right" style="max-width: 800px;">
						<div class="p-3 py-5">

							<div class="row mt-3">
								<div class="col-md-4">
									<label class="labels">First Name</label>
									<input id="fname" type="text" name="fname" class="form-control" value="" required>
								</div>
								<div class="col-md-4">
									<label class="labels">Middle Name</label>
									<input id="mname" type="text" name="mname" class="form-control" value="">
								</div>
								<div class="col-md-4">
									<label class="labels">Last Name</label>
									<input id="lname" type="text" name="lname" class="form-control" value="" required>
								</div>
								<div class="col-md-12">
									<label class="labels">Address</label>
									<input id="address" type="text" name="address" class="form-control" value=""
										required>
								</div>
								<div class="col-md-6">
									<label class="labels">Username</label>
									<input id="user" type="text" name="user" class="form-control" value="" required>
								</div>
								<div class="col-md-6">
									<label class="labels">Password</label>
									<input type="text" id="pass" name="pass" class="form-control" value="" required>
								</div>
							</div>


						</div>
					</div>
					<div class="col-md-12">
						<div class="">
							<span id='message'></span>
							<div class="mt-5 text-center">
								<button class="btn btn-primary profile-button" id="updateProfile" type="submit">Save
									Profile</button>
							</div>
						</div>
					</div>
				</form>
			</div>
		</div>
	</div>
	</div>

	</br></br>

	<!---footer---->
	<footer class="footer">
		<div class="container-fluid">
			<div class="footer-in">
				<p class="mb-0" style="margin-left: 15%">Copyright &copy 2022. JC Music.</p>
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
	<script src="/js/jquery.cookie.min.js"></script>
	<script src="/js/main.js"></script>
	<script src="/js/login/admin.js"></script>





</body>

</html>