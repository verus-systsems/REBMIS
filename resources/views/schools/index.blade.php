@extends('template.default')


@section('content')


    <div class="row">
        <div class="pull-right">

                <a class="btn btn-success"g href="{{ route('schools.create') }}"> Create New School</a>

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
                    <h3>Schools</h3>
                </div> <!-- /widget-header -->
                <div class="widget-content">

                    <div class="table-responsive">

                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Unique Identifier</th>
                                <th>School</th>
                                <th>Sector</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @foreach ($schools as $school)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $school->unique_identifier }}</td>
                                    <td>{{ $school->school_name }}</td>
                                    <td>{{ $school->sector->sector_name }}</td>

                                    <td>
                                        <form id="action-form" action="{{ route('schools.destroy',$school->id) }}" method="POST">

                                                <a class="btn btn-small btn-success" href="{{ route('schools.edit',$school->id) }}"><i class="icon-edit"></i></a>

                                            @csrf
                                            @method('DELETE')
                                            @can('schools-delete')


                                            <!-- <a class="text-danger delete" href="{{ route('schools.destroy',$school->id) }}"
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
                            {!! $schools->render() !!}
                        </div>



                    </div>

                </div>

            </div>

        </div>

    </div>



@endsection