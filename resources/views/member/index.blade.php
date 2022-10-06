@extends('app')
@section('content')
@include('body')
<style>
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
padding: 15px 50px;
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
</style>

<div class="container">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">

<div class="panel-body">



<div class="cp_tab">
<input type="radio" name="cp_tab" id="tab1_1" aria-controls="first_tab01" checked>
<label for="tab1_1">未読</label>
<input type="radio" name="cp_tab" id="tab1_2" aria-controls="second_tab01">
<label for="tab1_2">既読</label>
<div class="cp_tabpanels">
{{--未読--}}
<div id="first_tab01" class="cp_tabpanel">
<p>
<i class="fas fa-envelope" style="color: #1c273e;"></i>を押していただくと既読ページに移動します。<br>
<div class="members">
</div>
</p>
@if (!$unread_letters )
<p>ファンレターがございません</p>
@else

@foreach ($unread_letters as $unread_letter)
<!-- member画面-->
<div class="box11">
<div class="to">{{ $unread_letter->MemberName }} さんへ</div>
<div class="letter-main">{!!nl2br(e($unread_letter->body))!!}</div>
<div class="sns">
<img src="{{ asset('storage/avatars/' . $unread_letter->letter_avatar) }}"> 
<span class="user-name">{{ $unread_letter->from_name }}</span>
<div class="date" style="text-align: right;">
<a href="{{ route('letter.flagchange', ['id' => $unread_letter->id]) }}"><i class="fas fa-envelope fa-2x" style="color: #1c273e;"></i></a>
{{ $unread_letter->created_at }}
</div>
</div>
</div>
@endforeach
@endif
</div>

{{--既読--}}
<div id="second_tab01" class="cp_tabpanel">
@if ($read_letters->count() == 0)
<p>既読のお手紙がございません</p>
@else
@foreach ($read_letters as $read_letter)
<!-- member画面-->
<div class="box11">
<div class="to">{{ $read_letter->MemberName }} さんへ</div>
<div class="letter-main">{!!nl2br(e($read_letter->body))!!}</div>
<div class="sns">
<img src="{{ asset('storage/avatars/' . $read_letter->letter_avatar) }}"> 
<span class="user-name">{{ $read_letter->from_name }}</span>
<div class="date" style="text-align: right;">
<i class="fas fa-envelope-open-text fa-2x" style="color: #1c273e;"></i>
{{ $read_letter->created_at }}
</div>
</div>
</div>
@endforeach
@endif
</div>
</div>
</div>
</div>


</div>
</div>
</div>
</div>
</div>
@endsection
