@extends('layouts.viewproducts')

@section('title','Products')

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


            <!-- End XP Col -->

            <!-- Start XP Col -->

            <!-- End XP Col -->

        </div>
        <!-- End XP Row -->

    </div>
    <div class="xp-breadcrumbbar text-center">
        <h4 class="page-title">PRODUCTS</h4>
    </div>

</div>
@endsection
@section('modal_addcart')
<div class="modal fade" id="prodInfo" tabindex="-1" aria-labelledby="prodInfo" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title prodInfoTitle">Product Name</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="ins_idno" class="ins_idno">
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
                <button type="button" class="btn btn-primary addtoCart">Add to Cart</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal_addrent')
<div class="modal fade" id="rentInfo" tabindex="-1" aria-labelledby="prodInfo" aria-hidden="true">
    <div class="modal-dialog modal-dialog-scrollable">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title prodInfoTitle">Product Name</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <input type="hidden" name="ins_idno" class="ins_idno">
                <div class="product-image">
                    <img src="/pics/13575.jpg" alt="" class="img-thumbnail prodImg">
                </div>
                <div class="product-details mt-2">
                    <h6>Instrument Type: <strong><span class="prodType"></span></strong></h6>
                    <h6>Year Release: <strong><span class="prodYear"></span></strong></h6>
                    <h6>Brand: <strong><span class="prodBrand"></span></strong></h6>
                    <h6>Model: <strong><span class="prodModel"></span></strong></h6>
                    <h6>Price: <strong><span class="prodPricee"></span></strong></h6>
                </div>
                <div class="input-group">
                    <div class="input-group-prepend">
                        <span class="input-group-text">Date to Return</span>
                    </div>
                    <input type="date" class="form-control" id="date">
                </div>
                <h5 class="mt-3">Total Rent to Pay: <span id="rentAmount">₱0.00</span></h5>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-warning addtoRent">Rent Item</button>
            </div>
        </div>
    </div>
</div>
@endsection

@section('main_section')
<div class="main-content">
    <div class="row">
        <div class="col-md-12">
            <div class="table-wrapper">

                <div class='table-wrapper-scroll-y my-custom-scrollbar table-responsive'>
                    <table class="table table-striped table-hover" id="productTable">
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
@endsection