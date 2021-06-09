@extends('layouts.app', ['activePage' => 'genre', 'titlePage' => __('Genre')])

@section('content')


<div class="content">
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-12">
        <div class="card">
          <div class="card-header card-header-primary">
            <h4 class="card-title ">Simple Table</h4>
            <p class="card-category"> Here is a subtitle for this table</p>
          </div>
          <div class="card-body">
            <div class="table-responsive">
              <table class="table">
                <thead class=" text-primary">
                  <th>
                    ID
                  </th>
                  <th>
                    Name
                  </th>
                  <th>
                    Thumbnail
                  </th>
                  <th>
                    Create
                  </th>
                  <th>
                    Update
                  </th>
                 

                  <th>
                    Action
                  </th>
                 
                 
                </thead>
                <tbody>
                @foreach ($data as $datas)

                  <tr>
                    <td>
                      {{$datas->id}}
                    </td>
                    <td>
                    {{$datas->name}}
                    </td>
                    <td>
                    <img src=" {{url('/thumbnail/').'/'.$datas->thumbnail}}" alt="blank" width="150" height="150">
                    </td>
                    <td>
                    {{$datas->created_at}}
                    </td>
                    <td>
                    {{$datas->updated_at}}
                                        </td>
                    <td class="text-primary">
                      <a class="btn btn-primary" href="{{ url('genre/detail/'.$datas->id) }}">Detail</a>
                      <a class="btn btn-danger" href="{{ url('genre/destroy/'.$datas->id) }}">Hapus</a>
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
</div>
@endsection