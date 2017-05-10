@extends('home.master')
@section('content')
	<div class="row">
            <div class="col-lg-10 col-lg-offset-2">
                
                <ul id="js-news" class="js-hidden">
                    @foreach($tickers as $ticker)
                        <li class="news-item"><a href="{{$ticker->link}}">{{$ticker->newsitem}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
	<section id="featured">
        
	<!-- start slider -->
	<div class="container">
       
		<div class="row">
			<div class="col-lg-12">
	<!-- Slider -->
        <div id="main-slider" class="flexslider">
            <ul class="slides">
              <li>
                <img src="img/slides/1.jpg" alt="" />
                <div class="flex-caption">
                    <h3>ദർപ്പണം</h3> 
					<p>ലേണിംഗ് മാനേജ്മെന്റ് സിസ്റ്റം എല്ലാവർക്കും പങ്കാളിത്തം, എല്ലാവർക്കും പഠന നേട്ടം</p> 
					<a href="#" class="btn btn-theme">Learn More</a>
                </div>
              </li>
              <li>
                <img src="img/slides/2.jpg" alt="" />
                <div class="flex-caption">
                    <h3>ദർപ്പണം</h3> 
					<p>എല്ലാ മേഖലകളും  ഒരു കുടകീഴിൽ</p> 
					<a href="#" class="btn btn-theme">Learn More</a>
                </div>
              </li>
              <li>
                <img src="img/slides/3.jpg" alt="" />
                <div class="flex-caption">
                    <h3>ദർപ്പണം</h3> 
					<p>പരിശീലനങ്ങൾ ഐ സി ടി സാങ്കേതിക സഹായത്തോടെ </p> 
					<a href="#" class="btn btn-theme">Learn More</a>
                </div>
              </li>
            </ul>
        </div>
	<!-- end slider -->
			</div>
		</div>
	</div>	
	
	

	</section>
	<section id="content">
	<div class="container">
		<div class="row">
			<div class="col-lg-12">
				<div class="row">
					<div class="col-lg-3">
						<div class="box">
							<div class="box-gray aligncenter">
								<h4>Gallery</h4>
								<div class="icon">
								<i class="fa fa-picture-o fa-3x"></i>
								</div>
								<p>
								 Photo Gallery with a wide range of events and activities.
								</p>
									
							</div>
							<div class="box-bottom">
								<a href="/pages/gallery">Go</a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="box">
							<div class="box-gray aligncenter">
								<h4>Useful Links</h4>
								<div class="icon">
								<i class="fa fa-link fa-3x"></i>
								</div>
								<p>
								 A list of use full websites reference pages
								</p>
									
							</div>
							<div class="box-bottom">
								<a href="/pages/links">Go</a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="box">
							<div class="box-gray aligncenter">
								<h4>Downloads</h4>
								<div class="icon">
								<i class="fa fa-download fa-3x"></i>
								</div>
								<p>
								 Download  useful resources for future use. 
								</p>
									
							</div>
							<div class="box-bottom">
								<a href="/pages/downloads">Go</a>
							</div>
						</div>
					</div>
					<div class="col-lg-3">
						<div class="box">
							<div class="box-gray aligncenter">
								<h4>What's New</h4>
								<div class="icon">
								<i class="fa fa-question-circle fa-3x"></i>
								</div>
								<p>
								 Learn what's happening around you.
								</p>
									
							</div>
							<div class="box-bottom">
								<a href="/pages/new">Go</a>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
		<!-- divider -->
		<div class="row">
			<div class="col-lg-12">
				<div class="solidline">
				</div>
			</div>
		</div>
		<!-- end divider -->
	</div>
	</section>
@stop