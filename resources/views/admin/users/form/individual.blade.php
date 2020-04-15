<form method="POST" action="{{route('users.update',$user->id)}}"  class="row w-100">
    @csrf
    <input name="_method" type="hidden" value="PUT">
    <input name="method" type="hidden" value="basic">

    <div class="form-group col-sm-12 col-md-6 col-lg-6">
        <label for="full_name">ФИО <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="full_name" name="full_name"
               value="{{$user->full_name}}">


        @error('full_name')
        <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
        @enderror
    </div>
    <div class="form-group  col-sm-12 col-md-6  col-lg-6">
        <label for="inn">ИНН <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="inn" name="inn" value="{{$user->inn}}">
        @error('inn')
        <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
        @enderror
    </div>

    <div class="form-group  col-sm-12 col-md-6  col-lg-6">
        <label for="inn">Страна <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="country" name="country" value="{{$user->country}}">
        @error('country')
        <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
        @enderror
    </div>

    <div class="form-group  col-sm-12 col-md-6  col-lg-6">
        <label for="city">Город <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="city" name="city" value="{{$user->city}}">
        @error('city')
        <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
        @enderror
    </div>
    <div class="form-group  col-sm-12 col-md-6 col-lg-6">
        <label for="passport">Паспорт <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="passport" name="passport"
               value="{{$user->passport}}">
        @error('passport')
        <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
        @enderror
    </div>

    <div class="form-group col-sm-12 col-md-6  col-lg-6">
        <label for="address">Адрес офиса (если есть) </label>
        <input type="text" class="form-control" id="address" name="address" value="{{$user->address}}">
        <small class="form-text text-muted text-right">Улица, дом, офис</small>

        @error('address')
        <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
        @enderror
    </div>


    <div class="form-group  col-sm-12 col-md-6  col-lg-6">
        <label for="advertising_number">Рекламный номер по вопросу аренды</label>
        <input type="text" class="form-control" id="advertising_number" name="advertising_number"
               value="{{$user->advertising_number}}">
        <small class="form-text text-muted text-right">С кодом города, по одному в строке</small>

        @error('advertising_number')
        <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
        @enderror
    </div>

    <div class="form-group  col-sm-12 col-md-6  col-lg-6">
        <label for="web_site">Адрес сайта или соцсети </label>
        <input type="url" class="form-control" id="web_site" name="web_site"
               value="{{$user->web_site}}">
        <small class="form-text text-muted text-right"><strong>Пример</strong>
            https://www.твой-сайт.ru</small>
        @error('web_site')
        <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
        @enderror
    </div>

    <div class="form-group  col-sm-12 col-md-6 col-lg-6">
        <label for="real_estate_count">Количество объектов недвижимость <span
                class="text-danger">*</span></label>
        <input type="number" min="" class="form-control" id="real_estate_count" name="real_estate_count"
               value="{{$user->real_estate_count}}">
        <small class="form-text text-muted text-right">в собственное или управленое</small>

        @error('real_estate_count')
        <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
        @enderror
    </div>





    <div class="form-group  col-sm-12 col-md-6  col-lg-6">
        <label>Статус  </label>
        <select class="form-control" name="status" required>
            <option value="0" @if($user->status == 0) selected @endif>Inactive</option>
            <option value="1" @if($user->status == 1) selected @endif>Active</option>
        </select>
    </div>



    <div class="form-group  col-sm-12 col-md-4 col-lg-4">
        <button type="submit" class="btn btn-primary btn-block float-right" >
           <i class="fa fa-check"></i>
        </button>
    </div>
</form>
