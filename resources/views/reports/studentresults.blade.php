@extends('template.default')


@section('content')



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
                    <h3>Student performance</h3>
                </div> <!-- /widget-header -->
                <div class="widget-content">

                       {!! Form::open(array('route' => 'reports.searchstudentresults','class'=>"form-inline",'method'=>'POST')) !!}

                        <div class="span3">

                            <div class="control-group">
                                <label class="control-label" for="firstname">Student</label>
                                <div class="controls">

                                    <input type="text" name="unique_identifier" id="unique_identifier" value="{{$unique_identifier}}" placeholder="Enter Student Unique Identifier" class="span3" required="required">

                                </div> <!-- /controls -->
                            </div> <!-- /control-group -->

                        </div>

                        <div class="span3">

                            <div class="control-group">
                                <label class="control-label" for="firstname">Semester</label>
                                <div class="controls">

                                    <select name="semester_id" class="span3">
                                        @foreach($semesters as $semester)
                                            <option value="{{$semester->id}}" @if($semester->id==$semester_id) selected="selected" @endif>{{$semester->semester}} </option>

                                        @endforeach
                                    </select>


                                </div> <!-- /controls -->
                            </div> <!-- /control-group -->

                        </div><br>



                        <div class="span3">

                            <button type="submit" class="btn btn-primary">GET STUDENT PERFORMANCE</button>

                        </div>

                    {!! Form::close() !!}

                </div>

            </div>

        </div>


    </div>


    <div class="row">

        <div class="span12">

            <div class="widget ">
                <div class="widget-header">
                    <i class="icon-bar-chart"></i>
                    <h3>Performance Results</h3>
                </div> <!-- /widget-header -->
                <div class="widget-content">
                    <p><strong>Student Name:</strong> {{$student_name}} <strong>Grade:</strong> {{$grade_name}} <strong>School:</strong> {{$school_name}}</p>
                    <p><strong>Period:</strong> {{$trimester->semester}}
                    </p>

                    <table class="table table-bordered">
                        <tr><td bgcolor="#ff0000"><strong>BE</strong> - Below Expectation</td>
                            <td bgcolor="#FFA500"><strong>APP</strong> - Aproaching Expectations</td>
                            <td bgcolor="#008000"><strong>MT</strong> - Meets Expectations</td>
                            <td bgcolor="#008000"><strong>EX</strong> - Exceeds Expectations</td>
                        </tr>
                    </table>

                    <table class="table table-condensed table-bordered">
                    <tr><th colspan="11">MATHEMATICS P5</th></tr>
                        <tr><th>&nbsp;</th>
                            <th colspan="5">ASSESSMENT 1</th>
                            <th colspan="5">ASSESSMENT 2</th>
                        </tr>
                    <tr><th>UNIT</th>
                        <th>ME</th><th>APP</th><th>MT</th><th>EX</th><th>OBSERVATIONS</th>
                        <th>ME</th><th>APP</th><th>MT</th><th>EX</th><th>OBSERVATIONS</th>
                    </tr>
                    <tr><td>Multiplication and division of decimals</td><td>&nbsp;</td><td bgcolor="#FFA500">X</td><td>&nbsp;</td><td>&nbsp;</td><td>Lorem ipsum sit domet</td>
                        <td bgcolor="#ff0000">X</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>Lorem ipsum sit domet</td>
                    </tr>
                    <tr><td>Equivalent fractions and operations</td><td bgcolor="#ff0000">X</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>Lorem ipsum sit domet</td>
                        <td bgcolor="#ff0000">X</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>Lorem ipsum sit domet</td>
                    </tr>
                    <tr><td>Prime factorisation and divisibility tests</td><td>&nbsp;</td><td>&nbsp;</td><td bgcolor="#008000">X</td><td>&nbsp;</td><td>Lorem ipsum sit domet</td>
                        <td bgcolor="#ff0000">X</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>Lorem ipsum sit domet</td>
                    </tr>
                    <tr><td>Addition and subtraction of integers</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td bgcolor="#008000">X</td><td>Lorem ipsum sit domet</td>
                        <td bgcolor="#ff0000">X</td><td>&nbsp;</td><td>&nbsp;</td><td>&nbsp;</td><td>Lorem ipsum sit domet</td>
                    </tr>

                        <tr><td colspan="5"><div align="right"><strong>SUBJECT AVERAGE</strong></div> </td><td bgcolor="#008000"><strong>MT</strong></td>
                            <td colspan="4"><div align="right"><strong>SUBJECT AVERAGE</strong></div> </td><td bgcolor="#008000"><strong>MT</strong></td>
                        </tr>
                    </table>

                </div>

            </div>

        </div>

    </div>


    <div class="row">

        <div class="span6">
            <div class="widget ">
                <div class="widget-header">
                    <i class="icon-search"></i>
                    <h3>Student progressive performance in {{$trimester->semester}}</h3>
                </div> <!-- /widget-header -->
                <div class="widget-content">
                    <div id="linecontainer" style="min-width: 310px; max-width: 800px; height: 100%; margin: 0 auto"></div>

                    <script type="text/javascript">

                        Highcharts.chart('linecontainer', {
                            chart: {
                                type: 'line'
                            },
                            title: {
                                text: 'Continious Assessents in {{$trimester->semester}}'
                            },
                            subtitle: {
                                text: ''
                            },
                            xAxis: {
                                categories: ['Assessment 1', 'Assessment 2', 'Assessment 3', 'Assessment 4']
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
                                data: [1,2,3,4]
                            }, {
                                name: 'English Grade 5',
                                data: [3,1,2,4]
                            }]
                        });
                    </script>


                </div>
            </div>
        </div>

        <div class="span6">
            <div class="widget ">
                <div class="widget-header">
                    <i class="icon-search"></i>
                    <h3>Student subject performance rate</h3>
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
                                text: 'Performance rate per subject'
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
                                name: 'Brands',
                                colorByPoint: true,
                                data: [{
                                    name: 'Mathematics Grade 5',
                                    y: 61,
                                    sliced: true,
                                    selected: true
                                }, {
                                    name: 'English Grade 5',
                                    y: 39
                                }]
                            }]
                        });
                    </script>
                </div>
            </div>
        </div>

    </div>
@endsection