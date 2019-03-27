@extends('template.default')


@section('content')


    <div class="row">
        <div class="pull-right">

                <a class="btn btn-success" href="{{ route('contents.create') }}"> Create New Content</a>

        </div>
    </div><br>

      <div class="row">

          <div class="span12">
              <div class="widget ">
                  <div class="widget-header">
                      <i class="icon-list"></i>
                      <h3>Content</h3>
                  </div> <!-- /widget-header -->
                  <div class="widget-content">

                      <div class="table-responsive">

                          <table class="table table-striped table-bordered table-hover">
                              <thead>
                              <tr>
                                  <th>No</th>
                                  <th>Title</th>
                                  <th>Action</th>
                              </tr>
                              </thead>
                              @foreach ($contents as $content)
                                  <tr>
                                      <td>{{ ++$i }}</td>
                                      <td> {!! $content->title !!}</td>
                                      <td>
                                          <form id="action-form" action="{{ route('contents.destroy',$content->id) }}" method="POST">


                                                  <a class="btn btn-small btn-success" href="{{ route('contents.edit',$content->id) }}" ><i class="icon-edit"></i></a>

                                              @csrf
                                              @method('DELETE')
                                              @can('academics-manage')


                                              <!-- <a class="text-danger delete" href="{{ route('contents.destroy',$content->id) }}"
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

                          {!! $contents->render() !!}

                          </div>

                      </div>

                  </div>

              </div>

          </div>


    </div>



@endsection