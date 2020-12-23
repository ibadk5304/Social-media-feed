@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Users</div>
                    <a href="{{ route('admin.users.create') }}"><button type="button" class="btn btn-outline-primary">Create Admin user</button></a>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Roles</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($users as $user)
                                <tr>
                                    <td>{{ $user->id }}</td>
                                    <td>{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>@foreach($user->roles as $role){{ $role->name }} @endforeach</td>
                                    <td>
                                        <a href="{{ route('admin.users.show',$user->id) }}"><button type="button" class="btn btn-dark">View</button></a>
                                        <a href="{{ route('admin.users.edit',$user->id) }}"><button type="button" class="btn btn-primary">Edit</button></a>
                                        <form action="{{ route('admin.users.destroy',$user) }}" method="POST" class="float-left">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>
{{--                                        <a href="{{ route('admin.users.destroy',$user->id) }}"><button type="button" class="btn btn-warning">Delete</button></a>--}}


                                    </td>
                                </tr>
                            @endforeach
                        </table>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
