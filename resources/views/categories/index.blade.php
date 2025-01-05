@extends('layouts.app')

@section('title', 'Category Index Page')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header">{{ __('Category Dashboard') }}</div>

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

                        <div class="card shadow">
                            <div class="card-header d-flex justify-content-between">
                                <h4>All Categories</h4>
                                <a class="btn btn-primary" href="{{ route('categories.create') }}">Create Category</a>
                            </div>
                            <div class="card-body p-3 shadow">
                                <div class="table-responsive">
                                    <table class="table table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Created At</th>
                                                <th>Updated At</th>
                                                <th>Actions</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($categories as $category)
                                                <tr>
                                                    <td>{{ $category->id }}</td>
                                                    <td>{{ $category->name }}</td>
                                                    <td>{{ $category->created_at->diffForHumans() }}</td>
                                                    <td>{{ $category->updated_at->diffForHumans() }}</td>
                                                    <td>
                                                        <div class="d-flex">
                                                            <a href="{{ route('categories.edit', $category) }}"
                                                                class="btn btn-warning me-2">Edit</a>
                                                            <a href="{{ route('categories.show', $category) }}"
                                                                class="btn btn-success me-2">Show</a>
                                                            <form action="{{ route('categories.destroy', $category) }}"
                                                                method="POST">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit"
                                                                    onclick="return confirm('Are you sure?')"
                                                                    class="btn btn-danger">Delete</button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach


                                        </tbody>

                                    </table>
                                </div>
                                <!-- Pagination -->
                                {{ $categories->links() }}
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
