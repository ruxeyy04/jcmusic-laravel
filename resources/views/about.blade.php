@extends('layouts.about')

@section('title', 'About')

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
        <h4 class="page-title">ABOUT</h4>
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

                <h2>About the System</h2>
                <center>
                    <div class="panel panel-default" style="width:70%">
                        <div class="panel-body" style="text-align: center">
                            THIS SYSTEM IS DESIGNED FOR ANYONE WHO HAS
                            EYES ON MUSICAL INSTRUMENTS. IN THIS INSTANCE,
                            INDIVIDUALS WHO HAVE REGISTERED WITH THE SYSTEM
                            ARE ABLE TO EITHER BUY OR RENT ANY INSTRUMENT THEY
                            HAVE THEIR EYE ON OR SIMPLY WINDOW SHOP BY SEARCHING
                            FOR THE NAMES OF INSTRUMENTS.
                        </div>
                    </div>
                </center>

                <h2>About the Developer</h2>
                <center>
                    <div class="panel panel-default" style="width:70%">
                        <div class="panel-body" style="text-align: center">
                            <img src="/images/justine.jpg" class="img-thumbnail" style="width:15%"></br></br>
                            HI, I'M JUSTINE M. CAPAPAS.
                            I AM A 22-YEAR OLD INTROVERT, FROM POBLACION 1,
                            OROQUIETA CITY. I GRADUATED SENIOR HIGH AT MISAMIS OCCIDENTAL NATIONAL HIGH
                            SCHOOL,
                            UNDER THE HUMANITIES AND SOCIAL SCIENCES STRAND.
                            AND I AM CURRENTLY A 3RD YEAR BSIT STUDENT AT MISAMIS UNIVERSITY.
                        </div>
                    </div>
                </center>

            </div>
        </div>
    </div>
</div>
@endsection