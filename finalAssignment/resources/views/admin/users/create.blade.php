@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create new admin user</div>

                    <div class="card-body">
                        <form action='{{ route('admin.users.store') }}' method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="name">Name</label>
                                <input name="name" type="text" class="form-control" id="name" aria-describedby="name" value="{{ old('name') }}" placeholder="Enter Title">
                                @error('name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="email">Email</label>
                                <input name="email" type="text" class="form-control" id="email" aria-describedby="emailHelp" value="{{ old('email') }}" placeholder="Enter email">
                                @error('email')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="password">password</label>
                                <input name="password" type="password" class="form-control" id="password" aria-describedby="password" placeholder="password">
                                @error('password')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="confirm_password">Confirm password</label>
                                <input name="confirm_password" type="password" class="form-control" id="confirm_password" aria-describedby="confirm_password" placeholder="Confirm password">
                                @error('confirm_password')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="role">Select one or more roles</label>
                                <select name="role" multiple class="form-control" id="role">
                                    <option value="User Administrator">User Administrator</option>
                                    <option value="Moderator">Moderator</option>
                                    <option value="Theme Manager">Theme manager</option>
                                </select>
                                @error('role')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('admin.users.index') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
