@extends('layouts.orders')

@section('title','Orders')

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
        <h4 class="page-title">My Orders</h4>
    </div>

</div>
@endsection

@section('main_content')
<div class="main-content">
    <div class="row">
        <div class="col-md-12">
            <div class="table-wrapper">

                <div class='table-wrapper-scroll-y my-custom-scrollbar table-responsive'>
                    <table class="table table-striped table-hover" id="myOrder">
                        <thead>
                            <tr>
                                <td>Order ID</td>
                                <td>Total Amount</td>
                                <td>Items</td>
                                <td>Date Ordered</td>
                                <td>Status</td>
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

@section('order_detail_modal')
<div class="modal fade" id="orderDetail" tabindex="-1" role="dialog" aria-labelledby="orderDetail" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-scrollable" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="orderDetail">Order Detail</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h5>Order #: <span id="orderNum"></span></h5>
                <h5>Status: <span id="orderStatus"></span></h5>
                <hr>
                <table class="table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Type</th>
                            <th>Quantity</th>
                            <th>Total Price</th>
                        </tr>
                    </thead>
                    <tbody class="orderItems">

                    </tbody>
                    <tr>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>Total Items: </th>
                        <th><span class="totalitem"></span></th>
                    </tr>
                    <tr>
                        <td></td>
                        <th></th>
                        <th></th>
                        <th></th>
                        <th>
                            <h6>Total Amount: </span></h6>
                        </th>
                        <th>₱ <span class="totalpriceitem"></span></th>
                    </tr>
                    </tfoot>
                </table>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
@endsection