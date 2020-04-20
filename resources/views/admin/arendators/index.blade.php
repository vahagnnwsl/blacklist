@extends('admin.layout')

@section('content')

    <div class="container-fluid">

        <header>
            <h1 class="h3 display">Арендатори</h1>
        </header>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body">
                        <form class="form-inline w-100 row" action="{{route('arendators.index')}}" type="GET">
                            <div class="form-group col-lg-4 col-sm-12">
                                <input id="inlineFormInput" name="region" type="text" placeholder="Все регионы" value="{{request('region')}}" class="mr-3 form-control w-100">
                            </div>
                            <div class="form-group col-lg-7  col-sm-12">
                                <input id="inlineFormInputGroup"  name="key" type="text" value="{{request('key')}}" placeholder="ФИО, телефон, паспорт, регион, город, прописка" class="mr-3 form-control w-100">
                            </div>
                            <div class="form-group  col-sm-12 col-lg-1">
                                <button type="submit" value="Submit" class="mr-3 btn btn-primary">
                                    <i class="fa fa-search"></i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 table-responsive-lg">
                <div class="card">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Тип</th>
                                    <th>ФИО</th>
                                    <th>Область</th>
                                    <th>Город</th>
                                    <th>Дата создан</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($arendators as $arendator)
                                    <tr>
                                        <th scope="row">{{$arendator->id}}</th>
                                        <td>{{$arendator->type}}</td>
                                        <td>{{$arendator->fullName}}</td>
                                        <td>{{$arendator->region}}</td>
                                        <td>{{$arendator->city}}</td>
                                        <td>{{$arendator->created_at->format('d M  Y')}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{route('arendators.edit',$arendator->id)}}" class="btn btn-info mr-2" title="Edit">
                                                    <i class="icon-check"></i>
                                                </a>
                                                <form method="POST" action="{{ route('arendators.destroy',  $arendator->id) }}" accept-charset="UTF-8"
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
                        {!!$arendators->links()!!}
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
