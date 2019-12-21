@extends('layouts.te')

@section('content')

<div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel" style="background-color: grey">
        <ol class="carousel-indicators">
          <li data-target="#carouselExampleIndicators1" data-slide-to="0" class="active"></li>
          <li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>
          <li data-target="#carouselExampleIndicators1" data-slide-to="2"></li>
        </ol>
        <div class="carousel-inner" role="listbox">
          <div class="carousel-item active"> <img class="d-block mx-auto" style="width:100%; height:200px" src="storage/files/one.jpg" alt="First slide">
            <div class="carousel-caption">
              <h5>Neoconn</h5>
            </div>
          </div>
          <div class="carousel-item"> <img class="d-block mx-auto" style="width:100%; height:200px" src="storage/files/two.jpg" alt="Second slide">
            <div class="carousel-caption">
              <h5></h5>
            </div>
          </div>
          <div class="carousel-item"> <img class="d-block mx-auto" style="width:100%; height:200px" src="storage/files/ucc_logo.png" alt="Third slide">
            <div class="carousel-caption">
              <h5></h5>
            </div>
          </div>
        </div>
        <a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
</div>

<div class="container-fluid">
        
    <div class="row justify-content-center">
        <div class="col-md-8">
            <br />
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        
                        <div class="form-group row" hidden>
                            <div class="col-md-6">
                                <input id="id" type="number" name="id" value="{{ mt_rand(100000, 999999) }}" >
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right" title="Click to enter your Username. This will display on your profile.">{{ __('UserName') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }}" name="name" value="{{ old('name') }}" required placeholder="UserName">

                                @if ($errors->has('name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="title" class="col-md-4 col-form-label text-md-right" title="Click to select your optional title, E.g Mr, Mrs, Prof, Dr, etc.">{{ __('Title') }}</label>

                            <div class="col-md-6">
                                <select name="title" id="title">
                                    <option value="Mr.">Mr</option>
                                    <option value="Mrs.">Mrs</option>
                                    <option value="Miss.">Miss</option>
                                    <option value="Prof.">Prof</option>
                                    <option value="Dr.">Dr</option>
                                  </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="first_name" class="col-md-4 col-form-label text-md-right" title="Click to enter your first name. This will display on your profile.">{{ __('First Name') }}</label>

                            <div class="col-md-6">
                                <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }}" name="first_name" value="{{ old('first_name') }}" required placeholder="First Name">

                                @if ($errors->has('first_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('first_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="last_name" class="col-md-4 col-form-label text-md-right" title="Click to enter your last name. This will display on your profile.">{{ __('Last Name') }}</label>

                            <div class="col-md-6">
                                <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }}" name="last_name" value="{{ old('last_name') }}" required placeholder="Last Name">

                                @if ($errors->has('last_name'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('last_name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>


                        <div class="form-group row">
                            <label for="status" class="col-md-4 col-form-label text-md-right" title="Click to select your optional status, E.g Student, Lecturer, Teaching Assistant, etc.">{{ __('Status') }}</label>

                            <div class="col-md-6">
                                <select name="status" id="status">
                                    <option value="Student">Student</option>
                                    <option value="Lecturer">Lecturer</option>
                                    <option value="Teaching Assistant">Teaching Assistant</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="reg_no" class="col-md-4 col-form-label text-md-right" title="Click to enter your last name. This will display on your profile.">{{ __('Registration Number') }}</label>

                            <div class="col-md-6">
                                <input id="reg_no" type="text" class="form-control{{ $errors->has('re_no') ? ' is-invalid' : '' }}" name="reg_no" value="{{ old('reg_no') }}" required placeholder="Registration Number">

                                @if ($errors->has('reg_no'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('reg_no') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right" title="Click to enter your email.">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}@mail.com" required>
                                {{--<a class="btn btn-primary" disabled>@stu.edu.gh</a>--}}
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right" title="Click to enter your password.">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" placeholder="Password must be at least 8 characters long" required>

                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right" title="Click to confirm your password.">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm password must match Password." required>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number_1" class="col-md-4 col-form-label text-md-right" title="Click to enter your phone number. This will display on your profile.">{{ __('Phone Number 1') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number_1" type="number" class="form-control{{ $errors->has('phone_number_1') ? ' is-invalid' : '' }}" name="phone_number_1" value="{{ old('phone_number_1') }}" required placeholder="0123456789">

                                @if ($errors->has('phone_number_1'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('phone_number_1') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="phone_number_2" class="col-md-4 col-form-label text-md-right" title="Click to enter your phone number. This will display on your profile.">{{ __('Phone Number 2') }}</label>

                            <div class="col-md-6">
                                <input id="phone_number_2" type="number" class="form-control" name="phone_number_2" value="{{ old('phone_number_2') }}" placeholder="0123456789">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="date_of_birth" class="col-md-4 col-form-label text-md-right" title="Click to select your date of birth. This will display on your profile.">{{ __('Date of birth') }}</label>

                            <div class="col-md-6">
                                <input id="date_of_birth" type="date" class="form-control" name="date_of_birth" value="{{ old('date_of_birth') }}">
                            </div>
                        </div>
                        
                        <div class="form-group row">
                            <label for="department" class="col-md-4 col-form-label text-md-right" title="Click to enter your department name. This will display on your profile.">{{ __('Department') }}</label>

                            <div class="col-md-6">
                                <input id="department" type="text" class="form-control" name="department" value="{{ old('department') }}" placeholder="Department">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="school" class="col-md-4 col-form-label text-md-right" title="Click to enter your school name. This will display on your profile.">{{ __('school') }}</label>

                            <div class="col-md-6">
                                <input id="school" type="text" class="form-control" name="school" value="{{ old('school') }}" placeholder="school">
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="college" class="col-md-4 col-form-label text-md-right" title="Click to enter your College name. This will display on your profile.">{{ __('College') }}</label>

                            <div class="col-md-6">
                                <input id="college" type="text" class="form-control" name="college" value="{{ old('college') }}" placeholder="College">
                            </div>
                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button id="reg" name="reg" type="submit" class="btn btn-primary" title="Click to register.">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                    {!!$f = null!!}
                    @if (!empty($_POST['reg']))
                        {!!$f = auth()->user()->id!!}
                        <a id="autofollow" href="{{route('user.follow', $f)}}" class="btn btn-primary" hidden>Follow</a>
                    @endif
                    {{-- <a id="autofollow" href="{{route('user.follow', $f)}}" class="btn btn-primary" hidden>Follow</a> --}}
        </div>
    </div>
</div>
@endsection
