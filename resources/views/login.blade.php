@extends('layouts.login')
@section('title', 'Login')
@section('loginform')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 col-lg-10">
            <div class="wrap d-md-flex">
                <div class="img" style="background-image: url(../images/justine.png); background-size: cover;">
                </div>
                <div class="login-wrap p-4 p-md-5">
                    <div class="d-flex">
                        <div class="w-100">
                            <h3 class="mb-4">Sign In</h3>
                        </div>
                    </div>
                    <form action="#" class="signin-form" id="signin">
                        <div class="form-group mb-3">
                            <label class="label" for="name">Username</label>
                            <input type="text" class="form-control" placeholder="Username" name="user" required>
                        </div>
                        <div class="form-group mb-3">
                            <label class="label" for="password">Password</label>
                            <input type="password" class="form-control" placeholder="Password" name="pass" required>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="form-control btn btn-primary rounded submit px-3">Sign
                                In</button>
                        </div>
                    </form>
                    <p class="text-center">Not a member? <a href="#signup" data-toggle="modal">Sign Up</a></p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

@section('modal_signup')
<div class="modal fade" id="signup" tabindex="-1" aria-labelledby="signup" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signup">Sign Up</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form class="signin-form" id="reg_user">
                <div class="modal-body">

                    <div class="form-group mb-3">
                        <label class="label" for="name">Fisrt Name</label>
                        <input type="text" class="form-control" placeholder="First Name" name="fname" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="label" for="name">Last Name</label>
                        <input type="text" class="form-control" placeholder="Last Name" name="lname" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="label" for="name">Address</label>
                        <input type="text" class="form-control" placeholder="Address" name="address" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="label" for="name">Username</label>
                        <input type="text" class="form-control" placeholder="Username" name="username" required>
                    </div>
                    <div class="form-group mb-3">
                        <label class="label" for="password">Password</label>
                        <input type="password" class="form-control" placeholder="Password" name="password" required>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary" id="register">Register</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection