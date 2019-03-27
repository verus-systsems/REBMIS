@extends('template.default')


@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('users.index') }}"> Back</a>
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
                    <h3>Create new user</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">

                    {!! Form::open(array('route' => 'users.store','method'=>'POST')) !!}

                    <div class="control-group">
                        <label class="control-label" for="firstname">Name</label>
                        <div class="controls">
                            {!! Form::text('name', null, array('placeholder' => 'Name','class' => 'span6')) !!}
                        </div> <!-- /controls -->
                    </div> <!-- /control-group -->

                    <div class="control-group">
                        <label class="control-label" for="firstname">Email</label>
                        <div class="controls">
                            {!! Form::text('email', null, array('placeholder' => 'Email','class' => 'span6')) !!}
                        </div> <!-- /controls -->
                    </div> <!-- /control-group -->

                    <div class="control-group">
                        <label class="control-label" for="firstname">Password</label>
                        <div class="controls">
                            {!! Form::password('password', array('placeholder' => 'Password','class' => 'span6')) !!}
                        </div> <!-- /controls -->
                    </div> <!-- /control-group -->

                    <div class="control-group">
                        <label class="control-label" for="firstname">Confirm password</label>
                        <div class="controls">
                            {!! Form::password('confirm-password', array('placeholder' => 'Confirm Password','class' => 'span6')) !!}
                        </div> <!-- /controls -->
                    </div> <!-- /control-group -->

                    <div class="control-group">
                        <label class="control-label" for="firstname">Roles</label>
                        <div class="controls">
                            {!! Form::select('roles[]', $roles,[], array('class' => 'form-control','multiple')) !!}
                        </div> <!-- /controls -->
                    </div> <!-- /control-group -->




                    <div class="form-actions">
                        <button type="submit" class="btn btn-primary">Submit Record</button>
                    </div> <!-- /form-actions -->


                    {!! Form::close() !!}

                </div>

            </div>

        </div>

    </div>



@endsection