@extends('admin.layout')

@section('content')

    <div class="container-fluid">

        <header>
            <div class="row ">
                <div class="col-lg-12">
                    <h1 class="h3 display">Арендатора <span class="text-info text-bold">{{$arendator->fullName}}</span>
                        <a href="{{route('arendators.index')}}" title="Back" class="btn btn-primary float-right"><i
                                class="fa fa-arrow-left"></i> </a>
                    </h1>
                </div>
            </div>

        </header>
        <div class="row justify-content-center">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('arendators.update',$arendator->id)}}" method="POST">
                            @csrf
                            <input name="_method" type="hidden" value="PUT">
                            <input name="type" type="hidden" value="{{$arendator->type}}">

                            @if($arendator->type === 1)
                                @include('admin.arendators.form.individual')
                            @else
                                @include('admin.arendators.form.IndividualEntrepreneur')
                            @endif
                        </form>


                    </div>
                </div>

            </div>
            <div class="col-lg-12">

                <div class="card">
                    <div class="card-header  pr-2">
                        <h5 class="h3 display">
                            Нарушения
                            <button class="btn btn-outline-info float-right" data-toggle="modal"
                                    data-target="#myModal">
                                <i class="fa fa-plus"></i>
                            </button>
                        </h5>

                    </div>
                </div>
                @foreach($arendator->violations as $violation)
                    <div class="card">
                        <div class="card-body">

                            <div class="row">
                                <div class="col-12  pr-1">
                                    <form method="POST"
                                          action="{{ route('arendators-violations.destroy',  $violation->id) }}"
                                          accept-charset="UTF-8"
                                          style="" class=" pr-0">
                                        {{ method_field('DELETE') }}
                                        {{ csrf_field() }}
                                        <button type="submit" class="btn btn-danger float-right"
                                                title="Delete"
                                                onclick="return confirm(&quot;Confirm delete?&quot;)"><i
                                                class="fa fa-remove"></i>
                                        </button>

                                    </form>
                                </div>

                            </div>

                            <form method="POST"
                                  action="{{route('arendators-violations.update',$violation->id)}}" enctype='multipart/form-data'>
                                @csrf
                                <input name="_method" type="hidden" value="PUT">
                                <div class="row p-2">
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="form-group">
                                            <label>Нарушения <span class="text-danger">*</span></label>
                                            <textarea class="form-control"  name="description" required rows="8">{{$violation->description}}</textarea>
                                        </div>

                                    </div>
                                    <div class="col-lg-6 col-sm-12">
                                        <div class="form-group row ">
                                            <label>Статус <span class="text-danger">*</span></label>
                                            <select class="form-control" name="status" required>
                                                <option value="0" @if($violation->status=== 0) selected @endif>
                                                    Не погашено
                                                </option>
                                                <option value="1" @if($violation->status=== 1) selected @endif>
                                                    Погашено
                                                </option>
                                            </select>
                                        </div>
                                        <div class="form-group row ">
                                            <label>Дата <span class="text-danger">*</span></label>
                                            <input type="date" required value="{{$violation->date}}" name="date"
                                                   class="form-control">
                                        </div>
                                        <div class="form-group row ">
                                            <label>Документ </label>
                                            <input type="file"  class="form-control" name="document">
                                        </div>
                                    </div>

                                    <div class="col-12 pr-0">
                                        @if($violation->document)
                                            <a href="/storage{{$violation->document}}" target="_blank">Документ</a>
                                        @endif
                                        <button type="submit" class="btn btn-primary ml-2 float-right"><i class="fa fa-check"></i></button>
                                    </div>
                                </div>

                            </form>


                        </div>
                    </div>

                @endforeach

            </div>

        </div>
    </div>

    <div class="modal" id="myModal">
        <div class="modal-dialog">
            <div class="modal-content">

                <div class="modal-header">
                    <h4 class="modal-title">Добавить новое нарушение</h4>
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                </div>

                <div class="modal-body">
                    <div class="card-body">
                        <form method="POST" action="{{route('arendators-violations.store')}}" class="w-100" enctype='multipart/form-data'>
                            @csrf
                            <input type="hidden" name="arendator_id" value="{{$arendator->id}}">

                            <div class="form-group row p-2">
                                <label>Нарушение <span class="text-danger">*</span></label>
                                <textarea class="form-control orm-control-sm" required name="description" rows="5"></textarea>
                            </div>

                            <div class="form-group row p-2">
                                <label>Статус <span class="text-danger">*</span></label>
                                <select class="form-control" name="status" required>
                                    <option value="0" selected >Не погашено</option>
                                    <option value="1"  selected >Погашено</option>
                                </select>
                            </div>

                            <div class="form-group row p-2">
                                <label>Дата <span class="text-danger">*</span></label>
                                <input type="date" required name="date" class="form-control form-control-sm">
                            </div>

                            <div class="form-group row p-2">
                                    <label>Документ </label>
                                    <input type="file"  class="form-control" name="document">
                            </div>

                            <div class="form-group row  p-2">
                                <div class="col-12 p-0">
                                    <div class="btn-group float-right">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i
                                                class="fa fa-close"></i></button>
                                        <button type="submit" class="btn btn-primary ml-2"><i class="fa fa-check"></i>
                                        </button>
                                    </div>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>

            </div>
        </div>
    </div>

@endsection
