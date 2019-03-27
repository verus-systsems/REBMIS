@extends('template.default')


@section('content')

    <script language = "javascript" type = "text/javascript">
        <!--
        //Browser Support Code
        function isEmpty(obj) {
            for(var key in obj) {
                if(obj.hasOwnProperty(key))
                    return false;
            }
            return true;
        }

        function sectorFunction(){
            var ajaxRequest;  // The variable that makes Ajax possible!

            try {
                // Opera 8.0+, Firefox, Safari
                ajaxRequest = new XMLHttpRequest();
            }catch (e) {
                // Internet Explorer Browsers
                try {
                    ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                }catch (e) {
                    try{
                        ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                    }catch (e){
                        // Something went wrong
                        alert("Your browser broke!");
                        return false;
                    }
                }
            }

            // Create a function that will receive data
            // sent from the server and will update
            // div section in the same page.

            ajaxRequest.onreadystatechange = function(){
                if(ajaxRequest.readyState == 4){
                    var ajaxDisplay = document.getElementById('sectorDiv');
                    ajaxDisplay.innerHTML = ajaxRequest.responseText;
                }
            }

            // Now get the value from user and pass it to
            // server script.

            var result_id = document.getElementById('district_id').value;
            var district_id = 0;

            if(isEmpty(result_id)) {
                grade_id = 0;
            } else {
                district_id = result_id;
            }
            var queryString = "/" + district_id;
            ajaxRequest.open("GET", "<?php echo url('/'); ?>/sectors/getsectors" + queryString, true);
            ajaxRequest.send(null);
        }
        //-->
    </script>

    <script language = "javascript" type = "text/javascript">
        <!--
        //Browser Support Code
        function isEmpty(obj) {
            for(var key in obj) {
                if(obj.hasOwnProperty(key))
                    return false;
            }
            return true;
        }

        function schoolFunction(){
            var ajaxRequest;  // The variable that makes Ajax possible!

            try {
                // Opera 8.0+, Firefox, Safari
                ajaxRequest = new XMLHttpRequest();
            }catch (e) {
                // Internet Explorer Browsers
                try {
                    ajaxRequest = new ActiveXObject("Msxml2.XMLHTTP");
                }catch (e) {
                    try{
                        ajaxRequest = new ActiveXObject("Microsoft.XMLHTTP");
                    }catch (e){
                        // Something went wrong
                        alert("Your browser broke!");
                        return false;
                    }
                }
            }

            // Create a function that will receive data
            // sent from the server and will update
            // div section in the same page.

            ajaxRequest.onreadystatechange = function(){
                if(ajaxRequest.readyState == 4){
                    var ajaxDisplay = document.getElementById('schoolDiv');
                    ajaxDisplay.innerHTML = ajaxRequest.responseText;
                }
            }

            // Now get the value from user and pass it to
            // server script.

            var result_id = document.getElementById('sector_id').value;
            var sector_id = 0;

            if(isEmpty(result_id)) {
                sector_id = 0;
            } else {
                sector_id = result_id;
            }
            var queryString = "/" + sector_id;
            ajaxRequest.open("GET", "<?php echo url('/'); ?>/sectors/getschools" + queryString, true);
            ajaxRequest.send(null);
        }
        //-->
    </script>


    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p>{{ $message }}</p>
        </div>
    @endif

    @if (!empty($error))
         <div class="alert alert-danger alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>

            <ul>
               <li>{{$error}}</li>
            </ul>
        </div>
    @endif

     <div class="row">


        <div class="span12">
            <div class="widget ">
                <div class="widget-header">
                    <i class="icon-search"></i>
                    <h3>Search classroom subject performance</h3>
                </div> <!-- /widget-header -->
                <div class="widget-content">

                    {!! Form::open(array('route' => 'reports.searchclassroom','class'=>"form-inline",'method'=>'POST')) !!}


                    <div class="span3">

                        <div class="control-group">
                            <label class="control-label" for="firstname">District</label>
                            <div class="controls">

                                <select name="district_id" id="district_id" class="span3" onChange="sectorFunction()" required="required">
                                    <option value="">Select District</option>
                                    @foreach($districts as $district)
                                        <option value="{{$district->id}}">{{$district->district_name}}</option>

                                    @endforeach

                                </select>

                            </div> <!-- /controls -->
                        </div> <!-- /control-group -->

                    </div>
                    <div class="span3">

                        <div class="control-group">
                            <label class="control-label" for="firstname">Sector</label>
                            <div class="controls">

                                <div id="sectorDiv">
                                    <select name="sector_id" id="sector_id" class="span3" onChange="schoolFunction()" required="required">
                                        <option value="">Select Sector</option>

                                    </select>

                                </div>



                            </div> <!-- /controls -->
                        </div> <!-- /control-group -->

                    </div>

                    <div class="span3">

                        <div class="control-group">
                            <label class="control-label" for="firstname">School</label>
                            <div class="controls">

                                <div id="schoolDiv">
                                    <select name="school_id" id="school_id" class="span3" required="required">
                                        <option value="">Select School</option>

                                    </select>
                                </div>



                            </div> <!-- /controls -->
                        </div> <!-- /control-group -->

                    </div>
                    <div class="span3">

                        <div class="control-group">
                            <label class="control-label" for="firstname">Grade</label>
                            <div class="controls">

                                <select name="gradeID" id="gradeID" class="span3" required="required">
                                    <option value="">Select Grade</option>
                                    @foreach($grades as $grade)
                                        <option value="{{$grade->id}}">{{$grade->grade_name}}</option>

                                    @endforeach
                                </select>
                            </div> <!-- /controls -->
                        </div> <!-- /control-group -->

                    </div>

                    <div class="span3">

                        <div class="control-group">
                            <label class="control-label" for="firstname">Subject</label>
                            <div class="controls">

                                <select name="studyfield_id" id="studyfield_id" class="span3" required="required">

                                    @foreach($studyfields as $studyfield)
                                        <option value="{{$studyfield->id}}">{{$studyfield->study_field}}</option>

                                    @endforeach
                                </select>


                            </div> <!-- /controls -->
                        </div> <!-- /control-group -->

                    </div>

                    <div class="span3">

                        <div class="control-group">
                            <label class="control-label" for="firstname">Trimester</label>
                            <div class="controls">

                                <select name="semester_id" class="span3">
                                    @foreach($semesters as $semester)
                                        <option value="{{$semester->id}}">{{$semester->semester}} </option>

                                    @endforeach
                                </select>


                            </div> <!-- /controls -->
                        </div> <!-- /control-group -->

                    </div>



                    <div class="span3">

                        <button type="submit" class="btn btn-primary">GET CLASSROOM PERFORMANCE</button>

                    </div>

                    {!! Form::close() !!}

                </div>

            </div>

        </div>


    </div>

    <div class="row">

        <div class="span12">

            <div id="target-1" class="widget">

                <div class="widget-content">

                    <p><strong>District:</strong> {{$thedistrict->district_name}} <strong>Sector:</strong> {{$thesector->sector_name}} <strong>School:</strong> {{$theschool->school_name}}</p>
                    <p><strong>Grade:</strong> {{$thegrade->grade_name}} <strong>Subject:</strong> {{$subject->subject_title}} <strong>Trimester:</strong> {{$trimester->semester}}</p>

                    <table class="table table-bordered">
                        <tr><td bgcolor="#ff0000"><strong>BE</strong> - Below Expectation</td>
                            <td bgcolor="#FFA500"><strong>APP</strong> - Aproaching Expectations</td>
                            <td bgcolor="#008000"><strong>MT</strong> - Meets Expectations</td>
                            <td bgcolor="#008000"><strong>EX</strong> - Exceeds Expectations</td>
                        </tr>
                    </table>
                </div> <!-- /widget-content -->

            </div> <!-- /widget -->

        </div> <!-- /span12 -->


    </div> <!-- /row -->
    <div class="row">

        <div class="span6">

            <div class="widget ">
                <div class="widget-header">
                    <i class="icon-bar-chart"></i>
                    <h3>{{$thegrade->grade_name}} overall performance in {{$thestudyfield->study_field}} in {{$trimester->semester}}</h3>
                </div> <!-- /widget-header -->
                <div class="widget-content">
                    <div id="container" style="min-width: 310px; height: 400px; margin: 0 auto"></div>



                    <script type="text/javascript">

                        Highcharts.chart('container', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: '{{$thegrade->grade_name}} overall performance in {{$thestudyfield->study_field}} in {{$trimester->semester}}'
                            },
                            subtitle: {
                                text: '{{date("d F Y", strtotime($trimester->start_date))}} - {{date("d F Y", strtotime($trimester->end_date))}}'
                            },
                            xAxis: {
                                categories: [
                                    '{{$trimester->semester}}'
                                ],
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'No. Of Students'
                                }
                            },credits: {
                                enabled: false
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                '<td style="padding:0"><b>{point.y:.1f} students</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'BE',
                                data: [49]

                            }, {
                                name: 'APP',
                                data: [83]

                            }, {
                                name: 'MT',
                                data: [48]

                            }, {
                                name: 'EX',
                                data: [42]

                            }]
                        });
                    </script>



                </div>

            </div>

        </div>

        <div class="span6">

            <div class="widget ">
                <div class="widget-header">
                    <i class="icon-bar-chart"></i>
                    <h3>{{$thegrade->grade_name}} overall performance rate in {{$thestudyfield->study_field}}</h3>
                </div> <!-- /widget-header -->
                <div class="widget-content">

                    <div id="piecontainer" style="min-width: 310px; height: 400px; max-width: 600px; margin: 0 auto"></div>



                    <script type="text/javascript">

                        // Build the chart
                        Highcharts.chart('piecontainer', {
                            chart: {
                                plotBackgroundColor: null,
                                plotBorderWidth: null,
                                plotShadow: false,
                                type: 'pie'
                            },
                            title: {
                                text: ''
                            },
                            tooltip: {
                                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                            },
                            plotOptions: {
                                pie: {
                                    allowPointSelect: true,
                                    cursor: 'pointer',
                                    dataLabels: {
                                        enabled: false
                                    },
                                    showInLegend: true
                                }
                            },
                            credits: {
                                enabled: false
                            },
                            series: [{
                                name: 'Performance',
                                colorByPoint: true,
                                data: [{
                                    name: 'BE',
                                    y: 22,
                                    sliced: true,
                                    selected: true
                                }, {
                                    name: 'APP',
                                    y: 37
                                }, {
                                    name: 'MT',
                                    y: 22
                                }, {
                                    name: 'EX',
                                    y: 19
                                }]
                            }]
                        });
                    </script>



                </div>

            </div>

        </div>

    </div>

    <div class="row">

        <div class="span6">

            <div class="widget ">
                <div class="widget-header">
                    <i class="icon-bar-chart"></i>
                    <h3>{{$thegrade->grade_name}} overall performance trends in {{$thestudyfield->study_field}}</h3>
                </div> <!-- /widget-header -->
                <div class="widget-content">
                    <div id="linecontainer" style="min-width: 310px; max-width: 800px; height: 100%; margin: 0 auto"></div>

                    <script type="text/javascript">

                        Highcharts.chart('linecontainer', {
                            chart: {
                                type: 'line'
                            },
                            title: {
                                text: 'Performance trends for {{$thegrade->grade_name}} in {{$thestudyfield->study_field}} 2019'
                            },
                            subtitle: {
                                text: ''
                            },
                            xAxis: {
                                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                            },
                            yAxis: {
                                title: {
                                    text: 'Performance (1- BE, 2 - APP, 3 - MT, EX - 4)'
                                }
                            },
                            plotOptions: {
                                line: {
                                    dataLabels: {
                                        enabled: true
                                    },
                                    enableMouseTracking: false
                                }
                            },
                            credits: {
                                enabled: false
                            },
                            series: [{
                                name: 'Mathematics Grade 5',
                                data: [1,2,3]
                            }]
                        });
                    </script>



                </div>

            </div>

        </div>

        <div class="span6">

            <div class="widget ">
                <div class="widget-header">
                    <i class="icon-bar-chart"></i>
                    <h3>{{$thegrade->grade_name}} overall performance trends in {{$thestudyfield->study_field}} 2018 vs 2019</h3>
                </div> <!-- /widget-header -->
                <div class="widget-content">

                    <div id="trendline" style="min-width: 310px; max-width: 800px; height: 100%; margin: 0 auto"></div>

                    <script type="text/javascript">

                        Highcharts.chart('trendline', {
                            chart: {
                                type: 'line'
                            },
                            title: {
                                text: 'Performance trends for {{$thegrade->grade_name}} in {{$thestudyfield->study_field}}'
                            },
                            subtitle: {
                                text: '2018 vs 2019'
                            },
                            xAxis: {
                                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                            },
                            yAxis: {
                                title: {
                                    text: 'Performance (1- BE, 2 - APP, 3 - MT, EX - 4)'
                                }
                            },
                            plotOptions: {
                                line: {
                                    dataLabels: {
                                        enabled: true
                                    },
                                    enableMouseTracking: false
                                }
                            },
                            credits: {
                                enabled: false
                            },
                            series: [{
                                name: '2019',
                                data: [1,2,3]
                            },
                                {
                                    name: '2018',
                                    data: [3,2,1,4,3,4,1,2,2,4,1,3]
                                }]
                        });
                    </script>


                </div>

            </div>

        </div>

    </div>


    <div class="row">

        <div class="span6">

            <div class="widget ">
                <div class="widget-header">
                    <i class="icon-bar-chart"></i>
                    <h3>{{$thegrade->grade_name}} overall performance rate trends in {{$thestudyfield->study_field}}</h3>
                </div> <!-- /widget-header -->
                <div class="widget-content">

                    <div id="performancetrendline" style="min-width: 310px; max-width: 800px; height: 100%; margin: 0 auto"></div>

                    <script type="text/javascript">

                        Highcharts.chart('performancetrendline', {
                            chart: {
                                type: 'line'
                            },
                            title: {
                                text: 'Performance rate trends for {{$thegrade->grade_name}} in {{$thestudyfield->study_field}}'
                            },
                            subtitle: {
                                text: '2019'
                            },
                            xAxis: {
                                categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec']
                            },
                            yAxis: {
                                title: {
                                    text: 'No. of Students (%)'
                                }
                            },
                            plotOptions: {
                                line: {
                                    dataLabels: {
                                        enabled: true
                                    },
                                    enableMouseTracking: false
                                }
                            },
                            credits: {
                                enabled: false
                            },
                            series: [{
                                name: 'BE',
                                data: [20,30,10]
                            },
                                {
                                    name: 'APP',
                                    data: [3,2,1,]
                                },
                                {
                                    name: 'MT',
                                    data: [50,60,10]
                                }
                                ,
                                {
                                    name: 'EX',
                                    data: [20,25,21]
                                }]
                        });
                    </script>

                </div>

            </div>

        </div>

        <div class="span6">

            <div class="widget ">
                <div class="widget-header">
                    <i class="icon-bar-chart"></i>
                    <h3>{{$thegrade->grade_name}} overall performance in {{$thestudyfield->study_field}} in 2019</h3>
                </div> <!-- /widget-header -->
                <div class="widget-content">


                    <div id="cont" style="min-width: 310px; height: 400px; margin: 0 auto"></div>



                    <script type="text/javascript">

                        Highcharts.chart('cont', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: ''
                            },
                            subtitle: {
                                text: ''
                            },
                            xAxis: {
                                categories: [
                                    'Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'
                                ],
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'No. Of Students'
                                }
                            },credits: {
                                enabled: false
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                '<td style="padding:0"><b>{point.y:.1f} students</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'BE',
                                data: [49,45,36]

                            }, {
                                name: 'APP',
                                data: [83,80,81]

                            }, {
                                name: 'MT',
                                data: [48,60,50]

                            }, {
                                name: 'EX',
                                data: [42,56,60]

                            }]
                        });
                    </script>



                </div>

            </div>

        </div>

    </div>



    <div class="row">

        <div class="span6">

            <div class="widget ">
                <div class="widget-header">
                    <i class="icon-bar-chart"></i>
                    <h3>{{$thegrade->grade_name}} comparative performance per subject {{$trimester->semester}}</h3>
                </div> <!-- /widget-header -->
                <div class="widget-content">

                    <div id="comparativecontent" style="min-width: 310px; height: 400px; margin: 0 auto"></div>



                    <script type="text/javascript">

                        Highcharts.chart('comparativecontent', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: '{{$thegrade->grade_name}} comparative performance per subject {{$trimester->semester}}'
                            },
                            subtitle: {
                                text: '{{date("d F Y", strtotime($trimester->start_date))}} - {{date("d F Y", strtotime($trimester->end_date))}}'
                            },
                            xAxis: {
                                categories: [
                                    'BE', 'APP', 'MT', 'EX'
                                ],
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'No. Of Students'
                                }
                            },credits: {
                                enabled: false
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                '<td style="padding:0"><b>{point.y:.1f} students</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },
                            series: [{
                                name: 'Mathematics',
                                data: [49,83,48,42]

                            }, {
                                name: 'English',
                                data: [83,75,60,55]

                            }]
                        });
                    </script>

                </div>

            </div>

        </div>

        <div class="span6">

            <div class="widget ">
                <div class="widget-header">
                    <i class="icon-bar-chart"></i>
                    <h3>{{$thegrade->grade_name}} subject performance trends in 2019</h3>
                </div> <!-- /widget-header -->
                <div class="widget-content">

                    <div id="linegraph" style="min-width: 310px; max-width: 800px; height: 100%; margin: 0 auto"></div>

                    <script type="text/javascript">

                        Highcharts.chart('linegraph', {
                            chart: {
                                type: 'line'
                            },
                            title: {
                                text: 'Subject performance trends in 2019'
                            },
                            subtitle: {
                                text: ''
                            },
                            xAxis: {
                                categories: ['Jan', 'Feb', 'Mar']
                            },
                            yAxis: {
                                title: {
                                    text: 'Performance (1- BE, 2 - APP, 3 - MT, EX - 4)'
                                }
                            },
                            plotOptions: {
                                line: {
                                    dataLabels: {
                                        enabled: true
                                    },
                                    enableMouseTracking: false
                                }
                            },
                            credits: {
                                enabled: false
                            },
                            series: [{
                                name: 'Mathematics Grade 5',
                                data: [1,2,3]
                            }, {
                                name: 'English Grade 5',
                                data: [3,1,2]
                            }]
                        });
                    </script>


                </div>

            </div>

        </div>

    </div>



    <div class="row">
        <div class="span6">
            <div class="widget ">
                <div class="widget-header">
                    <i class="icon-bar-chart"></i>
                    <h3>{{$thegrade->grade_name}} gender performance distribution in {{$trimester->semester}}</h3>
                </div> <!-- /widget-header -->
                <div class="widget-content">

                    <script>
                        /**
                         * Grouped Categories v0.0.1 (2013-02-22)
                         *
                         * (c) 2012-2013 Black Label
                         *
                         * License: Creative Commons Attribution (CC)
                         */
                        (function(HC){
                            /*jshint expr:true, boss:true */
                            var UNDEFINED = void 0,
                                mathRound = Math.round,
                                mathMin   = Math.min,
                                mathMax   = Math.max,

                                // cache prototypes
                                axisProto  = HC.Axis.prototype,
                                tickProto  = HC.Tick.prototype,

                                // cache original methods
                                _axisInit          = axisProto.init,
                                _axisRender        = axisProto.render,
                                _axisSetCategories = axisProto.setCategories,
                                _tickGetLabelSize  = tickProto.getLabelSize,
                                _tickAddLabel      = tickProto.addLabel,
                                _tickDestroy       = tickProto.destroy,
                                _tickRender        = tickProto.render;


                            function Category(obj, parent) {
                                this.name = obj.name || obj;
                                this.parent = parent;

                                return this;
                            }

                            Category.prototype.toString = function () {
                                var parts = [],
                                    cat = this;

                                while (cat) {
                                    parts.push(cat.name);
                                    cat = cat.parent;
                                }

                                return parts.join(', ');
                            };


// Highcharts methods
                            function defined(obj) {
                                return obj !== UNDEFINED && obj !== null;
                            }

// calls parseInt with radix = 10, adds 0.5 to avoid blur
                            function pInt(n) {
                                return parseInt(n, 10) - 0.5;
                            }

// returns sum of an array
                            function sum(arr) {
                                var l = arr.length,
                                    x = 0;

                                while (l--)
                                    x += arr[l];

                                return x;
                            }


// Builds reverse category tree
                            function buildTree(cats, out, options, parent, depth) {
                                var len = cats.length,
                                    cat;

                                depth || (depth = 0);
                                options.depth || (options.depth = 0);

                                while (len--) {
                                    cat = cats[len];


                                    if (parent)
                                        cat.parent = parent;


                                    if (cat.categories)
                                        buildTree(cat.categories, out, options, cat, depth + 1);

                                    else
                                        addLeaf(out, cat, parent);
                                }

                                options.depth = mathMax(options.depth, depth);
                            }

// Adds category leaf to array
                            function addLeaf(out, cat, parent) {
                                out.unshift(new Category(cat, parent));

                                while (parent) {
                                    parent.leaves++ || (parent.leaves = 1);
                                    parent = parent.parent;
                                }
                            }

// Pushes part of grid to path
                            function addGridPart(path, d) {
                                path.push(
                                    'M',
                                    pInt(d[0]), pInt(d[1]),
                                    'L',
                                    pInt(d[2]), pInt(d[3])
                                );
                            }

// Destroys category groups
                            function cleanCategory(category) {
                                var tmp;

                                while (category) {
                                    tmp = category.parent;

                                    if (category.label)
                                        category.label.destroy();

                                    delete category.parent;
                                    delete category.label;

                                    category = tmp;
                                }
                            }

// Returns tick position
                            function tickPosition(tick, pos) {
                                return tick.getPosition(tick.axis.horiz, pos, tick.axis.tickmarkOffset);
                            }

                            function walk(arr, key, fn) {
                                var l = arr.length,
                                    children;

                                while (l--) {
                                    children = arr[l][key];

                                    if (children)
                                        walk(children, key, fn);

                                    fn(arr[l]);
                                }
                            }



//
// Axis prototype
//

                            axisProto.init = function (chart, options) {
                                // default behaviour
                                _axisInit.call(this, chart, options);

                                if (typeof options === 'object' && options.categories)
                                    this.setupGroups(options);
                            };

// setup required axis options
                            axisProto.setupGroups = function (options) {
                                var categories  = HC.extend([], options.categories),
                                    reverseTree = [],
                                    stats       = {};

                                // build categories tree
                                buildTree(categories, reverseTree, stats);

                                // set axis properties
                                this.categoriesTree   = categories;
                                this.categories       = reverseTree;
                                this.isGrouped        = stats.depth !== 0;
                                this.labelsDepth      = stats.depth;
                                this.labelsSizes      = [];
                                this.labelsGridPath   = [];
                                this.tickLength       = options.tickLength || this.tickLength || null;
                                this.directionFactor  = [-1, 1, 1, -1][this.side];

                                this.options.lineWidth = options.lineWidth || 1;
                            };


                            axisProto.render = function () {
                                // clear grid path
                                if (this.isGrouped)
                                    this.labelsGridPath = [];

                                // cache original tick length
                                if (this.originalTickLength === UNDEFINED)
                                    this.originalTickLength = this.options.tickLength;

                                // use default tickLength for not-grouped axis
                                // and generate grid on grouped axes,
                                // use tiny number to force highcharts to hide tick
                                this.options.tickLength = this.isGrouped ? 0.001 : this.originalTickLength;

                                _axisRender.call(this);


                                if (!this.isGrouped) {
                                    if (this.labelsGrid)
                                        this.labelsGrid.attr({visibility: 'hidden'});
                                    return;
                                }

                                var axis    = this,
                                    options = axis.options,
                                    top     = axis.top,
                                    left    = axis.left,
                                    right   = left + axis.width,
                                    bottom  = top + axis.height,
                                    visible = axis.hasVisibleSeries,
                                    depth   = axis.labelsDepth,
                                    grid    = axis.labelsGrid,
                                    horiz   = axis.horiz,
                                    d       = axis.labelsGridPath,
                                    i       = 0,
                                    offset  = axis.opposite ? (horiz ? top : right) : (horiz ? bottom : left),
                                    part;

                                if (axis.userTickLength)
                                    depth -= 1;

                                // render grid path for the first time
                                if (!grid) {
                                    grid = axis.labelsGrid = axis.chart.renderer.path()
                                        .attr({
                                            strokeWidth: options.lineWidth,
                                            stroke: options.lineColor
                                        })
                                        .add(axis.axisGroup);
                                }

                                // go through every level and draw horizontal grid line
                                while (i <= depth) {
                                    offset += axis.groupSize(i);

                                    part = horiz ?
                                        [left, offset, right, offset] :
                                        [offset, top, offset, bottom];

                                    addGridPart(d, part);
                                    i++;
                                }

                                // draw grid path
                                grid.attr({
                                    d: d,
                                    visibility: visible ? 'visible' : 'hidden'
                                });

                                axis.labelGroup.attr({
                                    visibility: visible ? 'visible' : 'hidden'
                                });


                                walk(axis.categoriesTree, 'categories', function (group) {
                                    var tick = group.tick;

                                    if (!tick)
                                        return;

                                    if (tick.startAt + tick.leaves - 1 < axis.min || tick.startAt > axis.max) {
                                        tick.label.hide();
                                        tick.destroyed = 0;
                                    }
                                    else
                                        tick.label.show();
                                });
                            };

                            axisProto.setCategories = function (newCategories, doRedraw) {
                                if (this.categories)
                                    this.cleanGroups();

                                this.setupGroups({
                                    categories: newCategories
                                });

                                _axisSetCategories.call(this, this.categories, doRedraw);
                            };

// cleans old categories
                            axisProto.cleanGroups = function () {
                                var ticks = this.ticks,
                                    n;

                                for (n in ticks)
                                    if (ticks[n].parent);
                                delete ticks[n].parent;

                                walk(this.categoriesTree, 'categories', function (group) {
                                    var tick = group.tick,
                                        n;

                                    if (!tick)
                                        return;

                                    tick.label.destroy();

                                    for (n in tick)
                                        delete tick[n];

                                    delete group.tick;
                                });
                            };

// keeps size of each categories level
                            axisProto.groupSize = function (level, position) {
                                var positions = this.labelsSizes,
                                    direction = this.directionFactor;

                                if (position !== UNDEFINED)
                                    positions[level] = mathMax(positions[level] || 0, position + 10);

                                if (level === true)
                                    return sum(positions) * direction;

                                else if (positions[level])
                                    return positions[level] * direction;

                                return 0;
                            };



//
// Tick prototype
//

// Override methods prototypes
                            tickProto.addLabel = function () {
                                var category;

                                _tickAddLabel.call(this);

                                if (!this.axis.categories ||
                                    !(category = this.axis.categories[this.pos]))
                                    return;

                                // set label text
                                if (category.name)
                                    this.label.attr('text', category.name);

                                // create elements for parent categories
                                if (this.axis.isGrouped)
                                    this.addGroupedLabels(category);
                            };

// render ancestor label
                            tickProto.addGroupedLabels = function (category) {
                                var tick    = this,
                                    axis    = this.axis,
                                    chart   = axis.chart,
                                    options = axis.options.labels,
                                    useHTML = options.useHTML,
                                    css     = options.style,
                                    attr    = { align: 'center' },
                                    size    = axis.horiz ? 'height' : 'width',
                                    depth   = 0,
                                    label;


                                while (tick) {
                                    if (depth > 0 && !category.tick) {
                                        // render label element
                                        label = chart.renderer.text(category.name, 0, 0, useHTML)
                                            .attr(attr)
                                            .css(css)
                                            .add(axis.labelGroup);

                                        // tick properties
                                        tick.startAt = this.pos;
                                        tick.childCount = category.categories.length;
                                        tick.leaves = category.leaves;
                                        tick.visible = this.childCount;
                                        tick.label = label;

                                        // link tick with category
                                        category.tick = tick;
                                    }

                                    // set level size
                                    axis.groupSize(depth, tick.label.getBBox()[size]);

                                    // go up to the parent category
                                    category = category.parent;

                                    if (category)
                                        tick = tick.parent = category.tick || {};
                                    else
                                        tick = null;

                                    depth++;
                                }
                            };

// set labels position & render categories grid
                            tickProto.render = function (index, old) {
                                _tickRender.call(this, index, old);

                                if (!this.axis.isGrouped || !this.axis.categories[this.pos] || this.pos > this.axis.max)
                                    return;

                                var tick    = this,
                                    group   = tick,
                                    axis    = tick.axis,
                                    tickPos = tick.pos,
                                    isFirst = tick.isFirst,
                                    max     = axis.max,
                                    min     = axis.min,
                                    horiz   = axis.horiz,
                                    cat     = axis.categories[tickPos],
                                    grid    = axis.labelsGridPath,
                                    size    = axis.groupSize(0),
                                    tickLen = axis.tickLength || size,
                                    factor  = axis.directionFactor,
                                    xy      = tickPosition(tick, tickPos),
                                    start   = horiz ? xy.y : xy.x,
                                    depth   = 1,
                                    gridAttrs,
                                    lvlSize,
                                    attrs,
                                    bBox;

                                // render grid for "normal" categories (first-level), render left grid line only for the first category
                                if (isFirst) {
                                    gridAttrs = horiz ?
                                        [axis.left, xy.y, axis.left, xy.y + axis.groupSize(true)] :
                                        axis.isXAxis ?
                                            [xy.x, axis.top, xy.x + axis.groupSize(true), axis.top] :
                                            [xy.x, axis.top + axis.len, xy.x + axis.groupSize(true), axis.top + axis.len];

                                    addGridPart(grid, gridAttrs);
                                }

                                gridAttrs = horiz ?
                                    [xy.x, xy.y, xy.x, xy.y + size] :
                                    [xy.x, xy.y, xy.x + size, xy.y];

                                addGridPart(grid, gridAttrs);

                                size = start + size;



                                while (group = group.parent) {
                                    minPos  = tickPosition(tick, mathMax(group.startAt - 1, min - 1));
                                    maxPos  = tickPosition(tick, mathMin(group.startAt + group.leaves - 1, max));
                                    bBox    = group.label.getBBox();
                                    lvlSize = axis.groupSize(depth);

                                    attrs = horiz ? {
                                        x: (minPos.x + maxPos.x) / 2,
                                        y: bBox.height * factor + size + 4
                                    } : {
                                        x: size,
                                        y: (minPos.y + maxPos.y + bBox.height) / 2
                                    };

                                    group.label.attr(attrs);

                                    if (grid) {
                                        gridAttrs = horiz ?
                                            [maxPos.x, size, maxPos.x, size + lvlSize] :
                                            [size, maxPos.y, size + lvlSize, maxPos.y];

                                        addGridPart(grid, gridAttrs);
                                    }

                                    size += lvlSize;
                                    depth++;
                                }
                            };

                            tickProto.destroy = function () {
                                var group = this;

                                while (group = group.parent)
                                    group.destroyed++ || (group.destroyed = 1);

                                _tickDestroy.call(this);
                            };

// return size of the label (height for horizontal, width for vertical axes)
                            tickProto.getLabelSize = function () {
                                if (this.axis.isGrouped === true)
                                    return sum(this.axis.labelsSizes);
                                else
                                    return _tickGetLabelSize.call(this);
                            };

                        }(Highcharts));
                        $(function () {
                            var chart = new Highcharts.Chart({
                                chart: {
                                    renderTo: "categorycont",
                                    type: "column"
                                },
                                title: {
                                    text: 'Gender performance distribution in {{$thestudyfield->study_field}} for {{$trimester->semester}}'
                                },
                                subtitle: {
                                    text: '{{date("d F Y", strtotime($trimester->start_date))}} - {{date("d F Y", strtotime($trimester->end_date))}}'
                                },credits: {
                                    enabled: false
                                },
                                series: [{
                                    name: 'BE',
                                    data: [20,50]
                                },
                                {
                                        name: 'APP',
                                        data: [60,80]
                                },
                                {
                                    name: 'MT',
                                    data: [100,94]
                                }
                                , {
                                    name: 'EX',
                                    data: [12,17]
                                }    ],
                                xAxis: {
                                    categories: [ {
                                        name: "Gender",
                                        categories: ["Male", "Female"]
                                    }]
                                },
                                yAxis: {
                                    min: 0,
                                    title: {
                                        text: 'No of Students'
                                    }
                                },  credits: {
                                    enabled: false
                                }
                            });
                        });
                    </script>
                    <div id="categorycont" style="min-width: 100%; height: 400px; margin: 0 auto"></div>

                </div>

            </div>
        </div>



        <div class="span6">
            <div class="widget ">
                <div class="widget-header">
                    <i class="icon-bar-chart"></i>
                    <h3>{{$thegrade->grade_name}} gender performance trends in {{$thestudyfield->study_field}}</h3>
                </div> <!-- /widget-header -->
                <div class="widget-content">


                    <div id="gendertrendgraph" style="min-width: 310px; max-width: 800px; height: 100%; margin: 0 auto"></div>

                    <script type="text/javascript">

                        Highcharts.chart('gendertrendgraph', {
                            chart: {
                                type: 'line'
                            },
                            title: {
                                text: 'Gender performance trends in  {{$thestudyfield->study_field}} in 2019'
                            },
                            subtitle: {
                                text: ''
                            },
                            xAxis: {
                                categories: ['Jan', 'Feb', 'Mar']
                            },
                            yAxis: {
                                title: {
                                    text: 'Performance (1- BE, 2 - APP, 3 - MT, EX - 4)'
                                }
                            },
                            plotOptions: {
                                line: {
                                    dataLabels: {
                                        enabled: true
                                    },
                                    enableMouseTracking: false
                                }
                            },
                            credits: {
                                enabled: false
                            },
                            series: [{
                                name: 'Male',
                                data: [2,3,3]
                            }, {
                                name: 'Female',
                                data: [2,3,4]
                            }]
                        });
                    </script>

                </div>

            </div>

        </div>

    </div>

@endsection