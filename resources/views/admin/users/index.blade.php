@extends('admin.layout')

@section('content')

    <div class="container-fluid">

        <header>
            <h1 class="h3 display">Users</h1>
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
                                    <th>Email</th>
                                    <th>Verified at</th>
                                    <th>Crated at</th>
                                    <th>Actions</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($users as $user)
                                    <tr>
                                        <th scope="row">{{$user->id}}</th>
                                        <td>{{$user->type}}</td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->email_verified_at->format('d M  Y')}}</td>
                                        <td>{{$user->created_at->format('d M  Y')}}</td>
                                        <td>
                                            <div class="btn-group">
                                                <a href="#" class="btn btn-info mr-2" title="Edit">
                                                    <i class="icon-check"></i>
                                                </a>
                                                <a href="#" class="btn btn-danger" title="Delete"> <i class="icon-close"></i></a>
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
