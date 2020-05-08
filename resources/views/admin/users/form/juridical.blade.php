<form method="POST" action="{{route('users.update',$user->id)}}"  class="row w-100"  enctype="multipart/form-data">
    @csrf
    <input name="_method" type="hidden" value="PUT">
    <input name="method" type="hidden" value="basic">

    <div class="form-group  col-sm-12 col-md-6 col-lg-6">
        <label for="company_name">Наименование организации <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="company_name" name="company_name"
               value="{{$user->company_name}}">
        @error('company_name')
        <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
        @enderror
    </div>
    <div class="form-group  col-sm-12 col-md-6 col-lg-6">
        <label for="inn">ИНН <span class="text-danger">*</span></label>
        <input type="number" class="form-control" id="inn" name="inn" value="{{$user->inn}}">
        @error('inn')
        <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
        @enderror
    </div>

    <div class="form-group  col-sm-12 col-md-6 col-lg-6">
        <label for="psrn">ОГРН <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="psrn" name="psrn" value="{{$user->psrn}}">
        @error('psrn')
        <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
        @enderror
    </div>


    <div class="form-group  col-sm-12 col-md-6 col-lg-6">
        <label for="inn">Страна <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="country" name="country" value="{{$user->country}}">
        @error('country')
        <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
        @enderror
    </div>

    <div class="form-group col-sm-12 col-md-6 col-lg-6">
        <label for="city">Город <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="city" name="city" value="{{$user->city}}">
        @error('city')
        <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
        @enderror
    </div>
    <div class="form-group  col-sm-12 col-md-6 col-lg-6">
        <label for="brand">Торговая марка,бренд название <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="brand" name="brand"
               value="{{$user->brand}}">
        @error('brand')
        <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
        @enderror
    </div>

    <div class="form-group  col-sm-12 col-md-6 col-lg-6">
        <label for="address">Адрес офиса (если есть) </label>
        <input type="text" class="form-control" id="address" name="address" value="{{$user->address}}">
        <small class="form-text text-muted text-right">Улица, дом, офис</small>

        @error('address')
        <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
        @enderror
    </div>


    <div class="form-group  col-sm-12 col-md-6 col-lg-6">
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


    <div class="form-group  col-sm-12 col-md-6 col-lg-6">
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


    <div class="form-group   col-sm-12 col-md-6 col-lg-6">
        <label for="real_estate_count">Количество объектов недвижимость <span
                class="text-danger">*</span></label>
        <input type="number" min="" class="form-control" id="real_estate_count" name="real_estate_count"
               value="{{$user->real_estate_count}}">
        <small class="form-text text-muted text-right">в собственности или управлении</small>

        @error('real_estate_count')
        <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
        @enderror
    </div>

    <div class="form-group   col-sm-12 col-md-6 col-lg-6">
        <label for="document">Подтверждающие документы <span class="text-danger">*</span></label>
        <input type="file" class="form-control" id="document" name="document">
        <small class="form-text text-muted text-right mb-2">Свидетельство индивидуального предпринимателя в
            ЕГРИП, о постановке на налоговый учет (с ИНН)</small>


        @foreach($user->documents as $doc)
            <a target="_blank" href="{{$doc->src}}" class="float-right">Документ {{$loop->index+1}}</a> <br>
        @endforeach


        @error('document')
        <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
        @enderror
    </div>
    <div class="form-group  col-lg-6 col-md-6 col-sm-12">
        <label>Статус </label>
        <select class="form-control" name="status" required>
            <option value="0" @if($user->status == 0) selected @endif>Заблокирован</option>
            <option value="1" @if($user->status == 1) selected @endif>Актив</option>
        </select>
    </div>

    <div class="form-group   col-12">
        <button type="submit" class="btn btn-primary  float-right" >
            <i class="fa fa-check"></i>
        </button>
    </div>



</form>
