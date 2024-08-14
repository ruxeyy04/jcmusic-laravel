@extends('layouts.cart')
@section('title', 'Cart')

@section('sidebar')
@include('layouts\sidebar')
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
        <h4 class="page-title">Cart List</h4>
    </div>

</div>
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

@section('main_content')
<div class="main-content">
    <div class="row">
        <div class="col-md-12">
            <div class="table-wrapper">

                <div class='table-wrapper-scroll-y my-custom-scrollbar table-responsive'>
                    <table class="table table-striped table-hover" id="cartTable">
                        <thead>
                            <tr>
                                <td>Picture</td>
                                <td>Name</td>
                                <td>Brand</td>
                                <td>Model</td>
                                <td>Price</td>
                                <td>Date Added</td>
                                <td>Quantity</td>
                                <td>Total Price</td>
                                <td>Action</td>
                            </tr>
                        </thead>
                        <tbody>

                        </tbody>
                    </table>
                </div>
                <button class="btn btn-success btn-block confirmOrder">Confirm Order</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal_updatecart')
    <div class="modal fade" id="editCart" tabindex="-1" aria-labelledby="prodInfo" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="prodInfoTitle">Product Name</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    <input type="hidden" name="cartid" class="cartid">
                    <div class="product-image">
                        <img src="/pics/13575.jpg" alt="" class="img-thumbnail prodImg">
                    </div>
                    <div class="product-details mt-2">
                        <h6>Instrument Type: <strong><span class="prodType"></span></strong></h6>
                        <h6>Year Release: <strong><span class="prodYear"></span></strong></h6>
                        <h6>Brand: <strong><span class="prodBrand"></span></strong></h6>
                        <h6>Model: <strong><span class="prodModel"></span></strong></h6>
                        <h6>Price: <strong><span class="prodPrice"></span></strong></h6>
                    </div>
                    <div class="input-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Quantity</span>
                        </div>
                        <input type="number" class="form-control" min="1" id="quantity">
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary updateCart">Update Cart</button>
                </div>
            </div>
        </div>
    </div>
@endsection