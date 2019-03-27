@extends('template.default')


@section('content')
   <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('subjects.index') }}"> Back</a>
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
                    <h3>New grade subject</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">

                    {!! Form::open(array('route' => 'subjects.store','method'=>'POST')) !!}


                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Subject:</strong>
                            <div class="controls">
                                <select name="studyfield_id" id="studyfield_id" class="span6">
                                    @foreach($studyfields as $studyfield)
                                        <option value="{{$studyfield->id}}">{{$studyfield->study_field}}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Grade:</strong>
                            <div class="controls">
                                <select name="grade_id" id="grade_id" class="span6">
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
                            <strong>Grade Subject Title:</strong>
                            <div class="controls">
                            {!! Form::text('subject_title', null, array('placeholder' => '','class' => 'span6')) !!}
                            </div>
                        </div>
                    </div>



                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Description:</strong>
                            <div class="controls">
                            <textarea name="description" id="description" class="span6"></textarea>
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