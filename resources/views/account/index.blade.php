@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <card  :user="{{Auth::user()}}"></card>
            <account-content></account-content>
        </div>
    </div>
@endsection
