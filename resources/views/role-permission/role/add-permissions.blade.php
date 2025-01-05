@extends('layouts.app')

@section('title', 'Assign Permissions')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header">{{ __('Role Assign Permission Dashboard') }}</div>

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
                                <h4>Role: {{ $role->name }}</h4>
                                <a class="btn btn-primary" href="{{ route('roles.index') }}">Back</a>
                            </div>
                            <div class="card-body p-5">
                                <form action="{{ route('roles.givePermission', $role->id) }}" method="POST">
                                    @csrf
                                    @method('PUT')


                                    <div class="form-group mb-3">
                                        <label for="permission">Permissions</label>

                                        <div class="row">
                                            @foreach ($permissions as $permission)
                                                <div class="col-md-3">
                                                    <label>
                                                        <input type="checkbox" value="{{ $permission->name }}"
                                                            id="permission" name="permission[]">
                                                        {{ $permission->name }}
                                                    </label>

                                                    @error('name')
                                                        <p class="text-danger">{{ $message }}</p>
                                                    @enderror
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>

                                    <div class="form-group mb-3">
                                        <button type="submit" class="btn btn-primary">Assign Permission</button>
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
