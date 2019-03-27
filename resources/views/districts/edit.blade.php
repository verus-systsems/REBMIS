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
                    <h3>Edit District</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">

                    <form action="{{ route('districts.update',$district->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>District:</strong>
                                    <div class="controls">
                                    <input type="text" name="district_name" value="{{ $district->district_name }}" class="span6" placeholder="District">
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Province:</strong>
                                    <div class="controls">
                                    <select name="province_id" id="province_id" class="span6">
                                        <option value="">Select Province</option>
                                        @foreach($provinces as $province)
                                            <option value="{{$province->id}}" @if ($province->id==$district->province_id) selected="selected" @endif>{{$province->province_name}}</option>

                                        @endforeach
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