@extends('layouts.app')

@section('title', 'About')
@section('meta_description', '')

@section('content')

    <section id="about">
		<p>{{ trans('home.intro') }}</p>
    	<p>{{ trans('home.findOutMore') }} <a href="#about" title="fmore about me">{{ trans('home.aboutMeLink') }}</a></p>
	</section>

@endsection