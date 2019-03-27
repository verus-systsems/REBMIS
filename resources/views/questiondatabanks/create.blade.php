@extends('template.default')


@section('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>


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

            var grade_id = 0; // Empty Object
            if(isEmpty(result_id)) {
                grade_id = 0;
            } else {
                grade_id = result_id;
            }

            var queryString = "/" + grade_id;
            ajaxRequest.open("GET", "<?php echo url('/'); ?>/questions/getsubjects" + queryString, true);
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

            var subj_id = document.getElementById('subject_id').value;

            var subject_id = 0; // Empty Object
            if(isEmpty(subj_id)) {
                subject_id = 0;
            } else {
                subject_id = subj_id;
            }

            var queryString = "/" + subject_id;
            ajaxRequest.open("GET", "<?php echo url('/'); ?>/questions/getunits" + queryString, true);
            ajaxRequest.send(null);
        }
        //-->
    </script>

    <script language = "javascript" type = "text/javascript">
        <!--
        //Browser Support Code
        function topicFunction(){
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
                    var ajaxDisplay = document.getElementById('topicDiv');
                    ajaxDisplay.innerHTML = ajaxRequest.responseText;
                }
            }

            // Now get the value from user and pass it to
            // server script.

            var unt_id = document.getElementById('unit_id').value;

            var unit_id = 0; // Empty Object
            if(isEmpty(unt_id)) {
                unit_id = 0;
            } else {
                unit_id = unt_id;
            }
            var queryString = "/" + unit_id;
            ajaxRequest.open("GET", "<?php echo url('/'); ?>/questions/gettopics" + queryString, true);
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

        function skillFunction(){
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
                    var ajaxDisplay = document.getElementById('skillDiv');
                    ajaxDisplay.innerHTML = ajaxRequest.responseText;
                }
            }

            // Now get the value from user and pass it to
            // server script.

            var unt_id = document.getElementById('unit_id').value;

            var unit_id = 0; // Empty Object
            if(isEmpty(unt_id)) {
                unit_id = 0;
            } else {
                unit_id = unt_id;
            }

            var queryString = "/" + unit_id;
            ajaxRequest.open("GET", "<?php echo url('/'); ?>/questions/getskills" + queryString, true);
            ajaxRequest.send(null);
        }
        //-->
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
    </style>


    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('questiondatabanks.index') }}"> Back</a>
            </div>
        </div>
    </div>
    <br>
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

    <div class="row">



        <div class="span12">
            <div class="widget ">
                <div class="widget-header">
                    <i class="icon-pencil"></i>
                    <h3>Create new question</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">

                    {!! Form::open(array('route' => 'questiondatabanks.store','method'=>'POST','enctype'=>'multipart/form-data')) !!}


                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Grade:</strong>
                            <div class="controls">
                            <select name="grade_id" id="grade_id" class="span6" onChange="ajaxFunction()" required="required">
                                <option value="">Select Grade</option>
                                @foreach($grades as $grade)
                                    <option value="{{$grade->id}}">{{$grade->grade_name}}</option>

                                @endforeach
                            </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Subject:</strong>
                            <div class="controls">
                            <div id = 'ajaxDiv'>
                                <select name="subject_id" id="subject_id" class="span6" onChange="unitFunction()" required="required">
                                    <option value="">Select Subject</option>

                                </select>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Unit:</strong>
                            <div class="controls">
                            <div id = 'unitDiv'>
                                <select name="unit_id" id="unit_id" class="span6" onChange="skillFunction()" required="required">
                                    <option value="">Select Unit</option>

                                </select>
                            </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Skill:</strong>
                            <div class="controls">
                                <div id = 'skillDiv'>
                                    <select name="skill_id" id="skill_id" class="span6" required="required">
                                        <option value="">Select Skill</option>

                                        @foreach($skills as $skill)
                                            <option value="{{$skill->id}}">{{$skill->skill}}</option>

                                        @endforeach


                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Content:</strong>
                            <div class="controls">
                            <textarea name="the_content" id="the_content" class="form-control"></textarea>
                            </div>

                            <script>

                                $('#the_content').summernote({
                                    height: 200,


                                });


                            </script>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Question:</strong>
                            <div class="controls">
                            <textarea name="question" id="question" class="form-control"></textarea>
                            </div>

                            <script>

                                $('#question').summernote({
                                    height: 200,


                                });


                            </script>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Answer:</strong>
                            <div class="controls">
                            <textarea name="answer" id="answer" class="form-control"></textarea>
                            </div>

                            <script>

                                $('#answer').summernote({
                                    height: 200,


                                });


                            </script>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Result/Score:</strong>
                            <div class="controls">
                            {!! Form::text('result', null, array('placeholder' => '','class' => 'span6')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Guide on how to use the question:</strong>
                            <div class="controls">
                                <textarea name="guide" id="guide" class="form-control"></textarea>
                            </div>

                            <script>

                                $('#guide').summernote({
                                    height: 200,


                                });


                            </script>
                        </div>
                    </div>

                    <h3>UPLOAD TOOLS (HOW-TOs &amp; MULTI MEDIA RESOURCES)</h3>
                    <div class="container1">
                        <button class="add_form_field">Add New Tool &nbsp;
                            <span style="font-size:16px; font-weight:bold;">+ </span>
                        </button><br>
                        <div>

                            <input type="file" name="filenames[]">

                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Embed Video/Multimedia Resource:</strong>
                            <div class="controls">
                                <textarea name="multimedia" id="multimedia" class="span6"></textarea>
                            </div>
                        </div>
                    </div>



                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>


                    {!! Form::close() !!}

                </div>

            </div>

        </div>

    </div>

@endsection