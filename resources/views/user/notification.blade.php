<!DOCTYPE html>
<html lang="en">
  <head>

	    <!-- ==============================================
		Title and Meta Tags
		=============================================== -->
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">  
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Fluffs - Ultimate Bootstrap Social Network UI Kit</title>
		<meta name="description" content="" />
        <meta name="keywords" content="" />
        <meta property="og:title" content="" />
        <meta property="og:url" content="" />
        <meta property="og:description" content="" />		
		
		<!-- ==============================================
		Favicons
		=============================================== --> 
		<link rel="icon" href="http://themashabrand.com/templates/Fluffs/assets/img/logo.jpg">
		<link rel="apple-touch-icon" href="http://themashabrand.com/templates/Fluffs/img/favicons/apple-touch-icon.png">
		<link rel="apple-touch-icon" sizes="72x72" href="http://themashabrand.com/templates/Fluffs/img/favicons/apple-touch-icon-72x72.png">
		<link rel="apple-touch-icon" sizes="114x114" href="http://themashabrand.com/templates/Fluffs/img/favicons/apple-touch-icon-114x114.png">
		
	    <!-- ==============================================
		CSS
		=============================================== -->
        <link type="text/css" href="../assets/css/demos/photo.css" rel="stylesheet" />
				
		<!-- ==============================================
		Feauture Detection
		=============================================== -->
		<script src="http://themashabrand.com/templates/Fluffs/assets/js/modernizr-custom.js"></script>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->	
		
  </head>

