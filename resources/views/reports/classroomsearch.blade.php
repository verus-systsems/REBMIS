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

        function districtsectorFunction(){
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
                    var ajaxDisplay = document.getElementById('sectDIV');
                    ajaxDisplay.innerHTML = ajaxRequest.responseText;
                }
            }

            // Now get the value from user and pass it to
            // server script.

            var result_id = document.getElementById('districtID').value;
            var district_id = 0;

            if(isEmpty(result_id)) {
                grade_id = 0;
            } else {
                district_id = result_id;
            }
            var queryString = "/" + district_id;
            ajaxRequest.open("GET", "<?php echo url('/'); ?>/sectors/districtsectors" + queryString, true);
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

        function sectorschoolFunction(){
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
                    var ajaxDisplay = document.getElementById('myDIV');
                    ajaxDisplay.innerHTML = ajaxRequest.responseText;
                }
            }

            // Now get the value from user and pass it to
            // server script.

            var result_id = document.getElementById('sectorID').value;
            var sector_id = 0;

            if(isEmpty(result_id)) {
                sector_id = 0;
            } else {
                sector_id = result_id;
            }
            var queryString = "/" + sector_id;
            ajaxRequest.open("GET", "<?php echo url('/'); ?>/sectors/sectorschools" + queryString, true);
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
            <div class="widget ">
                <div class="widget-header">
                    <i class="icon-search"></i>
                    <h3>Search classroom subject unit performance</h3>
                </div> <!-- /widget-header -->
                <div class="widget-content">

                    {!! Form::open(array('route' => 'reports.searchclassroomunit','class'=>"form-inline",'method'=>'POST')) !!}

                    <div class="span3">

                        <div class="control-group">
                            <label class="control-label" for="firstname">District</label>
                            <div class="controls">

                                <select name="districtID" id="districtID" class="span3" onChange="districtsectorFunction()" required="required">
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
                                <div id="sectDIV">

                                    <select name="sectorID" id="sectorID" class="span3" required="required">
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
                                <div id="myDIV">

                                    <select name="schoolID" id="schoolID" class="span3" required="required">
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

                        <div class="control-group">
                            <label class="control-label" for="firstname">&nbsp;</label>
                            <div class="controls">

                                <button type="submit" class="btn btn-primary">GET CLASSROOM PERFORMANCE</button>

                            </div> <!-- /controls -->
                        </div> <!-- /control-group -->

                    </div>



                    {!! Form::close() !!}

                </div>

            </div>

        </div>


    </div>
@endsection