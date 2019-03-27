@extends('template.default')


@section('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>


    <script language = "javascript" type = "text/javascript">
        <!--
        //Browser Support Code
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
            var queryString = "/" + result_id;
            ajaxRequest.open("GET", "<?php echo url('/'); ?>/questions/getsubjects" + queryString, true);
            ajaxRequest.send(null);
        }
        //-->
    </script>

    <script language = "javascript" type = "text/javascript">
        <!--
        //Browser Support Code
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

            var subject_id = document.getElementById('subject_id').value;
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

            var unit_id = document.getElementById('unit_id').value;
            var queryString = "/" + unit_id;
            ajaxRequest.open("GET", "<?php echo url('/'); ?>/questions/gettopics" + queryString, true);
            ajaxRequest.send(null);
        }
        //-->
    </script>

    <script type="text/javascript">

        $(document).ready(function(){

            var counter = 2;

            $("#addButton").click(function () {

                if(counter>10){
                    alert("Only 10 textboxes allow");
                    return false;
                }

                var newTextBoxDiv = $(document.createElement('div'))
                    .attr("id", 'TextBoxDiv' + counter);

                newTextBoxDiv.after().html('<div class="col-xs-12 col-sm-12 col-md-12">\n' +
                    '                                        <div class="form-group"><label>Choice #'+ counter + ' : </label>' +
                    '<input type="text" name="choice[]" id="textbox' + counter + '" value="" class="form-control" ></div></div>');

                newTextBoxDiv.appendTo("#TextBoxesGroup");


                counter++;
            });

            $("#removeButton").click(function () {
                if(counter==2){
                    alert("No more textbox to remove");
                    return false;
                }

                counter--;

                $("#TextBoxDiv" + counter).remove();

            });

            $("#getButtonValue").click(function () {

                var msg = '';
                for(i=1; i<counter; i++){
                    msg += "\n Textbox #" + i + " : " + $('#textbox' + i).val();
                }
                alert(msg);
            });
        });
    </script>

<script>
        $(document).ready(function() {
            var max_fields = 10;
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
                    <h3>Edit question</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">

                    <form action="{{ route('questiondatabanks.update',$questiondatabank->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{$questiondatabank->id}}">
                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Grade:</strong>
                                <div class="controls">
                                <select name="grade_id" id="grade_id" class="span6" disabled="disabled">
                                    <option value="">Select Grade</option>
                                    @foreach($grades as $grade)
                                        <option value="{{$grade->id}}" @if ($grade->id==$questiondatabank->grade_id) selected="selected" @endif>{{$grade->grade_name}}</option>

                                    @endforeach
                                </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Subject:</strong>
                                <div class="controls">
                                <select name="subject_id" id="subject_id" class="span6" disabled="disabled">
                                    @foreach($subjects as $subject)
                                        <option value="{{$subject->id}}" @if ($subject->id==$questiondatabank->subject_id) selected="selected" @endif>{{$subject->subject_title}}</option>

                                    @endforeach

                                </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Unit:</strong>
                                <div id = 'unitDiv'>
                                    <div class="controls">
                                    <select name="unit_id" id="unit_id" class="span6" disabled="disabled">
                                        @foreach($units as $unit)
                                            <option value="{{$unit->id}}" @if ($unit->id==$questiondatabank->unit_id) selected="selected" @endif>{{$unit->unit_name}}</option>

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
                                <textarea name="the_content" id="the_content" class="span6">{{$questiondatabank->content}}</textarea>
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
                                <textarea name="question" id="question" class="span6">{{$questiondatabank->question}}</textarea>
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
                                <textarea name="answer" id="answer" class="span6">{{$questiondatabank->answer}}</textarea>
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
                                {!! Form::text('result', $questiondatabank->results, array('placeholder' => '','class' => 'span6')) !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Guide on how to use the question:</strong>
                                <div class="controls">
                                    <textarea name="guide" id="guide" class="span6">{{$questiondatabank->guide}}</textarea>
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
                                    <textarea name="multimedia" id="multimedia" class="span6">{{$questiondatabank->multimedia}}</textarea>
                                </div>
                            </div>
                        </div>



                        <div class="form-actions">
                            <button type="submit" class="btn btn-primary">Submit</button>
                        </div>


                    </form>

                </div>

            </div>

        </div>

    </div>



@endsection