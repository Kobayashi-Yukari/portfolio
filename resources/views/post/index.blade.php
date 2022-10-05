@extends('app')
@section('content')
@include('body')
<style>
img {
border-radius: 30%;
float: left;
}

.block-text {
overflow: hidden;
padding-left :20px;
}
.text {
font-weight: normal;
}

.date {
text-align: right;
font-size : 11px;
font-weight: lighter;
margin-top: 10px ;
}

</style>
@if ($posts->count() == 0)
<div style="text-align: center;">
つぶやきが０件です。
</div>
@else
@foreach ($posts as $post)
<div class="container">
<div class="col-md-6">
<!-- 記事エリア -->
<br>
<div class="box2">
<img src="{{ asset('storage/avatars/' . $post->user['avatar']) }}">
<div class="block-text">
<span class="big_font">{{ $post->user['name'] }}</span>
<div class="text">{!!nl2br(e($post->body))!!}</div>
</div>
<div class="date">{{ $post->created_at }}</div>
</div>
</div>
</div>
@endforeach
@endif
@endsection
