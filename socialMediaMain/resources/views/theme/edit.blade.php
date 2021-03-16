<@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">Edit post</div>
                    <div class="card-body">
                        <form action="{{ route('theme.update',$theme) }}" method="POST">
                            @csrf
                            {{ method_field('patch') }}
                            <div class="form-group row">
                                <label for="name" class="col-md-2 col-form-label text-md-right">Name</label>

                                <div class="col-md-6">
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $theme->name }}" required autocomplete="name" autofocus>

                                    @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="cdn_url" class="col-md-2 col-form-label text-md-right">CDN Url</label>

                                <div class="col-md-6">
                                    <input id="cdn_url" type="text" class="form-control @error('cdn_url') is-invalid @enderror" name="cdn_url" value="{{ $theme->cdn_url }}" required autofocus>

                                    @error('cdn_url')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>



                            <button type="submit" class="btn btn-primary">Update</button>
                            <a href="{{ route('theme') }}"><button type="button" class="btn btn-warning">Cancel</button></a>
                        </form>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
