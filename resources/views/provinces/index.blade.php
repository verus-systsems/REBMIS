@extends('template.default')


@section('content')


    <div class="row">
        <div class="pull-right">
            @can('manage-locations')
                <a class="btn btn-success" href="{{ route('provinces.create') }}"> Create New Province</a>
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
                    <h3>Provinces Management</h3>
                </div> <!-- /widget-header -->
                <div class="widget-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Province</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @foreach ($provinces as $province)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $province->province_name }}</td>
                                    <td>
                                        <form id="action-form" action="{{ route('provinces.destroy',$province->id) }}" method="POST">
                                            @can('manage-locations')
                                                <a class="btn btn-small btn-success" href="{{ route('provinces.edit',$province->id) }}"><i class="icon-edit"></i></a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('manage-locations')


                                            <!--<a class="text-danger delete" href="{{ route('provinces.destroy',$province->id) }}"
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

                        {!! $provinces->render() !!}

                        </div>

                    </div>

                </div>

            </div>

        </div>


    </div>



@endsection