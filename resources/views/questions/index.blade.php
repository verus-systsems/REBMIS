@extends('theme.default')


@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Question Management</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="pull-right">
            @can('locations-create')
                <a class="btn btn-success"g href="{{ route('questions.create') }}"> Create New Question</a>
            @endcan
        </div>
    </div>
    <div class="row">

        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Questions
                </div>

                <!-- /.panel-heading -->
                <div class="panel-body">
                    @if ($message = Session::get('success'))
                        <div class="alert alert-success alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <p>{{ $message }}</p>
                        </div>
                    @endif

                    <div class="table-responsive">

                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Question</th>
                                <th>Topic</th>
                                <th>Unit</th>
                                <th>Subject</th>
                                <th>Grade</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @foreach ($questions as $question)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $question->question }}</td>
                                    <td>{{ $question->topic->topic }}</td>
                                    <td>{{ $question->topic->unit->unit_name }}</td>
                                    <td>{{ $question->topic->unit->subject->subject_title }}</td>
                                    <td>{{ $question->topic->unit->subject->grade->grade_name }}</td>
                                    <td>
                                        <form id="action-form" action="{{ route('questions.destroy',$question->id) }}" method="POST">
                                            <a class="text-info" href="{{ route('questions.show',$question->id) }}" style="font-size:24px"> <i class="fa fa-eye"></i></a>
                                            @can('academics-manage')
                                                <a class="text-success" href="{{ route('questions.edit',$question->id) }}" style="font-size:24px"><i class="fa fa-edit"></i></a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('locations-delete')


                                               <!-- <a class="text-danger delete" href="{{ route('questions.destroy',$question->id) }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('action-form').submit();" style="font-size:24px"><i class="fa fa-trash"></i></a>-->


                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                        </table>

                        {!! $questions->render() !!}
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
    </div>



@endsection