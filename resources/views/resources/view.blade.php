@extends('template.default')


@section('content')


    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p>{{ $message }}</p>
        </div>
    @endif

    <div class="row">
        <div class="pull-right">

            <a class="btn btn-success" href="{{ route('questiondatabanks.create') }}"><i class="icon-upload"></i> Upload Questions</a>

        </div>
    </div><br>

    <div class="row">
        <div class="span12">
            <div class="widget ">
                <div class="widget-header">
                    <i class="icon-info-sign"></i>
                    <h3>Grade &amp; Subject Information</h3>
                </div> <!-- /widget-header -->
                <div class="widget-content anyClass">
                    <strong>Grade:</strong> {{$thegrade->grade_name}}, <strong>Subject:</strong> {{$thesubject->subject_title}}, <strong>Unit:</strong> {{$theunit->unit_name}}
                </div>
            </div>

        </div>

    </div>


    <div class="row">
        <div class="span12">
            <div class="widget ">
                <div class="widget-header">
                    <i class="icon-list"></i>
                    <h3>Question Details</h3>
                </div> <!-- /widget-header -->
                <div class="widget-content anyClass">
                    <div class="table-responsive">
                        <table class="table table-condensed table-bordered">

                            <tr><td bgcolor="#D9EDF7" valign="top"><i class="icon-certificate"></i> SKILL</td><td>{{$question->skill->skill}}</td></tr>
                            <tr><td bgcolor="#D9EDF7"><i class="icon-barcode"></i> QUESTIOIN ID</td><td>{{$question->id}}</td></tr>
                            <tr><td bgcolor="#D9EDF7"><i class="icon-question-sign"></i> QUESTION</td><td>{!! $question->question !!}</td></tr>
                            <tr><td bgcolor="#D9EDF7"><i class="icon-file-text"></i> GUIDES</td><td>{!! $question->guide !!}</td></tr>
                            <tr><td bgcolor="#D9EDF7"><i class="icon-wrench"></i> TOOLS</td><td>
                                    <ul>
                                    @foreach($question->tools as $tool)
                                      <li><i class="icon-download"></i> <a href="{{ URL::to('files/'.$tool->document_name.'') }}" class="btn-small btn-success" target="_blank"><i class="icon-download"></i> {{$tool->document_name}}</a></li>

                                    @endforeach

                                    </ul>

                                </td>
                            </tr>
                            <tr><td bgcolor="#D9EDF7" valign="top"><i class="icon-facetime-video"></i> MULTIMEDIA RESOURCES</td><td>

                                {!! $question->multimedia !!}
                                </td>
                            </tr>

                            <tr bgcolor="#DFF0D8"><td colspan="2"><a href="{{ route('resources.downloadquestion',$question->id) }}" class="btn btn-info" target="_blank"><i class="icon-download"></i> DOWNLOAD QUESTION</a></td></tr>

                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection