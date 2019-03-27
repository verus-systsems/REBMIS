@extends('template.default')


@section('content')


    <div class="row">
        <div class="pull-right">

                <a class="btn btn-success"g href="{{ route('skills.create') }}"> Create New Skill</a>

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
                    <h3>Skills Management</h3>
                </div> <!-- /widget-header -->
                <div class="widget-content">

                    <div class="table-responsive">

                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Skill</th>
                                <th>Unit</th>
                                <th>Subject</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            @foreach ($skills as $skill)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $skill->skill }}</td>
                                    <td>{{ $skill->unit->unit_name }}</td>
                                    <td>{{ $skill->unit->subject->subject_title }}</td>

                                    <td>
                                        <form id="action-form" action="{{ route('skills.destroy',$skill->id) }}" method="POST">

                                                <a class="btn btn-small btn-success" href="{{ route('skills.edit',$skill->id) }}"><i class="icon-edit"></i></a>

                                            @csrf
                                            @method('DELETE')
                                            @can('schools-delete')


                                            <!-- <a class="text-danger delete" href="{{ route('skills.destroy',$skill->id) }}"
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
                            {!! $skills->render() !!}
                        </div>



                    </div>

                </div>

            </div>

        </div>

    </div>



@endsection