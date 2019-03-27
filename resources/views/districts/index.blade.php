@extends('template.default')


@section('content')

        <div class="row">
        <div class="pull-right">
            @can('manage-locations')
                <a class="btn btn-success"g href="{{ route('districts.create') }}"> Create New District</a>
            @endcan
        </div>
    </div><br>
    <div class="row">

        @if ($message = Session::get('success'))
            <div class="alert alert-success alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                <p>{{ $message }}</p>
            </div>
        @endif

        <div class="span12">
            <div class="widget ">
                <div class="widget-header">
                    <i class="icon-list"></i>
                    <h3>District Management</h3>
                </div> <!-- /widget-header -->
                <div class="widget-content">

                    <div class="table-responsive">

                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>District</th>
                                <th>Province</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @foreach ($districts as $district)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $district->district_name }}</td>
                                    <td>{{ $district->province->province_name }}</td>

                                    <td>
                                        <form id="action-form" action="{{ route('districts.destroy',$district->id) }}" method="POST">
                                            @can('manage-locations')
                                                <a class="btn btn-small btn-success" href="{{ route('districts.edit',$district->id) }}"><i class="icon-edit"></i></a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('manage-locations')


                                            <!-- <a class="text-danger delete" href="{{ route('districts.destroy',$district->id) }}"
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

                        {!! $districts->render() !!}

                        </div>

                    </div>

                </div>

            </div>
        </div>

    </div>



@endsection