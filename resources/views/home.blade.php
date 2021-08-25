@extends('layouts.base')

@section('title', 'My posts')

@section('main')
<p class="text-end"><a href="{{ route('bb.add') }}">Create post</a></p>

    <table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">Item name</th>
                <th scope="col">Price</th>
                <th scope="col">#</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($bbs as $bb)
                <tr>
                    <td>{{ $bb->title }}</td>
                    <td>{{ $bb->price }}</td>
                    <td>
                        <a href="{{ route('bb.edit', ['bb' => $bb->id]) }}">
                            <i class="fas fa-edit"></i>
                        </a>&nbsp;|&nbsp;
                        <a href="{{ route('bb.delete', ['bb' => $bb->id]) }}">
                            <i class="far fa-trash-alt"></i>
                        </a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
