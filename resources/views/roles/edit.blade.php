@extends('template.default')


@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('roles.index') }}"> Back</a>
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
                    <h3>Edit role</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">

                    {!! Form::model($role, ['method' => 'PATCH','route' => ['roles.update', $role->id]]) !!}

                    <div class="control-group">
                        <label class="control-label" for="firstname">Name</label>
                        <div class="controls">
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'span6')) !!}
                        </div> <!-- /controls -->
                    </div> <!-- /control-group -->

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Permission:</strong>
                            <br/>

                            <div id="" style="overflow:scroll; height:250px;">

                                    @foreach($permission as $value)
                                        <label class="checkbox inline">{{ Form::checkbox('permission[]', $value->id, in_array($value->id, $rolePermissions) ? true : false, array('class' => 'name')) }}
                                            {{ $value->name }}</label>
                                        <br/>
                                    @endforeach
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Update Record</button>
                    </div> <!-- /form-actions -->

                    {!! Form::close() !!}

                </div>
            </div>
        </div>

    </div>



@endsection