
@extends('layouts.admin')
@section('content')
    
<table class="table table-hover">
    <thead>
      <tr>
        <th>Post Id</th>
        <th>Author</th>
        <th>Body</th>
      </tr>
    </thead>
    <tbody>
        @if (count($comments)>0)
        @foreach ($comments as $comment)
        <tr>
            <td>{{$comment->post->id}}</td>
            <td>{{$comment->author}}</td>
            <td>{{$comment->body}}</td>
            <td><a href="{{route('home.post',$comment->post->id)}}">View</a></td>
            
            
            {!!Form::open(['method' => 'patch','action' => ['postCommentsController@update',$comment->id]])!!}
            @if ($comment->is_active==1)
            <input type="hidden"  name="is_active" value="0">
            <td>{{Form::submit('Unapprove!',['class'=>'btn btn-info'])}}</td>
            @else
            <input type="hidden"  name="is_active" value="1">
            <td>{{Form::submit('Approve!',['class'=>'btn btn-primary'])}}</td>
            @endif
            {!! Form::close() !!}

            {!!Form::open(['method' => 'delete','action' => ['postCommentsController@destroy',$comment->id]])!!}
                <td>{{Form::submit('Delete',['class'=>'btn btn-danger'])}}</td>
            {!! Form::close() !!}
          </tr>
        @endforeach
        @endif
     
        
   
    </tbody>
  </table>
@endsection