{{-- @extends('layouts.app') --}}
@extends('layouts.templ')

@section('content')    
    <div class="card">
        {!! Form::open(['action' => ['PostsController@update', $post->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            
            {!!Form::text('title', $post->title, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Write a title for your post here...'])!!}
        </div>
        <div class="form-group">
            
            {!!Form::textarea('body', $post->body, ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Update your followers...'])!!}
        </div>
        <div class="card">
            {{Form::file('file', ['class' => 'btn btn-default active form-control-file', 'title' => 'Click to upload file'])}}
        </div>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Update', ['class' => 'btb btn-primary form-control', 'title' => 'Click to update post'])}}
        {!! Form::close() !!}
    </div>
@endsection