@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header">{{ __('Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>Create Post</h4>
                                <a class="btn btn-primary" href="{{ route('posts.index') }}">All Posts</a>
                            </div>
                            <div class="card body p-5">
                                <form action="{{ route('posts.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="title">Title</label>
                                        <input type="text" class="form-control" value="{{ old('title') }}" id="title" name="title">
                                        @error('title')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="body">Content</label>
                                        <textarea class="form-control" id="content" name="content">{{ old('content') }}</textarea>
                                        @error('content')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="image">Image</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                        @error('image')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror

                                    </div>

                                    <div class="form-group mb-3">
                                        <label for="category">Category</label>
                                        <select class="form-control mt-2" id="category" name="category_id">
                                            <option value="" disabled selected>Select a category</option>
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                        @error('category_id')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <button type="submit" class="btn btn-primary">Save Post</button>
                                    </div>
                                </form>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
