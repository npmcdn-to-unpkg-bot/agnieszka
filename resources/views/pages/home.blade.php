@extends('layouts.app')

@section('title', 'Welcome')
@section('meta_description', 'Welcome to Agnieszka Krols portfolio website who is an award-winning portrait photographer specialised in family, newborn, maternity and engagement photography indoors and on locations in Aargau, Switzerland.')

@section('content')

    <section id="home"></section>

@endsection

@section('customJS')
<script>
	$('.top-navbar .logo, .user-link span').addClass('white-logo');
    $('#header #sidebar').addClass('noBackGroundColor');
</script>

@endsection