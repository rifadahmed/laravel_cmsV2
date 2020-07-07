@extends('layouts.admin')
@section('content')

        
        @if (count($photos)>0)

        <form action="delete/media" method="post"> 
          
          <table class="table table-hover">
            <thead>
              <tr>
                <td> <input type="checkbox" id='options'></td>
                <th>Id</th>
                <th>Photo</th>
                <th>Created at</th>
              </tr>
            </thead>
            <tbody>
          @foreach ($photos as $photo)
          <tr>
            <td> <input type="checkbox" class="checkboxes" value="{{$photo->id}}" name="checkBoxArray[]"></td>
            <td>{{$photo->id}}</td>
            <td><img height="50px" src="{{$photo->file}}" alt=""> </td>
            <td>{{$photo->created_at->diffForHumans()}}</td>
            <td>
              {!!Form::open(['method' => 'delete','action' => ['adminMediaController@destroy',$photo->id]])!!}
              <input type="hidden" name='single_delete' value='{{$photo->id}}'> 
              {{Form::submit('Delete!',['class'=>'btn btn-danger'])}}
              {!! Form::close() !!}
              
            </td>
          </tr>
          @endforeach  
        </tbody>
      </table>
     
      <div class="form-group">
       <input type="submit" class="btn btn-danger" value="Delete Selected items">
      </div>
    </form>
        

     @include('partials.scripts.bulkMediaDelete')
        @endif
@endsection

