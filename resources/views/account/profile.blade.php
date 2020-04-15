@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">

            <card :user="{{Auth::user()}}" ></card>
            <profile-content :auth_type="{{Auth::user()->type}}" :basic_data="{{ json_encode(Auth::user()->basicData) }}" :contact_data="{{ json_encode(Auth::user()->contactData) }}" ></profile-content>

        </div>
    </div>
@endsection

