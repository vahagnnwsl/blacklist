<form method="POST" action="{{ route('register') }}" class="mt-3">
    @csrf
    <div class="form-group row">
        <label for="full_name_1" class="col-md-4 col-form-label text-md-right">Наименование ИП *</label>

        <div class="col-md-6">
            <input id="full_name_1" type="text" class="form-control @error('full_name') is-invalid @enderror"
                   name="natural[full_name]">

            @error('full_name')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="full_name_1" class="col-md-4 col-form-label text-md-right">ИНН * </label>

        <div class="col-md-6">
            <input id="full_name_1" type="text" class="form-control @error('full_name') is-invalid @enderror"
                   name="natural[full_name]">

            @error('full_name')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="full_name_1" class="col-md-4 col-form-label text-md-right">ОГРНИП * </label>

        <div class="col-md-6">
            <input id="full_name_1" type="text" class="form-control @error('full_name') is-invalid @enderror"
                   name="natural[full_name]">

            @error('full_name')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="full_name_1" class="col-md-4 col-form-label text-md-right">Подтверждающие документы  * </label>

        <div class="col-md-6">
            <input id="full_name_1" type="file" class="form-control @error('full_name') is-invalid @enderror"
                   name="natural[full_name]">
            <small class="form-text text-muted text-right">Свидетельство индивидуального предпринимателя в ЕГРИП, о постановке на налоговый учет (с ИНН)</small>

            @error('full_name')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>

    <div class="form-group row">
        <label for="full_name_1" class="col-md-4 col-form-label text-md-right">Торговая марка,бренд, рекламное название *</label>

        <div class="col-md-6">
            <input id="full_name_1" type="text" class="form-control @error('full_name') is-invalid @enderror"
                   name="natural[full_name]">

            @error('full_name')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="country_1" class="col-md-4 col-form-label text-md-right">Страна * </label>

        <div class="col-md-6">
            <input id="country_1" type="text" class="form-control @error('country') is-invalid @enderror"
                   name="country">

            @error('country')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="city_1" class="col-md-4 col-form-label text-md-right">Город * </label>

        <div class="col-md-6">
            <input id="city_1" type="text" class="form-control @error('city') is-invalid @enderror" name="city">

            @error('city')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="office_address_1" class="col-md-4 col-form-label text-md-right">Адрес офиса (если есть)</label>

        <div class="col-md-6">
            <input id="office_address_1" type="text" class="form-control @error('office_address') is-invalid @enderror"
                   name="natural[office_address]">
            <small class="form-text text-muted text-right">Улица, дом, офис</small>

            @error('office_address')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="site_address_1" class="col-md-4 col-form-label text-md-right">Адрес сайта или соцсети </label>

        <div class="col-md-6">
            <input id="site_address_1" type="url" class="form-control @error('site_address') is-invalid @enderror"
                   name="site_address">

            @error('site_address')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="advertising_number_1" class="col-md-4 col-form-label text-md-right">Рекламный номер телефона компании </label>

        <div class="col-md-6">
            <input id="advertising_number_1" type="text"
                   class="form-control @error('advertising_number') is-invalid @enderror" name="natural[advertising_number]">
            <small class="form-text text-muted text-right">С кодом города, по одному в строке</small>

            @error('advertising_number')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>
    <div class="form-group row">
        <label for="real_estate_count_1" class="col-md-4 col-form-label text-md-right">Количество объектов недвижимости
            в собственности или управлении *</label>

        <div class="col-md-6">
            <input id="real_estate_count_1" type="number" min="0"
                   class="form-control @error('real_estate_count') is-invalid @enderror" name="real_estate_count">

            @error('real_estate_count')
            <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
            @enderror
        </div>
    </div>
    @include('includes.registration.contact-person')
    <div class="form-group row mb-0">
        <div class="col-md-6 offset-md-4">
            <button type="submit" class="btn btn-primary">
                Регистрация
            </button>
        </div>
    </div>

</form>
