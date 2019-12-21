@extends('layouts.te')

@section('content')
<div class="container">
        <div id="carouselExampleIndicators1" class="carousel slide" data-ride="carousel" style="background-color: grey">
                <ol class="carousel-indicators">
                  <li data-target="#carouselExampleIndicators1" data-slide-to="0" class="active"></li>
                  <li data-target="#carouselExampleIndicators1" data-slide-to="1"></li>
                  <li data-target="#carouselExampleIndicators1" data-slide-to="2"></li>
                </ol>
                <div class="carousel-inner" role="listbox">
                  <div class="carousel-item active"> <img class="d-block mx-auto" src="images/Carousel_Placeholder.png" alt="First slide">
                    <div class="carousel-caption">
                      <h5>First slide Heading</h5>
                      <p>First slide Caption</p>
                    </div>
                  </div>
                  <div class="carousel-item"> <img class="d-block mx-auto" src="images/Carousel_Placeholder.png" alt="Second slide">
                    <div class="carousel-caption">
                      <h5>Second slide Heading</h5>
                      <p>Second slide Caption</p>
                    </div>
                  </div>
                  <div class="carousel-item"> <img class="d-block mx-auto" src="images/Carousel_Placeholder.png" alt="Third slide">
                    <div class="carousel-caption">
                      <h5>Third slide Heading</h5>
                      <p>Third slide Caption</p>
                    </div>
                  </div>
                </div>
                <a class="carousel-control-prev" href="#carouselExampleIndicators1" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleIndicators1" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Verify Your Email Address') }}</div>

                <div class="card-body">
                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }}, <a href="{{ route('verification.resend') }}">{{ __('click here to request another') }}</a>.
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
