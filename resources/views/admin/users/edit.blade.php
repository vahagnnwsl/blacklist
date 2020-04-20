@extends('admin.layout')

@section('content')



    <div class="container-fluid">
        <header>
            <div class="row ">
                <div class="col-lg-12">
                    <h1 class="h3 display">Пользователь <span class="text-info">#{{$user->id}}</span>
                        <a href="{{route('users.index')}}" title="Back" class="btn btn-primary float-right"><i
                                class="fa fa-arrow-left"></i> </a>
                    </h1>
                </div>
            </div>
        </header>

        <div class="row justify-content-center">

            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-secondary">ОСНОВНЫЕ ДАННЫЕ</h5>
                    </div>
                    <div class="card-body">
                        @include('admin.users.form.'.$user->typeName)
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="card">
                    <div class="card-header">
                        <h5 class="text-secondary">КОНТАКТНОЕ ДАННЫЕ</h5>
                    </div>
                    <div class="card-body">
                        @include('admin.users.form.contact')
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
