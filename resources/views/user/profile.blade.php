<!DOCTYPE html>
<html lang="en">
  <head>

	    <!-- ==============================================
		Title and Meta Tags
		=============================================== -->
		<meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">  
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Neoconn</title>
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
	   <div class="p-2 nav-icon-lg clean-black">
	   <a class="nav-icon" href="../notification/{{Auth::user()->id}}"><em class="fa fa-align-left"></em>
		<span>Notifications<i class="fa fa-bell"></i><span class="badge badge-light"> {{auth()->user()->unReadNotifications->count()}} </span></span>
	   </a>
	   </div>
	   <div class="p-2 nav-icon-lg" style="background-color:navy;">
	   <a class="nav-icon" href="../user/{{Auth::user()->id}}"><em class="fa fa-user"></em>
		<span>Profile</span>
	   </a>
	   </div>
	  </div>
	</section>	
  
	 <!-- ==============================================
	 News Feed Section
	 =============================================== --> 
	 <section class="profile">
	  <div class="container-fluid">
	   <div class="row">
	   
	   <div class="col-lg-3">
		 <div class="profilebox hidden-xs hidden-sm" 
		   style="background: linear-gradient( rgba(34,34,34,0.45), rgba(34,34,34,0.45)), url('assets/img/posts/4.jpg') no-repeat;
		          background-size: cover;
                  background-position: center center;
                  -webkit-background-size: cover;
                  -moz-background-size: cover;
                  -o-background-size: cover;">		  
		 </div>
		 <div class="profilebox hidden-xs hidden-sm" 
		   style="background: linear-gradient( rgba(34,34,34,0.45), rgba(34,34,34,0.45)), url('assets/img/posts/1.jpg') no-repeat;
		          background-size: cover;
                  background-position: center center;
                  -webkit-background-size: cover;
                  -moz-background-size: cover;
                  -o-background-size: cover;">		  
		 </div>
	   </div>
	   <div class="col-lg-6">
		 <div class="profilebox-large hidden-xs hidden-sm" 
		   style="background: linear-gradient( rgba(34,34,34,0.45), rgba(34,34,34,0.45)), url('assets/img/posts/9.jpg') no-repeat;
		          background-size: cover;
                  background-position: center center;
                  -webkit-background-size: cover;
                  -moz-background-size: cover;
                  -o-background-size: cover;">		  
		 </div>
	   </div>
	   <div class="col-lg-3">
		 <div class="profilebox hidden-xs hidden-sm" 
		   style="background: linear-gradient( rgba(34,34,34,0.45), rgba(34,34,34,0.45)), url('assets/img/posts/11.jpg') no-repeat;
		          background-size: cover;
                  background-position: center center;
                  -webkit-background-size: cover;
                  -moz-background-size: cover;
                  -o-background-size: cover;">		  
		 </div>
		 <div class="profilebox" 
		   style="background: linear-gradient( rgba(34,34,34,0.6), rgba(34,34,34,0.6)), url('assets/img/posts/12.jpg') no-repeat;
		          background-size: cover;
                  background-position: center center;
                  -webkit-background-size: cover;
                  -moz-background-size: cover;
                  -o-background-size: cover;">		  
		 </div>
	   </div>
		
       </div><!--/ row-->	
	  </div><!--/ container -->
	 </section><!--/ profile -->
  
	 <!-- ==============================================
	 User Profile Section
	 =============================================== --> 
	 <section class="user-profile">
	  <div class="container-fluid">
	   <div class="row">
	   
	    <div class="col-lg-12">
		   <div class="post-content">
		    <div class="author-post text-center">
		     <a href="#photo_home.html#myModal" data-toggle="modal"><img class="img-fluid img-circle" src="../storage/files/profile_pics/{!!$user->image!!}" alt="Image"></a>
		    </div><!-- /author -->
		   </div><!-- /.post-content -->		
		</div><!-- /col-sm-12 -->
		
       </div><!--/ row-->	
	  </div><!--/ container -->
	 </section><!--/ profile -->
  
	 <!-- ==============================================
	 User Profile Section
	 =============================================== --> 
	 <section class="details">
	  <div class="container">
	   <div class="row">
	    <div class="col-lg-12">
		 
          <div class="details-box row">
		   <div class="col-lg-9">
           <div class="content-box">
			 <h4>{!!$user->title!!} {!! $user->first_name!!} {!! $user->last_name!!}({!!$user->name!!})
			@if ($user->verified) 
			<i class="fa fa-check"></i>
			@endif
			</h4>
			 @if ($user->bio)
			 <p>{!!$user->bio!!}</p>
			 @endif
			 @if ($user->website)
			 <small><span>{!!$user->website!!}</span></small>
			 @endif
           </div><!--/ media -->
		   </div> 
		   <div class="col-lg-3">
           <div class="follow-box">
		   <span hidden>
                {{$me = auth()->user()}}
			</span>
			@if((($me->followings->count() < 1) && ($me->id != $user->id)) || (($user->followers->count() < 1) && ($me->id != $user->id)))
			<a href="{{route('user.follow', $user->id)}}" class="kafe-btn kafe-btn-mint"><i class="fa fa-check"></i> Follow</a>
			@endif
			@foreach ($user->followers as $follower)
                {{-- {{$follower}} --}}
				@foreach ($me->followings as $mefollowing)
					@if (($follower->id == auth()->user()->id) && ($mefollowing->id == $user->id))
						<a id="unfollow" href="{{route('user.unfollow', $user->id)}}" class="kafe-btn kafe-btn-mint"><i class="fa fa-check"></i> Unfollow</a>
					@endif
					@if (($me->id != $follower->id) && ($mefollowing->id != $user->id) && ($me->id != $user->id))
						<a is="follow" href="{{route('user.follow', $user->id)}}" class="kafe-btn kafe-btn-mint"><i class="fa fa-check"></i> Follow</a>
					@endif
				@endforeach
			@endforeach
			<!-- {{$pfollower}} -->
			<!-- @foreach ($user->followers as $follower)
                {{-- {{$follower}} --}}
				@if ($follower->id == auth()->user()->id)
					<a href="{{route('user.unfollow', $user->id)}}" class="kafe-btn kafe-btn-mint"><i class="fa fa-check"></i> Unfollow</a>
				@endif
			@endforeach
			@foreach ($me->followings as $mefollowing)
				@if (($follower->id == auth()->user()->id) && ($mefollowing->id == $user->id))
					<a href="{{route('user.unfollow', $user->id)}}" class="kafe-btn kafe-btn-mint"><i class="fa fa-check"></i> Unfollow</a>
				@endif
				@if (($me->id != $follower->id) && ($mefollowing->id != $user->id) && ($me->id != $user->id))
					<a href="{{route('user.follow', $user->id)}}" class="kafe-btn kafe-btn-mint"><i class="fa fa-check"></i> Follow</a>
				@endif
			@endforeach -->

			@if(Auth::user()->id == $user->id)
				<a href="{{$user->id}}/edit" class="kafe-btn kafe-btn-mint"> Edit profile </a>
			@endif
           </div><!--/ dropdown -->
		   </div>
          </div><!--/ details-box -->
		  
		</div>
	   </div>
	  </div><!--/ container -->
	 </section><!--/ profile -->

	 <!-- ==============================================
	 Home Menu Section
	 =============================================== -->	
     <section class="home-menu">
      <div class="container">
       <div class="row">

        <div class="menu-category">
         <ul class="menu">
          <li class="current-menu-item"><a href="photo_profile.html">Posts <span>{{$user->posts->count()}}</span></a></li>
          <li><a href="photo_followers.html">Followers <span>{{$user->followers->count()}}</span></a></li>
          <li><a href="photo_followers.html">Following <span>{{$user->followings->count()}}</span></a></li>
         </ul>
		</div>
		
	   </div><!--/row -->
      </div><!--/container -->
     </section><!--/home-menu -->	

	 <!-- ==============================================
	 News Feed Section
	 =============================================== --> 
	 <section class="newsfeed">
	  <div class="container">

	  <div class="row">
	    <div class="col-lg-12">  
		
	     <div class="box">

		 @foreach ($user->followers as $follower)
			@foreach ($me->followings as $mefollowing)
				@if (($follower->id == auth()->user()->id) && ($mefollowing->id == $user->id))

		  {!! Form::open(['action' => 'PostsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}

		  {{Form::hidden('user_id', $user->id, ['class' => 'form-control'])}}
            {{-- {{Form::hidden('post_user_id', auth()->user()->id, ['class' => 'form-control'])}} --}}
            {{Form::hidden('user_name', auth()->user()->name, ['class' => 'form-control'])}}

            {{Form::textarea('body', '', ['id' => 'article-ckeditor', 'rows' => '3', 'required', 'class' => 'form-control no-border', 'placeholder' => 'Write to ' .$user->name. '...', 'title' => 'Write to your followers...', 'maxlength' => '5000'])}}
            <div class="box-footer clearfix">
			{{Form::submit('Post to '.$user->name.'', ['class' => 'kafe-btn kafe-btn-mint-small pull-right btn-sm', 'title' => 'Click to post to '.$user->name.''])}}
            {{Form::file('file', ['class' => 'btn btn-default text-center active form-control-file', 'title' => 'Click to upload file'])}}
            </div>
				
			{!! Form::close() !!}
		 </div>	
		 @endif
		@endforeach
		@endforeach

		@if(count($posts)>0)
        
		@foreach ($posts as $post)
		@if(!Auth::guest())
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
			 <a href=""><img class="img-responsive img-circle" src="../storage/files/profile_pics/{{$post->user->image}}" alt="User"></a>
			</div>
            <div class="media-body">
             <p class="m-0">{!!$post->user->name!!}</p>
			 <small><span>Updated {{$post->updated_at->diffForHumans()}}</span></small>
            </div>
           </div><!--/ media -->
          </div><!--/ cardbox-heading -->
          
		  <h6 class="text-center"><a href="../show/{{$post->id}}" class="black"> {!!$post->title!!} </a></h6>
                <br />
                <p> <span style="display:block; color:black; text-overflow: ellipsis; overflow:hidden; white-space:nowrap; ">&nbsp  {!!$post->body!!} </span> </p>
                <br />
		  
		  @if($post->image)
		  <div class="cardbox-item">
		   <a href="../storage/files/images/{{$post->image}}" download>
		    <img class="img-responsive" src="../storage/files/images/{{$post->image}}" alt="Post pic">
		   </a> 
		  </div><!--/ cardbox-item -->
		  @endif

		  @if($post->file)
		  <div class="cardbox-item">
		   <a href="../storage/files/documents/{{$post->file}}" download><p style="color:black;">
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
		 @endif
        @endforeach
		{{$posts->links()}}
		@endif
		 
		</div>
	  
	  </div><!--/ container -->
	 </section><!--/ newsfeed -->
  
	 <!-- ==============================================
	 Modal Section
	 =============================================== -->
     <div id="myModal" class="modal fade">
      <div class="modal-dialog">
       <div class="modal-content">
        <div class="modal-body">
		
         <div class="row">
		 
          <div class="col-md-11 modal-image">
           <img class="img-responsive" src="../storage/files/profile_pics/{!!$user->image!!}" alt="Image"/>
          </div><!--/ col-md-11 -->
          <div class="col-md-1 modal-meta">
           <div class="modal-meta-top">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">
			 <span aria-hidden="true">×</span><span class="sr-only">Close</span>
			</button><!--/ button -->
			  
           </div><!--/ modal-meta-top -->
          </div><!--/ col-md-1 -->
		  
         </div><!--/ row -->
        </div><!--/ modal-body -->
		
       </div><!--/ modal-content -->
      </div><!--/ modal-dialog -->
     </div><!--/ modal -->	 
	   
     <!-- ==============================================
	 Scripts
	 =============================================== -->
	<script src="../assets/js/jquery.min.js"></script>
	<script src="../assets/js/bootstrap.min.js"></script>
	<script src="../../assets/js/base.js"></script>
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
