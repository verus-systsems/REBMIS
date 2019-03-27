<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>REB - Formative Assessment MIS</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <link href="{!! asset('template/css/bootstrap.min.css') !!}" rel="stylesheet">
    <link href="{!! asset('template/css/bootstrap-responsive.min.css') !!}" rel="stylesheet">
    <link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
          rel="stylesheet">
    <link href="{!! asset('template/css/font-awesome.css') !!}" rel="stylesheet">
    <link href="{!! asset('template/css/style.css') !!}" rel="stylesheet">
    <link href="{!! asset('template/css/pages/dashboard.css') !!}" rel="stylesheet">
    <link href="{!! asset('template/css/pages/plans.css') !!}" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
    <!--[if lt IE 9]>
    <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <link href="{!! asset('template/css/pages/plans.css') !!}" rel="stylesheet">

    <!-- Bootstrap Select Stylesheet -->
    <link href="{!! asset('template/dist/css/bootstrap-select.min.css') !!}" rel="stylesheet">

    <!-- Bootstrap 4 JavaScript -->
    <script src="{!! asset('template/js/jquery-3.3.1.slim.min.js') !!}"></script>


    <link href="{!! asset('template/date/css/jquery.datepick.css') !!}" rel="stylesheet">
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="{!! asset('template/date/js/jquery.plugin.min.js') !!}"></script>
    <script src="{!! asset('template/date/js/jquery.datepick.js') !!}"></script>

    <script src="{!! asset('template/code/highcharts.js') !!}"></script>
    <script src="{!! asset('template/code/modules/exporting.js') !!}"></script>
    <script src="{!! asset('template/code/modules/export-data.js') !!}"></script>

    <!-- Bootstrap Select Main JavaScript -->
    <script src="{!! asset('template/dist/js/bootstrap-select.min.js') !!}"></script>
</head>
<body>
@include('template.navigation')
<div class="main">
    <div class="main-inner">
        <div class="container">

            @yield('content')

            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /main-inner -->
</div>
<!-- /main -->
<div class="extra">
    <div class="extra-inner">
        <div class="container">
            <div class="row">

                <!-- /span3 -->
                <div class="span3">
                    <h4>
                        Support</h4>
                    <ul>
                        <li><a href="javascript:;">Frequently Asked Questions</a></li>
                        <li><a href="javascript:;">Ask a Question</a></li>
                        <li><a href="javascript:;">System Manual</a></li>
                        <li><a href="javascript:;">Feedback</a></li>
                    </ul>
                </div>
                <!-- /span3 -->
                <div class="span3">
                    <h4>
                        System Use</h4>
                    <ul>
                        <li><a href="javascript:;">Terms of Use</a></li>
                        <li><a href="javascript:;">Privacy Policy</a></li>
                    </ul>
                </div>

            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /extra-inner -->
</div>
<!-- /extra -->
<div class="footer">
    <div class="footer-inner">
        <div class="container">
            <div class="row">
                <div class="span12"> &copy; 2019 <a href="#">Rwanda Education Board</a>. </div>
                <!-- /span12 -->
            </div>
            <!-- /row -->
        </div>
        <!-- /container -->
    </div>
    <!-- /footer-inner -->
</div>
<!-- /footer -->
<!-- Le javascript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="{!! asset('template/js/jquery-1.7.2.min.js') !!}"></script>
<script src="{!! asset('template/js/excanvas.min.js') !!}"></script>
<script src="{!! asset('template/js/chart.min.js') !!}" type="text/javascript"></script>
<script src="{!! asset('template/js/bootstrap.js') !!}"></script>
<script language="javascript" type="text/javascript" src="{!! asset('template/js/full-calendar/fullcalendar.min.js') !!}"></script>

<script src="{!! asset('template/js/base.js') !!}"></script>
</body>
</html>
