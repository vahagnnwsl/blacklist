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
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('arendators.update',$arendator->id)}}" method="POST">
                            @csrf
                            <input name="_method" type="hidden" value="PUT">

                            <div class="row">
                                <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                    <label>Тип <span class="text-danger">*</span></label>
                                    <select class="form-control" name="type" required>
                                        <option value="1" @if($arendator->type == 1) selected @endif>Физлицо</option>
                                        <option value="2" @if($arendator->type == 2) selected @endif>Компания</option>
                                    </select>

                                </div>
                                <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                    <label>Имя <span class="text-danger">*</span></label>
                                    <input type="text" required value="{{$arendator->first_name}}" name="first_name"
                                           class="form-control">
                                    @error('first_name')
                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group   col-lg-4 col-md-6 col-sm-12">
                                    <label>Фамилия <span class="text-danger">*</span></label>
                                    <input type="text" required value="{{$arendator->last_name}}" name="last_name"
                                           class="form-control">
                                    @error('last_name')
                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group   col-lg-4 col-md-6 col-sm-12">
                                    <label>Отчество <span class="text-danger">*</span></label>
                                    <input type="text" required value="{{$arendator->patronymic}}" name="patronymic"
                                           class="form-control">
                                    @error('patronymic')
                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group   col-lg-4 col-md-6 col-sm-12">
                                    <label>Контактный телефон <span class="text-danger">*</span></label>
                                    <input type="text" required value="{{$arendator->contact_phone}}"
                                           name="contact_phone"
                                           class="form-control">
                                    @error('contact_phone')
                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group   col-lg-4 col-md-6 col-sm-12">
                                    <label>Регион <span class="text-danger">*</span></label>
                                    <input type="text" required value="{{$arendator->region}}" name="region"
                                           class="form-control">
                                    @error('region')
                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group   col-lg-4 col-md-6 col-sm-12">
                                    <label>Город <span class="text-danger">*</span></label>
                                    <input type="text" required value="{{$arendator->city}}" name="city"
                                           class="form-control">
                                    @error('city')
                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group  col-lg-4 col-md-6 col-sm-12">
                                    <label>Прописка <span class="text-danger">*</span></label>
                                    <input type="text" required value="{{$arendator->register}}" name="register"
                                           class="form-control">
                                    @error('register')
                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group   col-lg-4 col-md-6 col-sm-12">
                                    <label>Дата рождения <span class="text-danger">*</span></label>
                                    <input type="date" required value="{{$arendator->birth_date}}" name="birth_date"
                                           class="form-control">
                                    @error('birth_date')
                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group   col-lg-4 col-md-6 col-sm-12">
                                    <label>Паспорт <span class="text-danger">*</span></label>
                                    <div class="row">
                                        <div class="form-group  col-5">
                                            <input type="text" required value="{{$arendator->passport_serial}}"
                                                   name="passport_serial"
                                                   class="form-control">
                                            @error('passport_serial')
                                            <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                        <div class="form-group  col-7">
                                            <input type="text" required value="{{$arendator->passport_number}}"
                                                   name="passport_number"
                                                   class="form-control">
                                            @error('passport_number')
                                            <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group  col-lg-4 col-md-6 col-sm-12">
                                    <label>Статус  </label>
                                    <select class="form-control" name="status" required>
                                        <option value="0" @if($arendator->status == 0) selected @endif>Inactive</option>
                                        <option value="1" @if($arendator->status == 1) selected @endif>Active</option>
                                    </select>
                                </div>

                                <div class="form-group col-12">
                                    <button  class="btn btn-primary float-right"><i class="fa fa-check"></i> </button>
                                </div>
                            </div>
                        </form>


                    </div>
                </div>

            </div>
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-header">

                        <h5 class="h3 display">
                            Нарушения
                            <button  class="btn btn-outline-info float-right mr-3" data-toggle="modal" data-target="#myModal">
                                <i class="fa fa-plus"></i>
                            </button>
                        </h5>

                    </div>

                    <div class="card-body">

                        <div id="accordion">
                            @foreach($arendator->violations as $violation)
                                <div class="card" style="border: 1px solid  #F4F7FA">
                                    <div class="card-header" style="background-color: #F4F7FA">
                                        <a class="card-link" data-toggle="collapse" href="#collapse{{$violation->id}}" style="color: #393836">
                                            Нарушения  {{$loop->iteration}}
                                        </a>
                                        <form method="POST" action="{{ route('arendators-violations.destroy',  $violation->id) }}" accept-charset="UTF-8"
                                              style="display:inline">
                                            {{ method_field('DELETE') }}
                                            {{ csrf_field() }}
                                            <button type="submit" class="btn btn-outline-danger float-right btn-sm" title="Delete"
                                                    onclick="return confirm(&quot;Confirm delete?&quot;)"> <i class="fa fa-remove"></i>
                                            </button>

                                        </form>
                                    </div>
                                    <div id="collapse{{$violation->id}}" class="collapse @if (session()->has('arendatorViolation_id') && session()->get('arendatorViolation_id') == $violation->id ) show @else @if($loop->first && !session()->has('arendatorViolation_id')) show @endif  @endif" data-parent="#accordion">
                                        <div class="card-body" >
                                          <form method="POST" action="{{route('arendators-violations.update',$violation->id)}}">
                                              @csrf
                                              <input name="_method" type="hidden" value="PUT">

                                              <div class="form-group row p-2">
                                                  <label>Нарушения <span class="text-danger">*</span></label>
                                                  <input type="text" required value="{{$violation->description}}" name="description" class="form-control form-control-sm">
                                              </div>
                                              <div class="form-group row p-2">
                                                  <label>Статус <span class="text-danger">*</span></label>
                                                  <select class="form-control" name="status" required>
                                                      <option value="0" @if($violation->status=== 0) selected @endif>Не погашено</option>
                                                      <option value="1" @if($violation->status=== 1) selected @endif>Погашено</option>
                                                  </select>
                                              </div>
                                              <div class="form-group row p-2">
                                                  <label>Дата <span class="text-danger">*</span></label>
                                                  <input type="date" required value="{{$violation->date}}" name="date" class="form-control form-control-sm">
                                              </div>
                                              <div class="form-group row  p-2">
                                                  <div class="col-12 p-0">
                                                      <button type="submit"  class="btn btn-primary float-right"><i class="fa fa-check"></i> </button>
                                                  </div>
                                              </div>
                                          </form>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>

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
                        <form method="POST" action="{{route('arendators-violations.store')}}" class="w-100">
                            @csrf
                            <input type="hidden" name="arendator_id" value="{{$arendator->id}}">

                            <div class="form-group row p-2">
                                <label>Нарушение <span class="text-danger">*</span></label>
                                <input type="text" required  name="description" class="form-control form-control-sm">
                            </div>

                            <div class="form-group row p-2">
                                <label>Статус <span class="text-danger">*</span></label>
                                <select class="form-control" name="status" required>
                                    <option value="0" @if($arendator->status=== 0) selected @endif>Не погашено</option>
                                    <option value="1" @if($arendator->status=== 1) selected @endif>Погашено</option>
                                </select>
                            </div>

                            <div class="form-group row p-2">
                                <label>Дата <span class="text-danger">*</span></label>
                                <input type="date" required  name="date" class="form-control form-control-sm">
                            </div>

                            <div class="form-group row  p-2">
                                <div class="col-12 p-0">
                                    <div class="btn-group float-right">
                                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i></button>
                                        <button type="submit"  class="btn btn-primary ml-2"><i class="fa fa-check"></i> </button>
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
