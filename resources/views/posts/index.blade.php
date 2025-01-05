@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card shadow">
                    <div class="card-header">{{ __('Posts Dashboard') }}</div>

                    <div class="card-body">
                        {{-- @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif --}}

                        @if (session('success'))
                            <div class="alert alert-primary alert-dismissible fade show" role="alert">
                                <strong>Success!</strong> {{ session('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>All Posts</h4>
                                <a class="btn btn-primary" href="{{ route('posts.create') }}">Create Post</a>
                            </div>
                            <div class="card body p-3">
                                <table class="table-striped table table-hover">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Image</th>
                                            <th>Created By</th>
                                            <th>Title</th>
                                            <th>Description</th>
                                            <th>Category</th>
                                            <th>Created at</th>
                                            <th>Updated at</th>
                                            <th>Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($posts as $post)
                                            <tr>
                                                <td>{{ $post->id }}</td>
                                                <td>
                                                    <img class="img-thumbnail" src="{{ asset('storage/' . $post->image) }}"
                                                        alt="{{ $post->title }}" height="100" width="100">
                                                </td>
                                                <td>{{ $post->user->name }}</td>
                                                <td>{{ $post->title }}</td>
                                                <td>{{ Str::limit($post->content, 30) }}</td>
                                                <td>{{ $post->category->name }}</td>
                                                <td>{{ $post->created_at->diffForHumans() }}</td>
                                                <td>{{ $post->updated_at->diffForHumans() }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('posts.edit', $post) }}"
                                                            class="btn btn-warning me-2">Edit</a>
                                                        <a href="{{ route('posts.show', $post) }}"
                                                            class="btn btn-success me-2">Show</a>
                                                        <form action="{{ route('posts.destroy', $post) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" onclick="return confirm('Are you sure?')"
                                                                class="btn btn-danger">Delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach


                                    </tbody>

                                </table>
                                <!-- Pagination -->
                                {{ $posts->links() }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
