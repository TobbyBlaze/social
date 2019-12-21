<!DOCTYPE html>
<html lang="en">
  <head>

	    <!-- ==============================================
		Title and Meta Tags
		=============================================== -->
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">  
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">

		<title>{{ config('app.name', 'web') }}</title>
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
        <link type="text/css" href="assets/css/demos/photo.css" rel="stylesheet" />
				
		<!-- ==============================================
		Feauture Detection
		=============================================== -->
		<script src="http://themashabrand.com/templates/Fluffs/assets/js/modernizr-custom.js"></script>

		<!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
		<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->	

		<script src="{{ asset('js/app.js') }}" defer></script>
		
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
		 <a class="navbar-brand" href="index.html"><i class="fab fa-instagram"></i> Neoconn</a>
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
               <form method="post" class="search-form" action="found-all">
			   {{ csrf_field() }}
                    <input placeholder="Search here" type="text" name="q">
                    <button type="submit"><i class="fa fa-search"></i></button>
               </form>
          </div>							
		   </li>
		  
		 <li class="dropdown mega-avatar">
		  <a href="photo_home.html#" class="dropdown-toggle" data-toggle="dropdown" aria-expanded="true">
		   <span class="avatar w-32"><img src="storage/files/profile_pics/{{Auth::user()->image}}" class="img-resonsive img-circle" width="25" height="25" alt="..."></span>
		   <!-- hidden-xs hides the username on small devices so only the image appears. -->
		   <span class="hidden-xs">
		   {{Auth::user()->name}}
		   </span>
		  </a>
		  <div class="dropdown-menu w dropdown-menu-scale pull-right">
		   <a class="dropdown-item" href="user/{{Auth::user()->id}}"><span>Profile</span></a> 
		   <a class="dropdown-item" href="settings/{{Auth::user()->id}}"><span>Settings</span></a> 
		   <a class="dropdown-item" href="report">Report or Suggestion</a> 
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
	   <div class="p-2 nav-icon-lg" style="background-color:navy;">
	   <a class="nav-icon" href="home"><em class="fa fa-home"></em>
		<span>Home</span>
	   </a>
	   </div>
	   <div class="p-2 nav-icon-lg clean-black">
	   <a class="nav-icon" href="explore"><em class="fa fa-crosshairs"></em>
		<span>Explore</span>
	   </a>
	   </div>
	   <div class="p-2 nav-icon-lg dark-black">
	   <a class="nav-icon" href="https://www.ucc.edu.gh"><em class="fab fa-instagram"></em>
		<span>UCC</span>
	   </a>
	   </div>
	   <div class="p-2 nav-icon-lg clean-black">
	   <a class="nav-icon" href="notification/{{Auth::user()->id}}"><em class="fa fa-align-left"></em>
		<span>Notifications<i class="fa fa-bell"></i><span class="badge badge-light"> {{auth()->user()->unReadNotifications->count()}} </span></span>
	   </a>
	   </div>
	   <div class="p-2 nav-icon-lg dark-black">
	   <a class="nav-icon" href="user/{{Auth::user()->id}}"><em class="fa fa-user"></em>
		<span>Profile</span>
	   </a>
	   </div>
	  </div>
	</section>
  
	 <!-- ==============================================
	 News Feed Section
	 =============================================== --> 
	 <section class="newsfeed">
	  <div class="container-fluid">
		<div class="row">
	    <div class="col-lg-12">  
		
	     <div class="box">

		  {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
            {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'rows' => '3', 'required', 'class' => 'form-control no-border', 'placeholder' => 'Write to your followers...', 'title' => 'Write to your followers...', 'maxlength' => '5000'])}}
            <div class="box-footer clearfix">
			{{Form::submit('Post', ['class' => 'kafe-btn kafe-btn-mint-small pull-right btn-sm', 'title' => 'Click to post'])}}
            {{Form::file('file', ['class' => 'btn btn-default text-center active form-control-file', 'title' => 'Click to upload file'])}}
            </div>
				
			{!! Form::close() !!}
		 </div>	
		 
		</div>
	   </div>
	   <div class="row">
	    <div class="col-lg-3">

		@if(count($myposts)>0)

		<div class="trending-box">
		 <div class="row">
		  <div class="col-lg-12">
		    <h4>Your Posts</h4>
		  </div>
		 </div>
        </div>
        
		@foreach ($myposts as $mypost)
		@if(!Auth::guest())

		@if($mypost->image)
		
		 <a href="show/{{$mypost->id}}">
		 <div class="storybox" 
		   style="background: linear-gradient( rgba(34,34,34,0.78), rgba(34,34,34,0.78)), url('storage/files/images/{{$mypost->image}}') no-repeat;
		          background-size: cover;
                  background-position: center center;
                  -webkit-background-size: cover;
                  -moz-background-size: cover;
                  -o-background-size: cover;">
          <div class="story-body text-center">
           <div class=""><img class="img-circle" src="storage/files/profile_pics/{{$mypost->user->image}}" alt="user"></div>
           <h4>{!!$mypost->user->name!!}</h4>
           <p>{{$mypost->updated_at->diffForHumans()}}</p>
          </div>		  
		 </div>
		 </a>

		 @endif
		 @if($mypost->file)
		
		 <a href="show/{{$mypost->id}}">
		 <div class="storybox" 
		   style="background: linear-gradient( rgba(34,34,34,0.78), rgba(34,34,34,0.78)), url('assets/img/doc.jpg') no-repeat;
		          background-size: cover;
                  background-position: center center;
                  -webkit-background-size: cover;
                  -moz-background-size: cover;
                  -o-background-size: cover;">
          <div class="story-body text-center">
           <div class=""><img class="img-circle" src="storage/files/profile_pics/{{$mypost->user->image}}" alt="user"></div>
		   <p>
		   <a class="btn btn-default" style="padding:1px;" title="Click to download file" href="storage/files/documents/{{$mypost->file}}" download>Download &nbsp {{$mypost->file}}</a>
			</p>
           <h4>{!!$mypost->user->name!!}</h4>
           <p>{{$mypost->updated_at->diffForHumans()}}</p>
          </div>		  
		 </div>
		 </a>

		 @endif

		 @endif
		 @endforeach

		 @endif
		 
		</div><!--/ col-lg-3 -->
	    <div class="col-lg-6">
		

		<!-- Users' posts -->

		@if(count($posts)>0)
        
        @foreach ($posts as $post)
        @if ($post->post_user_id != null)
         <div class="cardbox">
		 
          <div class="cardbox-heading">
           <!-- START dropdown-->
           <div class="dropdown pull-right">
            <button class="btn btn-secondary btn-flat btn-flat-icon" type="button" data-toggle="dropdown" aria-expanded="false">
		     <em class="fa fa-ellipsis-h"></em>
			</button>
            <div class="dropdown-menu dropdown-scale dropdown-menu-right" role="menu" style="position: absolute; transform: translate3d(-136px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
	         <a class="dropdown-item" href="photo_home.html#">Hide post</a>
			 <a class="dropdown-item" href="photo_home.html#">Stop following</a>
			 <a class="dropdown-item" href="photo_home.html#">Report</a>
            </div>
           </div><!--/ dropdown -->
           <!-- END dropdown-->
           <div class="media m-0">
            <div class="d-flex mr-3">
			 <a href="photo_home.html#"><img class="img-responsive img-circle" src="storage/files/profile_pics/{{$post->user->image}}" alt="User"></a>
			</div>
            <div class="media-body">
             <p class="m-0"><a href="user/{{$post->user->id}}" class="black">
                &nbsp {{$post->post_user_name}}
                >>
                {!!$post->user->name!!} </a></p>
			 <small><span>Updated {{$post->updated_at->diffForHumans()}}</span></small>
            </div>
           </div><!--/ media -->
		  </div><!--/ cardbox-heading -->

		  <h6 class="text-center"><a href="/show/{{$post->id}}" class="black"> {!!$post->title!!} </a></h6>
                <br />
                <p> <span style="display:block; color:black; text-overflow: ellipsis; overflow:hidden; white-space:nowrap; ">&nbsp  {!!$post->body!!} </span> </p>
                <br />
		  
		  @if($post->image)
		  <div class="cardbox-item">
		   <a href="storage/files/images/{{$post->image}}" download>
		    <img class="img-responsive" src="storage/files/images/{{$post->image}}" alt="Post pic">
		   </a> 
		  </div><!--/ cardbox-item -->
		  @endif

		  @if($post->file)
		  <div class="cardbox-item">
		   <a href="storage/files/documents/{{$post->file}}" download><p style="color:black;">
		   Download &nbsp {{$post->file}}</p>
		   </a> 
		  </div><!--/ cardbox-item -->
		  @endif
		
          <div class="cardbox-like">
		   <ul>
			<li><a href="photo_home.html#"><i class="fa fa-heart"></i></a><span> 786,286</span></li>
			<li><a href="photo_home.html#" title="" class="com"><i class="fa fa-comments"></i></a> <span class="span-last"> 126,400</span></li>
			<li><a href="photo_home.html#"><i class="fa fa-heart"></i></a><span style="color:black;"> {{$post->views}}</span></li>
		   </ul>
          </div><!--/ cardbox-like -->			  
                
		 </div><!--/ cardbox -->	
		@endif
        @if ($post->post_user_id == null)
		
         <div class="cardbox">
		 
          <div class="cardbox-heading">
           <!-- START dropdown-->
           <div class="dropdown pull-right">
            <button class="btn btn-secondary btn-flat btn-flat-icon" type="button" data-toggle="dropdown" aria-expanded="false">
		     <em class="fa fa-ellipsis-h"></em>
			</button>
            <div class="dropdown-menu dropdown-scale dropdown-menu-right" role="menu" style="position: absolute; transform: translate3d(-136px, 28px, 0px); top: 0px; left: 0px; will-change: transform;">
	         <a class="dropdown-item" href="photo_home.html#">Hide post</a>
			 <a class="dropdown-item" href="photo_home.html#">Stop following</a>
			 <a class="dropdown-item" href="photo_home.html#">Report</a>
            </div>
           </div><!--/ dropdown -->
           <!-- END dropdown-->
           <div class="media m-0">
            <div class="d-flex mr-3">
			 <a href="photo_home.html#"><img class="img-responsive img-circle" src="storage/files/profile_pics/{{$post->user->image}}" alt="User"></a>
			</div>
            <div class="media-body">
             <p class="m-0">{!!$post->user->name!!}</p>
			 <small><span>Updated {{$post->updated_at->diffForHumans()}}</span></small>
            </div>
           </div><!--/ media -->
          </div><!--/ cardbox-heading -->
          
		  <h6 class="text-center"><a href="/show/{{$post->id}}" class="black"> {!!$post->title!!} </a></h6>
                <br />
                <p> <span style="display:block; color:black; text-overflow: ellipsis; overflow:hidden; white-space:nowrap; ">&nbsp  {!!$post->body!!} </span> </p>
                <br />
		  
		  @if($post->image)
		  <div class="cardbox-item">
		   <a href="storage/files/images/{{$post->image}}" download>
		    <img class="img-responsive" src="storage/files/images/{{$post->image}}" alt="Post pic">
		   </a> 
		  </div><!--/ cardbox-item -->
		  @endif

		  @if($post->file)
		  <div class="cardbox-item">
		   <a href="storage/files/documents/{{$post->file}}" download><p style="color:black;">
		   Download &nbsp {{$post->file}}</p>
		   </a> 
		  </div><!--/ cardbox-item -->
		  @endif
		
          <div class="cardbox-like">
		   <ul>
			<li><a href="photo_home.html#"><i class="fa fa-heart"></i></a><span> 786,286</span></li>
			<li><a href="photo_home.html#" title="" class="com"><i class="fa fa-comments"></i></a> <span class="span-last"> 126,400</span></li>
			<li><a href="photo_home.html#"><i class="fa fa-heart"></i></a><span style="color:black;"> {{$post->views}}</span></li>
		   </ul>
		   @include('posts.create_comments')
          </div><!--/ cardbox-like -->			  
                
		 </div><!--/ cardbox -->
		 @endif
        @endforeach
        {{$posts->links()}}
		@else
			<div class="card">
				<h6 class="text-center">There are no posts available for you.</h6>
			</div>
		@endif
		
		</div><!--/ col-lg-6 -->
		<div class="col-lg-3">

		<div class="trending-box">
		 <div class="row">
		  <div class="col-lg-12">
		    <h4>Users to follow</h4>
		  </div>
		 </div>
        </div>
		
         <div class="suggestion-box full-width">
			<div class="suggestions-list">
				@foreach ($users as $user)
				<div class="suggestion-body">
					<a href="user/{{$user->id}}" >
					<img class="img-responsive img-circle" src="storage/files/profile_pics/{{$user->image}}" alt="Image">
					<div class="name-box">
						<h4>{!!$user->name!!}</h4>
						<span>{!!$user->status!!}</span>
					</div>
					<!-- <span><i class="fa fa-plus"></i></span> -->
					</a>
				</div>
				@endforeach
				{{-- {{$users->links()}} --}}
			</div><!--suggestions-list end-->
		</div>	

        <div class="trending-box">
		 <div class="row">
		  <div class="col-lg-12">
		    <h4>Trending Photos</h4>
		  </div>
		 </div>
        </div>
		
		@if(count($postas)>0)
        
        @foreach ($postas as $posta)
		@if($posta->image)

        <div class="trending-box">
		 
		  <div class="col-lg-12">
		   <a href="show/{{$posta->id}}"><img src="storage/files/images/{{$posta->image}}" class="img-responsive" alt="Image"/></a>
		  </div>
		  
        </div>		
		
		@endif
		@endforeach
		@endif
		
		</div>
		
	   </div><!--/ row -->
	  </div><!--/ container -->
	 </section><!--/ newsfeed -->
  
	 <!-- ==============================================
	 Modal Section
	 =============================================== -->
	 
	 
     <!-- ==============================================
	 Scripts
	 =============================================== -->
	<script src="assets/js/jquery.min.js"></script>
	<script src="assets/js/bootstrap.min.js"></script>
	<script src="assets/js/base.js"></script>
	<script src="assets/plugins/slimscroll/jquery.slimscroll.js"></script>
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
