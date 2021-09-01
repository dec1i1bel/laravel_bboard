@extends('layouts.base')

@section('title', 'Remove post');
    
@section('main')
    <h2>{{ $bb->title }}</h2>
    <p>{{ $bb->content }}</p>
    <p>{{ $bb->price }}</p>
    <p>seller: {{ $bb->user->name }}</p>
    <img class="img-item-detail" src="{{ Storage::url($bb->file) }}" alt="">

    <form action="{{ route('bb.destroy', ['bb' => $bb->id]) }}" method="post">
        @csrf
        @method('DELETE')
        <input type="submit" value="Delete" class="btn btn-outline-danger">
    </form>
    
    <p><a href="{{ route('index') }}">Back to list</a></p>
@endsection('main')