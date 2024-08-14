@extends('layouts.profile')

@section('title', 'My Profile')

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
        <h4 class="page-title">PROFILE</h4>
    </div>

</div>
@endsection

@section('main_content')
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
                        <input id="address" type="text" name="address" class="form-control" value="" required>
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
@endsection