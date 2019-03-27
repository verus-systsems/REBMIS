@extends('template.default')


@section('content')


    <script>
        var $i = jQuery.noConflict();

        $i(function() {
            $i('#plan_start_date').datepick({dateFormat: 'yyyy-mm-dd'});
        });

        $i(function() {
            $i('#plan_end_date').datepick({dateFormat: 'yyyy-mm-dd'});
        });


    </script>



    <style>

        .anyClass {
            height:450px;
            overflow-y: scroll;
        }
    </style>

    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('actionplans.index') }}"><li class="icon-backward"></li> Back To Action Plan List</a>
            </div>
        </div>
    </div><br>


    <div class="row">

        <div class="span5">

            <div class="widget ">
                <div class="widget-header">
                    <i class="icon-eye-open"></i>
                    <h3>Observations on the student by different teachers</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content anyClass">

                    @foreach ($observations as $observation)
                    <p><strong>Subject:</strong> {{ $observation->subject->subject_title }}<br>
                       <strong>Unit:</strong> {{ $observation->unit->unit_name }}<br>
                        <strong>Performance:  @if ($observation->rating==1)
                                <font color="#ff0000"> BE - Below Expectations</font>
                            @elseif($observation->rating==2)
                                <font color="#FFA500"> APP - Approaching Expectations</font>
                            @elseif($observation->rating==3)
                                <font color="#008000">MT - Meets Expectations</font>
                            @else
                                <font color="#008000">EX - Exceeds Expectations</font>
                            @endif</strong><br>
                        {{$observation->observations}}<br>
                        <small><i>Assessment done on {{$observation->created_at}} by teacher  {{$observation->user->name}}</i></small><br>
                        <hr>
                    </p>
                    @endforeach


                </div>

            </div>




        </div>

        <div class="span7">

            <div class="widget ">
                <div class="widget-header">
                    <i class="icon-list"></i>
                    <h3>Comments and observations</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">
                <p><strong>Student:</strong> {{ $actionplan->student->student_name }}, <strong>Grade:</strong> {{ $actionplan->grade->grade_name }}, <strong>Subject:</strong> {{ $actionplan->subject->subject_title }}, <strong>Unit:</strong> {{ $actionplan->unit->unit_name }},
                    <strong>Performance:
                    @if ($actionplan->rating==1)
                        <font color="#ff0000"> BE - Below Expectations</font>
                    @elseif($actionplan->rating==2)
                       <font color="#FFA500"> APP - Approaching Expectations</font>
                    @elseif($actionplan->rating==3)
                        <font color="#008000">MT - Meets Expectations</font>
                    @else
                        <font color="#008000">EX - Exceeds Expectations</font>
                    @endif</strong><br>
                <strong>Observations:</strong>{{$actionplan->observations}}<br>
                <strong>Action plan:</strong> {{$actionplan->action_plan}} [<strong>From:</strong> {{ $actionplan->plan_start_date }} <strong>To:</strong> {{ $actionplan->plan_end_date }}]
                </p>
                </div>

            </div>

            <div class="widget ">
                <div class="widget-header">
                    <i class="icon-pencil"></i>
                    <h3>Update Status as of Today</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">
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

                    <form action="{{ route('actionplans.update',$actionplan->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <input type="hidden" name="student_id" value="{{$actionplan->student_id}}">
                        <input type="hidden" name="actionplan_id" value="{{$actionplan->id}}">

                    <div class="row">
                        <div class="span12">

                            <div class="control-group">
                                <label class="control-label" for="firstname">Status</label>
                                <div class="controls">
                                    <textarea name="status" id="status" class="span6"></textarea>
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

                        <div class="span12">

                            <div class="control-group">
                                <label class="control-label" for="firstname">Trimester</label>
                                <div class="controls">
                                    <select name="semester_id" class="span6">
                                        @foreach($semesters as $semester)
                                            <option value="{{$semester->id}}">{{$semester->semester}}</option>

                                        @endforeach
                                    </select>
                                </div> <!-- /controls -->
                            </div> <!-- /control-group -->

                        </div>


                    </div>


                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Upload Record</button>
                    </div> <!-- /form-actions -->

                    </form>

                </div>

            </div>


        </div>

    </div>

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
                    <i class="icon-list"></i>
                    <h3>Progress update status</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">
                    <table class="table table-striped table-bordered table-hover">
                        <thead>
                        <tr>
                            <th>No</th>
                            <th>Status</th>
                            <th>Performance</th>
                            <th>Status Date</th>

                        </tr>
                        </thead>

                        @foreach ($planupdates as $planupdate)
                            <tr>
                                <td>{{ ++$i }}</td>
                                <td>{{$planupdate->status}}</td>
                                <td>
                                    @if ($planupdate->rating==1)
                                        BE - Below Expectations
                                    @elseif($planupdate->rating==2)
                                        APP - Approaching Expectations
                                    @elseif($planupdate->rating==3)
                                        MT - Meets Expectations
                                    @else
                                        EX - Exceeds Expectations
                                    @endif

                                </td>
                                <td>{{$planupdate->status_date}}</td>
                            </tr>

                        @endforeach
                    </table>
                </div>

            </div>

        </div>
    </div>

@endsection