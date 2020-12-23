@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">
                    <div class="d-flex align-items-center">
                        <h3 class="mr-auto p-3">Recent posts</h3>
                        <div class="btn-group" role="group">
                            <a href="{{ route('home.create') }}"><button type="button" class="btn btn-primary">Create New Post</button></a>

                        </div>
                    </div>
                </div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    @foreach ($posts as $post)
                        <div class="card border-primary mb-3">
                            <div class="card-body">
                                <h5 class="card-title">
                                    <div class="d-flex align-items-center">
                                        <h3 class="mr-auto p-3">{{ $post->title }}</h3>
                                        <div class="btn-group" role="group">
                                            @if(Auth::user()->id == $post->user_id)
                                            <a href="{{ route('home.edit',$post->id) }}"><button type="button" class="btn btn-primary">Edit</button></a>
                                            @endif
                                                @if(Auth::user()->hasRole('Moderator') || Auth::user()->id == $post->user_id)
                                            <form action="{{ route('home.destroy',$post) }}" method="POST" class="float-left">
                                                @csrf
                                                {{ method_field('DELETE') }}
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </form>
                                                @endif
                                        </div>
                                    </div>

                                </h5>
                                <p class="card-text">{{ $post->imageCaption }}</p>
                                <p class="card-text">
                                    <small class="text-muted">
                                        Last updated {{ $post->updated_at->diffForHumans() }} by
                                        @foreach($users as $user)
                                            @if($user->id == $post->user_id) {{$user->name}}@endif
                                        @endforeach
                                    </small></p>
                            </div>
                            <img class="card-img-bottom" src="{{ $post->imageUrl }}" alt="Card image cap">
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
