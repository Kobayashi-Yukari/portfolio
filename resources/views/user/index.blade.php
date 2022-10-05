@extends('app')
@extends('body')
@section('content')
<style>
h2 {
font-size: 18px;
font-weight: bold;
  position: relative;
  display: inline-block;
  padding: 0 65px;
  text-align: center;
}

h2:before,
h2:after {
  position: absolute;
  top: calc(50% - 3px);
  width: 50px;
  height: 6px;
  content: '';
  border-top: solid 2px #000;
  border-bottom: solid 2px #000;
}

h2:before {
  left: 0;
}

h2:after {
  right: 0;
}
//ここからtab
.cp_tab *, .cp_tab *:before, .cp_tab *:after {
-webkit-box-sizing: border-box;
box-sizing: border-box;
}
.cp_tab {
margin: 1em 0em;
}
.cp_tab > input[type='radio'] {
margin: 0;
padding: 0;
border: none;
border-radius: 0;
outline: none;
background: none;
-webkit-appearance: none;
appearance: none;
display: none;
}
.cp_tab .cp_tabpanel {
display: none;
}
.cp_tab > input:first-child:checked ~ .cp_tabpanels > .cp_tabpanel:first-child,
.cp_tab > input:nth-child(3):checked ~ .cp_tabpanels > .cp_tabpanel:nth-child(2),
.cp_tab > input:nth-child(5):checked ~ .cp_tabpanels > .cp_tabpanel:nth-child(3),
.cp_tab > input:nth-child(7):checked ~ .cp_tabpanels > .cp_tabpanel:nth-child(4),
.cp_tab > input:nth-child(9):checked ~ .cp_tabpanels > .cp_tabpanel:nth-child(5),
.cp_tab > input:nth-child(11):checked ~ .cp_tabpanels > .cp_tabpanel:nth-child(6) {
display: block;
}
.cp_tab > label {
position: relative;
display: inline-block;
padding: 15px 15px;
cursor: pointer;
border: 1px solid transparent;
border-bottom: 0;
}
.cp_tab > label:hover,
.cp_tab > input:focus + label {
color: #0066cc;
}
.cp_tab > input:checked + label {
margin-bottom: -1px;
border-color: #cccccc;
border-bottom: 1px solid #ffffff;/*背景色と同じ*/
border-radius: 6px 6px 0 0;
}
.cp_tab .cp_tabpanel {
padding: 0.5em;
border-top: 1px solid #cccccc;
}
.badge {
background-color: #1c273e;
font-size: 20px;
}
.letter-main {
margin : 10px 20px;
font-size: 15px;
}
.to {
font-weight:  bold;
font-size: 15px;
}
img {
border-radius: 30%;
float: left;
}
.sns {
margin-bottom : 5px ;
}
.user-name {
font-weight:  bold;
font-size: 15px;
overflow: hidden;  
padding-left :20px;
margin-bottom: 10px;
}
.date {
font-size: 11px;
}
.fas {
margin-right: 10px;
}
.members {
font-weight: bolder;
}
.btn-social-long-twitter {
  color: #FFF;/*文字・アイコン色*/
  border-radius: 7px;/*角丸に*/
  display: inline-block;
  height: 50px;/*高さ*/
  width: 190px;/*幅*/
  text-align: center;/*中身を中央寄せ*/
  font-size: 25px;/*文字のサイズ*/
  line-height: 50px;/*高さと合わせる*/
  background: #1da1f3;
  overflow: hidden;/*はみ出た部分を隠す*/
  text-decoration:none;/*下線は消す*/
}

.btn-social-long-twitter .fa-twitter {
  text-shadow: 2px 2px 0px #4287d6;
  font-size: 30px;
}

.btn-social-long-twitter span {
  display:inline-block;
  transition: .5s;
}

.btn-social-long-twitter:hover span {
  -webkit-transform: rotateX(360deg);
  transform: rotateX(360deg);
}
</style>
<div class="container">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">

<div class="panel-body">

{{--ここからtab↓--}}
<div class="cp_tab">
<input type="radio" name="cp_tab" id="tab1_1" aria-controls="first_tab01" checked>
<label for="tab1_1">つぶやき</label>
<input type="radio" name="cp_tab" id="tab1_2" aria-controls="second_tab01">
<label for="tab1_2">お手紙</label>
<input type="radio" name="cp_tab" id="tab1_3" aria-controls="third_tab01">
<label for="tab1_3">サイト取説</label>
<div class="cp_tabpanels">
{{--ここからつぶやき↓--}}
<div id="first_tab01" class="cp_tabpanel">
@if ($posts->count() == 0)
<p>つぶやきが０件です。</p>
@else
<table class="table table-striped table-hover table-centered">
<thead>
<tr>
<th>つぶやき一覧</th>
</tr>
</thead>
<tbody>
@foreach ($posts as $post)
<td>{!!nl2br(e($post->body))!!}<br>
<div style="float: right;"><a href="{{ route('post.edit', ['id' => $post->id]) }}"><i class="fas fa-edit"></i>編集</a> / <a href="{{ route('post.destroy', ['id' => $post->id]) }}"><i class="fas fa-trash-alt"></i>削除</a></td></div>
</tr>
@endforeach
</tbody>
</table>
@endif
</div>
{{--ここまでつぶやき↑--}}

{{--ここから手紙↓--}}
<div id="second_tab01" class="cp_tabpanel">
@if ($letters->count() == 0)
<p>書かれたお手紙は０通です。</p>
@else
<th>お手紙の履歴</th>
@foreach ($letters as $letter)
<div class="box11">
<div class="to">{{ $letter->MemberName }} さんへ</div>
<div class="letter-main">{!!nl2br(e($letter->body))!!}</div>
<div class="sns">
<img src="{{ asset('storage/avatars/' . $letter->letter_avatar) }}"> 
<span class="user-name">{{ $letter->from_name }}</span>
<div class="date" style="text-align: right;">
<a href="{{ route('letter.flagchange', ['id' => $letter->id]) }}"></a>
{{ $letter->created_at }}
</div>
</div>
</div>
@endforeach
@endif
</div>
{{--ここまで手紙↑--}}


{{--ここから取説↓--}}
<div id="third_tab01" class="cp_tabpanel">
<h2>フォローミー</h2><br>

<a href="https://twitter.com/yukari_k1124" class="btn-social-long-twitter">
<i class="fab fa-twitter"></i> <span>Follow Me</span>
</a>
<br>


<h2>関係者さま機能</h2><br>
<div class="sab"><i class="fas fa-users"> メンバーページ</i></div>
<p>ファンからのお手紙が読めます。<br>
お手紙は宛名の方のみ閲覧可能です。<p>
<div class="sab"><i class="fas fa-paper-plane"> アンケート集計</i></div>
<p>ファンの書いたアンケートを読むことができます。</p>

<h2>ユーザー機能</h2><br>
<div class="sab"><i class="fas fa-dove"> つぶやく</i></div>
<p>
こちらの機能はログインユーザーのみに許可されています。<br>
つぶやくご記入後はマイページより投稿の編集・削除が可能です。<br>
</p>

<div class="sab"><i class="fas fa-envelope"> メンバーに手紙を送る</i></div>
<p>
メンバー宛に手紙を送ることのできる機能です。<br>
<div style="font-weight: bold;">つぶやきの機能とは異なり、削除・編集はできません。</div>
もし、削除希望の場合は管理人にまでご連絡をください。<br>
</p>


{{--ここまで取説↑--}}

</div>
</div>
</div>
</div>
</div>
@endsection
