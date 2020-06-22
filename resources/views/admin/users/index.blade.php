@extends('layouts.admin')
@section('content')
<table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
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
        <tr><
            /tr>
            <td>{{$user->id}}</td>
            <td>{{$user->name}}</td>
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