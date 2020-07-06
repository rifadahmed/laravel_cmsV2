@extends('layouts.admin')
@section('content')
<h1>All categories</h1>
<div class="col-sm-4">
    {!!Form::open(['method' => 'post','action' => 'adminCategoriesController@store'])!!}
            <div class="form-group">
            {!!Form::label('name', 'Category name');!!}
            {!!Form::text('name',null,['class' => 'form-control']); !!}
            </div>
            <div class="form-group">
                {!!Form::submit('Add!',['class'=>'btn btn-primary'])!!}
            </div>
           @include('partials.error')
    {!! Form::close() !!}
</div>

<div class="col-sm-8">
<table class="table table-hover">
    <thead>
      <tr>
        <th>Id</th>
        <th>Name</th>
        <th>Created at</th>
        <th>Updated at</th>
      </tr>
    </thead>
    <tbody>
        @if ($categories)
        @foreach ($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td><a href="{{route('admin.categories.edit',$category->id)}}">{{$category->name}}</a> </td>
            
            <td>{{$category->created_at?$category->created_at->diffForHumans():"date not found"}}</td>
            <td>{{$category->updated_at?$category->updated_at->diffForHumans():'date not found'}}</td>
          </tr> 
        @endforeach
      
      @endif
    
    </tbody>
  </table>
</div>


@endsection