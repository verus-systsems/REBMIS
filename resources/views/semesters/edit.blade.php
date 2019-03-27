@extends('template.default')


@section('content')

    <script>
        var $i = jQuery.noConflict();

        $i(function() {
            $i('#start_date').datepick({dateFormat: 'yyyy-mm-dd'});
        });

        $i(function() {
            $i('#end_date').datepick({dateFormat: 'yyyy-mm-dd'});
        });


    </script>

    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('semesters.index') }}"> Back</a>
            </div>
        </div>
    </div><br>
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
                    <h3>Edit Trimester</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">
                    <form action="{{ route('semesters.update',$semester->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                    <div class="span12">

                        <div class="control-group">
                            <label class="control-label" for="firstname">Trimester</label>
                            <div class="controls">
                                {!! Form::text('semester', $semester->semester, array('placeholder' => '','class' => 'span6')) !!}
                            </div> <!-- /controls -->
                        </div> <!-- /control-group -->

                    </div>

                    <div class="span12">

                        <div class="control-group">
                            <label class="control-label" for="firstname">Year</label>
                            <div class="controls">
                                {!! Form::select('semester_year', $years,$semester->semester_year,['class' => 'span6']) !!}
                            </div> <!-- /controls -->
                        </div> <!-- /control-group -->

                    </div>

                    <div class="span12">

                        <div class="control-group">
                            <label class="control-label" for="firstname">Start Date</label>
                            <div class="controls">
                                <div class="input-prepend input-append">
                                    <input type="text" id="start_date" name="start_date" value="{{$semester->start_date}}">
                                    <span class="add-on"><i class="icon-calendar"></i></span>
                                </div>
                            </div>	<!-- /controls --><!-- /controls -->
                        </div> <!-- /control-group -->

                    </div>

                    <div class="span12">

                        <div class="control-group">
                            <label class="control-label" for="firstname">End Date</label>
                            <div class="controls">
                                <div class="input-prepend input-append">
                                    <input type="text" id="end_date" name="end_date" value="{{$semester->end_date}}">
                                    <span class="add-on"><i class="icon-calendar"></i></span>
                                </div>
                            </div>	<!-- /controls --><!-- /controls -->
                        </div> <!-- /control-group -->

                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>


                    </form>

                </div>

            </div>

        </div>

    </div>



@endsection