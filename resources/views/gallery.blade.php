@extends('layouts.app')

@section('content')

{{ dd($user->roles->first()->name) }}
<div class="container">
    <div class="row">
        <div class="col-md-10 col-md-offset-1">
            
        </div>
    </div>
</div>
@endsection
