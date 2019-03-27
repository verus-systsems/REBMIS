@extends('template.default')


@section('content')

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.css" rel="stylesheet">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/summernote/0.8.9/summernote-lite.js"></script>


    <div class="row">
        <div class="col-lg-12 margin-tb">

            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('contents.index') }}"> Back</a>
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
                    <h3>Create new content</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">

                    {!! Form::open(array('route' => 'contents.store','method'=>'POST','enctype'=>'multipart/form-data')) !!}


                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Title:</strong>
                            <div class="controls">
                                {!! Form::text('title', null, array('placeholder' => '','class' => 'span6')) !!}
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Summary:</strong>
                            <div class="controls">
                            <textarea name="summary" id="summary" class="form-control"></textarea>
                            </div>

                            <script>

                                $('#summary').summernote({
                                    height: 200,


                                });


                            </script>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Full Content:</strong>
                            <div class="controls">
                            <textarea name="full_content" id="full_content" class="form-control"></textarea>
                            </div>

                            <script>

                                $('#full_content').summernote({
                                    height: 200,


                                });


                            </script>
                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Meta Data:</strong>
                            <div class="controls">
                            <textarea name="meta_data" id="meta_data" class="span6"></textarea>
                            </div>


                        </div>
                    </div>

                    <div class="col-xs-12 col-sm-12 col-md-12">
                        <div class="form-group">
                            <strong>Key Words:</strong>
                            <div class="controls">
                                <textarea name="key_words" id="key_words" class="span6"></textarea>
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