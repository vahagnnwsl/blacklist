<form method="POST" action="{{route('users.update',$user->id)}}"  class="row w-100">
    @csrf
    <input name="_method" type="hidden" value="PUT">
    <input name="method" type="hidden" value="contact">

    <div class="form-group  col-sm-12 col-md-12 col-lg-12">
        <label for="contact_person_full_name">Контакт ФИО <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="contact_person_full_name" name="contact_person_full_name"
               value="{{$user->contact_person_full_name}}">
        <small class="form-text text-muted text-right">Подставляются автоматом из выше инфы, но может
            быть изменены</small>

        @error('contact_person_full_name')
        <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
        @enderror
    </div>

    @if(in_array($user->type,[3,4]))
        <div class="form-group  col-sm-12 col-md-12 col-lg-12">
            <label for="contact_person_position">Должность <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="contact_person_position" name="contact_person_position"
                   value="{{$user->contact_person_position}}">
            @error('contact_person_position')
            <span class="invalid-feedback  d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
            @enderror
        </div>

    @endif
    <div class="form-group  col-sm-12 col-md-12 col-lg-12">
        <label for="contact_phone">Контактный номер телефона <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="contact_phone" name="contact_phone"
               value="{{$user->contact_phone}}">
        <small class="form-text text-muted text-right">С кодом города</small>
        @error('contact_phone')
        <span class="invalid-feedback  d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
        @enderror
    </div>



    <div class="form-group   col-sm-12 col-md-12 col-lg-12">
        <label for="about_business">Расскажите коратко о Вашем бизнесе в недвижимости</label>
        <textarea class="form-control" name="about_business" id="about_business" rows="9">{{$user->about_business}}</textarea>
        @error('about_business')
        <span class="invalid-feedback  d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
        @enderror
    </div>


    <div class="form-group   col-sm-12 col-md-12 col-lg-12">
        <button type="submit" class="btn btn-primary w-25 float-right" {{$user->type=== 5? 'disabled': ''}}>
            <i class="fa fa-check"></i>
        </button>
    </div>
</form>
