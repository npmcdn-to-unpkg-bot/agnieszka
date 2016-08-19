@extends('layouts.app')

@section('title', 'Welcome')
@section('meta_description', '')

@section('content')

    <section id="home">
    	<div class="welcome">
    		<div class="intro">
    			<h1>AGNIESZKA KROL<br><span>Photography</span></h1>
    		</div>
    	</div>
    			
    	<div class="social-icons">
    	    <li>{!! file_get_contents("images/social-icons/facebook.svg") !!}</li>
    	    <li>{!! file_get_contents("images/social-icons/twitter.svg") !!}</li>
    	    <li>{!! file_get_contents("images/social-icons/instagramm.svg") !!}</li>
    	</div>
	</section>

@endsection