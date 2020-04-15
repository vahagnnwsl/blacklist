@extends('admin.layout')

@section('content')

    <div class="container-fluid">

        <header>
            <h1 class="h3 display">Arendator <span class="text-info text-bold">{{$arendator->fullName}}</span></h1>
        </header>
        <div class="row justify-content-center">
            <div class="col-lg-10">
                <div class="card">
                    <div class="card-header">
                        <a href="{{route('arendators.index')}}"  class="btn btn-primary float-right"><i class="fa fa-arrow-left"></i> </a>
                    </div>
                    <div class="card-body">
                        <form action="{{route('arendators.update',$arendator->id)}}" method="POST">
                            @csrf
                            <input name="_method" type="hidden" value="PUT">

                            <div class="row">
                                <div class="form-group col-4">
                                    <label>Type <span class="text-danger">*</span></label>
                                    <select class="form-control" name="type" required>
                                        <option value="1" @if($arendator->type=== 1) selected @endif>Физлицо</option>
                                        <option value="2" @if($arendator->type=== 2) selected @endif>Компания</option>
                                    </select>
                                </div>
                                <div class="form-group col-4">
                                    <label>First name <span class="text-danger">*</span></label>
                                    <input type="text" required value="{{$arendator->first_name}}" name="first_name"
                                           class="form-control">
                                </div>
                                <div class="form-group  col-4">
                                    <label>Last name <span class="text-danger">*</span></label>
                                    <input type="text" required value="{{$arendator->last_name}}" name="last_name"
                                           class="form-control">
                                </div>
                                <div class="form-group  col-4">
                                    <label>Patronymic <span class="text-danger">*</span></label>
                                    <input type="text" required value="{{$arendator->patronymic}}" name="patronymic"
                                           class="form-control">
                                </div>
                                <div class="form-group  col-4">
                                    <label>Contact phone <span class="text-danger">*</span></label>
                                    <input type="text" required value="{{$arendator->contact_phone}}" name="contact_phone"
                                           class="form-control">
                                </div>
                                <div class="form-group  col-4">
                                    <label>Region  <span class="text-danger">*</span></label>
                                    <input type="text" required value="{{$arendator->region}}" name="region"
                                           class="form-control">
                                </div>
                                <div class="form-group  col-4">
                                    <label>City  <span class="text-danger">*</span></label>
                                    <input type="text" required value="{{$arendator->city}}" name="city" class="form-control">
                                </div>
                                <div class="form-group  col-4">
                                    <label>Register  <span class="text-danger">*</span></label>
                                    <input type="text" required value="{{$arendator->register}}" name="register"
                                           class="form-control">
                                </div>
                                <div class="form-group  col-4">
                                    <label>Birth Date  <span class="text-danger">*</span></label>
                                    <input type="date" required value="{{$arendator->birth_date}}" name="birth_date"
                                           class="form-control">
                                </div>
                                <div class="form-group  col-4">
                                    <label>Passport  <span class="text-danger">*</span></label>
                                    <div class="row">
                                        <div class="form-group  col-5">
                                        <input type="text" required value="{{$arendator->passport_serial}}" name="passport_serial"
                                               class="form-control">
                                        </div>
                                        <div class="form-group  col-7">
                                            <input type="text" required value="{{$arendator->passport_number}}" name="passport_number"
                                                   class="form-control">
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group col-4">
                                    <label>Status </label>
                                    <select class="form-control" name="type" required>
                                        <option value="0" @if($arendator->status=== 0) selected @endif>Inactive</option>
                                        <option value="1" @if($arendator->status=== 1) selected @endif>Active</option>
                                    </select>
                                </div>
                                <div class="form-group  col-4">
                                    <label>Image </label>
                                    <input type="file"   name="document" class="form-control">
                                </div>
                                <div class="form-group col-12">
                                    <input type="submit" value="Submit" class="btn btn-primary float-right">
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
