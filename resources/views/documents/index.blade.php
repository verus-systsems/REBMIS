@extends('template.default')


@section('content')


    <div class="row">
        <div class="pull-right">
            @can('manage-locations')
                <a class="btn btn-success" href="{{ route('documents.create') }}"> Create New Document</a>
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
                    <h3>Document Management</h3>
                </div> <!-- /widget-header -->
                <div class="widget-content">

                    <div class="table-responsive">
                        <table class="table table-striped table-bordered table-hover">
                            <thead>
                            <tr>
                                <th>No</th>
                                <th>Title</th>
                                <th>Category</th>
                                <th>Action</th>
                            </tr>
                            </thead>
                            @foreach ($documents as $document)
                                <tr>
                                    <td>{{ ++$i }}</td>
                                    <td>{{ $document->title }}</td>
                                    <td>{{ $document->documentcategory->category }}</td>
                                    <td>
                                        <form id="action-form" action="{{ route('documents.destroy',$document->id) }}" method="POST">

                                                <a class="btn btn-small btn-success" href="{{ route('documents.edit',$document->id) }}"><i class="icon-edit"></i></a>

                                            @csrf
                                            @method('DELETE')
                                            @can('manage-locations')


                                            <!--<a class="text-danger delete" href="{{ route('documents.destroy',$document->id) }}"
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

                        {!! $documents->render() !!}

                        </div>

                    </div>

                </div>

            </div>

        </div>


    </div>



@endsection