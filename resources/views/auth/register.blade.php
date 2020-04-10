@extends('layouts.app')

@section('scripts')
    <script src="{{ asset('js/registration.js') }}" defer></script>
@endsection
@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <h3 class="text-center mt-3 mb-3">Регистрация</h3>

                 <div class="tab" style="margin-top: 30px">
                     <nav>
                         <div class="nav nav-tabs nav-fill" id="nav-tab" role="tablist">
                             <a class="nav-item nav-link active" id="nav-natural-tab" data-toggle="tab" href="#nav-natural" role="tab" aria-controls="nav-natural" aria-selected="true">КАК ФИЗИЧЕСКОЕ ЛИЦО</a>
                             <a class="nav-item nav-link" id="nav-juridical-tab" data-toggle="tab" href="#nav-juridical" role="tab" aria-controls="nav-juridical" aria-selected="false">КАК ЮРИДИЧЕСКОЕ ЛИЦО</a>
                             <a class="nav-item nav-link" id="nav-individual-tab" data-toggle="tab" href="#nav-individual" role="tab" aria-controls="nav-individual" aria-selected="false">КАК ИНДИВИДУАЛЬНЫМ ПРЕДПРИНИМАТЕЛЬ</a>
                         </div>
                     </nav>

                 </div>
{{--                <div class="card">--}}
{{--                    <div class="card-header text-center"><h3>Регистрация</h3></div>--}}
{{--                    <div class="card-body">--}}
{{--                      --}}
{{--                        <form method="POST" action="{{ route('register') }}">--}}
{{--                            @csrf--}}
{{--                            <div class="form-group row">--}}
{{--                                <label for="type" class="col-md-4 col-form-label text-md-right">Тип</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <div class="form-check">--}}
{{--                                        <input class="form-check-input" type="radio" name="type" id="type1" value="1" required>--}}
{{--                                        <label class="form-check-label" for="type1">--}}
{{--                                            Юридическим лица--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-check">--}}
{{--                                        <input class="form-check-input" type="radio" name="type" id="type2" value="2" required>--}}
{{--                                        <label class="form-check-label" for="type2">--}}
{{--                                            Физическим лица--}}
{{--                                        </label>--}}
{{--                                    </div>--}}
{{--                                    <div class="form-check">--}}
{{--                                        <input class="form-check-input" type="radio" name="type" id="type3" value="3" required>--}}
{{--                                        <label class="form-check-label" for="type3">--}}
{{--                                            Индивидуальным предпринимател--}}
{{--                                        </label>--}}
{{--                                    </div>--}}

{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group row con" id="ie_name">--}}
{{--                                <label for="ie_name_input" class="col-md-4 col-form-label text-md-right">Наименование ИП--}}
{{--                                    *</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="ie_name_input" type="text"--}}
{{--                                           class="form-control @error('ie_name') is-invalid @enderror"--}}
{{--                                           name="ie_name" required>--}}

{{--                                    @error('ie_name')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row con" id="company_name">--}}
{{--                                <label for="company_name_input" class="col-md-4 col-form-label text-md-right">Наименование организации *</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="company_name_input" type="text"--}}
{{--                                           class="form-control @error('company_name') is-invalid @enderror"--}}
{{--                                           name="company_name"  required>--}}

{{--                                    @error('company_name')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row con" id="full_name">--}}
{{--                                <label for="full_name_input" class="col-md-4 col-form-label text-md-right">ФИО *</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="full_name_input" type="text" class="form-control @error('full_name') is-invalid @enderror"--}}
{{--                                           name="full_name"  required>--}}

{{--                                    @error('full_name')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group row" id="inn">--}}
{{--                                <label for="inn_input" class="col-md-4 col-form-label text-md-right">ИНН *</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="inn_input" type="text"--}}
{{--                                           class="form-control @error('inn') is-invalid @enderror"--}}
{{--                                           name="inn"  required>--}}

{{--                                    @error('inn')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row con" id="psrnie">--}}
{{--                                <label for="psrnie_input" class="col-md-4 col-form-label text-md-right">ОГРНИП * </label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="psrnie_input" type="text" class="form-control @error('psrnie') is-invalid @enderror"--}}
{{--                                           name="psrnie"  required>--}}

{{--                                    @error('psrnie')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row con" id="psrn">--}}
{{--                                <label for="psrn_input" class="col-md-4 col-form-label text-md-right">ОГРН *</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="psrn_input" type="text"--}}
{{--                                           class="form-control @error('psrn') is-invalid @enderror"--}}
{{--                                           name="psrn"  required>--}}

{{--                                    @error('psrn')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row con" id="passport">--}}
{{--                                <label for="passport_input" class="col-md-4 col-form-label text-md-right">Паспорт *</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="passport_input" type="text" class="form-control @error('passport') is-invalid @enderror"--}}
{{--                                           name="passport"  required>--}}

{{--                                    @error('passport')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row con" id="document">--}}
{{--                                <label for="document_input" class="col-md-4 col-form-label text-md-right">Подтверждающие--}}
{{--                                    документы *</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="document_input" type="file"--}}
{{--                                           class="form-control @error('document') is-invalid @enderror"--}}
{{--                                           name="document"  required>--}}
{{--                                    <small class="form-text text-muted text-right">Свидетельство о внесении юридического--}}
{{--                                        лица в ЕГРЮЛ, о постановке на налоговый учет (с ИНН)</small>--}}

{{--                                    @error('document')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row con" id="brand">--}}
{{--                                <label for="brand_input" class="col-md-4 col-form-label text-md-right">Торговая--}}
{{--                                    марка,бренд, рекламное название *</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="brand_input" type="text"--}}
{{--                                           class="form-control @error('brand') is-invalid @enderror"--}}
{{--                                           name="brand"  required>--}}

{{--                                    @error('brand')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row" id="country">--}}
{{--                                <label for="country_input" class="col-md-4 col-form-label text-md-right">Страна * </label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="country_input" type="text"--}}
{{--                                           class="form-control @error('country') is-invalid @enderror"--}}
{{--                                           name="country"  required>--}}

{{--                                    @error('country')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row" id="city">--}}
{{--                                <label for="city_input" class="col-md-4 col-form-label text-md-right">Город * </label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="city_input" type="text"--}}
{{--                                           class="form-control @error('city') is-invalid @enderror" name="city"  required>--}}

{{--                                    @error('city')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row" id="address">--}}
{{--                                <label for="address_input" class="col-md-4 col-form-label text-md-right">Адрес офиса--}}
{{--                                    (если есть)</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="address_input" type="text"--}}
{{--                                           class="form-control @error('address') is-invalid @enderror"--}}
{{--                                           name="address">--}}
{{--                                    <small class="form-text text-muted text-right">Улица, дом, офис</small>--}}

{{--                                    @error('address')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row" id="web_site">--}}
{{--                                <label for="web_site_input" class="col-md-4 col-form-label text-md-right">Адрес сайта--}}
{{--                                    или соцсети </label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="web_site_input" type="url"--}}
{{--                                           class="form-control @error('web_site') is-invalid @enderror"--}}
{{--                                           name="web_site">--}}
{{--                                    <small class="form-text text-muted text-right"><strong>Пример</strong> https://www.твой-сайт.ru</small>--}}

{{--                                    @error('web_site')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row" id="advertising_number">--}}
{{--                                <label for="advertising_number_input" class="col-md-4 col-form-label text-md-right">Рекламный--}}
{{--                                    номер телефона компании </label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="advertising_number_input" type="text"--}}
{{--                                           class="form-control @error('advertising_number') is-invalid @enderror"--}}
{{--                                           name="advertising_number">--}}
{{--                                    <small class="form-text text-muted text-right">С кодом города, по одному в--}}
{{--                                        строке</small>--}}

{{--                                    @error('advertising_number')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row" id="real_estate_count">--}}
{{--                                <label for="real_estate_count_input" class="col-md-4 col-form-label text-md-right">Количество--}}
{{--                                    объектов недвижимости--}}
{{--                                    в собственности или управлении *</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="real_estate_count_input" type="number" min="0"--}}
{{--                                           class="form-control @error('real_estate_count') is-invalid @enderror"--}}
{{--                                           name="real_estate_count"  required>--}}

{{--                                    @error('real_estate_count')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <hr>--}}

{{--                            <h5 class="text-center">Данные о контактном лице</h5>--}}

{{--                            <div class="form-group row" id="contact_person_full_name">--}}
{{--                                <label for="contact_person_full_name_input" class="col-md-4 col-form-label text-md-right">ФИО *</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="contact_person_full_name_input" type="text" class="form-control @error('contact_person_full_name') is-invalid @enderror"--}}
{{--                                           name="contact_person_full_name"  required>--}}

{{--                                    @error('contact_person_full_name')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row" id="contact_phone">--}}
{{--                                <label for="contact_phone_input" class="col-md-4 col-form-label text-md-right">Контактный номер телефона--}}
{{--                                    *</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="contact_phone_input" type="text"--}}
{{--                                           class="form-control @error('contact_phone') is-invalid @enderror" name="contact_phone"  required>--}}
{{--                                    <small class="form-text text-muted text-right"> С кодом города </small>--}}
{{--                                    @error('contact_phone')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row con" id="contact_person_position">--}}
{{--                                <label for="contact_person_position_input" class="col-md-4 col-form-label text-md-right">Должность*</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="contact_person_position_input" type="text" class="form-control @error('contact_person_position') is-invalid @enderror"--}}
{{--                                           name="contact_person_position"  required>--}}

{{--                                    @error('contact_person_position')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row">--}}
{{--                                <label for="email" class="col-md-4 col-form-label text-md-right">Адрес электронной почты *</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"--}}
{{--                                           value="{{ old('email') }}" required autocomplete="email" >--}}
{{--                                    <small class="form-text text-muted text-right"> <strong>Внимание: </strong>доступ к сервису будет предоставлен на данный--}}
{{--                                        адрес. Убедитесь в правильности адреса, иначе мы не сможем с вами связаться.</small>--}}

{{--                                    @error('email')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                            <strong>{{ $message }}</strong>--}}
{{--                                        </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row">--}}
{{--                                <label for="password" class="col-md-4 col-form-label text-md-right">Пароль *</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"--}}
{{--                                           name="password" required autocomplete="new-password">--}}
{{--                                    <small class="form-text text-muted text-right">Минимум 8 знаков</small>--}}

{{--                                    @error('password')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}

{{--                            <div class="form-group row">--}}
{{--                                <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Подтвердите пароль *</label>--}}

{{--                                <div class="col-md-6">--}}
{{--                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required--}}
{{--                                           autocomplete="new-password">--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row" id="about_business">--}}
{{--                                <label for="about_business_input" class="col-md-4 col-form-label text-md-right">Расскажите кратко о Вашем бизнесе в недвижимости </label>--}}

{{--                                <div class="col-md-6">--}}

{{--                                    <textarea class="form-control @error('about_business') is-invalid @enderror" rows="3" id="about_business_input" name="about_business"></textarea>--}}

{{--                                    @error('about_business_input')--}}
{{--                                    <span class="invalid-feedback" role="alert">--}}
{{--                                        <strong>{{ $message }}</strong>--}}
{{--                                    </span>--}}
{{--                                    @enderror--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                            <div class="form-group row mb-0">--}}
{{--                                <div class="col-md-6 offset-md-4">--}}
{{--                                    <button type="submit" class="btn btn-primary">--}}
{{--                                        Регистрация--}}
{{--                                    </button>--}}
{{--                                </div>--}}
{{--                            </div>--}}
{{--                        </form>--}}
{{--                    </div>--}}
{{--                </div>--}}
            </div>
        </div>
    </div>
@endsection
