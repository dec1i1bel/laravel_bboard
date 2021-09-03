@extends('layouts.base')

@section('title', 'Main')

@section('main')
    @isset($bbs)
        @if (count($bbs) > 0)
            <div id="posts">
                @foreach ($bbs as $bb)
                <a class="post_link" href="{{ route('detail', ['bb' => $bb->id]) }}">
                    <div class="post">
                        <strong>{{ $bb->title }}</strong><br>
                        description: {{ $bb->content }}<br>
                        price: {{ $bb->price }}<br>
                        photo:<br>
                        <div class="post_img--preview" style="background-image: url('{{ Storage::url($bb->file) }}')"></div>
                    </div>
                </a>
                @endforeach
            </div>
        @endif
    @endisset
@endsection('main')