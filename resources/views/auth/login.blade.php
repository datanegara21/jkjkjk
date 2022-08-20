<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 9 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!--begin::Head-->

<head>
    <meta charset="utf-8" />
    <title>{{ config('app.name', 'Login') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="csrf-token" content="{{ csrf_token() }}" />

    <!--begin::Fonts-->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Poppins:300,400,500,600,700" />
    <!--end::Fonts-->

    <!--begin::Page Custom Styles(used by this page)-->
    <link href="{{ asset('assets/css/pages/login/classic/login-3.css?v=7.0.6') }}" rel="stylesheet" type="text/css" />
    <!--end::Page Custom Styles-->

    <!--begin::Global Theme Styles(used by all pages)-->
    <link href="{{ asset('assets/plugins/global/plugins.bundle.css?v=7.0.6') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.css?v=7.0.6') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/css/style.bundle.css?v=7.0.6') }}" rel="stylesheet" type="text/css" />
    <!--end::Global Theme Styles-->

    <!--begin::Layout Themes(used by all pages)-->
    <!--end::Layout Themes-->

    <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
</head>
<!--end::Head-->

<!--begin::Body-->

<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled page-loading">
    <!--begin::Main-->
    <div class="d-flex flex-column flex-root">
        <!--begin::Login-->
        <div class="login login-3 login-signin-on d-flex flex-row-fluid" id="kt_login">
            <div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid"
                style="background-image: url({{ asset('assets/media/bg/bg-1.jpg') }})">
                <div class="login-form text-center text-white p-7 position-relative overflow-hidden">
                    <!--begin::Login Header-->
                    <div class="d-flex flex-center mb-15">
                        <a href="{{ url('/') }}" >
                            <img src="{{ asset('assets/media/logos/logo-letter-9.png') }}" class="max-h-100px" alt="" />
                        </a>
                    </div>
                    <!--end::Login Header-->

                    <!--begin::Login Sign in form-->
                    <div class="login-signin">
                        <div class="mb-20">
                            <h3>Masuk ke GetEvent</h3>
                            <p class="opacity-60 font-weight-bold">
                                Masukkan detail dari akunmu!
                            </p>
                        </div>
                        <form method="POST" action="{{ route('login') }}" class="form">
                            @csrf
                            <div class="form-group">
                                <input
                                    class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5"
                                    type="text" placeholder="Email" name="email" value="{{ old('email') }}" autocomplete="on" required autofocus/>
                            </div>
                            <div class="form-group">
                                <input
                                    class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8 mb-5"
                                    type="password" placeholder="Kata Sandi" name="password" required/>
                            </div>
                            <div class="form-group d-flex flex-wrap justify-content-between align-items-center px-8">
                                <div class="checkbox-inline">
                                    <label class="checkbox checkbox-outline checkbox-white text-white m-0">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }} />
                                        <span></span>
                                        {{ __('Ingat Saya') }}
                                    </label>
                                </div>
                                <a href="javascript:;" id="kt_login_forgot" class="text-white font-weight-bold">Lupa Password?</a>
                            </div>
                            <div class="form-group text-center mt-10">
                                <button type="submit"
                                    class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3">
                                    Masuk
                                </button>
                            </div>
                        </form>
                        <div class="mt-10">
                            <span class="opacity-70 mr-4">
                                Masih belum punya akun?
                            </span>
                            <a href="{{ url('register') }}" id="kt_login_signup" class="text-white font-weight-bold">Daftar</a>
                        </div>
                    </div>
                    <!--end::Login Sign in form-->

                    <!--begin::Login Sign up form-->
                    <div class="login-signup">
                        <div class="mb-20">
                            <h3>Sign Up</h3>
                            <p class="opacity-60">
                                Enter your details to create your account
                            </p>
                        </div>
                        <form method="POST" action="{{ route('login') }}" class="form text-center" id="kt_login_signup_form">
                            @csrf
                            <div class="form-group">
                                <input
                                    class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8"
                                    type="text" placeholder="Your Name" name="name" />
                            </div>
                            <div class="form-group">
                                <input
                                    class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8"
                                    type="text" placeholder="Email" name="email" autocomplete="off" />
                            </div>
                            <div class="form-group">
                                <input
                                    class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8"
                                    type="password" placeholder="Password" name="password" />
                            </div>
                            <div class="form-group">
                                <input
                                    class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8"
                                    type="password" placeholder="Confirm Password" name="confirm_password" />
                            </div>
                            <div class="form-group">
                                <button type="submit" id="kt_login_signup_submit"
                                    class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3 m-2">
                                    Sign Up
                                </button>
                                <button id="kt_login_signup_cancel"
                                    class="btn btn-pill btn-outline-white font-weight-bold opacity-70 px-15 py-3 m-2">
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                    <!--end::Login Sign up form-->

                    <!--begin::Login forgot password form-->
                    <div class="login-forgot">
                        <div class="mb-20">
                            <h3>Forgotten Password ?</h3>
                            <p class="opacity-60">
                                Enter your email to reset your password
                            </p>
                        </div>
                        <form method="POST" action="{{ route('password.update') }}" class="form" id="kt_login_forgot_form">
                            @csrf
                            <div class="form-group mb-10">
                                <input
                                    class="form-control h-auto text-white placeholder-white opacity-70 bg-dark-o-70 rounded-pill border-0 py-4 px-8"
                                    type="text" placeholder="Email" name="email" autocomplete="off" />
                            </div>
                            <div class="form-group">
                                <button type="submit" id="kt_login_forgot_submit"
                                    class="btn btn-pill btn-outline-white font-weight-bold opacity-90 px-15 py-3 m-2">
                                    Request
                                </button>
                                <button id="kt_login_forgot_cancel"
                                    class="btn btn-pill btn-outline-white font-weight-bold opacity-70 px-15 py-3 m-2">
                                    Cancel
                                </button>
                            </div>
                        </form>
                    </div>
                    <!--end::Login forgot password form-->
                </div>
            </div>
        </div>
        <!--end::Login-->
    </div>
    <!--end::Main-->

    <script>
        var HOST_URL = {{ url('/') }};
    </script>
    <!--begin::Global Config(global config for global JS scripts)-->
    <script>
        var KTAppSettings = {
            breakpoints: {
                sm: 576,
                md: 768,
                lg: 992,
                xl: 1200,
                xxl: 1200,
            },
            colors: {
                theme: {
                    base: {
                        white: "#ffffff",
                        primary: "#8950FC",
                        secondary: "#E5EAEE",
                        success: "#1BC5BD",
                        info: "#8950FC",
                        warning: "#FFA800",
                        danger: "#F64E60",
                        light: "#F3F6F9",
                        dark: "#212121",
                    },
                    light: {
                        white: "#ffffff",
                        primary: "#E1E9FF",
                        secondary: "#ECF0F3",
                        success: "#C9F7F5",
                        info: "#EEE5FF",
                        warning: "#FFF4DE",
                        danger: "#FFE2E5",
                        light: "#F3F6F9",
                        dark: "#D6D6E0",
                    },
                    inverse: {
                        white: "#ffffff",
                        primary: "#ffffff",
                        secondary: "#212121",
                        success: "#ffffff",
                        info: "#ffffff",
                        warning: "#ffffff",
                        danger: "#ffffff",
                        light: "#464E5F",
                        dark: "#ffffff",
                    },
                },
                gray: {
                    "gray-100": "#F3F6F9",
                    "gray-200": "#ECF0F3",
                    "gray-300": "#E5EAEE",
                    "gray-400": "#D6D6E0",
                    "gray-500": "#B5B5C3",
                    "gray-600": "#80808F",
                    "gray-700": "#464E5F",
                    "gray-800": "#1B283F",
                    "gray-900": "#212121",
                },
            },
            "font-family": "Poppins",
        };
    </script>
    <!--end::Global Config-->

    <!--begin::Global Theme Bundle(used by all pages)-->
    <script src="{{ asset('assets/plugins/global/plugins.bundle.js?v=7.0.6') }}"></script>
    <script src="{{ asset('assets/plugins/custom/prismjs/prismjs.bundle.js?v=7.0.6') }}"></script>
    <script src="{{ asset('assets/js/scripts.bundle.js?v=7.0.6') }}"></script>
    <!--end::Global Theme Bundle-->

    <!--begin::Page Scripts(used by this page)-->
    <script src="{{ asset('assets/js/pages/custom/login/login-general.js?v=7.0.6') }}"></script>
    @include('sweetalert::alert')
    <!--end::Page Scripts-->
</body>
<!--end::Body-->

</html>