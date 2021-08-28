@extends('layouts.base')

@section('title', 'Create post')

@section('main')
    <form action="{{ route('bb.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input class="form-control @error('title')
                is-invalid
            @enderror" type="text" placeholder="Post title" name="title" id="title" value="{{ old('title') }}">
            @error('title')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <textarea class="form-control @error('content')
                is-invalid
            @enderror" name="content" id="content" placeholder="Enter desciption" rows="10" cols="100">{{ old('content') }}</textarea>
            @error('content')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <input class="form-control @error('price')
                is-invalid
            @enderror" type="number" name="price" id="price" value="{{ old('price') }}">
            @error('price')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <div class="form-group">
            <input type="file" name="file" id="file">
        </div>
        <input type="submit" value="Send" class="btn btn-outline-success">
    </form>
@endsection