@include('header')

<h1>Post</h1>
<h2>{{ $bb->title }}</h2>
<p>{{ $bb->content }}</p>
<p>{{ $bb->price }}</p>
<img class="img-item-detail" src="{{ $bb->file }}" alt="">
<p><a href="/">Back to list</a></p>

@include('footer')