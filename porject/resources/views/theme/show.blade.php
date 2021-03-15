@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Theme Details for Cerulean: {{ $theme->name }}</div>
                    <table class="table">
                        <tr>
                            <td>Name</td>
                            <td>{{ $theme->name }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td>{{ $theme->cdn_url }}</td>
                        </tr>
                    </table>

                    <div class="btn-group" role="group" aria-label="Basic example">
                        <a href="{{ route('theme.edit',$theme->id) }}"><button type="button" class="btn btn-primary">Edit</button></a>
                        <form action="{{ route('theme.destroy',$theme) }}" method="POST" class="float-left">
                            @csrf
                            {{ method_field('DELETE') }}
                            <button type="submit" class="btn btn-danger">Delete</button>
                            <a href="{{ route('theme') }}"><button type="button" class="btn btn-dark">Back to Themes</button></a>

                        </form>
                    </div>

                </div>
            </div>
        </div>
    </div>
    </div>
@endsection
