@extends('app')
@section('content')
@include('body')
<style>
h1 {
font-size: 12px;
margin: 5px;
}
.badge {
float: right;
font-size: 14px;
}
.badge-post {
background-color: #1c273e;
 }
.badge-pre {
background-color: #980202;
 }
.date {
font-size: 10px;
}
</style>
<body>
<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
<div class="panel-body">

{{--お問い合わせフォーム--}}
<h1><i class="fas fa-comment-dots fa-2x"> 管理人に問い合わせ</i></h1>
<br>
<form action="{{ route('contact.store') }}" method="post">
{{ csrf_field() }}

<div class="mb-3">
{{--タイトル--}}
@if($errors->has('title_id'))<span class="text-danger">{{ $errors->first('title_id') }}</span><br>@endif
<select name="title_id">
<option value="" hidden>-- 内容を選択 --</option>
@foreach ($titles as $key => $title)
<option value="{{ $key }}">{{ $title }}</option>
@endforeach
</select>
<br>
<br>

{{--本文--}}
@if($errors->has('body')) <span class="text-danger">{{ $errors->first('body') }}<br></span>@endif
<p>管理人宛専用のページです。<br>
このお問合せ内容は管理人しか閲覧できない仕様となっています。</p>
<textarea class="form-control" required  name="body" cols="50" rows="5" id="body">{{ old('body') }}</textarea>
</div>

<br>
<input type="submit" class="btn outline btn-success btn-sm" value="問い合わせする">
</form>
{{--お問い合わせフォーム終了--}}


<br>
<br>
{{--今までのログイン者の問い合わせ--}}
<h1><i class="fas fa-clipboard-list fa-2x"> お問合せ履歴</i></h1>
{{--お問い合わせがない時--}}
<form action="{{ route('admin.contact.reply') }}" method="post">
{{ csrf_field() }}
<br>
@if($contacts->count() == 0)
<p>{{ Auth::user()->name }}さんのお問い合わせ履歴はございません。</p>
@else
{{--お問い合わせがある時--}}
<table class="table table-bordered">
<thead>
</thead>
<tbody>
@foreach ($contacts as $contact)
<tr>
@if (Auth::user()->permission_flag == 0)
@if($contact->reply == null)
<td><input class="radio" type="radio" name="contact_id" value="{{ $contact->id }}" required></td>
@else
<td></td>
@endif
@endif
<td>
<label>{{ $contact->contactTitle }}</label>
@if($contact->reply != null)
<span class="badge badge-post">対応済</span>
@else
<span class="badge badge-pre">未対応</span>
@endif
<br>
== 問い合わせ ==<br>
{!! nl2br(e($contact->body)) !!}<br>
@if ($contact->reply != null)
== 返信 ==<br>
{!! nl2br(e($contact->reply)) !!}<br>
@endif
</td>
</tr>
@endforeach
</tbody>
</table>
<br>
{{--管理人用返信フォーム--}}
@if (Auth::user()->permission_flag == 0)
<h1><i class="fas fa-comment-dots fa-2x"> 返信フォーム</i></h1><br>
<p>お問い合わせ履歴にチェックを入れて、返信してね！</p>

{{--本文--}}
<div class="mb-3">
@if($errors->has('reply')) <span class="text-danger">{{ $errors->first('reply') }}<br></span>@endif
<textarea class="form-control" required  name="reply" cols="50" rows="5" id="reply">{{ old('reply') }}</textarea>
</div>

<br>
<input type="submit" class="btn outline btn-success btn-sm" value="返信する">
@endif
@endif
</form>
</body>

</div>
</div>
</div>
</div>
</div>


@endsection

