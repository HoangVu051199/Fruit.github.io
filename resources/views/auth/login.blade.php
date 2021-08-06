<!DOCTYPE html>
<html lang="en">
<head>
    <title>Đăng nhập</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <base href="{{ asset('') }}">
<!--===============================================================================================-->  
    <link rel="shortcut icon" type="image/x-icon" href="frontend/assets/img/favicon.ico">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="frontend/assets/vendor/bootstrap/css/bootstrap.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="frontend/assets/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="frontend/assets/vendor/animate/animate.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="frontend/assets/vendor/css-hamburgers/hamburgers.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="frontend/assets/vendor/animsition/css/animsition.min.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="frontend/assets/vendor/select2/select2.min.css">
<!--===============================================================================================-->  
    <link rel="stylesheet" type="text/css" href="frontend/assets/vendor/daterangepicker/daterangepicker.css">
<!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="frontend/assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="frontend/assets/css/main.css">
<!--===============================================================================================-->
</head>
<body>
    
    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form method="POST" action="{{ route('login') }}" class="login100-form validate-form p-l-55 p-r-55 p-t-178">
                    @csrf
                    <span class="login100-form-title">
                        Đăng Nhập
                    </span>

                    <div class="wrap-input100 validate-input m-b-16" data-validate="Please enter username">
                        <input id="email" type="email" class="input100 @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Email" required autocomplete="email" autofocus>
                        <span class="focus-input100"></span>
                    </div>
                    <div class="mb-2">
                        @if($errors->first('email'))
                        <small id="emailHelp" class="form-text text-danger">{{ $errors->first('email') }}</small>
                        @endif
                    </div>
                    <div class="wrap-input100 validate-input" data-validate = "Please enter password">
                        <input id="password" type="password" class="input100 @error('password') is-invalid @enderror" name="password" placeholder="Mật khẩu" required autocomplete="current-password">
                        <span class="focus-input100"></span>
                    </div>
                    <div class="mb-2">
                        @if($errors->first('password'))
                        <small id="emailHelp" class="form-text text-danger">{{ $errors->first('password') }}</small>
                        @endif
                    </div>

                    <div class="text-right p-t-13 p-b-23">
                           
                        
                        
                        @if (Route::has('password.request'))
                            <a class="btn btn-link" href="{{ route('password.request') }}">
                                {{ __('Quên mật khẩu?') }}
                            </a>
                        @endif
                        
                    </div>

                    <div class="container-login100-form-btn">
                        <button class="login100-form-btn">
                            Đăng Nhập
                        </button>
                    </div>

                    <div class="flex-col-c p-t-60 p-b-40">
                        <span class="txt1 p-b-9">
                            Bạn chưa có tài khoản?
                        </span>

                        <a href="{{ route('register') }}" class="txt3">
                            Đăng ký
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    
    
<!--===============================================================================================-->
    <script src="frontend/assets/vendor/jquery/jquery-3.2.1.min.js"></script>
<!--===============================================================================================-->
    <script src="frontend/assets/vendor/animsition/js/animsition.min.js"></script>
<!--===============================================================================================-->
    <script src="frontend/assets/vendor/bootstrap/js/popper.js"></script>
    <script src="frontend/assets/vendor/bootstrap/js/bootstrap.min.js"></script>
<!--===============================================================================================-->
    <script src="frontend/assets/vendor/select2/select2.min.js"></script>
<!--===============================================================================================-->
    <script src="frontend/assets/vendor/daterangepicker/moment.min.js"></script>
    <script src="frontend/assets/vendor/daterangepicker/daterangepicker.js"></script>
<!--===============================================================================================-->
    <script src="frontend/assets/vendor/countdowntime/countdowntime.js"></script>
<!--===============================================================================================-->
    <script src="frontend/assets/js/js/main.js"></script>

</body>
</html>
