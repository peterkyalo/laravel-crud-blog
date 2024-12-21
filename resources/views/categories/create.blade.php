@extends('layouts.app')

@section('title', 'Category Create Page')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header">{{ __('Category Dashboard') }}</div>

                    <div class="card-body">
                        @if (session('success'))
                            <div class="alert alert-success" role="alert">
                                {{ session('success') }}
                            </div>
                        @endif

                        <div class="card">
                            <div class="card-header d-flex justify-content-between">
                                <h4>Create Category</h4>
                                <a class="btn btn-primary" href="{{ route('categories.index') }}">All Categories</a>
                            </div>
                            <div class="card body p-5">
                                <form action="{{ route('categories.store') }}" method="POST">
                                    @csrf
                                    <div class="form-group mb-3">
                                        <label for="title">Name</label>
                                        <input type="text" class="form-control" id="name" name="name"
                                            placeholder="Enter category name">
                                        @error('name')
                                            <div class="text-danger">{{ $message }}</div>
                                        @enderror
                                    </div>
                                    <div class="form-group mb-3">
                                        <button type="submit" class="btn btn-primary">Save</button>
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
