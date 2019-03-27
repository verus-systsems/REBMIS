@extends('template.default')


@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('subjects.index') }}"> Back</a>
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
                    <h3>Edit grade subject</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">

                    <form action="{{ route('subjects.update',$subject->id) }}" method="POST">
                        @csrf
                        @method('PUT')


                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Grade Subject:</strong>
                                    <div class="controls">
                                    <input type="text" name="subject_title" value="{{ $subject->subject_title }}" class="span6" placeholder="District">
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Grade:</strong>
                                    <div class="controls">
                                    <select name="grade_id" id="grade_id" class="span6">
                                        <option value="">Select Grade</option>
                                        @foreach($grades as $grade)
                                            <option value="{{$grade->id}}" @if ($grade->id==$subject->grade_id) selected="selected" @endif>{{$grade->grade_name}}</option>

                                        @endforeach
                                    </select>
                                    </div>
                                </div>
                            </div>

                            <div class="col-xs-12 col-sm-12 col-md-12">
                                <div class="form-group">
                                    <strong>Description:</strong>
                                    <div class="controls">
                                    <textarea name="description" id="description" class="span6">{{$subject->description}}</textarea>
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