<body>

     <!-- ==============================================
     Navigation Section
     =============================================== -->  
     <header class="tr-header">
      <nav class="navbar navbar-default">
       <div class="container-fluid">
	    <div class="navbar-header">
		 <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar-collapse">
		  <span class="sr-only">Toggle navigation</span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		  <span class="icon-bar"></span>
		 </button>
		 <a class="navbar-brand" href="../home"><i class="fa fa-heart"></i> Neoconn</a>
		</div><!-- /.navbar-header -->
		<div class="navbar-left">
		 <div class="collapse navbar-collapse" id="navbar-collapse">
		  <ul class="nav navbar-nav">
		  </ul>
		 </div>
		</div><!-- /.navbar-left -->
		<div class="navbar-right">                          
		 <ul class="nav navbar-nav">
		   <li>
		   <div class="search-dashboard">
               <form method="post" class="search-form" action="../found-all">
			   {{ csrf_field() }}
                    <input placeholder="Search here" type="text" name="q">
                    <button type="submit"><i class="fa fa-search"></i></button>
               </form>
          </div>							
		   </li>
		  
		 <li class="dropdown mega-avatar">
		  <a href="photo_home.html#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		   <span class="avatar w-32"><img src="../storage/files/profile_pics/{{Auth::user()->image}}" class="img-resonsive img-circle" width="25" height="25" alt="..."></span>
		   <!-- hidden-xs hides the username on small devices so only the image appears. -->
		   <span class="hidden-xs">
		   {{Auth::user()->name}}
		   </span>
		  </a>
		  <div class="dropdown-menu w dropdown-menu-scale pull-right">
		   <a class="dropdown-item" href="../user/{{Auth::user()->id}}"><span>Profile</span></a> 
		   <a class="dropdown-item" href="../settings/{{Auth::user()->id}}"><span>Settings</span></a> 
		   <a class="dropdown-item" href="../report">Report or Suggestion</a> 
		   <div class="dropdown-divider"></div>
		   <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" >Sign out</a>
		   <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
			</form>
		  </div>
		 </li><!-- /navbar-item -->	
		 
		 </ul><!-- /.sign-in -->   
		</div><!-- /.nav-right -->
       </div><!-- /.container -->
      </nav><!-- /.navbar -->
     </header><!-- Page Header --> 
  
	 <!-- ==============================================
	 Navbar Second Section
	 =============================================== -->
	<section class="nav-sec">
	  <div class="d-flex justify-content-between">
	   <div class="p-2 nav-icon-lg dark-black">
	   <a class="nav-icon" href="../home"><em class="fa fa-home"></em>
		<span>Home</span>
	   </a>
	   </div>
	   <div class="p-2 nav-icon-lg clean-black">
	   <a class="nav-icon" href="../explore"><em class="fa fa-crosshairs"></em>
		<span>Explore</span>
	   </a>
	   </div>
	   <div class="p-2 nav-icon-lg dark-black">
	   <a class="nav-icon" href="https://www.ucc.edu.gh"><em class="fab fa-instagram"></em>
		<span>UCC</span>
	   </a>
	   </div>
	   <div class="p-2 nav-icon-lg" style="background-color:navy;">
	   <a class="nav-icon" href="notification/{{Auth::user()->id}}"><em class="fa fa-align-left"></em>
		<span>Notifications<i class="fa fa-bell"></i><span class="badge badge-light"> {{auth()->user()->unReadNotifications->count()}} </span></span>
	   </a>
	   </div>
	   <div class="p-2 nav-icon-lg dark-black">
	   <a class="nav-icon" href="../user/{{Auth::user()->id}}"><em class="fa fa-user"></em>
		<span>Profile</span>
	   </a>
	   </div>
	  </div>
	</section>	
  
	 <!-- ==============================================
	 News Feed Section
	 =============================================== --> 
	 <section class="notifications">
	  <div class="container">
	   <div class="row">
	   
	    <div class="col-lg-8 col-lg-offset-2">
      @if (auth()->user()->notifications->count() > 0)
          <a href="{{auth()->user()->id}}/read" class="btn btn-primary"> Mark all as read </a>
      @endif
      @if (auth()->user()->notifications->count() == 0)
          <p style="color:black;">You have no notification.</p>
      @endif
		<ul>
      @foreach (auth()->user()->unReadNotifications as $notification)
      @if ($notification->type == "App\Notifications\\newFollower")
		 <li>
           <div class="media first_child"> 
            <img src="assets/img/users/1.jpg" alt="" class="img-responsive img-circle">  
            <div class="media_body">
             <a href="../user/{{Auth::user()->id}}/followers"  class="black"><p style="color:black;">{{$notification->data['data']}} <br> {{$notification->updated_at->diffForHumans()}}</p> </a>
            </div>
           </div>
         </li>
         @endif
         @if ($notification->type == "App\Notifications\\newComment")
		 <li>
           <div class="media first_child"> 
            <img src="assets/img/users/1.jpg" alt="" class="img-responsive img-circle">  
            <div class="media_body">
             <a href="../show/" class="black"><p style="color:black;">{{$notification->data['data']}} <br> {{$notification->updated_at->diffForHumans()}}</p></a>
            </div> 
           </div>
         </li>
         @endif
         @if ($notification->type == "App\Notifications\\newPost")
		 <li>
           <div class="media first_child"> 
            <img src="assets/img/users/1.jpg" alt="" class="img-responsive img-circle">  
            <div class="media_body">
             <a href="../user/{{Auth::user()->id}}" class="black"><p style="color:black;">{{$notification->data['data']}} <br> {{$notification->updated_at->diffForHumans()}}</p></a>
            </div> 
           </div>
         </li>
         @endif
         @endforeach

         @foreach (auth()->user()->readNotifications as $notification)
      @if ($notification->type == "App\Notifications\\newFollower")
		 <li>
           <div class="media first_child"> 
            <img src="assets/img/users/1.jpg" alt="" class="img-responsive img-circle">  
            <div class="media_body">
             <a href="../user/{{Auth::user()->id}}/followers" class="black"><p style="color:black;">{{$notification->data['data']}} <br> {{$notification->updated_at->diffForHumans()}}</p></a>
            </div> 
           </div>
         </li>
         @endif
         @if ($notification->type == "App\Notifications\\newComment")
		 <li>
           <div class="media first_child"> 
            <img src="assets/img/users/1.jpg" alt="" class="img-responsive img-circle">  
            <div class="media_body">
             <a href="../show/" class="black"><p style="color:black;">{{$notification->data['data']}} <br> {{$notification->updated_at->diffForHumans()}}</p></a>
            </div> 
           </div>
         </li>
         @endif
         @if ($notification->type == "App\Notifications\\newPost")
		 <li>
           <div class="media first_child"> 
            <img src="assets/img/users/1.jpg" alt="" class="img-responsive img-circle">  
            <div class="media_body">
             <a href="../user/{{Auth::user()->id}}" class="black"><p style="color:black;">{{$notification->data['data']}} <br> {{$notification->updated_at->diffForHumans()}}</p></a>
            </div> 
           </div>
         </li>
         @endif
         @endforeach

		</ul>
		
		</div>
		
       </div><!--/ row-->	
	  </div><!--/ container -->
	 </section><!--/ profile -->
	   
     <!-- ==============================================
	 Scripts
	 =============================================== -->
	<script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../assets/js/base.js"></script>
	<script src="../assets/plugins/slimscroll/jquery.slimscroll.js"></script>
	<script>
	$('#Slim,#Slim2').slimScroll({
	        height:"auto",
			position: 'right',
			railVisible: true,
			alwaysVisible: true,
			size:"8px",
		});		
	</script>

  </body>
</html>
