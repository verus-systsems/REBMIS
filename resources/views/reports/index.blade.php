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

        function ajaxFunction(){
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
                    var ajaxDisplay = document.getElementById('ajaxDiv');
                    ajaxDisplay.innerHTML = ajaxRequest.responseText;
                }
            }

            // Now get the value from user and pass it to
            // server script.

            var result_id = document.getElementById('grade_id').value;
            var grade_id = 0;

            if(isEmpty(result_id)) {
                grade_id = 0;
            } else {
                grade_id = result_id;
            }
            var queryString = "/" + grade_id;
            ajaxRequest.open("GET", "<?php echo url('/'); ?>/actionplans/getsubjects" + queryString, true);
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


    <div class="row">


        <div class="span12">
            <div class="widget ">
                <div class="widget-header">
                    <i class="icon-search"></i>
                    <h3>Overall Student performance</h3>
                </div> <!-- /widget-header -->
                <div class="widget-content">

                       {!! Form::open(array('route' => 'reports.searchstudentresults','class'=>"form-inline",'method'=>'POST')) !!}

                        <div class="span3">

                            <div class="control-group">
                                <label class="control-label" for="firstname">Student</label>
                                <div class="controls">

                                    <input type="text" name="unique_identifier" id="unique_identifier" placeholder="Enter Student Unique Identifier" class="span3" required="required">

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
                    <i class="icon-search"></i>
                    <h3>Student performance per Subject</h3>
                </div> <!-- /widget-header -->
                <div class="widget-content">

                    {!! Form::open(array('route' => 'reports.studentresults','class'=>"form-inline",'method'=>'POST')) !!}

                    <div class="span3">

                        <div class="control-group">
                            <label class="control-label" for="firstname">Student</label>
                            <div class="controls">

                                <input type="text" name="unique_identifier" id="unique_identifier" placeholder="Enter Student Unique Identifier" class="span3" required="required">

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

                    </div><br>


                    <div class="span3">

                        <button type="submit" class="btn btn-primary">GET STUDENT PERFORMANCE</button>

                    </div>

                    {!! Form::close() !!}

                </div>

            </div>

        </div>


    </div>
@endsection