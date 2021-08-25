@extends('layouts.base')

@section('title', 'Create post')

@section('main')
    <form action="{{ route('bb.store') }}" method="post" enctype="multipart/form-data">
        @csrf
        <div class="form-group">
            <input class="form-control" type="text" placeholder="Название" name="title" id="title">
        </div>
        <div class="form-group">
            <textarea name="content" id="content" placeholder="Enter desciption" rows="10" cols="100"></textarea>
        </div>
        <div class="form-group">
            <input type="number" name="price" id="price" class="form-control">
        </div>
        <div class="form-group">
            <input type="file" name="file" id="file">
        </div>
        <input type="submit" value="Send" class="btn btn-outline-success">
    </form>
@endsection