
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="_token" content="kNPg99JjWhVzcIbWKX2eKfPJhmk8KtT8fSmH56Vb">
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title> | Login </title>
    <link rel="icon" href="{{ url('assets-login/img/indohijab.png') }}" type="image/x-icon" />
    <link rel="stylesheet" type="text/css" href="{{ url('assets-login/css/login.css') }}" />
    <script src="https://kit.fontawesome.com/64d58efce2.js" crossorigin="anonymous"></script>

    <script src="{{ url('assets-login/js/plugin/webfont/webfont.min.js') }}"></script>
    <script>
        WebFont.load({
				google: {"families":["Lato:300,400,700,900"]},
				custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['css/fonts.min.css']},
				active: function() {
					sessionStorage.fonts = true;
				}
			});
    </script>

    <link rel="stylesheet" href="{{ url('assets-login/css/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets-login/css/atlantis.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets-login/vendors/ladda/ladda-themeless.min.css') }}">
    <link rel="stylesheet" href="{{ url('assets-login/vendors/jquery-confirm/jquery-confirm.css') }}">
    <link rel="stylesheet" href="{{ url('assets-login/css/custom/select2-atlantis.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('assets-login/css/custom/login-added.css') }}" />

</head>

<body>
    <div class="container">
        <div class="forms-container">
            <div class="signin-signup">

                <form class="sign-in-form" id="formLogin" action="{{ url('login') }}" method="post">
                    @csrf
                    <h2 class="title">Sign In</h2>
                    <div class="input-field">
                        <i class="fas fa-user"></i>
                        <input id="email" placeholder="email" type="email" name="email" value="{{ old('email') }}" required autofocus>
                    </div>
                    <div class="input-field">
                        <i class="fas fa-lock"></i>
                        <input id="password" placeholder="password" type="password" name="password" required>
                    </div>
                    <button type="submit" class="btn btn-primary btn-round">
                        Login
                    </button>

                    @if ($errors->any())
                    <div>
                        <ul>
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                    <p class="social-text"> Copyright &copy; {{ date('Y') }} | Muhammad Rizky</p>
                         <p>@kyfr34k</p>
                </form>

            </div>
        </div>



        <div class="panels-container">
            <div class="panel left-panel">
                <img src="{{ url('assets-login/img/erp/idb.png') }}" class="image" alt="">
            </div>
            <div class="panel right-panel">
                <img src="{{ url('assets-login/img/erp/idb.png') }}" class="image" alt="">
            </div>
        </div>
    </div>

    <script src="{{ url('assets-login/js/core/jquery.3.2.1.min.js') }}"></script>
    <script src="{{ url('assets-login/js/core/popper.min.js') }}"></script>
    <script src="{{ url('assets-login/js/core/bootstrap.min.js') }}"></script>


    <!-- Bootstrap Notify -->
    <script src="{{ url('assets-login/js/plugin/bootstrap-notify/bootstrap-notify.min.js') }}"></script>

    <!-- Atlantis JS -->
    <script src="{{ url('assets-login/js/atlantis.min.js') }}"></script>

    <script src="{{ url('assets-login/vendors/ladda/spin.min.js') }}"></script>
    <script src="{{ url('assets-login/vendors/ladda/ladda.min.js') }}"></script>
    <script src="{{ url('assets-login/vendors/ladda/ladda.jquery.min.js') }}"></script>
    <script src="{{ url('assets-login/js/myJs.js') }}"></script>

</body>

</html>