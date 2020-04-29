@extends('layouts.app')

@section('content')

    <div class="container">
        <div class="row justify-content-center">
            @if($page)
                {!! $page->content !!}
            @endif
        </div>
    </div>

@endsection


