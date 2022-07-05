<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="asset/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css"
        integrity="sha512-KfkfwYDsLkIlwQp6LFnl8zNdLGxu9YAA1QvwINks4PhcElQSvqcyVLLD9aMhXd13uQjoXtEKNosOWaZqXgel0g=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>

<body>
    <!-- Section: Design Block -->
    <section class=" text-lg-start">
        <style>
            .cascading-right {
                margin-right: -50px;
            }

            @media (max-width: 991.98px) {
                .cascading-right {
                    margin-right: 0;
                }
            }

            .icon-login {
                display: flex;
                align-items: center
            }

            .icon-login p {
                margin: 0;
            }

            .img-left img {
                border-radius: 5px
            }

            .error {
                color: red
            }
        </style>

        <!-- Jumbotron -->
        <div class="container py-4">
            <div class="row g-0 align-items-center">
                <div class="col-lg-6 mb-5 mb-lg-0">
                    <div class="card cascading-right"
                        style="
            background: hsla(0, 0%, 100%, 0.55);
            backdrop-filter: blur(30px);
            ">
                        <div class="card-body p-5 shadow-5 ">
                            <a href="{{ route('login') }}">
                                <- Back To Login</a>
                                    <h2 class="fw-bold mb-5">Sign up now</h2>
                                    <form method="POST" action="{{ route('register') }}">
                                        @method('POST')
                                        @csrf
                                        <!-- 2 column grid layout with text inputs for the first and last names -->
                                        <div class="row">
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form3Example1">Username</label>
                                                    <input type="text" id="form3Example1" class="form-control"
                                                        name="username" placeholder="Enter Username"
                                                        value="{{ old('username') }}" />
                                                    @error('username')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6 mb-4">
                                                <div class="form-outline">
                                                    <label class="form-label" for="form3Example2">Address</label>
                                                    <input type="text" id="form3Example2" class="form-control"
                                                        placeholder="Enter Address" name="address"
                                                        value="{{ old('address') }}" />
                                                    @error('address')
                                                        <div class="error">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>

                                        <!-- Email input -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form3Example3">Email</label>
                                            <input type="email" id="form3Example3" class="form-control"
                                                placeholder="Enter Email" name="email" value="{{ old('email') }}" />
                                            @error('email')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>

                                        <!-- Password input -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form3Example4">Password</label>
                                            <input type="password" id="form3Example4" class="form-control"
                                                placeholder="Enter Password" name="password"
                                                value="{{ old('password') }}" />
                                            @error('password')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- Password Comfirm -->
                                        <div class="form-outline mb-4">
                                            <label class="form-label" for="form3Example4">Password Comfirm</label>
                                            <input type="password" id="form3Example4" class="form-control"
                                                placeholder="Enter Password Comfirm" name="repassword"
                                                value="{{ old('repassword') }}" />
                                            @error('repassword')
                                                <div class="error">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <!-- Checkbox -->
                                        <div class="form-check d-flex  mb-4"> <label class="form-check-label"
                                                for="form2Example33">
                                                Subscribe to our newsletter
                                            </label>
                                            <input class="form-check-input me-2" type="checkbox" value=""
                                                id="form2Example33" />
                                        </div>

                                        <!-- Submit button -->
                                        <button type="submit" class="btn btn-primary btn-block mb-4">
                                            Sign up
                                        </button>

                                        <!-- Register buttons -->
                                        <div class="icon-login">
                                            <p>or sign up with:</p>
                                            <button type="button" class="btn btn-link btn-floating mx-1">
                                                <i class="fab fa-facebook-f"></i>
                                            </button>

                                            <button type="button" class="btn btn-link btn-floating mx-1">
                                                <i class="fab fa-google"></i>
                                            </button>

                                            <button type="button" class="btn btn-link btn-floating mx-1">
                                                <i class="fab fa-twitter"></i>
                                            </button>

                                            <button type="button" class="btn btn-link btn-floating mx-1">
                                                <i class="fab fa-github"></i>
                                            </button>
                                        </div>
                                    </form>
                        </div>
                    </div>
                </div>

                <div class="col-lg-6 mb-5 mb-lg-0 img-left">
                    <img src="https://mdbootstrap.com/img/new/ecommerce/vertical/004.jpg"
                        class="w-100 rounded-4 shadow-4" alt="" />
                </div>
            </div>
        </div>
        <!-- Jumbotron -->
    </section>
    <!-- Section: Design Block -->

</body>

</html>
