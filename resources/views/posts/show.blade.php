@extends('layouts.app')

@section('title', 'Show Post')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card mb-3 shadow">
                    <img src="{{ asset('storage/' . $post->image) }}" class="card-img-top" alt="{{ $post->title }}">
                    <div class="card-body">
                        <h4 class="card-title"><strong>{{ $post->title }}</strong></h4>
                        <p class="card-text text-info">Created By: <strong>{{ $post->user->name }}</strong></p>
                        <p class="card-text">Category: {{ $post->category->name }}</p>
                        <p class="card-text">{{ $post->content }}This is a wider card with supporting text below as a
                            natural
                            lead-in to
                            additional
                            content. This content is a little bit longer.</p>
                        <p class="card-text"><small class="text-body-secondary">Created at:
                                {{ $post->created_at->diffForHumans() }}</small>

                        </p>
                        <a href="{{ route('posts.index') }}" class="btn btn-primary">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
