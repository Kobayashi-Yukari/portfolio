@extends('app')
@section('content')
@include('body')

<style>
h1 {
font-weight:  bold;
font-size: 20px;
}
.letter-main {
margin : 10px 20px;
}
.to {
font-weight:  bold;
}
.sns {
margin-bottom : 30px ;
}
.user-name {
    font-weight:  bold;
overflow: hidden;  
padding-left :20px;
}
.date {
font-size: 10px;
}
.a-btn {
  display: flex;
  justify-content: space-evenly;
}
.member-name {
font-weight: bold;
font-size: 18px;
}
.letter-main {
margin : 20px 10px;
}
img {
border-radius: 30%;
float: left;
height: 65px; 
width: 65px;
}
</style>
<body>

<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel-body">

<h1>プレビュー画面です</h1>
<p>こんな感じでメンバーに送られます。</p>
<p style="font-weight: bold;"><i class="fas fa-exclamation-triangle"></i>「 手紙を送る」を選択されると、以降お手紙内容の編集削除はできません。</p>
<div class="box11">

<div class="to">{{ $letter->MemberName }} さんへ</div>
<div class="letter-main">{!!nl2br(e($letter->body))!!}</div>
<div class="sns">
<img src="{{ asset('storage/avatars/' . $letter->letter_avatar) }}"> 
<span class="user-name">{{ $letter->from_name }}</span>
<div class="date" style="text-align: right;">{{ $letter->created_at }}</div>


</div>

</div>
</div>
<div class="a-btn">
<a href="{{ route('letter.cancel', ['id' => $letter->id]) }}" class="btn outline btn-default btn-xs">キャンセル</a>
<a href="{{ route('letter.edit', ['id' => $letter->id]) }}" class="btn outline btn-xs">編集</a>
<a href="{{ route('letter.store', ['id' => $letter->id]) }}" class="btn outline btn-default btn-xs">手紙を送る</a>
</div>
</div>
</div>
</div>
</body>
@endsection
