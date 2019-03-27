<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>REB - Formative Assessment MIS</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/bootstrap-responsive.min.css" rel="stylesheet">
<link href="http://fonts.googleapis.com/css?family=Open+Sans:400italic,600italic,400,600"
        rel="stylesheet">
<link href="css/font-awesome.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/pages/dashboard.css" rel="stylesheet">
    <link href="css/pages/plans.css" rel="stylesheet">
    <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

    <script src="code/highcharts.js"></script>
    <script src="code/modules/exporting.js"></script>
    <script src="code/modules/export-data.js"></script>
</head>
<body>
<div class="navbar navbar-fixed-top">
  <div class="navbar-inner">
    <div class="container"> <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse"><span
                    class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span> </a><a class="brand" href="index.php">RESOURCES FOR FORMATIVE ASSESSMENT IN RWANDA</a>
      <div class="nav-collapse">
        <ul class="nav pull-right">
          <!--<li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-cog"></i> Account <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Settings</a></li>
              <li><a href="javascript:;">Help</a></li>
            </ul>
          </li>-->
          <li class="dropdown"><a href="#" class="dropdown-toggle" data-toggle="dropdown"><i
                            class="icon-user"></i> EGrappler.com <b class="caret"></b></a>
            <ul class="dropdown-menu">
              <li><a href="javascript:;">Profile</a></li>
              <li><a href="javascript:;">Logout</a></li>
            </ul>
          </li>
        </ul>
       <!-- <form class="navbar-search pull-right">
          <input type="text" class="search-query" placeholder="Search">
        </form>-->
      </div>
      <!--/.nav-collapse --> 
    </div>
    <!-- /container --> 
  </div>
  <!-- /navbar-inner --> 
</div>
<!-- /navbar -->
<div class="subnavbar">
  <div class="subnavbar-inner">
    <div class="container">
      <ul class="mainnav">
        <li><a href="index.php"><i class="icon-dashboard"></i><span>Dashboard</span> </a> </li>

       <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-bar-chart"></i><span>Reports</span> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                  <li><a href="#">Student Level Performane</a></li>
                  <li><a href="#">Classroom Level Performane</a></li>
                  <li><a href="#">School Level Performane</a></li>
                  <li><a href="#">Sector Level Performance</a></li>
                  <li><a href="#">District Level Performane</a></li>
                  <li><a href="#">Province Level Performane</a></li>

              </ul>
       </li>
        <li class="active"><a href="resources.php"><i class="icon-search"></i><span>Resources</span> </a> </li>
        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-trophy"></i><span>Grading</span> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                  <li><a href="observations.php">Student Observation</a></li>
                  <li><a href="#">Action Plans</a></li>

              </ul>
        </li>
         <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-building"></i><span>Institutions</span> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                  <li><a href="#">Schools</a></li>
                  <li><a href="#">Teachers</a></li>
                  <li><a href="#">Students</a></li>
                  <li><a href="#">Parents</a></li>

              </ul>
         </li>

        <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-file"></i><span>Documents</span> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                  <li><a href="#">Document Categories</a></li>
                  <li><a href="#">Documents</a></li>

              </ul>
        </li>

          <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-question"></i><span>Question Bank</span> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                  <li><a href="#">Questions</a></li>
                  <li><a href="#">Guides</a></li>

              </ul>
          </li>

          <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-list-alt"></i><span>Academics</span> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                  <li><a href="#">Semester</a></li>
                  <li><a href="#">Grades</a></li>
                  <li><a href="#">Subjects</a></li>
                  <li><a href="#">Link Subjects to Grades</a></li>
                  <li><a href="#">Units</a></li>
                  <li><a href="#">Skills</a></li>
              </ul>
          </li>

          <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-pencil"></i><span>Content</span> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                  <li><a href="#">Articles</a></li>
                  <li><a href="#">Videos</a></li>

              </ul>
          </li>

          <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-map-marker"></i><span>Locations</span> <b class="caret"></b></a>
              <ul class="dropdown-menu">
                  <li><a href="#">Provinces</a></li>
                  <li><a href="#">Districts</a></li>
                  <li><a href="#">Sectors</a></li>

              </ul>
          </li>

          <li class="dropdown"><a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown"> <i class="icon-key"></i><span>Security</span> <b class="caret"></b></a>
          <ul class="dropdown-menu">
            <li><a href="#">Roles Management</a></li>
            <li><a href="#">Users</a></li>
          </ul>
        </li>
      </ul>
    </div>
    <!-- /container --> 
  </div>
  <!-- /subnavbar-inner --> 
