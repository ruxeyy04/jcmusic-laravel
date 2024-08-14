<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    <title>Transactions</title>
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
                    <h4 class="page-title">List of Order</h4>
                </div>

            </div>
            <!--------main-content------------->
            <div class="main-content">
                <div class="row">
                    <div class="col-md-12">
                        <div class="table-wrapper">

                            <div class='table-wrapper-scroll-y my-custom-scrollbar'>
                                <table class="table table-striped table-hover" id="transaction">
                                    <thead>
                                        <tr>
                                            <td>Order ID</td>
                                            <td>Date</td>
                                            <td>Customer Name</td>
                                            <td>Total Item</td>
                                            <td>Total Amount</td>
                                            <td>Status</td>
                                        </tr>
                                    </thead>
                                    <tbody>

                                    </tbody>
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
    <script src="/js/page/transactions.js"></script>




</body>

</html>