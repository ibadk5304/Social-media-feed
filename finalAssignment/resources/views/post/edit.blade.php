@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit post</div>
                    <div class="card-body">
                        <form action="{{ route('home.update',$post) }}" method="POST">
                            @csrf
                            {{ method_field('patch') }}
                            <div class="form-group row">
                                <label for="title" class="col-md-2 col-form-label text-md-right">Title</label>

                                <div class="col-md-6">
                                    <input id="title" type="text" class="form-control @error('title') is-invalid @enderror" name="title" value="{{ $post->title }}" required autocomplete="title" autofocus>

                                    @error('title')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="imageUrl" class="col-md-2 col-form-label text-md-right">imageUrl</label>

                                <div class="col-md-6">
                                    <input id="imageUrl" type="text" class="form-control @error('imageUrl') is-invalid @enderror" name="imageUrl" value="{{ $post->imageUrl }}" required autofocus>

                                    @error('imageUrl')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="imageCaption" class="col-md-2 col-form-label text-md-right">imageCaption</label>

                                <div class="col-md-6">
                                    <input id="imageCaption" type="text" class="form-control @error('imageCaption') is-invalid @enderror" name="imageCaption" value="{{ $post->imageCaption }}" required autofocus>

                                    @error('imageCaption')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <button type="submit" class="btn btn-primary">Update</button>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
