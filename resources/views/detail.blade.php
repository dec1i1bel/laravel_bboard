@extends('layouts.base')

@section('title', $bb->title)
    
@section('main')
    <h2>{{ $bb->title }}</h2>
    <p>description: {{ $bb->content }}</p>
    <p>price: {{ $bb->price }}</p>
    <p>seller: {{ $bb->user->name }}</p>
    <img class="img-item-detail" src="{{ Storage::url($bb->file)}}" alt="">
    <p><a href="{{ route('index') }}">Go to main page</a></p>
@endsection('main')