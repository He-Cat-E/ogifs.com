@extends('template.layouts.main')

@section('section')

<style>
    .login__area input:focus {
        color: black !important;
        background-color: white !important;
    }
</style>
<!-- Section-1 -->
<section class="gif-uploader mt-5">
    <div class="wrapper">
        <div class="row mx-0 justify-content-center">
            <div class="col-lg-5">
                <div class="login-area-bg">
                    <div class="nav-buttons">
                        <div class="filter__sections d-flex justify-content-center">
                            <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link nav-link-1 active" id="pills-home-tab" data-bs-toggle="pill" data-bs-target="#pills-home" type="button" role="tab" aria-controls="pills-home" aria-selected="true">Login</button>
                                </li>
                                <li class="nav-item" role="presentation">
                                    <button class="nav-link nav-link-3" id="pills-profile-tab" data-bs-toggle="pill" data-bs-target="#pills-profile" type="button" role="tab" aria-controls="pills-profile" aria-selected="false">Signup</button>
                                </li>
                            </ul>
                        </div>
                    </div>
                    @if(session("success"))
                    <div class="alert alert-success" role="alert">
                        {{ session("success") }}
                    </div>
                    @endif
                    @if(session("error"))
                    <div class="alert alert-danger" role="alert">
                        {{ session("error") }}
                    </div>
                    @endif
                    <div class="tab-content" id="pills-tabContents">
                        <div class="tab-pane fade show active" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab" tabindex="0">
                            <form action="{{ Route('user.login.check') }}" method="post">
                                @csrf
                                <div class="login-page px-lg-5 px-3 mt-4">
                                    <div class="account-login">
                                        <div class="account__heading">
                                            <h2 class="fw-700 text-white text-center">
                                                Account Login
                                            </h2>
                                        </div>
                                        <div class="account-text">
                                            <p class="text-white m-0 text-center">
                                                Enchance your GIF Viewing
                                            </p>
                                        </div>
                                    </div>
                                    <div class="login__area mt-4">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label text-white text-small">Email</label>
                                            <input type="email" class="form-control text-white" placeholder="Enter your desired user name" name="email" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label text-white text-small">Password</label>
                                            <input type="password" class="form-control text-white" placeholder="Enter Your Password" name="password" required>
                                        </div>
                                    </div>
                                </div>

                                <div class="submit-btn border-top mt-5 pt-4 text-center">
                                    <button type="submit" class="btn btn-dark">
                                        Login
                                    </button>
                                </div>
                            </form>
                        </div>
                        <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab" tabindex="0">
                            <form action="{{ Route('register.post') }}" method="POST">
                                @csrf
                                <div class="login-page px-lg-5 px-3 mt-4">
                                    <div class="account-login">
                                        <div class="account__heading">
                                            <h2 class="fw-700 text-white text-center">
                                                Account Sign Up
                                            </h2>
                                        </div>
                                        <div class="account-text">
                                            <p class="text-white m-0 text-center">
                                                Enchance your GIF Viewing Experience
                                            </p>
                                        </div>
                                    </div>
                                    <div class="login__area mt-4">
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label text-white text-small">Email</label>
                                            <input type="text" class="form-control text-white" placeholder="Enter your email" name="email" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label text-white text-small">User
                                                Name</label>
                                            <input type="text" class="form-control text-white" placeholder="Enter your desired user name" name="username" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label text-white text-small">Password</label>
                                            <input type="password" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Password" name="password" required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="exampleInputEmail1" class="form-label text-white text-small">Confirm Password</label>
                                            <input type="password" class="form-control text-white" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter Your Password" name="confirm_password" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="submit-btn border-top mt-5 pt-4 text-center">
                                    <button href="javascript:void(0)" class="btn btn-outline-dark" type="submit">
                                        <p class="m-0 text-white text-center">
                                            Sign Up
                                        </p>
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</section>
@endsection
