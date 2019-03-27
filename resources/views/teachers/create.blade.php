@extends('template.default')


@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('teachers.index') }}"> Back</a>
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
                    <h3>Create Teacher</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">

                    {!! Form::open(array('route' => 'teachers.store','method'=>'POST')) !!}

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Name:</strong>
                            <div class="controls">
                            {!! Form::text('name', null, array('placeholder' => '','class' => 'span6')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Service Number:</strong>
                            <div class="controls">
                                {!! Form::text('service_number', null, array('placeholder' => '','class' => 'span6')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>School:</strong>
                            <div class="controls">
                            <select name="school_id" id="school_id" class="selectpicker span6" data-live-search="true">
                                <option value="">Select School</option>
                                @foreach($schools as $school)
                                    <option value="{{$school->id}}">{{$school->school_name}}</option>

                                @endforeach
                            </select>
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Address:</strong>
                            <div class="controls">
                            {!! Form::text('address', null, array('placeholder' => '','class' => 'span6')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Postal Code:</strong>
                            <div class="controls">
                            {!! Form::text('postal_code', null, array('placeholder' => '','class' => 'span6')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>City:</strong>
                            <div class="controls">
                            {!! Form::text('city', null, array('placeholder' => '','class' => 'span6')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Telephone:</strong>
                            <div class="controls">
                            {!! Form::text('telephone', null, array('placeholder' => '','class' => 'span6')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Email:</strong>
                            <div class="controls">
                            {!! Form::text('email', null, array('placeholder' => '','class' => 'span6')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Highest Qualification:</strong>
                            <div class="controls">
                            {!! Form::text('highest_qualification', null, array('placeholder' => '','class' => 'span6')) !!}
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