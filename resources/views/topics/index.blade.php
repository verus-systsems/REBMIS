@extends('theme.default')


@section('content')

    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Topic Management</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <div class="row">
        <div class="pull-right">
            @can('schools-create')
                <a class="btn btn-success"g href="{{ route('topics.create') }}"> Create New Topic</a>
            @endcan
        </div>
    </div>
    <div class="row">

        <div class="col-lg-12">

            <div class="panel panel-default">
                <div class="panel-heading">
                    Topics
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
                                <th>Topic/Content</th>
                                <th>Unit</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @foreach ($topics as $topic)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $topic->topic }}</td>
                                    <td>{{ $topic->unit->unit_name }} - {{$topic->unit->subject->subject_title}}</td>

                                    <td>
                                        <form id="action-form" action="{{ route('topics.destroy',$topic->id) }}" method="POST">
                                            @can('schools-edit')
                                                <a class="text-success" href="{{ route('topics.edit',$topic->id) }}" style="font-size:24px"><i class="fa fa-edit"></i></a>
                                            @endcan
                                            @csrf
                                            @method('DELETE')
                                            @can('schools-delete')


                                               <!-- <a class="text-danger delete" href="{{ route('topics.destroy',$topic->id) }}"
                                                   onclick="event.preventDefault();
                                                     document.getElementById('action-form').submit();" style="font-size:24px"><i class="fa fa-trash"></i></a>-->


                                            @endcan
                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                        </table>

                        {!! $topics->render() !!}
                    </div>
                    <!-- /.table-responsive -->
                </div>
                <!-- /.panel-body -->
            </div>
        </div>
    </div>



@endsection