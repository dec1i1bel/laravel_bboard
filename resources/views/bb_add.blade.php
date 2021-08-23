@extends('layouts.base')

@section('title', 'Create post')

@section('main')
    <form action="{{ route('bb.store') }}" method="post" method="multipart/form-data">
        @csrf
        <input class="form-control" type="text" placeholder="Название" name="title" id="title">
        <textarea name="content" id="content" placeholder="Enter desciption" rows="10" cols="100"></textarea>
        <input type="number" name="price" id="price" class="form-control">
        <input type="submit" value="Send" class="btn btn-outline-success">
    </form>
@endsection