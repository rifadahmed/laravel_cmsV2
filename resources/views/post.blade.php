@extends('layouts.blog-post')
@section('content')
<div class="col-lg-8">

    <!-- Blog Post -->

    <!-- Title -->
    <h1>{{$post->title}}</h1>

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> {{$post->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post->photo->file}}" alt="">

    <hr>

    <!-- Post Content -->
    <p>{{$post->body}}</p>
    <hr>

    <!-- Blog Comments -->

    @if (Session::has('comment_added'))
        {{session('comment_added')}}
    @endif
    <!-- Comments Form -->
    @if(Auth::check())
        
    
    <div class="well">
        <h4>Leave a Comment:</h4>
        {!!Form::open(['method' => 'post','action' => 'postCommentsController@store'])!!}
          <div class="form-group">
              
              <div class="form-group">
                <input type="hidden"  name="post_id" value="{{$post->id}}">
                {!!Form::textarea('body',null,['class' => 'form-control','rows'=>'4']);!!}
                <br>
                {!!Form::submit('Add comment',['class'=>'btn btn-primary'])!!}
            </div>
        {!! Form::close() !!}
    </div>

    <hr>

    <!-- Posted Comments -->

    
   

    <!-- Comment -->
    
    @foreach ($post->comments as $comment)
    @if ($comment->is_active)
    <div class="media">   
        <a class="pull-left" href="#">       
            <img class="media-object" style="height: 40px" src="{{$comment->photo->file}}" alt="">
        </a>
        

        <div class="media-body">
            
            <h4 class="media-heading">{{$comment->author}}
                <small>{{$comment->created_at}}</small>
            </h4>
            {{$comment->body}}
          
            
            <!-- Nested Comment -->
            <div class="media">
                <a class="pull-left" href="#">
                    <img class="media-object" src="http://placehold.it/64x64" alt="">
                </a>
                <div class="media-body">
                    <h4 class="media-heading">Nested Start Bootstrap
                        <small>August 25, 2014 at 9:30 PM</small>
                    </h4>
                    Cras sit amet nibh libero, in gravida nulla. Nulla vel metus scelerisque ante sollicitudin commodo. Cras purus odio, vestibulum in vulputate at, tempus viverra turpis. Fusce condimentum nunc ac nisi vulputate fringilla. Donec lacinia congue felis in faucibus.
                </div>
            </div>
            <!-- End Nested Comment -->
        </div>
    </div>
    @endif
  @endforeach    
</div>
@endif
@endsection