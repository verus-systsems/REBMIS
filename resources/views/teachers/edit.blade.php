@extends('template.default')


@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('schools.index') }}"> Back</a>
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
                    <h3>Edit school</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">

                    <form action="{{ route('schools.update',$school->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>School Name:</strong>
                                    <div class="controls">
                                    {!! Form::text('school_name', $school->school_name, array('placeholder' => '','class' => 'span6')) !!}
                                    </div>
                                </div>
                            </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Unique Identifier:</strong>
                                <div class="controls">
                                {!! Form::text('unique_identifier', $school->unique_identifier, array('placeholder' => '','class' => 'span6')) !!}
                                </div>
                            </div>
                        </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Sector:</strong>
                                    <div class="controls">
                                    <select name="sector_id" id="sector_id" class="span6">
                                        <option value="">Select Sector</option>
                                        @foreach($sectors as $sector)
                                            <option value="{{$sector->id}}" @if ($sector->id==$school->sector_id) selected="selected" @endif>{{$sector->sector_name}}</option>

                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Address:</strong>
                                    <div class="controls">
                                    {!! Form::text('address', $school->address, array('placeholder' => '','class' => 'span6')) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Postal Code:</strong>
                                    <div class="controls">
                                    {!! Form::text('postal_code', $school->postal_code, array('placeholder' => '','class' => 'span6')) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>City:</strong>
                                    <div class="controls">
                                    {!! Form::text('city', $school->city, array('placeholder' => '','class' => 'span6')) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Telephone:</strong>
                                    <div class="controls">
                                    {!! Form::text('telephone', $school->telephone, array('placeholder' => '','class' => 'span6')) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Email:</strong>
                                    <div class="controls">
                                    {!! Form::text('email', $school->email, array('placeholder' => '','class' => 'span6')) !!}
                                    </div>
                                </div>
                            </div>
                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Contact Name:</strong>
                                    <div class="controls">
                                    {!! Form::text('contact_name', $school->contact_name, array('placeholder' => '','class' => 'span6')) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Contact Telephone:</strong>
                                    <div class="controls">
                                    {!! Form::text('contact_telephone', $school->contact_telephone, array('placeholder' => '','class' => 'span6')) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Contact Email:</strong>
                                    <div class="controls">
                                    {!! Form::text('contact_email', $school->contact_email, array('placeholder' => '','class' => 'span6')) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Latitude:</strong>
                                    <div class="controls">
                                    {!! Form::text('lat', $school->lat, array('placeholder' => '','class' => 'span6')) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Longitude:</strong>
                                    <div class="controls">
                                    {!! Form::text('long', $school->long, array('placeholder' => '','class' => 'span6')) !!}
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Category:</strong>
                                    <div class="controls">
                                    <select name="type" id="type" class="span6">
                                        <option value="1" @if ($school->type==1) selected="selected" @endif>Private</option>
                                        <option value="2" @if ($school->type==2) selected="selected" @endif>Public</option>
                                    </select>
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