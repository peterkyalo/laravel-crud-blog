@extends('layouts.app')

@section('title', 'Show Category Page')

@section('content')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow">
                    <div class="card-header d-flex justify-content-between">
                        <h4>Category Details</h4>
                        <a class="btn btn-warning" href="{{ route('categories.index') }}">BACK</a>
                    </div>
                    <div class="card-body shadow">
                        <h3>Category Name: <strong class="text-info">{{ $category->name }}</strong></h3>
                        <p>Created At: <small class="text-info">{{ $category->created_at->diffForHumans() }}</small></p>
                        <p>Updated At: <small class="text-info">{{ $category->updated_at->diffForHumans() }}</small></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
