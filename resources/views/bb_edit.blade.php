@extends('layouts.base')

@section('title', 'Edit post')

@section('main')
    <form action="{{ route('bb.update', ['bb' => $bb->id]) }}" method="post" method="multipart/form-data">
        @csrf
        @method('PATCH')
        <div class="form-group">
            <input class="form-control" type="text" placeholder="Название" name="title" id="title" value="{{ $bb->title }}">
        </div>
        <div class="form-group">
            <textarea name="content" id="content" placeholder="Enter desciption" rows="10" cols="100">{{ $bb->content }}</textarea>
        </div>
        <div class="form-group">
            <input type="number" name="price" id="price" class="form-control" value="{{ $bb->price }}">
        </div>
        <input type="submit" value="Save" class="btn btn-outline-success">
    </form>
@endsection