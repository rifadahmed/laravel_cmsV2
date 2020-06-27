@extends('layouts.admin')
@section('content')
<h1>Edit post</h1> 

<div class="form-group">
{!! Form::model($post,['method' => 'patch','action'=>['adminPostsController@update',$post->id],'files'=>true]) !!} 
    
<div class="form-group">
    {!!Form::label('title',"Title");!!}
    {!!Form::text('title',null, ['class' => 'form-control']);!!}
</div>
<div class="form-group">
    {!!Form::label('category_id',"Category");!!}
    {!!Form::select('category_id',[ ''=> 'Choose category']+$categories, null, ['class' => 'form-control']);!!}
</div>
<div class="form-group">
    {!!Form::label('photo_id',"File");!!}
    {!!Form::file('photo_id',  ['class' => 'form-control']);!!}
</div>
<div class="form-group">
    {!!Form::label('body',"Body");!!}
    {!!Form::textarea('body', null, ['class' => 'form-control','rows'=>4]);!!}
</div>


<div class="form-group">
    {!!Form::submit('Update Post',['class'=>"btn btn-primary"]);!!}
</div>


 
 @include('partials.error')
{!! Form::close() !!}

<div class="form-group">
    {!!Form::open(['method' => 'delete','action' => ['adminPostsController@destroy',$post->id]])!!}
    <div class="form-group">
        {!!Form::submit('Delete Post',['class'=>"btn btn-danger"]);!!}
    </div>
    {!! Form::close() !!}
    </div>
@endsection

</div>
