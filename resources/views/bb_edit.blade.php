@extends('layouts.base')

@section('title', 'Edit post')

@section('main')
    <form action="{{ route('bb.update', ['bb' => $bb->id]) }}" method="post" method="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <input class="form-control @error('content')
            is-invalid 
            @enderror" type="text" placeholder="Post title" name="title" id="title" value="{{ old('title', $bb->title) }}">
            @error('title')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>    
                </span>    
            @enderror
        </div>
        <div class="form-group">
            <textarea class="form-control @error('content')
                is-invalid 
            @enderror" name="content" id="content" placeholder="Enter desciption" rows="5">{{ old('content', $bb->content) }}</textarea>
            @error('content')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>    
                </span>    
            @enderror
        </div>
        <div class="form-group">
            <input class="form-control @error('price')
                is-invalid
            @enderror" type="number" name="price" id="price" value="{{ $bb->price }}">
            @error('price')
                <span class="invalid-feedback">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
        <input type="submit" value="Save" class="btn btn-outline-success">
    </form>
@endsection