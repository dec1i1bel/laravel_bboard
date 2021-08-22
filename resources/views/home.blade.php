@extends('layouts.base')

@section('title', 'My posts')

@section('main')
<p class="text-end"><a href="">End aligned text on all viewport sizes.</a></p>

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
                        <i class="fas fa-edit"></i>&nbsp;<i class="far fa-trash-alt"></i>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
@endsection
