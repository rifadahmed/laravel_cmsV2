@extends('layouts.admin')
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.1/min/dropzone.min.css">
@endsection
@section('content')
<h1>create media</h1> 
{!!Form::open(['method' => 'post','action' => 'adminMediaController@store','class'=>"dropzone"])!!}
  
{!! Form::close() !!}
@endsection
@section('script')
<script src="https://cdnjs.cloudflare.com/ajax/libs/dropzone/5.7.1/min/dropzone.min.js"></script>
@endsection
