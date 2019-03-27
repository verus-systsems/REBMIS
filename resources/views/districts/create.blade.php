@extends('template.default')


@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('districts.index') }}"> Back</a>
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
                    <h3>Create District</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">

                    {!! Form::open(array('route' => 'districts.store','method'=>'POST')) !!}

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>District:</strong>
                            <div id="controls">
                            {!! Form::text('district_name', null, array('placeholder' => 'District','class' => 'span6')) !!}
                            </div>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Province:</strong>
                            <div id="controls">
                                <select name="province_id" id="province_id" class="span6">
                                <option value="">Select Province</option>
                                @foreach($provinces as $province)
                                    <option value="{{$province->id}}">{{$province->province_name}}</option>

                                @endforeach
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