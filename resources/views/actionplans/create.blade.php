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

        function unitFunction(){
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
                    var ajaxDisplay = document.getElementById('unitDiv');
                    ajaxDisplay.innerHTML = ajaxRequest.responseText;
                }
            }

            // Now get the value from user and pass it to
            // server script.

            var sbj_id = document.getElementById('subject_id').value;
            var subject_id = 0;

            if(isEmpty(sbj_id)) {
                subject_id = 0;
            } else {
                subject_id = sbj_id;
            }

            var queryString = "/" + subject_id;
            ajaxRequest.open("GET", "<?php echo url('/'); ?>/actionplans/getunits" + queryString, true);
            ajaxRequest.send(null);
        }
        //-->
    </script>

    <script>
        var $i = jQuery.noConflict();

        $i(function() {
            $i('#plan_start_date').datepick({dateFormat: 'yyyy-mm-dd'});
        });

        $i(function() {
            $i('#plan_end_date').datepick({dateFormat: 'yyyy-mm-dd'});
        });


    </script>


    <script>
        $(document).ready(function() {
            var max_fields = 5;
            var wrapper = $(".container1");
            var add_button = $(".add_form_field");

            var x = 1;
            $(add_button).click(function(e) {
                e.preventDefault();
                if (x < max_fields) {
                    x++;
                    $(wrapper).append('<div><input type="file" name="filenames[]"/><a href="#" class="delete">Delete</a></div>'); //add input box
                } else {
                    alert('You Reached the limits')
                }
            });

            $(wrapper).on("click", ".delete", function(e) {
                e.preventDefault();
                $(this).parent('div').remove();
                x--;
            })
        });
    </script>

    <style>
        .add_form_field
        {
            background-color: #1c97f3;
            border: none;
            color: white;
            padding: 8px 32px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 16px;
            margin: 4px 2px;
            cursor: pointer;
            border:1px solid #186dad;
        }

        .delete{
            background-color: #fd1200;
            border: none;
            color: white;
            padding: 5px 15px;
            text-align: center;
            text-decoration: none;
            display: inline-block;
            font-size: 14px;
            margin: 4px 2px;
            cursor: pointer;
        }

        .anyClass {
            height:300px;
            overflow-y: scroll;
        }
    </style>


    <div class="row">

        <div class="span5">
            <!--<div class="widget ">
                <div class="widget-header">
                    <i class="icon-user"></i>
                    <h3>Profile</h3>
                </div>

                <div class="widget-content">

                    <table cellspacing="2" cellpadding="2">
                        <tr><td valign="top"><img src="img/avatar-colored-d.png" class="avatar"></td><td>
                                <p class="news-item-title">Brief description of yourself</p>

                                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac rutrum erat, in consequat libero. Maecenas suscipit tortor ac ligula commodo rutrum. Nulla porta sapien diam, in pretium eros maximus nec. Vivamus at quam augue. Aenean non egestas ipsum. Pellentesque dapibus nisi eget eros pretium, in dignissim eros ultrices. Nulla eros risus, pellentesque id enim a</p>

                                <p><a href="#">Update your profile</a> </p>
                            </td></tr>
                    </table>


                </div>

            </div>-->

            <div class="widget ">
                <div class="widget-header">
                    <i class="icon-question-sign"></i>
                    <h3>How to upload student observations</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content anyClass">
                    <p><strong>BE - Below Expectation:</strong>
                   <ul>
                        <li>The student did not consistently meet the unit standards</li>
                        <li>Performance needs improvement in areas of consistent weakness</li>
                        <li>Student requires close supervision to meet expectations</li>
                        <li>If student fails to improve, corrective action may be recommended</li>

                    </ul>
                   </p>
                    <p>
                        <strong>APP- Aproaching Expectations:</strong>
                        <ul>
                        <li>Student progressively met the unit standards</li>
                        <li>Student recognized and adjusted well to changes in assignments and assessments</li>
                        <li>Solid, good performance was the student's norm</li>


                    </ul>
                    </p>

                    <p>
                        <strong>MT - Meets Expectations:</strong>
                        <ul>
                        <li>Student met and periodically exceeded the unit standards</li>
                        <li>Student achieved results above expectations</li>
                        <li>Student showed exceptional performance and effort from time to time</li>
                        <li>Performance is sustained and uniformly high with thorough and exeptional results</li>

                    </ul>
                    </p>

                    <p>
                        <strong>EX - Exceeds Expectations:</strong>
                        <ul>
                        <li>Student clearly and consistently exceeded the unit standards</li>
                        <li>Exceptional performance and effort was the student's norm</li>
                        <li>Student achieved results well beyond expectations</li>
                        <li>Student provided unique, innovative and workable solutions to assessments administered</li>

                    </ul>
                    </p>


                </div>

            </div>


            <div class="widget ">
                <div class="widget-header">
                    <i class="icon-list"></i>
                    <h3>Upcoming Action Items</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">

                    <table class="table table-striped table-bordered">
                        <thead>
                        <tr>
                            <th>Student</th>
                            <th>Grade/Subject</th>
                            <th>Date</th>
                            <th class="td-actions"> </th>
                        </tr>
                        </thead>
                        <tbody>
                        @foreach ($actionplans as $actionplan)
                        <tr>
                            <td>{{ $actionplan->student->student_name }}</td><td>{{ $actionplan->grade->grade_name }}, {{ $actionplan->subject->subject_title }}</td><td>{{ $actionplan->plan_end_date }}</td>
                            <td class="td-actions"><a href="{{ route('actionplans.edit',$actionplan->id) }}" class="btn btn-small btn-success"><i class="btn-icon-only icon-tasks"> </i></a></td>
                        </tr>
                        @endforeach

                        </tbody>
                    </table>

                </div>

            </div>

        </div>

        <div class="span7">
            <div class="widget ">
                <div class="widget-header">
                    <i class="icon-pencil"></i>
                    <h3>Upload Student Record</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">

                       {!! Form::open(array('route' => 'actionplans.store','class'=>"form-inline",'method'=>'POST')) !!}

                        <div class="row">
                            @if (count($errors) > 0)
                                <div class="alert alert-danger">
                                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="span3">

                                <div class="control-group">
                                    <label class="control-label" for="firstname">Grade</label>
                                    <div class="controls">

                                        <select name="grade_id" id="grade_id" class="span3" onChange="ajaxFunction()" required="required">
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
                                        <div id = 'ajaxDiv'>
                                            <select name="subject_id" id="subject_id" class="span3" onChange="unitFunction()" required="required">
                                                <option value="">Select Subject</option>

                                            </select>
                                        </div>

                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                            </div>

                            <div class="span3">

                                <div class="control-group">
                                    <label class="control-label" for="firstname">Unit</label>
                                    <div class="controls">
                                        <div id = 'unitDiv'>
                                            <select name="unit_id" id="unit_id" class="span3" required="required">
                                                <option value="">Select Unit</option>

                                            </select>
                                        </div>
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                            </div>

                            <div class="span3">

                                <div class="control-group">
                                    <label class="control-label" for="firstname">Student</label>
                                    <div class="controls">
                                        <select name="student_id" class="selectpicker span3" data-live-search="true">
                                            <option value="">Search Student</option>
                                            @foreach($students as $student)
                                                <option value="{{$student->id}}">{{$student->student_name}}</option>

                                            @endforeach
                                        </select>
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                            </div>

                            <div class="span12">

                                <div class="control-group">
                                    <label class="control-label" for="firstname">Performance</label>
                                    <div class="controls">
                                        <select name="rating" class="span6">
                                            <option value="1">BE - Below Expectations</option>
                                            <option value="2">APP - Approaching Expectations</option>
                                            <option value="3">MT - Meets Expectations</option>
                                            <option value="4">EX - Exceeds Expectations</option>
                                        </select>
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                            </div>

                                <div class="span3">

                                    <div class="control-group">
                                        <label class="control-label" for="firstname">Trimester</label>
                                        <div class="controls">
                                            <select name="semester_id" class="span6">
                                               @foreach($semesters as $semester)
                                                    <option value="{{$semester->id}}">{{$semester->semester}} </option>

                                                @endforeach
                                            </select>
                                        </div> <!-- /controls -->
                                    </div> <!-- /control-group -->

                                </div>

                            <div class="span12">

                                <div class="control-group">
                                    <label class="control-label" for="firstname">Observations</label>
                                    <div class="controls">
                                        <textarea name="observations" id="observations" class="span6"></textarea>
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                            </div>

                            <div class="span12">

                                <div class="control-group">
                                    <label class="control-label" for="firstname">Please enter your action plans to address the above observation</label>
                                    <div class="controls">
                                        <textarea name="action_plan" id="action_plan" class="span6"></textarea>
                                    </div> <!-- /controls -->
                                </div> <!-- /control-group -->

                            </div>

                            <div class="span3">

                                <div class="control-group">
                                    <label class="control-label" for="firstname">Start Date</label>
                                    <div class="controls">
                                        <div class="input-prepend input-append">
                                            <input type="text" id="plan_start_date" name="plan_start_date">
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                        </div>
                                    </div>	<!-- /controls --><!-- /controls -->
                                </div> <!-- /control-group -->

                            </div>

                            <div class="span3">

                                <div class="control-group">
                                    <label class="control-label" for="firstname">End Date</label>
                                    <div class="controls">
                                        <div class="input-prepend input-append">
                                            <input type="text" id="plan_end_date" name="plan_end_date">
                                            <span class="add-on"><i class="icon-calendar"></i></span>
                                        </div>
                                    </div>	<!-- /controls --><!-- /controls -->
                                </div> <!-- /control-group -->

                            </div>

                            <div class="span12">

                              <h4>Select file to upload (Optional)</h4>

                            </div>

                            <div class="span12">
                                <div class="container1">
                                    <button class="add_form_field">Add New File &nbsp;
                                        <span style="font-size:16px; font-weight:bold;">+ </span>
                                    </button><br>
                                    <div>

                                        <input type="file" name="filenames[]">

                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Upload Record</button>
                        </div> <!-- /form-actions -->

                {!! Form::close() !!}


                </div>

            </div>


        </div>

    </div>



@endsection