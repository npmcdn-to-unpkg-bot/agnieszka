@extends('layouts.app')

@section('title', 'About')
@section('meta_description', 'Find out more about Agnieszka Krol.')

@section('content')

	<section id="about" class="page">
    	<div class="container-fluid">

			<h2>{{ trans('about.header') }}</h2>

	    	<img src="{{ asset('/images/about_page_photos/round-face.png') }}" class="profile-picture" width="150" height="150" alt="Head picture of Agnieszka Krol">
	    	
	    	<div class="row intro">

	    		<div class="col-xs-12 col-sm-10 col-sm-offset-1">
	    			<p class="lead">{{ trans('about.intro') }}</p>
	    		</div>
	    		
	    	</div>

	    	<div class="row middle">
	    		<div class="hidden-xs hidden-sm col-md-10 col-md-offset-1 col-lg-6 col-lg-offset-0 images">
	    			<div class="picture one">
	    				<div></div>
	    			</div>
	    			<div class="picture two hidden-md">
	    				<div></div>
	    			</div>
	    		</div>
	    		<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2 col-lg-5 col-lg-offset-0 texts">
	    			<p>I came to Switzerland after my husband and at that time I started dedicating myself fully to photography which has always been my passion. Later I took the step of making photography a full time profession as I found myself very fortune about doing it.</p>
					<p>I gave up on my career as a personal adviser within an international corporation. Still interpersonal skills from my previous job happened to be very useful in my work as a photographer. I have a strong individual approach to each photo shooting and I use different means to make it very special.</p>
					<p>I am also a mom of two kids – Zuzanna, my 5 year old daughter and my full time model :) and my little boy – Filip. I have a natural way of working with kids and making them happy and relaxed during photo shootings. My photography is light, ethereal and feminine.</p>
	    		</div>
	    	</div>

	    	<div class="row outro">
	    		<div class="col-xs-12 col-sm-10 col-sm-offset-1 col-md-8 col-md-offset-2">
	    			<p>I want to you to be a part of my story and I also want to be a part of yours!<br><br>
	    			<span>Agnieszka Krol</span></p>
	    		</div>
	    	</div>

    	</div> {{-- /.container-fluid --}}
	</section>

@endsection

@section('customJS')
<script>
	var imgContainer = $(".picture");

	imgContainer.hover(function() {
		img = $(this).find('div');
	  		TweenMax.to(img, .8, {scale: 1.2})
	},function() {
			TweenMax.to(img, .5, {scale: 1})
	});
</script>
@endsection