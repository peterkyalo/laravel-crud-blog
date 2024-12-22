@extends('layouts.app')

@section('title', 'Create Permission')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header">{{ __('Permission Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>Create Permission</h4>
                                <a class="btn btn-primary" href="{{ route('permissions.index') }}">Back</a>
                            </div>
                            <div class="card body p-5">
                                <form action="{{ route('permissions.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="title">Permission Name</label>
                                        <input type="text" class="form-control" value="{{ old('name') }}"
                                            id="name" name="name">
                                        @error('name')
                                            <p class="text-danger">{{ $message }}</p>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <button type="submit" class="btn btn-primary">Save Permission</button>
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