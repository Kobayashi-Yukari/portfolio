@extends('nav')
<style>
.navbar-toggle {
margin: 0;
padding: 10px;
//pointer-events: none; 
}
.navbar-default .navbar-toggle {
    border-color: #1c273e;
	color: #ffffff;
}
.navbar-default .navbar-toggle:hover,
.navbar-default .navbar-toggle:focus {
background-color: #1c273e;
}
img {
margin-right: 10px;
}
</style>
{{--Font Awesomeアイコン読み込みリンク--}}
<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
{{--Font Awesomeうごき読み込みリンク--}}
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome-animation/0.0.10/font-awesome-animation.css" type="text/css" media="all" />

<nav class="navbar navbar-default">
<!--ナビゲーションバーのヘッダーを設定-->
<div class="navbar-header">


<!--icon設定-->
<link rel="shortcut icon" href="{{ asset('storage/favicon.icon.png') }}">

<!-- Collapsed Hamburger -->
@auth
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#app-navbar-collapse">
<!--ハンバーガアイコン-->
<img style="border-radius: 35%; height: 30px; width: 30px;" src="{{ asset('storage/avatars/' . Auth::user()->avatar) }}"><span class="caret"></span>
</button>
@else
<button type="button" class="navbar-toggle">
<a href="{{ route('login') }}" style="color: #efeeea"><i class="fas fa-door-closed"> ログイン</i></a>
</button>
@endauth

<!-- Branding Image -->
<a class="navbar-brand" href="{{ route('post.index') }}">
<i class="fas fa-crow"></i> {{ config('app.name', 'M_CHANEL') }}
</a>
</div>
<div class="collapse navbar-collapse" id="app-navbar-collapse">

<!-- Right Side Of Navbar -->
<ul class="nav navbar-nav navbar-right">

@guest
<li><a href="{{ route('login') }}"><i class="fas fa-door-closed"> ログイン</i></a></li>
@endguest

<!--非ログイン、ログイン者のメニュー-->
{{--一般ユーザー--}}
@auth
<li><a href="{{ route('post.create') }}"><i class="fas fa-dove"> つぶやく</i></a></li>
<li><a href="{{ route('post.index') }}"><i class="fas fa-list-alt"> みんなのつぶやき</i></a></li>
<li><a href="{{ route('letter.create') }}"><i class="fas fa-envelope"> お手紙を書こう！</i></a></li>
<li><a href="{{ route('user.index') }}"><i class="fas fa-kiwi-bird"> マイページ</i></a></li>
<li><a href="{{ route('member.index') }}"><i class="fas fa-users"> メンバーページ</i></a></li>
<li><a href="{{ route('admin.index') }}"><i class="fas fa-lock"> 管理人ページ</i></a></li>
<li><a href="{{ route('contact.index') }}"><i class="fas fa-comment-dots"> お問合せ</i></a></li>
<li><a href="{{ route('logout') }}"
onclick="event.preventDefault();
document.getElementById('logout-form').submit();"><i class="fas fa-door-open"> ログアウト</i></a>
<form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
{{ csrf_field() }}
</form>
</li>
@endauth
</ul>
</li>
</ul>
</div>
</div>
</nav>
