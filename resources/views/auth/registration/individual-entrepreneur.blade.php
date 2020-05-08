@extends('layouts.app')

@section('content')
    <div class="container">


        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3 class="text-center mt-3 mb-3">Регистрация</h3>
                @include('includes.registration-header')

                <form method="POST" action="{{route('register')}}" style="margin-top: 40px" class="row w-100" enctype="multipart/form-data">
                    @csrf
                    <input type="hidden" name="type" value="{{$type}}">

                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                        <label for="company_name">Наименование ИП  <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="company_name" name="company_name"
                               value="{{old('company_name')}}">
                        <small class="form-text text-muted text-right"> <strong>Пример:</strong> ИП Иванов Иван Иванович</small>


                        @error('company_name')
                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                        @enderror
                    </div>
                    <div class="form-group  col-sm-12 col-md-6 col-lg-4">
                        <label for="inn">ИНН <span class="text-danger">*</span></label>
                        <input type="number" min="1" class="form-control" id="inn" name="inn" value="{{old('inn')}}">
                        @error('inn')
                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                        @enderror
                    </div>

                    <div class="form-group  col-sm-12 col-md-6 col-lg-4">
                        <label for="psrnie">ОГРНИП <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="psrnie" name="psrnie" value="{{old('psrnie')}}">
                        @error('psrnie')
                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                        @enderror
                    </div>


                    <div class="form-group  col-sm-12 col-md-6 col-lg-4">
                        <label for="inn">Страна <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="country" name="country" value="{{old('country')}}">
                        @error('country')
                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                        @enderror
                    </div>

                    <div class="form-group  col-sm-12 col-md-6 col-lg-4">
                        <label for="city">Город <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="city" name="city" value="{{old('city')}}">
                        @error('city')
                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                        @enderror
                    </div>
                    <div class="form-group  col-sm-12 col-md-6 col-lg-4">
                        <label for="brand">Торговая марка, бренд название <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="brand" name="brand"
                               value="{{old('brand')}}">
                        @error('brand')
                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                        @enderror
                    </div>

                    <div class="form-group col-sm-12 col-md-6 col-lg-4">
                        <label for="address">Адрес офиса (если есть) </label>
                        <input type="text" class="form-control" id="address" name="address" value="{{old('address')}}">
                        <small class="form-text text-muted text-right">Улица, дом, офис</small>

                        @error('address')
                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                        @enderror
                    </div>


                    <div class="form-group  col-sm-12 col-md-6 col-lg-4">
                        <label for="advertising_number">Рекламный номер по вопросу аренды</label>
                        <input type="number" min="1" class="form-control" id="advertising_number" name="advertising_number"
                               value="{{old('advertising_number')}}">
                        <small class="form-text text-muted text-right">С кодом города</small>

                        @error('advertising_number')
                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                        @enderror
                    </div>





                    <div class="form-group  col-sm-12 col-md-6 col-lg-4">
                        <label for="web_site">Адрес сайта или соцсети </label>
                        <input type="url" class="form-control" id="web_site" name="web_site"
                               value="{{old('web_site')}}">
                        <small class="form-text text-muted text-right"><strong>Пример:</strong>
                            https://www.твой-сайт.ru</small>
                        @error('web_site')
                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                        @enderror
                    </div>



                    <div class="form-group  col-sm-12 col-md-6 col-lg-4">
                        <label for="real_estate_count">Количество объектов недвижимости <span
                                class="text-danger">*</span></label>
                        <input type="number" min="1" class="form-control" id="real_estate_count" name="real_estate_count"
                               value="{{old('real_estate_count')}}">
                        <small class="form-text text-muted text-right">в собственности или управлении</small>

                        @error('real_estate_count')
                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                        @enderror
                    </div>

                    <div class="form-group  col-sm-12 col-md-6 col-lg-4">
                        <label for="document">Подтверждающие документы  <span class="text-danger">*</span></label>
                        <input type="file" class="form-control" id="document" name="documents[]" multiple>
                        <small class="form-text text-muted text-right">Свидетельство индивидуального предпринимателя в ЕГРИП, о постановке на налоговый учет (с ИНН)</small>

                        <span class="invalid-feedback" role="alert">
                            <strong id="file_error"></strong>
                        </span>
                        @error('documents')
                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{$message }}</strong>
                                                    </span>
                        @enderror
                        @error('documents.*')

                        @foreach($errors->get('documents.*') as $de)
                            <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $de[0] }}</strong>
                                                    </span>
                        @endforeach

                        @enderror
                    </div>

                    <div class="form-group  col-sm-12 col-md-6 col-lg-4">
                        <label for="contact_person_full_name">ФИО <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="contact_person_full_name" name="contact_person_full_name"
                               value="{{old('contact_person_full_name')}}">


                        @error('contact_person_full_name')
                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                        @enderror
                    </div>

                    <div class="form-group  col-sm-12 col-md-6 col-lg-4">
                        <label for="contact_phone">Контактный номер телефона <span class="text-danger">*</span></label>
                        <input type="number" min="1" class="form-control" id="contact_phone" name="contact_phone"
                               value="{{old('contact_phone')}}">
                        <small class="form-text text-muted text-right">С кодом города</small>
                        @error('contact_phone')
                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                        @enderror
                    </div>
                    <div class="form-group  col-sm-12 col-md-6 col-lg-4">
                        <label for="contact_phone">Адрес электронной почты  <span class="text-danger">*</span></label>
                        <input type="email" class="form-control" id="email" name="email"
                               value="{{old('email')}}">
                        <small class="form-text text-muted text-right"><strong>Внимание:</strong> доступ к сервису будет предоставлен на данный адрес. Убедитесь в правильности адреса, иначе мы не сможем с вами связаться</small>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                        @enderror
                    </div>

                    <div class="form-group  col-sm-12 col-md-6 col-lg-4">
                        <label for="contact_person_position">Должность  <span class="text-danger">*</span></label>
                        <input type="text" class="form-control" id="contact_person_position" name="contact_person_position" value="{{old('contact_person_position')}}">
                        @error('contact_person_position')
                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                        @enderror
                    </div>

                    <div class="form-group  col-sm-12 col-md-6 col-lg-4">
                        <label for="password">Пароль  <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="password" name="password">
                        <small class="form-text text-muted text-right">Минимум 8 знаков</small>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                        @enderror
                    </div>
                    <div class="form-group  col-sm-12 col-md-6 col-lg-4">
                        <label for="password_confirmation">Пароль еще раз <span class="text-danger">*</span></label>
                        <input type="password" class="form-control" id="password_confirmation" name="password_confirmation">
                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                        @enderror
                    </div>
                    <div class="form-group  col-sm-12 col-md-8 col-lg-8">
                        <label for="about_business">Расскажите коротко о Вашем бизнесе в недвижимости</label>
                        <textarea class="form-control" name="about_business" id="about_business" style="max-height: 50px">{{old('about_business')}}</textarea>
                        @error('about_business')
                        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                        @enderror
                    </div>
                    <div class="form-group  col-sm-12 col-md-4 col-lg-4">
                        <label style="color: #F8FAFC">.sads</label>
                        <button type="submit" class="btn btn-dark form-control" style="height: 50px">
                            Регистрация
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection


@push('scripts')
    <script>
        $('#document').change(function () {
            var msg = '';
            if ($('#document')[0].files.length > 2) {
                msg ='Количество элементов в поле documents не может превышать 2';
                $('#document').val(null)
            } else {
                var files = $('#document')[0].files;
                for (var i in files) {

                    if (files[i].size > 7000000) {

                        msg += "Ошибка загрузки. Допустимый размер файла 7 мб <br>";
                        $('#document').val(null)

                    }
                }
            }
            $('#file_error').html(msg)
        })
    </script>
@endpush
