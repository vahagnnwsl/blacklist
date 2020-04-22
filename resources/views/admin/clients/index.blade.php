@extends('admin.layout')

@section('content')

    <div class="container-fluid">

        <header>
            <h1 class="h3 display">Клиент</h1>
        </header>
        <div class="row">
            <div class="col-lg-12">
                <div class="card">

                    <div class="card-body">
                        <button data-toggle="modal" data-target="#cleintModal" class="mr-3 btn btn-primary float-right">
                            <i class="fa fa-plus"></i>
                        </button>
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
                                    <th>СЕКРЕТ</th>
                                    <th>ИМЯ</th>
                                    <th>Дата создан</th>
                                    <th>Действия</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($clients as $client)
                                    <tr>
                                        <th scope="row">{{$client->id}}</th>
                                        <td>{{$client->secret}}</td>
                                        <td>{{$client->name}}</td>
                                        <td>{{$client->created_at->format('d M  Y')}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-info mr-2" title="New Token" onclick="generateNewToken('{{route('clients.token',$client->id)}}')">
                                                    <i class="icon-check"></i>
                                                </a>
                                                <form method="POST" action="{{ route('clients.destroy',  $client->id) }}" accept-charset="UTF-8"
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
                        {!!$clients->links()!!}
                    </div>

                </div>
            </div>

        </div>
        <div class="modal" id="cleintModal">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="card-header">
                        <h4 class="modal-title">Новый клиент</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <form  method="POST" action="{{route('clients.store')}}" >
                            @csrf
                            <div class="input-group col-12 pr-0">
                                <input type="text" required placeholder="Client name" name="name"  class="form-control">
                                <div class="input-group-append">
                                    <button class="btn btn-success" type="submit"
                                            style="border: 1px solid rgb(216, 221, 227);"><i class="fa fa-plus"></i>
                                    </button>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">

                    </div>
                </div>
            </div>
        </div>

        @if(session()->has('token'))
        <div class="modal" id="tokenModal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="card-header">
                        <h4 class="modal-title">Вот ваш новый токен доступа. Это единственный раз, когда он будет показан</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <div class="modal-body">
                        <div class="row">
                            <p class="p-2" style="overflow-y: auto;">{{session()->get('token')}}</p>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal"><i class="fa fa-close"></i> </button>

                    </div>
                </div>
            </div>
        </div>

       @endif
    </div>

@endsection

@push('scripts')
  @if(session()->has('token'))
      <script>
          $("#tokenModal").modal()
      </script>
  @endif
    <script>
        function generateNewToken(url) {
            var ask = window.confirm("Генерировать новый токен?");
            if (ask) {
                window.location.href = url;
            }
        }
    </script>
@endpush
