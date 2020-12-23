@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Manage Themes</div>
                    <a href="{{ route('theme.create') }}"><button type="button" class="btn btn-outline-primary">Add New Theme</button></a>
                    <div class="card-body">
                        <table class="table table-bordered">
                            <tr>
                                <th>ThemeId</th>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                            @foreach ($themes as $theme)
                                <tr>
                                    <td>{{ $theme->id }}</td>
                                    <td>{{ $theme->name }}</td>
                                    <td class="btn-group" role="group" aria-label="Basic example">
                                        <a href="{{ route('theme.show',$theme->id) }}"><button type="button" class="btn btn-dark">Details</button></a>
                                        <a href="{{ route('theme.edit',$theme->id) }}"><button type="button" class="btn btn-primary">Edit</button></a>
                                        <form action="{{ route('theme.destroy',$theme) }}" method="POST" class="float-left">
                                            @csrf
                                            {{ method_field('DELETE') }}
                                            <button type="submit" class="btn btn-danger">Delete</button>
                                        </form>

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
