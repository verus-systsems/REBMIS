@extends('template.default')


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


    <div class="row">
        <div class="pull-right">

                <a class="btn btn-success"g href="{{ route('questiondatabanks.create') }}"> Create New Question</a>

        </div>
    </div><br>

      <div class="row">

          <div class="span12">
              <div class="widget ">
                  <div class="widget-header">
                      <i class="icon-list"></i>
                      <h3>Questions Data Bank</h3>
                  </div> <!-- /widget-header -->
                  <div class="widget-content">

                      <div class="table-responsive">

                          <table class="table table-striped table-bordered table-hover">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Question</th>
                                  <th>Unit</th>
                                  <th>Subject</th>
                                  <th>Grade</th>
                                  <th>Approved</th>
                                  <th>Action</th>
                              </tr>
                              </thead>
                              @foreach ($questions as $question)
                                  <tr>
                                      <td>{{ ++$i }}</td>
                                      <td> {!! $question->question !!}</td>
                                      <td>{{ $question->unit->unit_name }}</td>
                                      <td>{{ $question->subject->subject_title }}</td>
                                      <td>{{ $question->grade->grade_name }}</td>
                                      <td>
                                      @if($question->approved==1)
                                              <i class="icon-ok"></i>
                                      @else
                                              <i class="icon-remove"></i>
                                      @endif
                                      </td>
                                      <td>
                                          <form id="action-form" action="{{ route('questiondatabanks.destroy',$question->id) }}" method="POST">


                                                  <a class="btn btn-small btn-success" href="{{ route('questiondatabanks.edit',$question->id) }}" ><i class="icon-edit"></i></a>

                                              @csrf
                                              @method('DELETE')
                                              @can('academics-manage')


                                              <!-- <a class="text-danger delete" href="{{ route('questions.destroy',$question->id) }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('action-form').submit();" style="font-size:24px"><i class="fa fa-trash"></i></a>-->


                                              @endcan
                                          </form>
                                      </td>
                                  </tr>
                                  @endforeach

                                  </tbody>
                          </table>

                          <div class="span12">

                          {!! $questions->render() !!}

                          </div>

                      </div>

                  </div>

              </div>

          </div>


    </div>



@endsection