@extends('layouts.base')

@section('title', $bb->title)
    
@section('main')
    <h2>{{ $bb->title }}</h2>
    <p>{{ $bb->content }}</p>
    <p>{{ $bb->price }}</p>
    <p>seller: {{ $bb->user->name }}</p>
    <img class="img-item-detail" src="{{ $bb->file }}" alt="">
    <p><a href="{{ route('index') }}">Back to list</a></p>
@endsection('main')