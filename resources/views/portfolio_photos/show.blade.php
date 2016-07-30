@extends('layouts.app')

@section('title', 'Create a new photo')
@section('meta_description', 'Create a new photo and upload it to the database')

@section('content')
    <div class="container">
        <div class="row">

            <h1>Show all photo</h1>

            @foreach ($portfolio_photos as $photo)
            	<img src="{{ $photo->path }}" alt="">
            @endforeach

        </div>
    </div>
@endsection

{{-- <a href="/photo/create" class="btn btn-primary" title="create photo">Create a photo</a> --}}