@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Create new post</div>

                    <div class="card-body">
                        <form action='{{ route('home.store') }}' method="POST">
                            @csrf

                            <div class="form-group">
                                <label for="title">Title:</label>
                                <input name="title" type="text" class="form-control" id="title" aria-describedby="title" value="{{ old('title') }}" placeholder="Enter Title">
                                @error('title')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>


                            <div class="form-group">
                                <label for="imageUrl">Image URL:</label>
                                <input name="imageUrl" type="text" class="form-control" id="imageUrl" aria-describedby="imageUrlHelp" value="{{ old('imageUrl') }}" placeholder="Enter imageUrl">
                                @error('imageUrl')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>
                            <div class="form-group">
                                <label for="imageCaption">Image Caption (optional):</label>
                                <input name="imageCaption" type="text" class="form-control" id="imageCaption" aria-describedby="imageCaption" placeholder="imageCaption">
                                @error('imageCaption')
                                <small class="text-danger">{{$message}}</small>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary">Submit</button>
                            <a href="{{ route('home') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
