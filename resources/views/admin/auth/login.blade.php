<!DOCTYPE html>
<html lang="{{ $current_locale }}" dir="{{ $dir }}">


<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <!-- Meta, title, CSS, favicons, etc. -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ $image_logo->company_name ?? 'Law Pro' }} | Login </title>
    @if ($image_logo->favicon_img != '')
        <link rel="shortcut icon"
            href="{{ URL::asset(config('constants.FAVICON_FOLDER_PATH') . '/' . $image_logo->favicon_img) }}">
    @endif
    <!-- Bootstrap -->
    <link href="{{ URL::asset('assets/admin/vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
    <!-- Font Awesome -->
    <link href="{{ URL::asset('assets/admin/vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
    <!-- NProgress -->
    <link href="{{ URL::asset('assets/admin/vendors/nprogress/nprogress.css') }}" rel="stylesheet">
    <!-- Animate.css -->
    <link href="{{ URL::asset('assets/admin/vendors/animate.css/animate.min.css') }}" rel="stylesheet">

    <!-- Custom Theme Style -->
    <link href="{{ URL::asset('assets/admin/build/css/custom.min.css') }}" rel="stylesheet">
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
    <style type="text/css">
        /* Modern login shell using existing palette (blue #2c3e50, gold accent #daa520, neutrals) */
        body.login {
            background: #f5f7fa;
            display: flex;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            padding: 30px;
        }

        .login_wrapper {
            width: 100%;
            max-width: 520px;
        }

        .login-card {
            background: #fff;
            border-radius: 14px;
            box-shadow: 0 18px 38px rgba(44, 62, 80, 0.18);
            padding: 32px 34px 30px;
            position: relative;
            overflow: hidden;
        }

        .login-card:before {
            content: "";
            position: absolute;
            inset: 0;
            background: linear-gradient(135deg, rgba(44, 62, 80, 0.08), rgba(218, 165, 32, 0.08));
            z-index: 0;
        }

        .login-card > * { position: relative; z-index: 1; }

        .brand-mark {
            display: flex;
            align-items: center;
            justify-content: center;
            gap: 10px;
            margin-bottom: 12px;
        }

        .brand-mark .icon {
            width: 64px;
            height: 64px;
            border-radius: 14px;
            display: grid;
            place-items: center;
            background: #2c3e50;
            color: #daa520;
            box-shadow: 0 8px 20px rgba(44, 62, 80, 0.25);
            font-size: 34px;
        }

        .brand-title {
            text-align: center;
            color: #2c3e50;
            font-weight: 700;
            font-size: 26px;
            margin: 6px 0 2px;
        }

        .brand-subtitle {
            text-align: center;
            color: #74808e;
            font-weight: 500;
            margin-bottom: 18px;
        }

        .language-switcher {
            display: flex;
            justify-content: flex-end;
            margin-bottom: 6px;
        }

        .language-switcher a {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            padding: 6px 12px;
            border-radius: 999px;
            background: rgba(44, 62, 80, 0.08);
            color: #2c3e50;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.2s ease;
        }

        .language-switcher a:hover {
            background: rgba(44, 62, 80, 0.14);
            text-decoration: none;
        }

        .login_content_btn a:hover {
            text-decoration: none;
        }

        .form-control {
            height: 48px;
            border-radius: 10px;
            border: 1px solid #d7dde4;
            box-shadow: none;
            padding: 12px 14px;
            font-size: 14px;
        }

        .form-control:focus {
            border-color: #2c3e50;
            box-shadow: 0 0 0 3px rgba(44, 62, 80, 0.15);
        }

        .input-group-addon {
            border-radius: 0 10px 10px 0;
            background: #f1f3f6;
            border: 1px solid #d7dde4;
            border-left: 0;
            color: #2c3e50;
        }

        .btn-login {
            width: 100%;
            background: linear-gradient(135deg, #2c3e50, #243241);
            color: #fff;
            border: none;
            border-radius: 10px;
            padding: 12px 16px;
            font-weight: 700;
            letter-spacing: 0.3px;
            box-shadow: 0 10px 22px rgba(44, 62, 80, 0.35);
            transition: all 0.25s ease;
        }

        .btn-login:hover {
            background: #243241;
            transform: translateY(-1px);
            box-shadow: 0 12px 26px rgba(44, 62, 80, 0.38);
        }

        .forgot-link {
            display: inline-block;
            margin-top: 12px;
            color: #2c3e50;
            font-weight: 600;
        }

        .forgot-link:hover { text-decoration: none; }

        .footer-copy {
            text-align: center;
            margin-top: 18px;
            color: #7b8794;
            font-weight: 600;
        }

        .help-block strong { color: #c0392b; }
    </style>
</head>

<body class="login">
    <div>
        <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a>

        <div class="login_wrapper">
            <div class="login-card">
                <div class="language-switcher">
                    @if ($current_locale == 'es')
                        <a href="{{ route('language.switch', 'en') }}"><i class="fa fa-globe"></i> English</a>
                    @else
                        <a href="{{ route('language.switch', 'es') }}"><i class="fa fa-globe"></i> Español</a>
                    @endif
                </div>

                <div class="brand-mark">
                    <div class="icon">
                        <i class="fa fa-balance-scale" aria-hidden="true"></i>
                    </div>
                </div>
                <div class="brand-title">{{ $image_logo->company_name ?? 'LAW PRO' }}</div>
                <div class="brand-subtitle">{{ __('frontend.login.login_your_account') }}</div>

                <form class="form-horizontal" role="form" method="POST" action="{{ url('/admin/login') }}">
                    {{ csrf_field() }}

                    <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                        <input id="email" type="email" class="form-control" name="email"
                            value="{{ old('email') }}" autofocus placeholder="{{ __('frontend.login.email') }}">

                        @if ($errors->has('email'))
                            <span class="help-block text-left">
                                <strong>{{ $errors->first('email') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <div class="input-group">
                            <input id="password" type="password" class="form-control" name="password"
                                autocomplete="off" placeholder="{{ __('frontend.login.password') }}">

                            <span class="input-group-addon" style="cursor: pointer;">
                                <i class="fa fa-eye" aria-hidden="true" id="togglePassword"></i>
                            </span>
                        </div>
                        @if ($errors->has('password'))
                            <span class="help-block text-left" style="display: block;">
                                <strong>{{ $errors->first('password') }}</strong>
                            </span>
                        @endif
                    </div>

                    <div>
                        <button type="submit" class="btn btn-login">
                            {{ __('frontend.login.login_button') }}
                        </button>
                        <a class="forgot-link" href="{{ url('/admin/password/reset') }}">{{ __('frontend.login.forgot_password') }}</a>
                    </div>

                    <div class="footer-copy">{{ __('frontend.login.project_name') }}</div>
                </form>
            </div>
        </div>
    </div>
    <!-- jQuery -->
    <script src="{{ asset('assets/admin/vendors/jquery/dist/jquery.min.js') }}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            "use strict";

            $(".fill-login").click(function() {
                $("#email").val($(this).data("email"));
                $("#password").val($(this).data("password"));
            });

            $("#togglePassword").click(function() {
                var passwordInput = $("#password");
                var icon = $(this);

                if (passwordInput.attr("type") === "password") {
                    passwordInput.attr("type", "text");
                    icon.removeClass("fa-eye").addClass("fa-eye-slash");
                } else {
                    icon.removeClass("fa-eye-slash").addClass("fa-eye");
                }
            });


        });
    </script>
</body>

</html>
