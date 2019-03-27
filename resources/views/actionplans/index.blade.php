@extends('template.default')


@section('content')


    <div class="row">
        <div class="pull-right">

                <a class="btn btn-success"g href="{{ route('actionplans.create') }}"> Student Observation</a>

        </div>
    </div><br>
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
                    <h3>Action Plan</h3>
                </div> <!-- /widget-header -->
                <div class="widget-content">

                    <div class="table-responsive">

                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Student</th>
                                <th>Grade</th>
                                <th>Subject</th>
                                <th>Unit</th>
                                <th>Performance</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            @foreach ($actionplans as $actionplan)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $actionplan->student->student_name }}</td>
                                    <td>{{ $actionplan->grade->grade_name }}</td>
                                    <td>{{ $actionplan->subject->subject_title }}</td>
                                    <td>{{ $actionplan->unit->unit_name }}</td>
                                    <td>
                                        @if ($actionplan->rating==1)
                                            BE - Below Expectations
                                        @elseif($actionplan->rating==2)
                                            APP - Approaching Expectations
                                        @elseif($actionplan->rating==3)
                                            MT - Meets Expectations
                                        @else
                                            EX - Exceeds Expectations
                                        @endif

                                    </td>
                                    <td>{{ $actionplan->plan_start_date }}</td>
                                    <td>{{ $actionplan->plan_end_date }}</td>

                                    <td>
                                        <form id="action-form" action="{{ route('actionplans.destroy',$actionplan->id) }}" method="POST">

                                                <a class="btn btn-small btn-success" href="{{ route('actionplans.edit',$actionplan->id) }}"><i class="icon-eye-open"></i></a>

                                            @csrf
                                            @method('DELETE')
                                            @can('schools-delete')


                                            <!-- <a class="text-danger delete" href="{{ route('actionplans.destroy',$actionplan->id) }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('action-form').submit();" style="font-size:24px"><i class="fa fa-trash"></i></a>-->


                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                        </table>

                        <div class="span12">
                            {!! $actionplans->render() !!}
                        </div>



                    </div>

                </div>

            </div>

        </div>

    </div>



@endsection