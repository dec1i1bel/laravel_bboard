@extends('layouts.base')

@section('title', 'My posts')

@section('main')
    <h2>My Items</h2>
    <div class="table-responsive-lg">

        <table class="table table-hover">
            <thead>
                <tr>
                    <th scope="col">Name</th>
                    <th scope="col">Description</th>
                    <th scope="col">Price</th>
                    <th scope="col">Photo</th>
                    <th scope="col">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($bbs as $bb)
                    <tr class="account_item__row">
                        <td>{{ $bb->title }}</td>
                        <td>{{ $bb->content }}</td>
                        <td>{{ $bb->price }}</td>
                        <td><div class="account_item__img--preview" style="background-image: url('{{ Storage::url($bb->file) }}')"></div></td>
                        <td>
                            <a href="{{ route('detail', ['bb' => $bb->id]) }}">
                                open
                            </a>&nbsp;|&nbsp;
                            <a href="{{ route('bb.edit', ['bb' => $bb->id]) }}">
                                edit
                            </a>&nbsp;|&nbsp;
                            <a href="{{ route('bb.delete', ['bb' => $bb->id]) }}">
                                delete
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
