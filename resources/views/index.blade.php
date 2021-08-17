@include('header')
    <h1>BBoard</h1>
    <a href="/create">Create post</a><br><br>
    @if (count($bbs) > 0)
        <div id="posts">
            @foreach ($bbs as $bb)
                <div class="post">
                    <strong>{{ $bb->title }}</strong><br>
                    description: {{ $bb->content }}<br>
                    price: {{ $bb->price }}<br>
                    photo:<br>
                    <img src="{{ $bb->file }}" alt="" class="img-item-preview"><br>
                    <a href="/{{ $bb->id }}/">Details...</a>
                </div>
            @endforeach
        </div>
    @endif
@include('footer')