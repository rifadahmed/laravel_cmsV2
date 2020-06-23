@extends('layouts.admin')

@section('content')
    create user
    {{-- action must be smaller letter --}}
    {!! Form::open(['method' => 'post','action'=>'adminUsersController@store','files'=>true]) !!} 
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
    {!!Form::select('is_active', [1 => 'Active', 2 => 'Not active'], 2,['class' => 'form-control']);!!} 
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
        {!!Form::submit('Create User',['class'=>"btn btn-primary"]);!!}
        </div>

     
      @include('partials.error')
    
      
      
{!! Form::close() !!}




@endsection
