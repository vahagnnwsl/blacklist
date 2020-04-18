<div class="row">
    <div class="form-group col-lg-3 col-md-3 col-sm-12">
        <label>ИНН <span class="text-danger">*</span></label>
        <input type="text" required value="{{$arendator->inn}}" name="inn"
               class="form-control">
        @error('inn')
        <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
        @enderror
    </div>
    <div class="form-group col-lg-3 col-md-3 col-sm-12">
        <label>Наименование организации  <span class="text-danger">*</span></label>
        <input type="text" required value="{{$arendator->company_name}}" name="company_name"
               class="form-control">
        @error('company_name')
        <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
        @enderror
    </div>
    <div class="form-group col-lg-3 col-md-3 col-sm-12">
        <label>Имя <span class="text-danger">*</span></label>
        <input type="text" required value="{{$arendator->first_name}}" name="first_name"
               class="form-control">
        @error('first_name')
        <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
        @enderror
    </div>
    <div class="form-group   col-lg-3 col-md-3 col-sm-12">
        <label>Фамилия <span class="text-danger">*</span></label>
        <input type="text" required value="{{$arendator->last_name}}" name="last_name"
               class="form-control">
        @error('last_name')
        <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
        @enderror
    </div>
    <div class="form-group   col-lg-3 col-md-3 col-sm-12">
        <label>Отчество <span class="text-danger">*</span></label>
        <input type="text" required value="{{$arendator->patronymic}}" name="patronymic"
               class="form-control">
        @error('patronymic')
        <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
        @enderror
    </div>
    <div class="form-group   col-lg-3 col-md-3 col-sm-12">
        <label>Должность <span class="text-danger">*</span></label>
        <input type="text" required value="{{$arendator->position}}" name="position"
               class="form-control">
        @error('position')
        <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
        @enderror
    </div>
    <div class="form-group   col-lg-3 col-md-3 col-sm-12">
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
    <div class="form-group   col-lg-3 col-md-3 col-sm-12">
        <label>Регион <span class="text-danger">*</span></label>
        <input type="text" required value="{{$arendator->region}}" name="region"
               class="form-control">
        @error('region')
        <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
        @enderror
    </div>
    <div class="form-group   col-lg-3 col-md-3 col-sm-12">
        <label>Город <span class="text-danger">*</span></label>
        <input type="text" required value="{{$arendator->city}}" name="city"
               class="form-control">
        @error('city')
        <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
        @enderror
    </div>
    <div class="form-group   col-lg-3 col-md-3 col-sm-12">
        <label>Адрес  <span class="text-danger">*</span></label>
        <input type="text" required value="{{$arendator->address}}" name="address"
               class="form-control">
        @error('address')
        <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
        @enderror
    </div>

    <div class="form-group   col-lg-3 col-md-3 col-sm-12">
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
    <div class="form-group  col-lg-3 col-md-3 col-sm-12">
        <label>Статус </label>
        <select class="form-control" name="status" required>
            <option value="0" @if($arendator->status == 0) selected @endif>Inactive</option>
            <option value="1" @if($arendator->status == 1) selected @endif>Active</option>
        </select>
    </div>

    <div class="form-group col-12">
        <button class="btn btn-primary float-right"><i class="fa fa-check"></i></button>
    </div>
</div>
