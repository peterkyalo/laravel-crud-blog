@extends('layouts.app')

@section('title', 'Roles')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header">{{ __('User Dashboard') }}</div>

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
                                <h4>Roles List</h4>
                                <a class="btn btn-primary" href="{{ route('users.create') }}">Create User</a>
                            </div>
                            <div class="card body p-5">
                                <table class="table">
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
                                        @foreach ($users as $user)
                                            <tr>
                                                <td>{{ $user->id }}</td>
                                                <td>{{ $user->name }}</td>
                                                <td>{{ $user->created_at->diffForHumans() }}</td>
                                                <td>{{ $user->updated_at->diffForHumans() }}</td>
                                                <td>
                                                    <div class="d-flex">
                                                        <a href="{{ route('users.edit', $user) }}"
                                                            class="btn btn-primary btn-sm me-2">Edit</a>
                                                        <a href="" class="btn btn-success btn-sm me-2">Assign
                                                            Permission</a>
                                                        <form action="{{ route('users.destroy', $user) }}" method="POST">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm"
                                                                onclick="return confirm('Are you sure?')">Delete</button>
                                                        </form>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>

                                {{ $users->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
