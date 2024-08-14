<!DOCTYPE html>
<html lang="en">
  	<head>
		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
		<meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
			<title>Accounts</title>
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
                <h4 class="page-title">USER ACCOUNTS</h4>  
            </div>
			
		   </div>
		   
		   
		   
		   <!--------main-content------------->
        <div class="main-content">
			<div class="row">
				<div class="col-md-12">
				<div class="table-wrapper">
                
                <!-- <div class="table-title">
                    <div class="row">
                        <div class="col-sm-6 p-0 d-flex justify-content-lg-end justify-content-center"
                            style="margin-left:50%">
                            <a href="#addNewUserModal" class="btn btn-success" data-toggle="modal">
                            <i class="material-icons">&#xE147;</i><span>Add New User</span></a>
                        </div>
                    </div>
                </div> -->

                <div id="editusermodal" class="modal fade">
                    <div class="modal-dialog">
                        <div class="modal-content">
                        <form action="" method="POST" id="editUser">
                            <div class="modal-header">
                                <h4 class="modal-title">Edit User</h4>
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                            </div>
                            <div class="modal-body">
                                <input type="hidden" name="userid">
                                <div class="form-group">
                                    <label>Username</label>
                                    <input type="text" name="username" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label>Password</label>
                                    <input id="password" type="text" name="password" class="form-control" required >
                                </div>
                                <div class="form-group">
                                    <label>User Type</label></br>
                                    <select name="usertype" id="usertype" class="form-control">
                                        <option value="Visitor">Visitor</option>
                                        <option value="Admin">Admin</option>
                                        <option value="Incharge" >Incharge</option>
                                    </select>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                                <button class="btn btn-success">Edit User</button>
                            </div>
                        </form>
                        </div>
                    </div>
                </div>

                <div class='table-wrapper-scroll-y my-custom-scrollbar table-responsive'>
                    <table class="table table-striped table-hover" id="accountTable">
                        <thead>
                            <tr>
                                <th><b>User ID</b></th>
                                <th><b>Username</b></th>
                                <th><b>Password</b></th>
                                <th><b>User Type</b></th>
                                <th><b>Action</b></th>
                            </tr>
                        </thead>
                    </table>
                </div>
				
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
    <script src="https://cdn.datatables.net/1.13.4/js/jquery.dataTables.min.js"></script>
	<script src="https://cdn.datatables.net/1.13.4/js/dataTables.bootstrap4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
	<script src="/js/jquery.cookie.min.js"></script>
	<script src="/js/main.js"></script>
    <script src="/js/login/admin.js"></script>
    <script src="/js/page/account.js"></script>



</body>
</html>


