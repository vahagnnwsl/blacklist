@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <arendator-page :user_id="{{Auth::id()}}"></arendator-page>
        </div>
    </div>
@endsection
