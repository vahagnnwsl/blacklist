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
        <label for="city">Город <span class="text-danger">*</span></label>
        <input type="text" class="form-control" id="city" name="city" value="{{$user->city}}">
        @error('city')
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











    <div class="form-group  col-sm-12 col-md-4 col-lg-4">
        <button type="submit" class="btn btn-primary btn-block float-right" >
            <i class="fa fa-check"></i>
        </button>
    </div>
</form>
