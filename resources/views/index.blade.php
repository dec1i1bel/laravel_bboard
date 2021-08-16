@include('header')
    <h2>BBoard</h2>
    <a href="/create">create post</a><br><br>
    <div id="posts">
        @foreach ($bbs as $bb)
            <div class="post">
                <strong>{{ $bb->title }}</strong><br>
                описание: {{ $bb->content }}<br>
                цена: {{ $bb->price }}<br>
                фото:<br>
                <img src="{{ $bb->file }}" alt="" class="img-item-preview">
            </div>
        @endforeach
    </div>
@include('footer');