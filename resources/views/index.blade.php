@extends('layouts.base')

@section('title', 'Main')

@section('main')
    @auth
        <p class="text-end"><a href="{{ route('bb.add') }}">Create post</a></p>
    @endauth
    @if (count($bbs) > 0)
        <div id="posts">
            @foreach ($bbs as $bb)
                <div class="post">
                    <strong>{{ $bb->title }}</strong><br>
                    description: {{ $bb->content }}<br>
                    price: {{ $bb->price }}<br>
                    photo:<br>
                    <img src="{{ Storage::url($bb->file) }}" alt="" class="img-item-preview"><br>
                    <a href="{{ route('detail', ['bb' => $bb->id]) }}">Details...</a>
                </div>
            @endforeach
        </div>
    @endif
@endsection('main')