<div class="row">

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
    <div class="form-group  col-lg-3 col-md-3 col-sm-12">
        <label>Прописка <span class="text-danger">*</span></label>
        <input type="text" required value="{{$arendator->register}}" name="register"
               class="form-control">
        @error('register')
        <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
        @enderror
    </div>
    <div class="form-group   col-lg-3 col-md-3 col-sm-12">
        <label>Дата рождения <span class="text-danger">*</span></label>
        <input type="date" required value="{{$arendator->birth_date}}" name="birth_date"
               class="form-control">
        @error('birth_date')
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
            <option value="0" @if($arendator->status == 0) selected @endif>Заблокирован</option>
            <option value="1" @if($arendator->status == 1) selected @endif>Актив</option>
        </select>
    </div>

    <div class="form-group col-12">
        <button class="btn btn-primary float-right"><i class="fa fa-check"></i></button>
    </div>
</div>
