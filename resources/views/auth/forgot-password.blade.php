<!DOCTYPE html>
<html lang="en">

<head>
    <title>Reset </title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="{{ asset('login_asset/images/icons/favicon.ico') }}" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login_asset/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('login_asset/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login_asset/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login_asset/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login_asset/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('login_asset/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('login_asset/css/main.css') }}">
    <!--===============================================================================================-->
</head>

<body>

    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <div class="login100-pic js-tilt" data-tilt>
                    <img src="{{ asset('login_asset/images/img-01.png') }}" alt="IMG">
                </div>

                <form method="POST" action="{{ route('password.email') }}">
                    @csrf
                    <p class="login200-form-title">
                        Reset Password
                    </p>
                    <span><strong><i>Forgot your password?</i></strong><br><br>
                        No problem. Just let us know your email address <br>
                        and we  will email you a password reset link  <br>
                        that will allow you to choose a new one.</span>
                        <br><br>
                    <div class="wrap-input100 validate-input">
                        <input class="input100" type="email" name="email" placeholder="Email">
                        <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="fa fa-envelope" aria-hidden="true"></i>
                        </span>
                    </div>



                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            {{ __('Email Password Reset Link') }}
                        </button>
                    </div>

                    <div class="text-center p-t-12">
                        @if (session('status'))
                            <div class="mb-4 font-medium text-sm text-green-600">
                                {{ session('status') }}
                            </div>
                        @endif
                        {{-- <span class="txt1">
							Forgot
						</span>
						<a class="txt2" href="{{ route('password.request') }}">
							Password?
						</a> --}}
                    </div>

                    <div class="text-center p-t-136">
                        {{-- <a class="txt2" href="{{ route('register') }}">
							Register
							<i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
						</a> --}}
                    </div>
                </form>
            </div>
        </div>
    </div>




    <!--===============================================================================================-->
    <script src="{{ asset('login_asset/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('login_asset/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('login_asset/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('login_asset/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('login_asset/vendor/tilt/tilt.jquery.min.js') }}"></script>
    <script>
        $('.js-tilt').tilt({
            scale: 1.1
        });
    </script>
    <!--===============================================================================================-->
    <script src="{{ asset('login_asset/js/main.js') }}"></script>

</body>

</html>
