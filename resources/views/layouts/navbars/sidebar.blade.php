<div class="sidebar" data-color="orange" data-background-color="white" data-image="{{ asset('material') }}/img/sidebar-1.jpg">
  <!--
      Tip 1: You can change the color of the sidebar using: data-color="purple | azure | green | orange | danger"

      Tip 2: you can also add an image using data-image tag
  -->
  <div class="logo">
    <a href="https://creative-tim.com/" class="simple-text logo-normal">
      {{ __('Creative Tim') }}
    </a>
  </div>
  <div class="sidebar-wrapper">
    <ul class="nav">
      <li class="nav-item{{ $activePage == 'dashboard' ? ' active' : '' }}">
        <a class="nav-link" href="{{ route('home') }}">
          <i class="material-icons">dashboard</i>
            <p>{{ __('Dashboard') }}</p>
        </a>
      </li>
      <li class="nav-item {{ ($activePage == 'playlist' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Playlists') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'playlistadd' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('playlist.add') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('Add') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'playlist' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('playlist.index') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('Lists') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>



      <li class="nav-item {{ ($activePage == 'artist' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Artist') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'artistadd' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('artist.add') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('Add') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'artist' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('artist.index') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('Lists') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>



      <li class="nav-item {{ ($activePage == 'genre' || $activePage == 'user-management') ? ' active' : '' }}">
        <a class="nav-link" data-toggle="collapse" href="#laravelExample" aria-expanded="true">
          <i><img style="width:25px" src="{{ asset('material') }}/img/laravel.svg"></i>
          <p>{{ __('Genre') }}
            <b class="caret"></b>
          </p>
        </a>
        <div class="collapse show" id="laravelExample">
          <ul class="nav">
            <li class="nav-item{{ $activePage == 'genreadd' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('genre.add') }}">
                <span class="sidebar-mini"> UP </span>
                <span class="sidebar-normal">{{ __('Add') }} </span>
              </a>
            </li>
            <li class="nav-item{{ $activePage == 'genre' ? ' active' : '' }}">
              <a class="nav-link" href="{{ route('genre.index') }}">
                <span class="sidebar-mini"> UM </span>
                <span class="sidebar-normal"> {{ __('Lists') }} </span>
              </a>
            </li>
          </ul>
        </div>
      </li>
      
    </ul>
  </div>
</div>