@extends('layouts.admin')
@section('content')
<h1>all post</h1>   
<table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>User</th>
        <th>Photo </th>
        <th>Categorgy</th>
        <th>Title</th>
        <th>Body</th>
        <th>Created at</th>
        <th>Updated at</th>
        <th>Comments</th>

      </tr>
    </thead>
    <tbody>
        @if ($posts)
        @foreach ($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
              <td>   {{$post->user->name}} </td>
            <td><img style="height:100px;width:100px"  src="{{$post->photo?$post->photo->file : "https://www.publicdomainpictures.net/pictures/280000/velka/not-found-image-15383864787lu.jpg"}}"class="img-thumbnail" alt=""></td>
            <td>{{$post->category->name}}
            <td> <a href="{{route('home.post',$post->slug)}}">{{$post->title}}</a> </td>
            <td>{{substr($post->body,0,10)}}...</td>
            <td>{{$post->created_at->diffForHumans()}}</td>
            <td>{{$post->updated_at->diffForHumans()}}</td>
            <td> <a href="{{route('admin.comments.show',$post->id)}}">Total( {{count($post->comments)}} )</a> </td>
            <td><a class="btn btn-info" href="{{route('admin.posts.edit',$post->id)}}">Modify</a></td>
            
          </tr>  
        @endforeach
      
        @endif
    
     
    </tbody>
  </table> 
  
  <div class="text-center">
   {{$posts->render()}}  
  </div>
  
@endsection