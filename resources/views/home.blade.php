@extends('layouts.app')

@section('content')

    <div class="flex-center position-ref full-height">

        <div class="content">
            <div class="title m-b-md">
                Черный список арендаторов
            </div>
            <div class="title m-b-md">
                Сервис для собственников недвижимости и управляющих
            </div>

            <h5>
                Количество записей в нашей базе недобросовестных арендаторов: <strong>{{6738 + $count}}</strong>
            </h5>

        </div>
    </div>


@endsection

@push('css')
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 60vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 35px;
        }


        .m-b-md {
            margin-bottom: 30px;
        }
    </style>
@endpush
