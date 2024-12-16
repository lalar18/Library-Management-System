<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ Config('const.sytem_title_login') }}</title>

        <link rel="icon" type="image/png" sizes="32x32" href="{{url('images/logo.png')}}">

        <!-- Bootstrap -->
        <link href="{{ url('vendors/bootstrap/dist/css/bootstrap.min.css') }}" rel="stylesheet">
        <!-- Font Awesome -->
        <link href="{{ url('vendors/font-awesome/css/font-awesome.min.css') }}" rel="stylesheet">
        <!-- NProgress -->
        <link href="{{ url('vendors/nprogress/nprogress.css') }}" rel="stylesheet">
        <!-- Animate.css -->
        <link href="{{ url('vendors/animate.css/animate.min.css') }}" rel="stylesheet">

        <!-- Custom Theme Style -->
        <link href="{{ url('build/css/custom.min.css') }}" rel="stylesheet">

        <!-- sweetalert2 -->
        <link href = "{{url('vendors/sweetalert2/sweetalert2.min.css')}}">
        <script src = "{{url('vendors/sweetalert2/sweetalert2.all.min.js')}}"></script>
    </head>

    <style>
        body::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background-image: url('{{ url("images/login-background.jpg") }}');
            background-size: cover;
            background-position: center;
            filter: blur(5px); /* Apply blur effect to the background image only */
            z-index: -1; /* Ensure the background is behind the content */
        }

    </style>

    <body class="login">
        <div>
        {{-- <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a> --}}

        <div class="login_wrapper">
            <div class="animate form login_form">

                <div class = "logo-container d-flex justify-content-center">
                    <a href = "{{url()->current()}}">
                        <img src = "{{url('images/logo.png')}}" 
                            height = "150"
                            width = "150"
                            loading = "lazy" 
                            alt = "logo"
                        >
                    </a>
                </div>

                <section class="login_content">
                    <form method = "POST" action = "{{ url('admin/submit-login') }}">
                        <h1>Login Form</h1>

                        <!-- error message -->
                        @if(Session::has('login_error'))
                            <?php $prevData = session('login_error'); ?>
                            
                            <div class="alert alert-danger alert-dismissible " role="alert">
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span>
                                </button>
                                {{ $prevData['message'] }}
                              </div>
                        @endif

                        @csrf
                        <div>
                            <input 
                                type="username" 
                                class="form-control" 
                                placeholder="Username" 
                                name = "username" 
                                required="" 
                                value = "{{ isset($prevData['data']['username']) ? $prevData['data']['username'] : ''}}"
                            />
                        </div>
                        <br>
                        <div>
                            <input 
                                type="password" 
                                class="form-control" 
                                placeholder="Password" 
                                name = "password" 
                                required="" 
                                value = "{{ isset($prevData['data']['password']) ? $prevData['data']['password'] : '' }}" 
                            />
                        </div>
                        <div>
                            <button type = "submit" class = "btn btn-primary btn-block"><i class = "fa fa-sign-in"></i>&nbsp;Login</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            {{-- <p class="change_link">New to site?
                            <a href="#signup" class="to_register"> 
                            </p> --}}

                            {{-- <div class="clearfix"></div>
                            <br />

                            <div>
                            <h1><i class="fa fa-book"></i> &nbsp; {{ config('const.system_title') }}</h1>
                            <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 4 template. Privacy and Terms</p>
                            </div> --}}
                        </div>
                    </form>
                </section>
            </div>

            {{-- <div id="register" class="animate form registration_form">
                <section class="login_content">
                    <form>
                    <h1>Create Account</h1>
                    <div>
                        <input type="text" class="form-control" placeholder="Username" required="" />
                    </div>
                    <div>
                        <input type="username" class="form-control" placeholder="username" required="" />
                    </div>
                    <div>
                        <input type="password" class="form-control" placeholder="Password" required="" />
                    </div>
                    <div>
                        <a class="btn btn-default submit" href="index.html">Submit</a>
                    </div>

                    <div class="clearfix"></div>

                    <div class="separator">
                        <p class="change_link">Already a member ?
                        <a href="#signin" class="to_register"> Log in </a>
                        </p>

                        <div class="clearfix"></div>
                        <br />

                        <div>
                        <h1><i class="fa fa-paw"></i> Gentelella Alela!</h1>
                        <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 4 template. Privacy and Terms</p>
                        </div>
                    </div>
                    </form>
                </section>
            </div> --}}
        </div>
        </div>
    </body>
</html>
