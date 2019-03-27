@extends('theme.default')


@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Quiz Management</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="pull-right">
            @can('academics-manage')
                <a class="btn btn-success"g href="{{ route('quizzes.create') }}"> Create New Quiz</a>
            @endcan
        </div>
    </div>
    <div class="row">

        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Quiz
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
                                <th>Quiz</th>
                                <th>Unit</th>
                                <th>Subject</th>
                                <th>Grade</th>
                                <th>Semester</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @foreach ($quizzes as $quiz)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $quiz->quiz_name }}</td>
                                    <td>{{ $quiz->unit->unit_name }}</td>
                                    <td>{{ $quiz->subject->subject_title }}</td>
                                    <td>{{ $quiz->subject->grade->grade_name }}</td>
                                    <td>{{ $quiz->semester->semester }}</td>
                                    <td>
                                        <form id="action-form" action="{{ route('quizzes.destroy',$quiz->id) }}" method="POST">

                                            @can('academics-manage')
                                                <a class="text-success" href="{{ route('quizzes.edit',$quiz->id) }}" style="font-size:24px"><i class="fa fa-edit"></i></a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('academics-manage')


                                               <!-- <a class="text-danger delete" href="{{ route('quizzes.destroy',$quiz->id) }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('action-form').submit();" style="font-size:24px"><i class="fa fa-trash"></i></a>-->


                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                        </table>

                        {!! $quizzes->render() !!}
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
    </div>



@endsection