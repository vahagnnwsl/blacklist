@extends('admin.layout')

@section('content')

    <div class="container-fluid">

        <header>
            <h1 class="h3 display">Arendators</h1>
        </header>
        <div class="row">
            <div class="col-lg-12 table-responsive-lg">
                <div class="card">
                    <div class="card-header">

                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Type</th>
                                    <th>Full Name</th>
                                    <th>Region</th>
                                    <th>City</th>
                                    <th>Created at</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($arendators as $arendator)
                                    <tr>
                                        <th scope="row">{{$arendator->id}}</th>
                                        <td>{{$arendator->type}}</td>
                                        <td>{{$arendator->fullName}}</td>
                                        <td>{{$arendator->region}}</td>
                                        <td>{{$arendator->city}}</td>
                                        <td>{{$arendator->created_at->format('d M  Y')}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="{{route('arendators.edit',$arendator->id)}}" class="btn btn-info mr-2" title="Edit">
                                                    <i class="icon-check"></i>
                                                </a>
                                                <form method="POST" action="{{ route('arendators.destroy',  $arendator->id) }}" accept-charset="UTF-8"
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
                    </div>
                </div>
            </div>

        </div>
    </div>

@endsection
