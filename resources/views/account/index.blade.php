@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <card  :user="{{Auth::user()}}"></card>
            <account-content :user_id="{{Auth::id()}}"></account-content>
        </div>
    </div>
@endsection
