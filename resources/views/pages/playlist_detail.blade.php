@extends('layouts.app', ['activePage' => 'playlist', 'titlePage' => __('Playlist Detail')])

@section('content')


<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">{{$playlist->name}}</h4>
            <p class="card-category"> Here is a subtitle for this table</p>
            <button type="button" class="btn btn-info" data-toggle="modal" data-target="#exampleModal">
         Add Videos
            </button>
          </div>

          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    VideoID
                  </th>
                  <th>
                    Title
                  </th>
                 
                  <th>
                    Thumbnail
                  </th>
                  <th>
                    Duration
                  </th>
                  <th>
                    Create
                  </th>
                  <th>
                    Update
                  </th>
                  <th>
                    action
                  </th>

                 
                </thead>
                <tbody>
                @foreach ($data as $datas)

                  <tr>
                    <td>
                      {{$datas->videoid}}
                    </td>
                    <td>
                      {{$datas->title}}
                    </td>
                    
                    <td>
                      <img src="150" alt="blank" sizes="150" srcset="https://i.ytimg.com/vi/{{$datas->videoid}}/default.jpg">
                    </td>
                    <td>
                      {{$datas->duration }}
                    </td>
                    <td>
                    {{$datas->created_at}}
                    </td>
                    <td>
                    {{$datas->updated_at}}
                                        </td>

                    <td>
                    <a class="btn btn-danger" href="{{ url('video/destroy/'.$datas->id) }}">Hapus</a>
                    </td>                    
                    
                  </tr>
                  @endforeach
                </tbody>
                
              </table>

              
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Add New videos to {{$playlist->name}}</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="{{ route('video.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')
      <div class="modal-body">
      <input value="{{$playlist->id}}" type="hidden" name="playlistid">
      <input class="form-control" name="videoid" id="input-name" type="text" placeholder="VideoID" value="" required="true" aria-required="true"/>

        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Save</button>
      </div>
      </form>

    </div>
  </div>
</div>
</div>


@endsection