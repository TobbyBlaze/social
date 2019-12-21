<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
      <link rel="icon" type="image/x-icon" href="storage/files/ucc_logo.gif" />
        <meta charset="utf-8">
                <meta http-equiv="X-UA-Compatible" content="IE=edge">
                <meta name="viewport" content="width=device-width, initial-scale=1">
            
                <!-- Bootstrap -->
                <link href="css/bootstrap-4.0.0.css" rel="stylesheet">
                <link href="{{asset('css/app.css')}}" rel="stylesheet">

        <title> {{config('app.name', 'CC')}} </title>   
    </head>
    <body>
              
              <div class="container-fluid"></div>
              @include('inc.messages')
                <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                   {{-- <a class="navbar-brand" href="/"><img src="cc/ucc_logo.gif" width="40" height="40" alt=""/>Campus-Connect</a> --}}
                   <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                   <span class="navbar-toggler-icon"></span>
                   </button>
                   <div class="collapse navbar-collapse" id="navbarSupportedContent">
                      <ul class="navbar-nav mr-auto">
                         <li class="nav-item active">
                            <a class="nav-link" href="/find">Find <span class="sr-only">(current)</span></a>
                         </li>
                         <li class="nav-item active">
                            <a class="nav-link" href="/notification">Notifications</a>
                         </li>
                          <li class="nav-item active">
                            <a class="nav-link" href="/profile">Profile</a>
                         </li>
                    <!--
                         <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Dropdown
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                               <a class="dropdown-item" href="#">Action</a>
                               <a class="dropdown-item" href="#">Another action</a>
                               <div class="dropdown-divider"></div>
                               <a class="dropdown-item" href="#">Something else here</a>
                            </div>
                          </li>
                      -->
                      </ul>
                      <form class="form-inline my-2 my-lg-0" method="" action="">
                        <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
                         <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                     </form>
                  </div>
                </nav>
                <br />
                <div class="container-fluid">
                  
                  <div class="row">
                      <div class="col-1">
                        
                      </div>
                      <div class="col-10 jumbotron">

                            @yield('content')

                      </div>
                  </div>
                    <footer class="align-items-center text-center" id="footer"> &copy 2019 Campus-Connect &nbsp <a href="/about">About us</a></footer>
              </div>
                <!-- jQuery (necessary for Bootstrap's JavaScript plugins) --> 
              <script src="js/jquery-3.2.1.min.js"></script>
            
                <!-- Include all compiled plugins (below), or include individual files as needed --> 
              <script src="cc/js/popper.min.js"></script>
              <script src="cc/js/bootstrap-4.0.0.js"></script>

              <script src="/vendor/unisharp/laravel-ckeditor/ckeditor.js"></script>
              <script>
               // CKEDITOR.replace( 'article-ckeditor' );
              </script>
            
    </body>
</html>
