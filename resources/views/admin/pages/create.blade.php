@extends('admin.layout')



@section('content')

    <div class="container-fluid">

        <header>
            <div class="row ">
                <div class="col-lg-12">
                    <h1 class="h3 display">Новая страница <span class="text-info text-bold"></span>
                        <a href="{{route('pages.index')}}" title="Back" class="btn btn-primary float-right"><i
                                class="fa fa-arrow-left"></i> </a>
                    </h1>
                </div>
            </div>

        </header>
        <div class="row justify-content-center">
            <div class="col-lg-9">
                <div class="card">
                    <div class="card-body">
                        <form action="{{route('pages.store')}}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="form-group col-12">
                                    <label>Тип <span class="text-danger">*</span></label>
                                    <input type="text" required value="{{old('type')}}" name="type"
                                           class="form-control">
                                    @error('type')
                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-12">
                                    <label>Контент <span class="text-danger">*</span></label>
                                    <textarea class="form-control" name="content" id="content">{!! old('content') !!}</textarea>
                                    @error('content')
                                    <span class="invalid-feedback d-block" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                    @enderror
                                </div>


                                <div class="form-group col-12">
                                    <button class="btn btn-primary float-right"><i class="fa fa-check"></i></button>
                                </div>
                            </div>


                        </form>


                    </div>
                </div>

            </div>


        </div>
    </div>



@endsection


@push('scripts')
    <script src="https://cdn.ckeditor.com/4.13.1/standard/ckeditor.js"></script>
    <script>
        CKEDITOR.replace('content');
    </script>
@endpush
