@extends('layouts.admin')
@section('content')
<table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Photo</th>
        <th>Created at</th>
      </tr>
    </thead>
    <tbody>
        
        @if ($photos)
          @foreach ($photos as $photo)
          <tr>
            <td>{{$photo->id}}</td>
            <td><img height="50px" src="{{$photo->file}}" alt=""> </td>
            <td>{{$photo->created_at->diffForHumans()}}</td>
            <td>
              {!!Form::open(['method' => 'delete','action' => ['adminMediaController@destroy',$photo->id]])!!}
                {{Form::submit('Delete!',['class'=>'btn btn-danger'])}}
              {!! Form::close() !!}
            </td>
          </tr>
          @endforeach  
        @endif
      
    
    </tbody>
  </table>    

@endsection