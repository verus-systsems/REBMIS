@extends('theme.default')


@section('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>


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

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Question Management</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('questions.index') }}"> Back</a>
            </div>
        </div>
    </div>
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
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                   Edit Question
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <form action="{{ route('questions.update',$question->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <input type="hidden" name="id" value="{{$question->id}}">
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Grade:</strong>
                                    <select name="grade_id" id="grade_id" class="form-control" disabled="disabled">
                                        <option value="">Select Grade</option>
                                        @foreach($grades as $grade)
                                            <option value="{{$grade->id}}" @if ($grade->id==$question->topic->unit->subject->grade->id) selected="selected" @endif>{{$grade->grade_name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Subject:</strong>
                                    <div id = 'ajaxDiv'>
                                        <select name="subject_id" id="subject_id" class="form-control" disabled="disabled">
                                            @foreach($subjects as $subject)
                                                <option value="{{$subject->id}}" @if ($subject->id==$question->topic->unit->subject->id) selected="selected" @endif>{{$subject->subject_title}}</option>

                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Unit:</strong>
                                    <div id = 'unitDiv'>
                                        <select name="unit_id" id="unit_id" class="form-control" disabled="disabled">
                                            @foreach($units as $unit)
                                                <option value="{{$unit->id}}" @if ($unit->id==$question->topic->unit->id) selected="selected" @endif>{{$unit->unit_name}}</option>

                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Topic/Content:</strong>
                                    <div id = 'topicDiv'>
                                        <select name="topic_id" id="topic_id" class="form-control" disabled="disabled">
                                            @foreach($topics as $topic)
                                                <option value="{{$topic->id}}" @if ($topic->id==$question->topic->id) selected="selected" @endif>{{$topic->topic}}</option>

                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Question:</strong>
                                    {!! Form::text('question', $question->question, array('placeholder' => 'Enter the question','class' => 'form-control')) !!}
                                </div>
                            </div>
                            @if(!empty($question->image))
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <img src="{!! asset('public/files/'.$question->image.'') !!}" alt="" >
                            </div>
                            @endif

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Upload/Change Image:</strong>
                                    <input type="file" name="image" id="image" class="form-control">

                                    <input type="hidden" name="old_image" id="old_image" value="{{$question->image}}">
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">

                                <table class="table table-striped table-bordered table-hover">
                                    <thead>
                                        <tr>
                                            <th>Choice</th><th>Is correct</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    @foreach ($choices as $choice)

                                        <tr>
                                            <td>{{$choice->choice}}</td>
                                            <td>
                                                @if ($choice->correct_answer==1)
                                                    <i class="fa fa-check"></i>
                                                @else
                                                    <i class="fa fa-times"></i>
                                                @endif
                                            </td>
                                        </tr>

                                    @endforeach
                                    </tbody>


                                </table>

                            </div>


                            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>


                            </form>
                        </div>
                        <!-- /.col-lg-6 (nested) -->

                        <!-- /.col-lg-6 (nested) -->
                    </div>
                    <!-- /.row (nested) -->
                </div>
                <!-- /.panel-body -->
            </div>
            <!-- /.panel -->
        </div>
        <!-- /.col-lg-12 -->
    </div>



@endsection