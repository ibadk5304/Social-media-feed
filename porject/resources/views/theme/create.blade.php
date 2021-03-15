@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create new Theme</div>

                    <div class="card-body">
                        <form action='{{ route('theme.store') }}' method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="name">Name:</label>
                                <input name="name" type="text" class="form-control" id="name" aria-describedby="name" value="{{ old('name') }}" placeholder="Enter Title">
                                @error('name')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="cdn_url">CDN URL:</label>
                                <input name="cdn_url" type="text" class="form-control" id="cdn_url" aria-describedby="cdn_urlHelp" value="{{ old('cdn_url') }}" placeholder="Enter cdn_url">
                                @error('cdn_url')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('theme') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection

