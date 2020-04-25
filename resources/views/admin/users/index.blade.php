@extends('admin.layout')

@section('content')

    <div class="container-fluid">

        <header>
            <h1 class="h3 display">Пользователи</h1>
        </header>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form class="form-inline w-100 row" action="{{route('users.index')}}" type="GET">

                            <div class="form-group col-lg-11  col-sm-12">
                                <input id="inlineFormInputGroup" name="key" type="text" value="{{request('key')}}"
                                       placeholder="ФИО, телефон, паспорт, регион, город"
                                       class="mr-3 form-control w-100">
                            </div>
                            <div class="form-group  col-sm-12 col-lg-1">
                                <button type="submit" value="Submit" class="btn-block btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 table-responsive-lg">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Тип</th>
                                    <th>Эл. почта</th>
                                    <th>Дата создан</th>
                                    <th>АПИ</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <th scope="row">{{$user->id}}</th>
                                        <td>{{$user->type}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->created_at->format('d M  Y')}}</td>
                                        <td>{{$user->client_id ? 1 : 0}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{route('users.edit',$user->id)}}" class="btn btn-info mr-2"
                                                   title="Edit">
                                                    <i class="icon-check"></i>
                                                </a>
                                                <form method="POST" action="{{ route('users.destroy',  $user->id) }}" accept-charset="UTF-8"
                                                      style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger" title="Delete"
                                                            onclick="return confirm(&quot;Confirm delete?&quot;)"> <i class="icon-close"></i>
                                                    </button>

                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {!!$users->links()!!}

                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
