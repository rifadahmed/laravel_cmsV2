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
        <a  id='seeMore'>See all comments...</a>
    </div>

    <!-- Comment -->
    
    <div id="hideAndSeek" class="hide"  >

    
        @foreach ($post->comments as $comment)
        @if ($comment->is_active)
        <div class="media">   
            <a class="pull-left" href="#">       
                <img class="media-object" style="height: 40px" src="{{$comment->user->photo?$comment->user->photo->file : 'http://placehold.it/64x64' }}" alt="">
            </a>
            <div class="media-body">
                
                <h4 class="media-heading">{{$comment->user->name}}
                    <small>{{$comment->created_at->diffForHumans()}}</small>
                </h4>
                {{$comment->body}}
            
                
                <!-- Nested Comment -->
                
                @foreach ($comment->commentReplies as $reply)
                    <div class="media">
                    
                    <a class="pull-left" href="#">
                        <img class="media-object" style="height: 40px" src="{{$reply->user->photo? $reply->user->photo->file : 'http://placehold.it/64x64'}}"alt="">
                    </a>
                    
                    <div class="media-body">
                        <h4 class="media-heading"><strong>{{$reply->user->name}}</strong> 
                            <small>{{$reply->created_at->diffForHumans()}}</small>
                        </h4>
                        {{$reply->body}}                   
                    </div> 
                    
                </div>
                @endforeach  
                    <h4>Leave a Reply:</h4>
            {!!Form::open(['method' => 'post','action' => 'commentRepliesController@store'])!!}
            <div class="form-group">
                
                <div class="form-group">
                    <input type="hidden"  name="comment_id" value="{{$comment->id}}">
                    {!!Form::textarea('body',null,['class' => 'form-control','rows'=>'1']);!!}
                    
                    {!!Form::submit('Add Reply',['class'=>'btn btn-warning'])!!}
                </div>
            {!! Form::close() !!}
                </div>
            </div>
                <!-- End Nested Comment -->
            </div>
            @endif
            @endforeach
    </div>
        
    </div>
    
</div>
@endif
@endsection



@section('script')
<script >
    document.querySelector('#seeMore').addEventListener('click',function(){
        document.getElementById("hideAndSeek").classList.toggle('hide')
        
        })
</script>
@endsection

