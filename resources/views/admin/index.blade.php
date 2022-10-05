@extends('app')
@section('content')
@include('body')
<style>
.subject {
   text-align: left;  /* 文章を左寄せする(※) */
   float: left;     /* 左端に寄せて、後続を右側へ回り込ませる */
}
.count {
   text-align: right; /* 文章を右寄せする */
}
.titlebar {
   background-color: #1c273e; /* 背景を赤色に */
   color: #efeeea;               /* 文字を白色に */
   font-weight:bold;          /* 太字にする */
	padding: 10px;
 font-size:  15px;
}
.date {
font-size: 12px ;
}

</style>

<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel-heading"><h3><i class="fas fa-kiwi-bird"></i> 管理人ページ <i class="fas fa-kiwi-bird"></i></h3></div>

{{--会員一覧---}}
@if ($users->count() == 0)
<p>会員登録者されている方がいらっしゃいません</p>
@else
<table class="table table-hover table-centered">
<thead>
<tr>
<th>
<div class="titlebar">
<p class="subject">会員</p>
<p class="count">{{ $users->count() }}人</p>
</div>
</th>
</tr>
</thead>
<tbody>
@foreach($users as $user)
<tr>
<td><img style="border-radius: 35%; height: 30px; width: 30px;" src="{{ asset('storage/avatars/' . $user->avatar) }}"> 
{{$user->name}}<br></td>
</tr>
@endforeach
</tbody>
</table>
@endif

{{--呟き--}}
@if ($posts->count() == 0)
<p>つぶやきは０件です</p>
@else
<table class="table table-hover table-centered">
<thead>
<tr>
<th>
<div class="titlebar">
<p class="subject">つぶやき</p>
<p class="count">{{ $posts->count() }}つぶやき</p>
</th>

</tr>
</thead>
<tbody>
@foreach($posts as $post)
<tr>
<td>{!!nl2br(e($post->body))!!}
<div style="float: right;">
<a href="{{ route('admin.post.edit', ['id' => $post->id]) }}"><i class="fas fa-edit"></i> 編集</a> / <a href="{{ route('admin.post.destroy', ['id' => $post->id]) }}"><i class="fas fa-trash-alt"></i>削除</a><div class="date">[ {{ $post->created_at }} ]</div>
</div></td>
</tr>
@endforeach
</tbody>
</table>
@endif

{{--ふぁんれたー--}}
@if ($letters->count() == 0)
<p>ファンレター０件です</p>
@else
<table class="table table-hover table-centered">
<thead>
<tr>
<th>
<div class="titlebar">
<p class="subject">ファンレター</p>
<p class="count">{{ $letters->count() }}通</p>
</th>
</tr>
</thead>
<tbody>
@foreach($letters as $letter)
<tr>
<td>{!!nl2br(e($letter->body))!!} <div class="date" style="float: right;">[ {{ $letter->created_at }} ]</div></td>
</tr>
@endforeach
</tbody>
</table>
@endif


</div>
</div>
</div>
</div>

@endsection
