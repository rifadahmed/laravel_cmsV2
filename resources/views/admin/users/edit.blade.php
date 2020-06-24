@extends('layouts.admin')

@section('content')
   <h1>Edit user</h1>
   <div class="col-sm-3">
    <img src="{{$user->photo?$user->photo->file : "https://www.publicdomainpictures.net/pictures/280000/velka/not-found-image-15383864787lu.jpg"}}"class="img-thumbnail" alt="">
</div> 

    <div class="col-sm-9">
    {{-- action must be smaller letter --}}
    {!! Form::model($user,['method' => 'patch','action'=>['adminUsersController@update',$user->id],'files'=>true]) !!} 
    <div class="form-group">

    {!!Form::label('name',"Name");!!}
    {!!Form::text('name',null, ['class' => 'form-control']);!!}
    </div>

    <div class="form-group">
    {!!Form::label('email',"Email");!!}
    {!!Form::text('email',null, ['class' => 'form-control']);!!}
    </div>

    <div class="form-group">
    {!!Form::label('role_id',"Role");!!}
    {{-- {!!Form::select('role', [1 => 'Admin', 2 => 'Author', 3 => 'Subscriber'], 3,['class' => 'form-control']);!!}  --}}
     {!!Form::select('role_id', [ ''=> 'Choose role']+ $roles, null,['class' => 'form-control']);!!} 

    </div>

    <div class="form-group">
    {!!Form::label('is_active',"Status");!!}
    {!!Form::select('is_active', [1 => 'Active', 2 => 'Not active'], $user->is_active,['class' => 'form-control']);!!} 
    
    </div>
    
    <div class="form-group">
        {!!Form::label('photo_id',"File");!!}
        {!!Form::file('photo_id', ['class' => 'form-control']);!!}
    </div>

        <div class="form-group">
        {!!Form::label('password',"Password");!!}
        {!!Form::password('password', ['class' => 'form-control']);!!}
        </div>

     <div class="form-group">
        {!!Form::submit('Update User',['class'=>"btn btn-primary"]);!!}

        
    </div>
{!! Form::close() !!}
        </div>

      
        

     
      @include('partials.error')
    
      
      
{!! Form::close() !!}

    {!!Form::open(['method' => 'delete','action' => ['adminUsersController@destroy',$user->id]])!!}
        
            {!!Form::submit('Delete User',["style"=>"margin-top:-50px",'class'=>"btn btn-danger pull-right"]);!!}
        
    {!! Form::close() !!}

@endsection
