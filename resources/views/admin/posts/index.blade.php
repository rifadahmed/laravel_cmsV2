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

      </tr>
    </thead>
    <tbody>
        @if ($posts)
        @foreach ($posts as $post)
        <tr>
            <td>{{$post->id}}</td>
            <td>{{$post->user->name}}</td>
            {{-- <td><img class="img-thumbnail" src=" {{$post->user->photo->file}}" alt=""></td> --}}
            <td><img style="height:100px;width:100px"  src="{{$post->photo?$post->photo->file : "https://www.publicdomainpictures.net/pictures/280000/velka/not-found-image-15383864787lu.jpg"}}"class="img-thumbnail" alt=""></td>
            <td>{{$post->category_id}}</td>
            <td>{{$post->title}}</td>
            <td>{{$post->body}}</td>
            <td>{{$post->created_at->diffForHumans()}}</td>
            <td>{{$post->updated_at->diffForHumans()}}</td>
        </tr>  
        @endforeach
      
        @endif
    
     
    </tbody>
  </table> 
@endsection