<!DOCTYPE html>
<html lang="en">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <!-- Meta, title, CSS, favicons, etc. -->
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ Config('const.sytem_title_register') }}</title>

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
    </head>

    <body class="login">
        <div>
        {{-- <a class="hiddenanchor" id="signup"></a>
        <a class="hiddenanchor" id="signin"></a> --}}

        <div class="login_wrapper">
       

            <div id="register">
                <section class="login_content">
                    <form method = "POST" action = "{{ url('/admin/admin-register-submit') }}">
                        <h1>Create Admin Account</h1>
                        @csrf
                        <!-- name -->
                        <div>
                            <input type="text" class="form-control" placeholder="Name" required="" name = "name" />
                        </div>

                        <!-- email -->
                        <div>
                            <input type="text" class="form-control" placeholder="Username" required="" name = "email" />
                        </div>

                        <!-- password -->
                        <div>
                            <input type="password" class="form-control" placeholder="Password" required="" name = "password" />
                        </div>
                        <div>
                            <button type = "submit" class = "btn btn-primary btn-block"><i class = "fa fa-list-alt"></i>&nbsp; Submit</button>
                        </div>

                        <div class="clearfix"></div>

                        <div class="separator">
                            <div class="clearfix"></div>
                            <br />

                            <div>
                            <h1><i class="fa fa-book"></i> {{ config('const.system_title') }}</h1>
                            <p>©2016 All Rights Reserved. Gentelella Alela! is a Bootstrap 4 template. Privacy and Terms</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
        </div>
    </body>
</html>
