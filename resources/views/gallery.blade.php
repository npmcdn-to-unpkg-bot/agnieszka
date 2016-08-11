@extends('layouts.app')

@section('content')

{{ dd($user->roles->first()->name) }}
        <div class="col-md-10 col-md-offset-1">
            
        </div>
@endsection
