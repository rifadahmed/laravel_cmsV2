@extends('layouts.blog-post')
<link href="https://fonts.googleapis.com/css2?family=Grenze+Gotisch:wght@200&display=swap" rel="stylesheet">
@section('content')
<div class="col-lg-8">

    <!-- Blog Post -->

    <!-- Title -->
    
    <h1 style="font-family: 'Grenze Gotisch', cursive;">{{$post[0]->title}}</h1> 

    <!-- Author -->
    <p class="lead">
        by <a href="#">{{$post[0]->user->name}}</a>
    </p>

    <hr>

    <!-- Date/Time -->
    <p><span class="glyphicon glyphicon-time"></span> {{$post[0]->created_at->diffForHumans()}}</p>

    <hr>

    <!-- Preview Image -->
    <img class="img-responsive" src="{{$post[0]->photo?$post[0]->photo->file:"https://www.publicdomainpictures.net/pictures/280000/velka/not-found-image-15383864787lu.jpg"}}" alt="">

    <hr>

    <!-- Post Content -->
    <p>{!! $post[0]->body !!}</p>
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
                <input type="hidden"  name="post_id" value="{{$post[0]->id}}">
                {!!Form::textarea('body',null,['class' => 'form-control','rows'=>'4']);!!}
                <br>
                {!!Form::submit('Add comment',['class'=>'btn btn-primary'])!!}
            </div>
        {!! Form::close() !!}
        <a  id='seeMore'>See all comments...</a>
    </div>

    <!-- Comment -->
    
    <div id="hideAndSeek" class="hide"  >

    
        @foreach ($post[0]->comments as $comment)
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
                @if ($reply->is_active==1)
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
                @endif
                
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
    @endif 
</div>

@endsection



@section('script')
<script >
    $flag=1;
    document.querySelector('#seeMore').addEventListener('click',function(){
        document.getElementById("hideAndSeek").classList.toggle('hide')
         if ($flag==1)
        {document.getElementById("seeMore").text="hide Comments";
        $flag=0;
        }
        else{
        document.getElementById("seeMore").text="See all comments..."
        $flag=1;
        }
  
        })
</script>
@endsection

