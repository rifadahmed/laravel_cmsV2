@extends('layouts.admin')

@section('content')
    create user
    {{-- action must be smaller letter --}}
    {!! Form::open(['aethod' => 'post','action'=>'adminUsersController@store']) !!} 
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
     {!!Form::select('role', [ ''=> 'Choose role']+ $roles, null,['class' => 'form-control']);!!} 

    </div>

    <div class="form-group">
    {!!Form::label('status',"Status");!!}
    {!!Form::select('status', [1 => 'Active', 2 => 'Not active'], 2,['class' => 'form-control']);!!} 
    </div>
  
    <div class="form-group">
        {!!Form::label('password',"Password");!!}
        {!!Form::password('password', ['class' => 'form-control']);!!}
        </div>

     <div class="form-group">
        {!!Form::submit('Create User',['class'=>"btn btn-primary"]);!!}
        </div>

      
{!! Form::close() !!}




@endsection