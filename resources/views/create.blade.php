@extends('layouts.base')

@section('title', 'New post')
    
@section('main')
    <form action="/store" method="post" enctype="multipart/form-data">
        @csrf
        <input type="text" name="title" id="title" placeholder="название товара" /><br>
        <textarea name="content" id="content" placeholder="Описание товара" cols="30" rows="10"></textarea><br>
        <input type="number" name="price" id="price"><br>
        <input type="file" name="file" id="file"><br>
        <br>
        <input type="submit" value="Create"><br>
    </form>
@endsection('main') 