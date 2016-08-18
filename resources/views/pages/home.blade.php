@extends('layouts.app')

@section('title', 'Welcome')
@section('meta_description', '')

@section('content')

    <section id="home">
    	<div class="welcome">
    		<h1>agnieszka krol<br>photography</h1>
    		<p>{{ trans('home.intro') }}</p>
    		<p>{{ trans('home.findOutMore') }} <a href="#about" title="fmore about me">{{ trans('home.aboutMeLink') }}</a></p>
    	</div>
	</section>

@endsection