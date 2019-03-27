@extends('template.default')


@section('content')


    <div class="row">
        <div class="pull-right">
            @can('manage-locations')
                <a class="btn btn-success" href="{{ route('semesters.create') }}"> Create New Trimester</a>
            @endcan
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
                    <h3>Trimester Management</h3>
                </div> <!-- /widget-header -->
                <div class="widget-content">
                    <div class="table-responsive">

                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Trimester</th>
                                <th>Year</th>
                                <th>Start Date</th>
                                <th>End Date</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @foreach ($semesters as $semester)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $semester->semester }}</td>
                                    <td>{{ $semester->semester_year }}</td>
                                    <td>{{ $semester->start_date }}</td>
                                    <td>{{ $semester->end_date }}</td>

                                    <td>
                                        <form id="action-form" action="{{ route('semesters.destroy',$semester->id) }}" method="POST">

                                                <a class="btn btn-small btn-success" href="{{ route('semesters.edit',$semester->id) }}"><i class="icon-edit"></i></a>

                                            @csrf
                                            @method('DELETE')
                                            @can('schools-delete')


                                            <!-- <a class="text-danger delete" href="{{ route('semesters.destroy',$semester->id) }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('action-form').submit();" style="font-size:24px"><i class="fa fa-trash"></i></a>-->


                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                        </table>

                        {!! $semesters->render() !!}
                    </div>

                </div>

            </div>

        </div>


    </div>



@endsection