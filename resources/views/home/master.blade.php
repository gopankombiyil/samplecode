<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Darppanam</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0" />
<meta name="description" content="" />
<!-- css -->
<link href="/css/bootstrap.min.css" rel="stylesheet" />
<link href="/css/fancybox/jquery.fancybox.css" rel="stylesheet">
<link href="/css/jcarousel.css" rel="stylesheet" />
<link href="/css/flexslider.css" rel="stylesheet" />
<link href="/css/style.css" rel="stylesheet" />
<link href="/css/jquery-ui.css" rel="stylesheet" />
<link href="/css/ticker-style.css" rel="stylesheet" type="text/css" />


<!-- Theme skin -->
<link href="/skins/default.css" rel="stylesheet" />

<!-- HTML5 shim, for IE6-8 support of HTML5 elements -->
<!--[if lt IE 9]>
      <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
    <![endif]-->

</head>
<body>
<div id="wrapper">
	<!-- start header -->
	<header>
        <div class="navbar navbar-default navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="index.html"><span>ദ</span>ർപ്പണം</a>
                </div>
                <div class="navbar-collapse collapse ">
                    <ul class="nav navbar-nav">
                        <li class="active"><a href="/">Home</a></li>
                        
                        
                        @if(Auth::user())
                              
                                @role('administrator')
                                    <li class="dropdown">
                                    <a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">Administration<b class=" icon-angle-down"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/users/roles">Roles</a></li>
                                        <li><a href="/users/programmes">Training Programmes</a></li>
                                        <li><a href="/users/schools">Schools</a></li>
                                        <li><a href="/users/centers">Centers</a></li>
                                        <li><a href="/users/tickers">News</a></li>
                                    </ul>
                                </li>
                                @endrole
                                @hasanyrole(Spatie\Permission\Models\Role::all())
                                    <li><a href="/users/registrations">Registration</a></li>
                                    <li><a href="/users/attendances">Attendance</a></li>
                                @endrole
                                    <li><a href="/logout">Logout</a></li>
                                
                        @else
                            
                            <li><a href="/pages/dde">DDE</a></li>
                            <li class="dropdown">
                                    <a href="#" class="dropdown-toggle " data-toggle="dropdown" data-hover="dropdown" data-delay="0" data-close-others="false">DEO<b class=" icon-angle-down"></b></a>
                                    <ul class="dropdown-menu">
                                        <li><a href="/pages/thrissur">Thrissur</a></li>
                                        <li><a href="/pages/irinjalakuda">Irinjalakuda</a></li>
                                        <li><a href="/pages/chavakkad">Chavakkad</a></li>
                                    </ul>
                                </li>
                            <li><a href="/pages/diet">DIET</a></li>
                            <li><a href="/pages/ssa">SSA</a></li>
                            <li><a href="/pages/itatschool">IT@School</a></li>
                            <li><a href="/users">Users</a></li>
                            <li><a href="/lms">LMS</a></li>
                            <li><a href="/pages/orders">Orders & Circulars</a></li>
                            <li><a href="/pages/egovernance">e-governance</a></li>
                            <li><a href="/pages/contact">Contact</a></li>
                        @endif
                    </ul>
                </div>
            </div>
        </div>
	</header>
	<!-- end header -->

	
	@yield('content')
    
	<footer>
	<div class="container">
		<div class="row">
			<div class="col-lg-3">
				<div class="widget">
					<h5 class="widgetheading">Designed and Maintained by </h5>
					<address>
					<strong>IT@School Project, District Office,</strong><br>
					 Palace Road,Thrissur- 680 020<br>
					 Kerala </address>
					<p>
						<i class="icon-phone"></i> 0487 2327159 <br>
						<i class="icon-envelope-alt"></i> darppanam.in@gmail.com
					</p>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="widget">
					<h5 class="widgetheading">Pages</h5>
					<ul class="link-list">
						<li><a href="dde">DDE</a></li>
						<li><a href="deo">DEO</a></li>
						<li><a href="privacy">Privacy policy</a></li>
						<li><a href="ssa">SSA</a></li>
						<li><a href="#">Contact us</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="widget">
					<h5 class="widgetheading">Useful Links</h5>
					<ul class="link-list">
						<li><a href="dde">DDE</a></li>
						<li><a href="deo">DEO</a></li>
						<li><a href="privacy">Privacy policy</a></li>
						<li><a href="ssa">SSA</a></li>
						<li><a href="#">Contact us</a></li>
					</ul>
				</div>
			</div>
			<div class="col-lg-3">
				<div class="widget">
					<h5 class="widgetheading">Other Links</h5>
					<ul class="link-list">
						<li><a href="dde">DDE</a></li>
						<li><a href="deo">DEO</a></li>
						<li><a href="privacy">Privacy policy</a></li>
						<li><a href="ssa">SSA</a></li>
						<li><a href="#">Contact us</a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	<div id="sub-footer">
		<div class="container">
			<div class="row">
				<div class="col-lg-6">
					<div class="copyright">
						<p>
							<span>&copy; Darppanam 2016 All right reserved. Portal designed & maintained by IT@School Project,  Thrissur for Deputy Director of Education, Thrissur. </span> 
						</p>
                        <!-- 
                            All links in the footer should remain intact. 
                            Licenseing information is available at: http://bootstraptaste.com/license/
                            You can buy this theme without footer links online at: http://bootstraptaste.com/buy/?theme=Moderna
                        -->
					</div>
				</div>
				<div class="col-lg-6">
					<ul class="social-network">
						<li><a href="#" data-placement="top" title="Facebook"><i class="fa fa-facebook"></i></a></li>
						<li><a href="#" data-placement="top" title="Twitter"><i class="fa fa-twitter"></i></a></li>
						<li><a href="#" data-placement="top" title="Linkedin"><i class="fa fa-linkedin"></i></a></li>
						<li><a href="#" data-placement="top" title="Pinterest"><i class="fa fa-pinterest"></i></a></li>
						<li><a href="#" data-placement="top" title="Google plus"><i class="fa fa-google-plus"></i></a></li>
					</ul>
				</div>
			</div>
		</div>
	</div>
	</footer>
</div>
<a href="#" class="scrollup"><i class="fa fa-angle-up active"></i></a>
<!-- javascript
    ================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="/js/jquery.js"></script>
<script src="/js/jquery.easing.1.3.js"></script>
<script src="/js/bootstrap.min.js"></script>
<script src="/js/jquery.fancybox.pack.js"></script>
<script src="/js/jquery.fancybox-media.js"></script>
<script src="/js/google-code-prettify/prettify.js"></script>
<script src="/js/portfolio/jquery.quicksand.js"></script>
<script src="/js/portfolio/setting.js"></script>
<script src="/js/jquery.flexslider.js"></script>
<script src="/js/animate.js"></script>
<script src="/js/custom.js"></script>
<script src="/js/jquery-ui.js"></script>
<script src="/js/jquery.ticker.js" type="text/javascript"></script>
<script>
    $('div.alert').not('.alert-important').delay(3000).slideUp(300);
        $(function () {
            $('#js-news').ticker();
        });
    
</script>    
@yield('footer')    
</body>
</html>