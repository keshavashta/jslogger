<!DOCTYPE html>
<html lang="en" ng-app="app">
<head>
    <meta charset="utf-8">
    <title>JS Logger </title>

    <!-- Le styles -->

    <% HTML::style('bootstrap/css/bootstrap.min.css') %>
    <% HTML::style('bootstrap/css/bootstrap-responsive.min.css') %>
    <% HTML::style('bootstrap/css/datepicker.css') %>
    <!--    <link href='http://fonts.googleapis.com/css?family=Open+Sans:400,700' rel='stylesheet' type='text/css'>-->
    <% HTML::style('css/app.css') %>

    <% HTML::script('js/jquery-1.9.1.min.js') %>
    <% HTML::script('js/angular.min.js') %>
    <% HTML::script('js/controller.js') %>
    <% HTML::script('bootstrap/js/bootstrap.min.js') %>

    <% HTML::script('bootstrap/js/bootstrap-datepicker.js') %>

    <!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <% HTML::script('bootstrap/js/html5shiv.js') %>
    <![endif]-->


</head>

<body>
<div id="wrap">

    <!-- NAVBAR
================================================== -->
    <div class="navbar-wrapper">
        <!-- Wrap the .navbar in .container to center it within the absolutely positioned parent. -->
        <div class="container">

            <div class="navbar navbar-inverse">
                <div class="navbar-inner">
                    <!-- Responsive Navbar Part 1: Button for triggering responsive navbar (not covered in tutorial). Include responsive CSS to utilize. -->
                    <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="brand" href="#">JS Logger</a>
                    <!-- Responsive Navbar Part 2: Place all navbar contents you want collapsed withing .navbar-collapse.collapse. -->
                    <div class="nav-collapse collapse">
                        <ul class="nav">
                            <li class="active"><a href="#">Home</a></li>


                        </ul>
                    </div>
                    <!--/.nav-collapse -->
                </div>
                <!-- /.navbar-inner -->
            </div>
            <!-- /.navbar -->
        </div>
        <!-- /.container -->

        <div class="container" ng-view>

            @yield('content')
        </div>


    </div>


    <div id="push"></div>
</div>

<div id="footer">
    <div class="container">
        <p>Footer</p>
    </div>
</div>


</body>
</html>
