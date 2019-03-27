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

    <div class="row">

        <div class="span6">
            <iframe width="100%" height="315px" src="https://www.youtube.com/embed/VE_RTj1TxWs" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>


        </div>

        <div class="span6">
            <div class="widget ">
                <div class="widget-header">
                    <i class="icon-question-sign"></i>
                    <h3>How to use this tool</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">

                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac rutrum erat, in consequat libero. Maecenas suscipit tortor ac ligula commodo rutrum. Nulla porta sapien diam, in pretium eros maximus nec. Vivamus at quam augue. Aenean non egestas ipsum. Pellentesque dapibus nisi eget eros pretium, in dignissim eros ultrices. Nulla eros risus, pellentesque id enim a</p>
                    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur ac rutrum erat, in consequat libero. Maecenas suscipit tortor ac ligula commodo rutrum. Nulla porta sapien diam, in pretium eros maximus nec. Vivamus at quam augue. Aenean non egestas ipsum. Pellentesque dapibus nisi eget eros pretium, in dignissim eros ultrices. Nulla eros risus, pellentesque id enim a</p>


                </div>

            </div>


        </div>

    </div>

    <div class="row">

        <div class="span6">
            <div class="widget ">
                <div class="widget-header">
                    <i class="icon-search"></i>
                    <h3>Search for resources</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">



                        {!! Form::open(array('route' => 'resources.searchresources','class'=>"form-inline",'method'=>'GET')) !!}

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

                            <div class="form-actions">
                                <button type="submit" class="btn btn-primary">SEARCH</button>
                            </div> <!-- /form-actions -->

                        {!! Form::close() !!}



                </div>

            </div>


        </div>

        <div class="span6">

            <div class="widget ">
                <div class="widget-header">
                    <i class="icon-bar-chart"></i>
                    <h3>Average Percentage Performance per Subject</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">

                    <div id="container" style="min-width: 310px; max-width: 800px; height: 100%; margin: 0 auto"></div>



                    <script type="text/javascript">

                        Highcharts.chart('container', {
                            chart: {
                                type: 'bar'
                            },
                            title: {
                                text: ''
                            },
                            subtitle: {
                                text: ''
                            },
                            xAxis: {
                                categories: ['Grade 1', 'Grade 2', 'Grade 3', 'Grade 4', 'Grade 5'],
                                title: {
                                    text: null
                                }
                            },
                            yAxis: {
                                min: 0,
                                title: {
                                    text: 'Percentage Performance',
                                    align: 'high'
                                },
                                labels: {
                                    overflow: 'justify'
                                }
                            },
                            tooltip: {
                                valueSuffix: ' %'
                            },
                            plotOptions: {
                                bar: {
                                    dataLabels: {
                                        enabled: true
                                    }
                                }
                            },

                            credits: {
                                enabled: false
                            },
                            series: [{
                                name: 'Mathematics',
                                data: [20, 31, 40, 45, 25]
                            }, {
                                name: 'English',
                                data: [50, 56, 60, 55, 50]
                            }, {
                                name: 'Kinyarwanda',
                                data: [80, 71, 86, 75, 70]
                            }, {
                                name: 'Science',
                                data: [20, 55, 44, 33, 40]
                            }]
                        });
                    </script>

                </div>

            </div>

        </div>

    </div>
@endsection