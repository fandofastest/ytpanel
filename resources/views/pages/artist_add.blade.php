@extends('layouts.app', ['activePage' => 'artistadd', 'titlePage' => __('New Artist')])

@section('content')
  <div class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-12">
          <form method="post" action="{{ route('artist.store') }}" autocomplete="off" class="form-horizontal">
            @csrf
            @method('post')

            <div class="card ">
              <div class="card-header card-header-primary">
                <h4 class="card-title">{{ __('Add New') }}</h4>
              </div>
              <div class="card-body ">
                @if (session('status'))
                  <div class="row">
                    <div class="col-sm-12">
                      <div class="alert alert-success">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                          <i class="material-icons">close</i>
                        </button>
                        <span>{{ session('status') }}</span>
                      </div>
                    </div>
                  </div>
                @endif
                <div class="row">
                  <label class="col-sm-2 col-form-label">{{ __('Channelid') }}</label>
                  <div class="col-sm-7">
                    <div class="form-group{{ $errors->has('channelid') ? ' has-danger' : '' }}">
                      <input class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="channelid" id="input-name" type="text" placeholder="{{ __('Channelid') }}" value="" required="true" aria-required="true"/>
                      @if ($errors->has('channelid'))
                        <span id="name-error" class="error text-danger" for="input-name">{{ $errors->first('channelid') }}</span>
                      @endif
                    </div>

                   
                  </div>


                </div>
                <div class="row">
                <label class="col-sm-2 col-form-label">{{ __('Country') }}</label>
                  <div class="col-sm-7">
                <div class="form-group">                  
                      <select name="country" id="country"  class="custom-select">
                
                      @foreach ($data->items as $datas)
                      <option value="{{$datas->id}}">{{$datas->id}}</option>
                      @endforeach  
                      </select>
                      
                    </div>
                  </div>
                </div>
                
              </div>
              <div class="card-footer ml-auto mr-auto">
                <button type="submit" class="btn btn-primary">{{ __('Save') }}</button>
              </div>
            </div>
          </form>
        </div>
      </div>
      
    </div>
  </div>
@endsection