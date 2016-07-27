@extends('layouts.app')

@section('title', 'Welcome')
@section('meta_description', '')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
        {{-- <form action="" method="selectost" accept-charset="utf-8">
        <select name="language">
            <option value="en">English</option>
            <option value="de">Deutsch</option>
        </select>
        <input type="submit" name="choose" value="Choose">
        </form> --}}
        {{ trans('home.hello') }}

        <ul>
            <li></li>
        </ul>
        </div>
    </div>
</div>
@endsection