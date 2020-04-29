@extends('admin.layout')

@section('content')

    <div class="container-fluid">

        <header>
            <h1 class="h3 display">Страницы</h1>
        </header>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body">
                        <a href="{{route('pages.create')}}" class="mr-3 btn btn-primary float-right">
                            <i class="fa fa-plus"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-lg-12 table-responsive-lg">
                <div class="card">

                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>ID</th>
                                    <th>Тип</th>
                                    <th  class="text-right">Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($pages as $page)
                                    <tr>
                                        <th scope="row">{{$page->id}}</th>
                                        <td>{{$page->type}}</td>
                                        <td >
                                            <div class="btn-group float-right">
                                                <a  class="btn btn-info mr-2" title="New Token" href="{{route('pages.edit',$page->id)}}">
                                                    <i class="icon-check"></i>
                                                </a>
                                                <form method="POST" action="{{ route('pages.destroy',  $page->id) }}" accept-charset="UTF-8"
                                                      style="display:inline">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button type="submit" class="btn btn-danger" title="Delete"
                                                            onclick="return confirm(&quot;Confirm delete?&quot;)"> <i class="icon-close"></i>
                                                    </button>
                                                </form>
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                                </tbody>
                            </table>
                        </div>
                        {!!$pages->links()!!}
                    </div>

                </div>
            </div>

        </div>



    </div>

@endsection

@push('scripts')

@endpush
