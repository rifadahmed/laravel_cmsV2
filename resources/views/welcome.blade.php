
@extends('layouts.homePost')
<link href="https://fonts.googleapis.com/css2?family=Grenze+Gotisch:wght@200&display=swap" rel="stylesheet">

@section('content')
<nav class="navbar navbar-default navbar-static-top">
  <div class="container">
      <div class="navbar-header">

          <!-- Collapsed Hamburger -->
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#app-navbar-collapse">
              <span class="sr-only">Toggle Navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
          </button>

          <!-- Branding Image -->
         
      </div>

      <div class="collapse navbar-collapse" id="app-navbar-collapse">
          <!-- Left Side Of Navbar -->
          <ul class="nav navbar-nav">
              <li><a href="{{ url('/home') }}">Home</a></li>
          </ul>

          @if (Auth::check() && Auth::user()->role->name=='admin' && Auth::user()->is_active==1)
          
          <ul class="nav navbar-nav">
              <li><a href="{{ url('admin') }}">Dasboard</a></li>
          </ul>  
          @endif
         
          
      

          <!-- Right Side Of Navbar -->
          <ul class="nav navbar-nav navbar-right">
              <!-- Authentication Links -->
              @if (Auth::guest())
                  <li><a href="{{ url('/login') }}">Login</a></li>
                  <li><a href="{{ url('/register') }}">Register</a></li>
              @else
                  <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                          {{ Auth::user()->name }} <span class="caret"></span>
                      </a>

                      <ul class="dropdown-menu" role="menu">
                          <li><a href="{{ url('/logout') }}"><i class="fa fa-btn fa-sign-out"></i>Logout</a></li>
                      </ul>
                  </li>
              @endif
          </ul>
      </div>
  </div>
</nav>
 <div class="container">
    @foreach ($posts as $post)
    <div class="well">
        <div class="media">
            <a class="pull-left" href="{{Auth::user()? route('home.post',$post->slug) : url('login')}}">
              <img class="media-object " width='180px' height='100px' src="{{$post->photo?$post->photo->file:"https://www.publicdomainpictures.net/pictures/280000/velka/not-found-image-15383864787lu.jpg"}}">
            </a>
            <div class="media-body">
              <h4 class="media-heading" style="font-family: 'Grenze Gotisch', cursive;">{{$post->title}}</h4>
            <p class="text-right">By {{$post->user->name}}</p>
            <p>{!! $post->body !!}</p>
            <ul class="list-inline list-unstyled">
                <li><span><i class="glyphicon glyphicon-calendar"></i> {{$post->created_at->diffForHumans()}}</span></li>
              <li>|</li>
              <span><i class="glyphicon glyphicon-comment"></i> {{count($post->comments)}}</span>
              </ul>
         </div>
      </div>
     
    </div>
    
    @endforeach
    <div class="text-center">
      {{$posts->render()}}  
     </div>
  </div> 






@endsection
