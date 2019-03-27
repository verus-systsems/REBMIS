@extends('template.default')


@section('content')


    <div class="row">
        <div class="pull-right">

                <a class="btn btn-success"g href="{{ route('units.create') }}"> Create New Unit</a>

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
                    <h3>Units Management</h3>
                </div> <!-- /widget-header -->
                <div class="widget-content">

                    <div class="table-responsive">

                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Unit</th>
                                <th>Subject</th>
                                <th>No. of Periods</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            @foreach ($units as $unit)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $unit->unit_name }}</td>
                                    <td>{{ $unit->subject->subject_title }}</td>
                                    <td>{{ $unit->number_of_periods }}</td>

                                    <td>
                                        <form id="action-form" action="{{ route('units.destroy',$unit->id) }}" method="POST">

                                                <a class="btn btn-small btn-success" href="{{ route('units.edit',$unit->id) }}"><i class="icon-edit"></i></a>

                                            @csrf
                                            @method('DELETE')
                                            @can('schools-delete')


                                            <!-- <a class="text-danger delete" href="{{ route('units.destroy',$unit->id) }}"
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
                            {!! $units->render() !!}
                        </div>



                    </div>

                </div>

            </div>

        </div>

    </div>



@endsection