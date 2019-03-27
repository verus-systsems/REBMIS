@extends('template.default')


@section('content')


    <div class="row">
        <div class="pull-right">
            @can('manage-roles')
                <a class="btn btn-success" href="{{ route('users.create') }}"> Create New User</a>
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
                    <h3>User Management</h3>
                </div> <!-- /widget-header -->
                <div class="widget-content">

                    <div class="table-responsive">

                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th width="280px">Action</th>
                            </tr>
                            </thead>
                            @foreach ($data as $key => $user)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>
                                        @if(!empty($user->getRoleNames()))
                                            @foreach($user->getRoleNames() as $v)
                                                <label class="badge badge-success">{{ $v }}</label>
                                            @endforeach
                                        @endif
                                    </td>
                                    <td>
                                        <form id="action-form" action="{{ route('users.destroy',$user->id) }}" method="POST">
                                            <a class="btn btn-small btn-info" href="{{ route('users.show',$user->id) }}" > <i class="icon-eye-open"></i></a>
                                            <a class="btn btn-small btn-success" href="{{ route('users.edit',$user->id) }}"><i class="icon-edit"></i></a>

                                            @csrf
                                            @method('DELETE')



                                           <!-- <a class="btn btn-small btn-danger" href="{{ route('users.destroy',$user->id) }}"
                                               onclick="event.preventDefault();
                                                     document.getElementById('action-form').submit();"><i class="icon-trash"></i></a>-->



                                        </form>
                                    </td>
                                </tr>
                                @endforeach

                                </tbody>
                        </table>

                        <div class="span12">
                        {!! $data->render() !!}

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>



@endsection