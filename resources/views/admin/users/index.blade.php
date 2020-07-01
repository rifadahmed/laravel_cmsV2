@extends('layouts.admin')
@section('content')

  <p class="bg-danger">{{session('deleted_user')}}</p>
  <p class="bg-primary">{{session('updated_user')}}</p>
  <p class="bg-success">{{session('created_user')}}</p>

<table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Photo</th>
        <th>Name</th>
        <th>Email</th>
        <th>Role</th>
        <th>Status</th>
        <th>Created</th>
        <th>Updated</th>
      </tr>
    </thead>
    <tbody>

        @if ($users)
        @foreach ($users as $user)
        
            <td>{{$user->id}}</td>

            <td>
              
                <img src="{{$user->photo?$user->photo->file : "https://www.publicdomainpictures.net/pictures/280000/velka/not-found-image-15383864787lu.jpg"}}"class="img-thumbnail" alt="">
            </td>
       
            <td><a href="{{route('admin.users.edit',$user->id)}}">{{$user->name}}</a> </td>
            <td>{{$user->email}}</td>
            <td>{{$user->role->name}}</td>
            <td>{{($user->is_active==1)?"active":"not active"}}</td>     
            <td>{{$user->created_at->diffForHumans()}}</td>
            <td>{{$user->updated_at->diffForHumans()}}</td>
          </tr> 
        @endforeach
        
        @endif
      
      
    </tbody>
  </table>
    
@endsection