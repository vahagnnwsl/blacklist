@extends('layouts.app')

@section('content')

    <div class="container">

        @if($page)
            {!! $page->content !!}
        @endif
    </div>

@endsection


