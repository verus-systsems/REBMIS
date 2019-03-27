@extends('template.default')


@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('studyfields.index') }}"> Back</a>
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
                    <h3>Edit subject</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">

                    <form action="{{ route('studyfields.update',$studyfield->id) }}" method="POST">
                        @csrf
                        @method('PUT')


                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Subject:</strong>
                                    <div class="controls">
                                    <input type="text" name="study_field" value="{{ $studyfield->study_field }}" class="span6">
                                    </div>
                                </div>
                            </div>


                            <div class="form-control">
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </div>

                    </form>

                </div>

            </div>
        </div>

    </div>



@endsection