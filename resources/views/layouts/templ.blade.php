<!DOCTYPE html>

<!--[if !IE]><!-->
<html lang="en-US" class="no-js">
<!--<![endif]-->
<!--[if IE 9]>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en-US" class="no-js ie9">
<![endif]-->

<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	<link rel="icon" type="image/x-icon" href="../../storage/files/neoconn.gif" />
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	<!-- CSRF Token -->
	<meta name="csrf-token" content="{{ csrf_token() }}">

	<title>{{ config('app.name', 'web') }}</title>

	<!-- Scripts -->
	{{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
	<script src="{{ asset('js/custom.js') }}" defer></script>

	<!-- Fonts -->
	<link rel="dns-prefetch" href="//fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet" type="text/css">

	<!-- Styles -->
	<link rel="stylesheet" href="css/app.css">
	<link href="{{ asset('css/app.css') }}" rel="stylesheet">

	<link rel="profile" href="http://gmpg.org/xfn/11" />
	<meta name='robots' content='noindex,follow' />
	<link rel='dns-prefetch' href='http://s.w.org/' />
	<link rel="alternate" type="application/rss+xml" title="Buddy &raquo; Feed" href="https://buddy.ghostpool.com/feed/" />
	<link rel="alternate" type="application/rss+xml" title="Buddy &raquo; Comments Feed" href="https://buddy.ghostpool.com/comments/feed/" />
	<script type="text/javascript">
		window._wpemojiSettings = {"baseUrl":"https:\/\/s.w.org\/images\/core\/emoji\/12.0.0-1\/72x72\/","ext":".png","svgUrl":"https:\/\/s.w.org\/images\/core\/emoji\/12.0.0-1\/svg\/","svgExt":".svg","source":{"concatemoji":"https:\/\/buddy.ghostpool.com\/wp-includes\/js\/wp-emoji-release.min.js?ver=5.2.2"}};
		!function(a,b,c){function d(a,b){var c=String.fromCharCode;l.clearRect(0,0,k.width,k.height),l.fillText(c.apply(this,a),0,0);var d=k.toDataURL();l.clearRect(0,0,k.width,k.height),l.fillText(c.apply(this,b),0,0);var e=k.toDataURL();return d===e}function e(a){var b;if(!l||!l.fillText)return!1;switch(l.textBaseline="top",l.font="600 32px Arial",a){case"flag":return!(b=d([55356,56826,55356,56819],[55356,56826,8203,55356,56819]))&&(b=d([55356,57332,56128,56423,56128,56418,56128,56421,56128,56430,56128,56423,56128,56447],[55356,57332,8203,56128,56423,8203,56128,56418,8203,56128,56421,8203,56128,56430,8203,56128,56423,8203,56128,56447]),!b);case"emoji":return b=d([55357,56424,55356,57342,8205,55358,56605,8205,55357,56424,55356,57340],[55357,56424,55356,57342,8203,55358,56605,8203,55357,56424,55356,57340]),!b}return!1}function f(a){var c=b.createElement("script");c.src=a,c.defer=c.type="text/javascript",b.getElementsByTagName("head")[0].appendChild(c)}var g,h,i,j,k=b.createElement("canvas"),l=k.getContext&&k.getContext("2d");for(j=Array("flag","emoji"),c.supports={everything:!0,everythingExceptFlag:!0},i=0;i<j.length;i++)c.supports[j[i]]=e(j[i]),c.supports.everything=c.supports.everything&&c.supports[j[i]],"flag"!==j[i]&&(c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&c.supports[j[i]]);c.supports.everythingExceptFlag=c.supports.everythingExceptFlag&&!c.supports.flag,c.DOMReady=!1,c.readyCallback=function(){c.DOMReady=!0},c.supports.everything||(h=function(){c.readyCallback()},b.addEventListener?(b.addEventListener("DOMContentLoaded",h,!1),a.addEventListener("load",h,!1)):(a.attachEvent("onload",h),b.attachEvent("onreadystatechange",function(){"complete"===b.readyState&&c.readyCallback()})),g=c.source||{},g.concatemoji?f(g.concatemoji):g.wpemoji&&g.twemoji&&(f(g.twemoji),f(g.wpemoji)))}(window,document,window._wpemojiSettings);
	</script>
	<style type="text/css">
		img.wp-smiley,
		img.emoji {
			display: inline !important;
			border: none !important;
			box-shadow: none !important;
			height: 1em !important;
			width: 1em !important;
			margin: 0 .07em !important;
			vertical-align: -0.1em !important;
			background: none !important;
			padding: 0 !important;
		}
	</style>
	<link rel='stylesheet' id='wp-block-library-css'  href='https://buddy.ghostpool.com/wp-includes/css/dist/block-library/style.min.css?ver=5.2.2' type='text/css' media='all' />
	<link rel='stylesheet' id='bbp-default-css'  href='https://buddy.ghostpool.com/wp-content/plugins/bbpress/templates/default/css/bbpress.css?ver=2.5.14-6684' type='text/css' media='screen' />
	<link rel='stylesheet' id='bp-legacy-css-css'  href='https://buddy.ghostpool.com/wp-content/plugins/buddypress/bp-templates/bp-legacy/css/buddypress.min.css?ver=4.3.0' type='text/css' media='screen' />
	<link rel='stylesheet' id='contact-form-7-css'  href='https://buddy.ghostpool.com/wp-content/plugins/contact-form-7/includes/css/styles.css?ver=5.1.3' type='text/css' media='all' />
	<link rel='stylesheet' id='ghostpool-style-css'  href='https://buddy.ghostpool.com/wp-content/themes/buddy-child/style.css?ver=5.2.2' type='text/css' media='all' />
	<link rel='stylesheet' id='fontawesome-css'  href='https://buddy.ghostpool.com/wp-content/themes/buddy/lib/fonts/font-awesome/css/font-awesome.min.css?ver=5.2.2' type='text/css' media='all' />
	<link rel='stylesheet' id='prettyphoto-css'  href='https://buddy.ghostpool.com/wp-content/themes/buddy/lib/scripts/prettyPhoto/css/prettyPhoto.css?ver=5.2.2' type='text/css' media='all' />
	<link rel='stylesheet' id='gp-bp-css'  href='https://buddy.ghostpool.com/wp-content/themes/buddy/lib/css/bp.css?ver=5.2.2' type='text/css' media='all' />
	<link rel='stylesheet' id='gp-bbp-css'  href='https://buddy.ghostpool.com/wp-content/themes/buddy/lib/css/bbpress.css?ver=5.2.2' type='text/css' media='all' />
	<script type='text/javascript' src='https://buddy.ghostpool.com/wp-includes/js/jquery/jquery.js?ver=1.12.4-wp'></script>
	<script type='text/javascript' src='https://buddy.ghostpool.com/wp-includes/js/jquery/jquery-migrate.min.js?ver=1.4.1'></script>
	<script type='text/javascript'>
	/* <![CDATA[ */
	var BP_Confirm = {"are_you_sure":"Are you sure?"};
	/* ]]> */
	</script>
	<script type='text/javascript' src='https://buddy.ghostpool.com/wp-content/plugins/buddypress/bp-core/js/confirm.min.js?ver=4.3.0'></script>
	<script type='text/javascript' src='https://buddy.ghostpool.com/wp-content/plugins/buddypress/bp-core/js/widget-members.min.js?ver=4.3.0'></script>
	<script type='text/javascript' src='https://buddy.ghostpool.com/wp-content/plugins/buddypress/bp-core/js/jquery-query.min.js?ver=4.3.0'></script>
	<script type='text/javascript' src='https://buddy.ghostpool.com/wp-content/plugins/buddypress/bp-core/js/vendor/jquery-cookie.min.js?ver=4.3.0'></script>
	<script type='text/javascript' src='https://buddy.ghostpool.com/wp-content/plugins/buddypress/bp-core/js/vendor/jquery-scroll-to.min.js?ver=4.3.0'></script>
	<script type='text/javascript'>
	/* <![CDATA[ */
	var BP_DTheme = {"accepted":"Accepted","close":"Close","comments":"comments","leave_group_confirm":"Are you sure you want to leave this group?","mark_as_fav":"Favorite","my_favs":"My Favorites","rejected":"Rejected","remove_fav":"Remove Favorite","show_all":"Show all","show_all_comments":"Show all comments for this thread","show_x_comments":"Show all comments (%d)","unsaved_changes":"Your profile has unsaved changes. If you leave the page, the changes will be lost.","view":"View","store_filter_settings":""};
	/* ]]> */
	</script>
	<script type='text/javascript' src='https://buddy.ghostpool.com/wp-content/plugins/buddypress/bp-templates/bp-legacy/js/buddypress.min.js?ver=4.3.0'></script>
	<script type='text/javascript' src='https://buddy.ghostpool.com/wp-content/plugins/buddypress/bp-groups/js/widget-groups.min.js?ver=4.3.0'></script>
	<link rel='https://api.w.org/' href='https://buddy.ghostpool.com/wp-json/' />
	<link rel="EditURI" type="application/rsd+xml" title="RSD" href="https://buddy.ghostpool.com/xmlrpc.php?rsd" />
	<link rel="wlwmanifest" type="application/wlwmanifest+xml" href="https://buddy.ghostpool.com/wp-includes/wlwmanifest.xml" /> 
	<link rel="canonical" href="index.html" />
	<link rel='shortlink' href='https://buddy.ghostpool.com/?p=223' />
	<link rel="alternate" type="application/json+oembed" href="https://buddy.ghostpool.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fbuddy.ghostpool.com%2Fblog%2F" />
	<link rel="alternate" type="text/xml+oembed" href="https://buddy.ghostpool.com/wp-json/oembed/1.0/embed?url=https%3A%2F%2Fbuddy.ghostpool.com%2Fblog%2F&amp;format=xml" />

	<script type="text/javascript">var ajaxurl = 'https://buddy.ghostpool.com/wp-admin/admin-ajax.php';</script>

	<script>if (top != self) { top.location.replace(self.location.href); }</script>
</head>

<body class="bp-legacy page-template-default page page-id-223 gp-theme sb-both gp-fixed-header gp-back-to-top-all gp-lightbox-group gp-profile-all gp-has-title gp-responsive gp-retina no-js" style="text-overflow:hidden;">
	<div id="page-wrapper">
		<header id="header">
			<div id="logo" style="" class="default-logo">
				<a href="">
					<img src="../../storage/files/neoconn.gif" width="40" height="40" alt="{{config('app.name', 'CC')}}" />
				</a>
			</div>
			<nav id="nav">
				<ul id="menu-header" class="menu">
					<li id="menu-item-511" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-511">
						<form method="post" class="search-form" action="../../found-all">
							{{ csrf_field() }}
							<input type="text" name="q" class="gp-search-bar" style="padding-top:0px; padding-right:10px;padding-left:100px;" value="" placeholder="Search" /><input type="submit" class="gp-search-submit" style="padding-top:4px; padding-bottom:4px; padding-right:1px; padding-left:1px;" value="Search" />
							{{-- <i class="fa fa-search"></i> --}}
						</form></li>
					<li id="menu-item-511" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-511"><a href="/neoconn/public/home">Home<i class="fa fa-home"></i></a></li>
					<li id="menu-item-475" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-223 current_page_item menu-item-475"><a href="/neoconn/public/notification/{{Auth::user()->id}}" aria-current="page">Notifications<i class="fa fa-bell"></i><span class="badge badge-light"> {{auth()->user()->unReadNotifications->count()}} </span></a></li>
					<li id="menu-item-475" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-223 current_page_item menu-item-475"><a href="https://www.ucc.edu.gh" aria-current="page">Ucc<i class="fa fa-rocket"></i></a></li>
					<li id="menu-item-475" class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-223 current_page_item menu-item-475"><a href="/neoconn/public/user/{{Auth::user()->id}}" aria-current="page">Profile<i class="fa fa-user"></i> </a></li>
				</ul>
				<div id="bp-buttons">
					<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="button bp-button signup-button" style="background-color:#A30F0F;">Log out</a>						
				</div>
				<a id="mobile-nav-button"><i class="fa fa-bars"></i></a>
			</nav>
			<nav id="mobile-nav">
				<form method="post" class="search-form" action="found-all" role="search">
					{{ csrf_field() }}
					<input type="text" name="q" class="gp-search-bar" value="" placeholder="Search" /><input type="submit" class="gp-search-submit" value="Search" />
				</form>
				<ul class="menu">
					<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-home menu-item-511"><a href="/neoconn/public/home">Home<i class="fa fa-home"></i></a></li>
					<li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-223 current_page_item menu-item-475"><a href="/neoconn/public/notification/{{Auth::user()->id}}" aria-current="page">Notifications<i class="fa fa-bell"></i><span class="badge badge-light"> {{auth()->user()->unReadNotifications->count()}} </span></a></li>
					<li class="menu-item menu-item-type-post_type menu-item-object-page current-menu-item page_item page-item-223 current_page_item menu-item-475"><a href="https://www.ucc.edu.gh" aria-current="page">Ucc<i class="fa fa-rocket"></i></a></li>
					<li class="menu-item menu-item-type-post_type menu-item-object-page menu-item-476"><a href="/neoconn/public/user/{{Auth::user()->id}}">Profile<i class="fa fa-user"></i></a></li>
				</ul>			

				<div id="mobile-bp-buttons">
					<a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" class="bp-button signup-button" style="background-color:#A30F0F;">Log out</a>						
				</div>
				<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
					@csrf
				</form>
			</nav>	
		</header>
		
		<div id="gp-fixed-padding"></div>
		<span hidden>
		{{$me = auth()->user()}}
		</span>
		<div id="content-wrapper">
			<div id="left-content-wrapper">		
				<div id="content">
					<div class="padder">
						<main class="py-4">
							@yield('content')
						</main>
					</div>
				</div>
				<aside id="sidebar-left" class="sidebar">
					<div id="bp_core_members_widget-1" class="widget widget_bp_core_members_widget buddypress widget">
						<h3 class="widgettitle">Suggested users for you</h3>
						<div class="item-options" id="members-list-options">
							<span class="bp-separator" role="separator">|</span>
							<span class="bp-separator" role="separator">|</span>
						</div>
						<ul id="members-list" class="item-list" aria-live="polite" aria-relevant="all" aria-atomic="true">
							@foreach ($users as $user)
								<li class="vcard">
									<div class="item-avatar">
										<a href="../../user/{{$user->id}}" class="bp-tooltip"> <img style="width:40px; height:40px" src="../../storage/files/profile_pics/{{$user->image}}" class="rounded-circle" alt="profile picture" /> </a>
									</div>

									<div class="item">
										<div class="item-title fn">
											<a href="../../user/{{$user->id}}" class="black">{!!$user->name!!} </a><br />
										</div>
									</div> 
									<div class="item">
										<div class="item-title fn">
											<a href="../../user/{{$user->id}}" class="black">A {!!$user->status!!} </a><br />
										</div>
									</div> 
								</li>
							@endforeach
							{{-- {{$users->links()}} --}}
						</ul>
						<input type="hidden" id="_wpnonce-members" name="_wpnonce-members" value="8d609dbc30" />
						<input type="hidden" name="members_widget_max" id="members_widget_max" value="5" />
					</div>					
				</aside>
			</div>
			<aside id="sidebar-right" class="sidebar">
				<div id="gp-statistics-widget-5" class="widget gp-statistics">		
					<h3 class="widgettitle">{{auth()->user()->name}}'s Statistics</h3>		
					<style>#gp-statistics-widget-5 .gp-stats > div{background-color: #C12F6C}</style>
					<div class="gp-stats">
						<div class="gp-post-stats" style="background-color:#3490dc; border-color:#3490dc;">
							<span class="gp-stat-details ">
								<span class="gp-stat-title">Your Posts</span>
								<span class="gp-stat-count"> {{$me->posts->count()}} </span>
							</span>	
						</div>
						<div class="gp-member-stats" style="background-color:#3490dc; border-color:#3490dc;">
							<span class="gp-stat-details">
								<a href="../../user/{{auth()->user()->id}}/followers">
								<span class="gp-stat-title" style="color:white;">Your Followers</span>
								<span class="gp-stat-count" style="color:white;"> {{$me->followers->count()}} </span>
								</a>
							</span>	
						</div>
						<div class="gp-member-stats" style="background-color:#3490dc; border-color:#3490dc;">
							<span class="gp-stat-details">
								<a href="../../user/{{auth()->user()->id}}/followings">
									<span class="gp-stat-title" style="color:white;">Your Followings</span>
									<span class="gp-stat-count" style="color:white;"> {{$me->followings->count()}} </span>
								</a>
							</span>	
						</div>
					</div>
				</div>
				<div id="bp_core_whos_online_widget-1" class="widget widget_bp_core_whos_online_widget buddypress widget">
					<h3 class="widgettitle">Personality of the week</h3>
					<div class="widget-error"></div>
				</div>
			</aside>
			<div class="clear"></div>
		</div>
	</div>
	<footer id="footer" style="background-color:black;">
		<div id="footer-widgets">
			<div class="footer-widget footer-1 footer-fourth">
				<div id="text-1" class="widget widget_text"  style="background-color:black;">
					<div class="textwidget" >
						<div class="sc-image aligncenter" style="  width: 182px; height: 124px; background-color:black;">
							<a href="https://www.ucc.edu.gh" title="" data-rel="noopener noreferrer" target="_self">
								<img src="../../storage/files/ucc_logo.gif" data-rel="" alt="Campus Connect" width="50p" height="50" />
								<h6 style="color:white;"> University of Cape Coast </h6> 
							</a>
						</div>
					</div>
				</div>
			</div>
			<div class="footer-widget footer-4 footer-fourth">
				<div id="text-2" class="widget widget_text" style="background-color:black;">
					&nbsp <h3><a href="/neoconn/public/about" class="widgettitle" style="color:white;">About Us</a></h3>
					<div class="textwidget"> </div>
				</div>
			</div>
			<div id="copyright" style="color:white;">Copyright &copy; 2019 | <a href="" style="color:white;">{{ config('app.name', 'web') }}</a>. All rights reserved.</div>
		</div>
	</footer>
	<script type='text/javascript' src='https://buddy.ghostpool.com/wp-content/plugins/bbpress/templates/default/js/editor.js?ver=2.5.14-6684'></script>
	<script type='text/javascript' src='https://buddy.ghostpool.com/wp-includes/js/comment-reply.min.js?ver=5.2.2'></script>
	<script type='text/javascript'>
	/* <![CDATA[ */
	var wpcf7 = {"apiSettings":{"root":"https:\/\/buddy.ghostpool.com\/wp-json\/contact-form-7\/v1","namespace":"contact-form-7\/v1"},"cached":"1"};
	/* ]]> */
	</script>
	<script type='text/javascript' src='https://buddy.ghostpool.com/wp-content/plugins/contact-form-7/includes/js/scripts.js?ver=5.1.3'></script>
	<script type='text/javascript' src='https://buddy.ghostpool.com/wp-content/themes/buddy/lib/scripts/modernizr.js?ver=5.2.2'></script>
	<script type='text/javascript' src='https://buddy.ghostpool.com/wp-content/themes/buddy/lib/scripts/jquery.ui.totop.min.js?ver=5.2.2'></script>
	<script type='text/javascript' src='https://buddy.ghostpool.com/wp-content/themes/buddy/lib/scripts/prettyPhoto/js/jquery.prettyPhoto.js?ver=5.2.2'></script>
	<script type='text/javascript' src='https://buddy.ghostpool.com/wp-content/themes/buddy/lib/scripts/jquery.touchSwipe.min.js?ver=5.2.2'></script>
	<script type='text/javascript' src='https://buddy.ghostpool.com/wp-content/themes/buddy/lib/scripts/jquery.flexslider-min.js?ver=5.2.2'></script>
	<script type='text/javascript'>
	/* <![CDATA[ */
	var ghostpool_script = {"url":"https:\/\/buddy.ghostpool.com\/blog\/","loginRedirect":"https:\/\/buddy.ghostpool.com\/","emptySearchText":"Please enter something in the search box!","lightbox":""};
	/* ]]> */
	</script>
	<script type='text/javascript' src='https://buddy.ghostpool.com/wp-content/themes/buddy/lib/scripts/custom.js?ver=5.2.2'></script>
	<script type='text/javascript' src='https://buddy.ghostpool.com/wp-includes/js/wp-embed.min.js?ver=5.2.2'></script>

</body>

</html>