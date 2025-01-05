@extends('layouts.app')

@section('title', 'Role Edit')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header">{{ __('Roles Dashboard') }}</div>

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
                                <h4>Edit Roles</h4>
                                <a class="btn btn-primary" href="{{ route('roles.index') }}">Back</a>
                            </div>
                            <div class="card body p-5">
                                <form action="{{ route('roles.update', $role) }}" method="POST">
                                    @csrf
                                    @method('PUT')
                                    <div class="form-group mb-3">
                                        <label for="title">role Name</label>
                                        <input type="text" class="form-control" value="{{ $role->name }}"
                                            id="name" name="name">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <button type="submit" class="btn btn-primary">Update Role</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
