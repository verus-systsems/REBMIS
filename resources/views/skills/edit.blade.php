@extends('template.default')


@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('skills.index') }}"> Back</a>
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
                    <h3>Edit skill</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">

                    <form action="{{ route('skills.update',$skill->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Unit:</strong>
                                <div class="controls">
                                    <select name="unit_id" id="unit_id" class="span6">
                                        <option value="">Select Unit</option>
                                        @foreach($units as $unit)
                                            <option value="{{$unit->id}}" @if ($unit->id==$skill->unit_id) selected="selected" @endif>{{$unit->unit_name}}</option>

                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Skill:</strong>
                                <div class="controls">
                                {!! Form::text('skill', $skill->skill, array('placeholder' => '','class' => 'span6')) !!}
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