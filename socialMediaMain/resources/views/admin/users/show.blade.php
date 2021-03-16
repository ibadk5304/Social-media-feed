@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">User ID: {{ $user->id }}</div>
                    <table class="table">
                        <tr>
                            <td>Name</td>
                            <td>{{ $user->name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        <tr>
                            <td>Role</td>
                            <td>
                                @foreach($user->roles as $role){{ $role->name }} @endforeach
                            </td>
                        </tr>
                    </table>


                    <a href="{{ route('admin.users.index') }}"><button type="button" class="btn btn-dark">Go back</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
