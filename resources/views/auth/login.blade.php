@extends('app')

@section('content')
@include('body')

<style>

h1 {
font-size: 15px;
margin: 5px;
}
.form-label {
padding-top: 20px;
font-size: 15px;
}
.badge {
background-color: #980202;
margin-left: 10px;
}


</style>
<body>
<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
<div class="panel-body">

<form class="form-horizontal" method="POST" action="{{ route('login') }}">
{{ csrf_field() }}
<h1><i class="fas fa-dove fa-2x faa-wrench"> ログイン画面</i></h1>
<br>
<div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
<label for="email" class="col-md-4 control-label">メールアドレス</label>

<div class="col-md-6">
<input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required autofocus>

@if ($errors->has('email'))
<span class="help-block">
<strong>{{ $errors->first('email') }}</strong>
</span>
@endif
</div>
</div>

<div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
<label for="password" class="col-md-4 control-label">パスワード</label>

<div class="col-md-6">
<input id="password" type="password" class="form-control" name="password" required>

@if ($errors->has('password'))
<span class="help-block">
<strong>{{ $errors->first('password') }}</strong>
</span>
@endif
</div>
</div>

<br>
<table class="table table-bordered">
<tr>
<td>name</td>
<td>USER</td>
<td>MEMBER</td>
<td>ADMIN</td>
</tr>
<tr>
<td>email</td>
<td>user@example.com</td>
<td>member@example.com</td>
<td>admin@example.com</td>
</tr>
<tr>
<td>passward</td>
<td>d2sjnVgyqqMZk4z2</td>
<td>beCCQMFE6tU3YTx3</td>
<td>63qx3KwVsngDTu9V</td>
</tr>

</table>

<div class="form-group">
<div class="col-md-8 col-md-offset-4">
<button type="submit" class="btn outline btn-default btn-sm">
ログイン
</button>

</body>
</div>
</div>
</div>
</div>
</div>
</div>
@endsection

