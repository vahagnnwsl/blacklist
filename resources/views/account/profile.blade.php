@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <profile-page :auth_type="{{Auth::user()->type}}"
                             :user="{{ json_encode(new \App\Http\Resources\User(Auth::user(),true)) }}"
                             >

            </profile-page>

        </div>
    </div>
@endsection

