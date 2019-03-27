@extends('template.default')


@section('content')


    <div class="row">
        <div class="pull-right">

                <a class="btn btn-success" href="{{ route('students.create') }}"> Create New Student</a>

        </div>
    </div>
    <br>
    @if ($message = Session::get('success'))
        <div class="alert alert-success alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            <p>{{ $message }}</p>
        </div>
    @endif
    <div class="row">

        <div class="span12">
            <div class="widget ">
                <div class="widget-header">
                    <i class="icon-list"></i>
                    <h3>Student</h3>
                </div> <!-- /widget-header -->
                <div class="widget-content">

                    <div class="table-responsive">

                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Gender</th>
                                <th>Unique Identifier</th>
                                <th>School</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @foreach ($students as $student)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $student->student_name }}</td>
                                    <td>
                                        @if($student->gender==1)
                                            Male
                                        @else
                                            Female
                                        @endif
                                    </td>
                                    <td>{{ $student->unique_identifier }}</td>
                                    <td>{{ $student->school->school_name }}</td>


                                    <td>
                                        <form id="action-form" action="{{ route('students.destroy',$student->id) }}" method="POST">

                                                <a class="btn btn-small btn-success" href="{{ route('students.edit',$student->id) }}"><i class="icon-edit"></i></a>

                                            @csrf
                                            @method('DELETE')
                                            @can('schools-delete')


                                            <!-- <a class="text-danger delete" href="{{ route('teachers.destroy',$teacher->id) }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('action-form').submit();" style="font-size:24px"><i class="fa fa-trash"></i></a>-->


                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                        </table>

                        <div class="controls">
                            {!! $students->render() !!}
                        </div>



                    </div>

                </div>

            </div>

        </div>

    </div>



@endsection