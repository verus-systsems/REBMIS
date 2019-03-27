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
                    <h3>Edit Content</h3>
                </div> <!-- /widget-header -->

                <div class="widget-content">

                    <form action="{{ route('contents.update',$content->id) }}" method="POST">
                        @csrf
                        @method('PUT')
                        <input type="hidden" name="id" value="{{$content->id}}">

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Title:</strong>
                                <div class="controls">
                                    {!! Form::text('result', $content->title, array('placeholder' => '','class' => 'span6')) !!}
                                </div>
                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Summary:</strong>
                                <div class="controls">
                                <textarea name="summary" id="summary" class="span6">{{$content->summary}}</textarea>
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
                                <textarea name="full_content" id="full_content" class="span6">{{$content->full_content}}</textarea>
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
                                    <textarea name="meta_data" id="meta_data" class="span6">{{$content->meta_fata}}</textarea>
                                </div>


                            </div>
                        </div>

                        <div class="col-xs-12 col-sm-12 col-md-12">
                            <div class="form-group">
                                <strong>Key Words:</strong>
                                <div class="controls">
                                    <textarea name="key_words" id="key_words" class="span6">{{$content->key_words}}</textarea>
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