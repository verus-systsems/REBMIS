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
                    <h3>Show role</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">
                    <div class="row">
                        <div class="span12">
                            <div class="form-group">
                                <strong>Name:</strong>
                                {{ $role->name }}
                            </div>
                        </div>

                        <div class="span12">
                            <strong>Permissions:</strong>

                        </div>

                        @if(!empty($rolePermissions))
                            @foreach($rolePermissions as $v)
                                <div class="span2">
                                <label class="label label-success">{{ $v->name }},</label>
                                 </div>
                            @endforeach
                        @endif
                    </div>


                </div>
            </div>
        </div>

    </div>



@endsection