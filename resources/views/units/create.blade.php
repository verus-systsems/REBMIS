@extends('template.default')


@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('units.index') }}"> Back</a>
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
                    <h3>Add unit</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">

                    {!! Form::open(array('route' => 'units.store','method'=>'POST')) !!}

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Unit:</strong>
                            <div class="controls">
                            {!! Form::text('unit_name', null, array('placeholder' => '','class' => 'span6')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Subject:</strong>
                            <div class="controls">
                            <select name="subject_id" id="subject_id" class="span6">
                                <option value="">Select Subject</option>
                                @foreach($subjects as $subject)
                                    <option value="{{$subject->id}}">{{$subject->subject_title}}</option>

                                @endforeach
                            </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>No. of Periods:</strong>
                            <div class="controls">
                                {!! Form::text('number_of_periods', null, array('placeholder' => '','class' => 'span6')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Key Unit Competence:</strong>
                            <div class="controls">
                            <textarea name="kuc" id="kuc" class="span6"></textarea>
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Assessment Criteria:</strong>
                            <div class="controls">
                            <textarea name="ac" id="ac" class="span6"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Standard(s):</strong>
                            <div class="controls">
                                <textarea name="standard" id="standard" class="span6"></textarea>
                            </div>
                        </div>
                    </div>


                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Unit Level:</strong>
                            <div class="controls">
                            <select name="unit_level" id="unit_level" class="span6">
                                <option value="1">First Unit</option>
                                <option value="2">Middle Unit</option>
                                <option value="3">Other Unit</option>

                            </select>
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