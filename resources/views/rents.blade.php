@extends('layouts.rents')

@section('title','Rented Items')

@section('sidebar')
@include('layouts\sidebar')
@endsection
@section('footer')
<footer class="footer">
    <div class="container-fluid">
        <div class="footer-in">
            <p class="mb-0">Copyright &copy 2022. JC Music.</p>
        </div>
    </div>
</footer>
@endsection

@section('top_navbar')
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
        <h4 class="page-title">Rented Items</h4>
    </div>

</div>
@endsection

@section('main_content')
<div class="main-content">
    <div class="row">
        <div class="col-md-12">
            <div class="table-wrapper">

                <div class='table-wrapper-scroll-y my-custom-scrollbar'>
                    <table id="rentTable" class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <td>Picture</td>
                                <td>Name</td>
                                <td>Brand</td>
                                <td>Model</td>
                                <td>Rent Price</td>
                                <td>Status</td>
                                <td>Date to Return</td>
                                <td>Return Date</td>
                                <td>Action</td>
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
@endsection