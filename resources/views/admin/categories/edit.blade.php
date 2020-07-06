@extends('layouts.admin')
@section('content')
<h1>All categories</h1>
<div class="col-sm-4">
    {!!Form::model($category,['method' => 'patch','action' => ['adminCategoriesController@update',$category->id]])!!}
            <div class="form-group">
            {!!Form::label('name', 'Category name');!!}
            {!!Form::text('name',null,['class' => 'form-control']); !!}
            </div>
            <div class="form-group">
                {!!Form::submit('Update',['class'=>'btn btn-primary'])!!}
            </div>
    {!! Form::close() !!}

    {!!Form::open(['method' => 'delete','action' => ['adminCategoriesController@destroy',$category]])!!}
    <div class="form-group">
        {!!Form::submit('Delete',['class'=>'btn btn-danger'])!!}
    </div>
    @include('partials.error')
    {!! Form::close() !!}
</div>



@endsection