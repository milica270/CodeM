<nav class="navbar navbar-expand-lg bg-dark border-bottom border-body" data-bs-theme="dark">
  <div class="container">
    <a class="navbar-brand" style="font-weight: bold" href="/"><i class="fa-solid fa-code"></i> {{config('app.name')}}</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse justify-content-end" id="navbarNav"> 
      <ul class="navbar-nav"> 
        @guest()
            <li class="nav-item">
            <a class="{{(Route::is('register')) ? 'active' : ''}} nav-link" href="{{route('register')}}" style="font-weight: bold">{{__('codem.register')}}</a>
            </li>
            <li class="nav-item">
            <a class="{{(Route::is('login')) ? 'active' : ''}} nav-link" style="font-weight: bold" href="{{route('login')}}">{{__('codem.login')}}</a>
            </li>
        @endguest
        @auth()
            @if(Auth::user()->is_admin)
            <li class="nav-item">
              <a class="{{(Route::is('admin.dashboard')) ? 'active' : ''}} nav-link" href="{{route('admin.dashboard')}}" style="font-weight: bold">{{__('codem.admin')}}</a>
            </li>
            @endif
            <li class="nav-item">
            <a class="{{(Route::is('profile')) ? 'active' : ''}} nav-link" href="{{route('profile')}}" style="font-weight: bold">{{Auth::user()->name}}</a>
            </li>
            <li class="nav-item" style=" vertical-align: middle">
                <form style="text-align: center; vertical-align: middle" action="{{route('logout')}}" method="POST">
                    @csrf
                    <button type="submit" style="font-weight: bold" class="btn btn-danger btn-sm">{{__('codem.logout')}}</button>
                </form>
            </li>
        @endauth
      </ul>
    </div>
  </div>
</nav>