</div>
<!-- /subnavbar -->
<div class="main">
  <div class="main-inner">
    <div class="container">


        <div class="row">
            <div class="span12">
            <div class="widget ">
                <div class="widget-content">
            <form id="edit-profile" class="form-inline" action="results.php">
                <fieldset>
                    <div class="span3">
                        <div class="control-group">
                            <label class="control-label" for="firstname">Grade</label>
                            <div class="controls">
                                <select class="selectpicker">
                                    <option value="">Grade 1</option>
                                    <option value="">Grade 2</option>
                                    <option value="">Grade 3</option>
                                </select>
                            </div> <!-- /controls -->
                        </div> <!-- /control-group -->

                    </div>
                    <div class="span3">
                        <div class="control-group">
                            <label class="control-label" for="firstname">Subject</label>
                            <div class="controls">
                                <select class="selectpicker">
                                    <option value="">Mathematics</option>
                                    <option value="">English</option>
                                </select>
                            </div> <!-- /controls -->
                        </div> <!-- /control-group -->
                    </div>

                    <div class="span3">

                        <div class="control-group">
                            <label class="control-label" for="firstname">Unit</label>
                            <div class="controls">
                                <select class="selectpicker">
                                    <option value="">Unit 1</option>
                                    <option value="">Unit 2</option>
                                </select>
                            </div> <!-- /controls -->
                        </div> <!-- /control-group -->

                    </div>

                    <div class="span3">

                        <button type="submit" class="btn btn-primary">SEARCH</button>

                    </div>
                </fieldset>

            </form>

                </div>

            </div>
            </div>
        </div>

        <div class="row">

        <div class="span12">
                <div class="widget ">
                    <div class="widget-header">
                        <i class="icon-search"></i>
                        <h3>Search results</h3>
                    </div> <!-- /widget-header -->

                    <div class="widget-content">

                        <ul class="news-items">
                            <li>

                                <div class="news-item-date"><span class="news-item-day"><i class="icon-file-text"></i></span></div>
                                <div class="news-item-detail"> <a href="#" class="news-item-title" target="_blank">Question</a>
                                    <p class="news-item-preview"> This is our web design and development news series where we share our favorite design/development related articles, resources, tutorials and awesome freebies. </p>
                                </div>

                            </li>

                            <li>

                                <div class="news-item-date"> <span class="news-item-day"><i class="icon-file-text"></i></span> </div>
                                <div class="news-item-detail"> <a href="#" class="news-item-title" target="_blank">Guides</a>
                                    <p class="news-item-preview"> This is our web design and development news series where we share our favorite design/development related articles, resources, tutorials and awesome freebies. </p>
                                </div>

                            </li>

                            <li>

                                <div class="news-item-date"> <span class="news-item-day"><i class="icon-file-text"></i></span> </div>
                                <div class="news-item-detail"> <a href="#" class="news-item-title" target="_blank">How-to and multimedia resources</a>
                                    <p class="news-item-preview"> This is our web design and development news series where we share our favorite design/development related articles, resources, tutorials and awesome freebies. </p>
                                </div>

                            </li>

                        </ul>

                    </div>

                </div>


            </div>

        </div>


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
<script src="js/jquery-1.7.2.min.js"></script> 
<script src="js/excanvas.min.js"></script> 
<script src="js/chart.min.js" type="text/javascript"></script> 
<script src="js/bootstrap.js"></script>
<script language="javascript" type="text/javascript" src="js/full-calendar/fullcalendar.min.js"></script>
 
<script src="js/base.js"></script> 
</body>
</html>
