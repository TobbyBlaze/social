{{-- @extends('layouts.app') --}}
@extends('layouts.templ')

@section('content')

<div class="container-fluid">
        
    <div class="row justify-content-center">
        <div class="col-md-8">
            
            <br />
            {!! Form::open(['action' => ['UserController@update', $user->id], 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
              {{-- @method('patch') --}}

                <div class="col-lg-4 advantage-grid-info1">
                    <div class="advantage_left1 text-center">
                        <img src="../../storage/files/profile_pics/{!!$user->image!!}" style="width:150px; height:150px;" class="rounded-circle" alt="profile picture">
                    </div>
                </div>
                {{-- <div class="card"> --}}
                    {{Form::file('file', ['class' => 'btn btn-default active form-control-file', 'title' => 'Click to upload file'])}}
                {{-- </div> --}}
                <div class="form-group">
                    
                    {!!Form::text('name', $user->name, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Username'])!!}
                </div>
                <div class="form-group">
                    
                    {!!Form::text('first_name', $user->first_name, ['class' => 'form-control', 'autofocus', 'placeholder' => 'First Name'])!!}
                </div>
                <div class="form-group">
                    
                    {!!Form::text('last_name', $user->last_name, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Last Name'])!!}
                </div>
                <div class="form-group">
                    
                    {!!Form::text('email', $user->email, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Email'])!!}
                </div>
                <div class="form-group">
                    
                    {!!Form::text('bio', $user->bio, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Biography'])!!}
                </div>
                <div class="form-group">
                    
                    {!!Form::number('phone_number_1', $user->phone_number_1, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Phone Number 1'])!!}
                </div>
                <div class="form-group">
                    
                    {!!Form::number('phone_number_2', $user->phone_number_2, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Phone Number 2'])!!}
                </div>
                <div class="form-group">
                    
                    {!!Form::date('date_of_birth', $user->date_of_birth, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Date of birth'])!!}
                </div>
                <div class="form-group">
                    
                    {!!Form::text('department', $user->department, ['class' => 'form-control', 'autofocus', 'placeholder' => 'Department'])!!}
                </div>
                <div class="form-group">
                    
                    {!!Form::text('school', $user->school, ['class' => 'form-control', 'autofocus', 'placeholder' => 'School'])!!}
                </div>
                <div class="form-group">
                    
                    {!!Form::text('college', $user->college, ['class' => 'form-control', 'autofocus', 'placeholder' => 'College'])!!}
                </div>
                
                {{Form::hidden('_method', 'PUT')}}
                {{Form::submit('Update', ['class' => 'btb btn-primary form-control', 'title' => 'Click to update your profile'])}}
            {!! Form::close() !!}
        </div>
    </div>
</div>
@endsection
