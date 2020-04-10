<hr>
<h5 class="text-center">Данные о контактном лице</h5>
<div class="form-group row">
    <label for="full_name_1" class="col-md-4 col-form-label text-md-right">ФИО *</label>

    <div class="col-md-6">
        <input id="full_name_1" type="text" class="form-control @error('full_name') is-invalid @enderror"
               name="full_name">

        @error('full_name')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="real_estate_count_1" class="col-md-4 col-form-label text-md-right">Контактный номер телефона
        *</label>

    <div class="col-md-6">
        <input id="real_estate_count_1" type="number" min="0"
               class="form-control @error('real_estate_count') is-invalid @enderror" name="real_estate_count">
        <small class="form-text text-muted text-right"> С кодом города </small>
        @error('real_estate_count')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="email" class="col-md-4 col-form-label text-md-right">Адрес электронной почты</label>

    <div class="col-md-6">
        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email"
               value="{{ old('email') }}" required autocomplete="email">
        <small class="form-text text-muted text-right"> <strong>Внимание: </strong>доступ к сервису будет предоставлен на данный
            адрес. Убедитесь в правильности адреса, иначе мы не сможем с вами связаться.</small>

        @error('email')
        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
        @enderror
    </div>
</div>
<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">Пароль</label>

    <div class="col-md-6">
        <input id="password" type="password" class="form-control @error('password') is-invalid @enderror"
               name="password" required autocomplete="new-password">

        @error('password')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
</div>

<div class="form-group row">
    <label for="password-confirm" class="col-md-4 col-form-label text-md-right">Подтвердите пароль</label>

    <div class="col-md-6">
        <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required
               autocomplete="new-password">
    </div>
</div>
<div class="form-group row">
    <label for="password" class="col-md-4 col-form-label text-md-right">Расскажите кратко о Вашем бизнесе в недвижимости </label>

    <div class="col-md-6">

        <textarea class="form-control" rows="3"></textarea>

        @error('password')
        <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
        @enderror
    </div>
</div>
