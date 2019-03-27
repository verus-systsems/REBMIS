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
                    <h3>Student performance per Subject</h3>
                </div> <!-- /widget-header -->
                <div class="widget-content">

                       {!! Form::open(array('route' => 'reports.studentresults','class'=>"form-inline",'method'=>'POST')) !!}

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
                            <label class="control-label" for="firstname">Subject</label>
                            <div class="controls">

                                <select name="studyfield_id" id="studyfield_id" class="span3" required="required">
                                    <option value="">Select Subject</option>
                                    @foreach($studyfields as $studyfield)
                                        <option value="{{$studyfield->id}}" @if($studyfield->id==$studyfield_id) selected="selected" @endif>{{$studyfield->study_field}}</option>

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
                    <p><strong>Period:</strong> {{$trimester->semester}} <strong>Subject:</strong> {{$subject_title}}
                    </p>

                    <table class="table table-bordered">
                        <tr><td bgcolor="#ff0000"><strong>BE</strong> - Below Expectation</td>
                            <td bgcolor="#FFA500"><strong>APP</strong> - Aproaching Expectations</td>
                            <td bgcolor="#008000"><strong>MT</strong> - Meets Expectations</td>
                            <td bgcolor="#008000"><strong>EX</strong> - Exceeds Expectations</td>
                        </tr>
                    </table>
                    <div id="container" style="min-width: 310px; height: 500px; margin: 0 auto"></div>



                    <script type="text/javascript">

                        Highcharts.chart('container', {
                            chart: {
                                type: 'column'
                            },
                            title: {
                                text: 'Performance per unit for {{$subject_title}}'
                            },
                            subtitle: {
                                text: ''
                            },
                            xAxis: {
                                categories: [
                                    'Assessment 1',
                                    'Assessment 2',
                                    'Assessment 3',
                                    'Assessment 4'
                                ],
                                crosshair: true
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Performance (1- BE, 2 - APP, 3 - MT, EX - 4)'
                                }
                            },
                            tooltip: {
                                headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
                                pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
                                '<td style="padding:0"><b>{point.y:.1f} points</b></td></tr>',
                                footerFormat: '</table>',
                                shared: true,
                                useHTML: true
                            },
                            plotOptions: {
                                column: {
                                    pointPadding: 0.2,
                                    borderWidth: 0
                                }
                            },credits: {
                                enabled: false
                            },
                            series: [{
                                name: 'Reading, writing, comparing and calculating whole numbers up to 1 000000',
                                data: [1,2,3]

                            }, {
                                name: 'Addition and subtraction of integers',
                                data: [4,3,2]

                            }, {
                                name: 'Prime factorisation and divisibility tests',
                                data: [2,1,1]

                            }, {
                                name: 'Equivalent fractions and operations',
                                data: [2,3,4]

                            },{
                                name: 'Multiplication and division of decimals',
                                data: [1,2,3]

                            }, {
                                name: 'Application of direct proportions',
                                data: [4,3,2]

                            }, {
                                name: 'Solving problems involving measurements of length, capacity and mass.',
                                data: [4,1,1]

                            }, {
                                name: 'Solving problems involving time intervals',
                                data: [3,4,3]

                            }
                                ,{
                                    name: 'Money and its financial applications',
                                    data: [4,4,4]

                                }, {
                                    name: 'Sequences that include whole numbers, fractions and decimals.',
                                    data: [1,2,3]

                                }, {
                                    name: 'Drawing and constructing of angles.',
                                    data: [3,4,1]

                                }, {
                                    name: 'Interpreting and constructing scale',
                                    data: [1,1,1]

                                }, {
                                    name: 'Calculating circumference of a circle and volume of cuboids and cubes',
                                    data: [3,1,1]

                                }, {
                                    name: 'Statistics',
                                    data: [2,1,4]

                                }, {
                                    name: 'Probability',
                                    data: [3,2,1]

                                }]
                        });
                    </script>


                </div>

            </div>

        </div>

    </div>


@endsection