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
<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
<div class="panel-body">
<form action="{{ route('letter.preview', ['id' => $letter->id]) }}" method="post">
{{ csrf_field() }}

<h1><i class="fas fa-pen-nib fa-2x"> お手紙編集しよう！</i></h1>

{{--カテゴリー--}}
<div class="mb-3">
<label for="member_id" class="form-label">宛先が変更でるよ！</label><span class="badge badge-danger">必須</span><br>
@if($errors->has('member_id')) <span class="text-danger">{{ $errors->first('member_id') }}<br></span>@endif
@foreach ($members as $index => $member)
<ul style="list-style: none;">
<li><input type="radio" name="member_id" value="{{ $index }}" @if($index == $letter->member_id) checked @endif>{{ $member }}</li>
</ul>
@endforeach
</div>

{{--宛名--}}
<div class="mb-3">
<label for="member_id" class="form-label"> 差出人の名前はこれでいい？？</label><br>
@if($errors->has('from_name')) <span class="text-danger">{{ $errors->first('from_name') }}<br></span>@endif
<p>差出人は記入がない場合は「匿名希望さん」になります。</p>
<input type="text" name="from_name" value="{{ $letter->from_name }}">
</div>


{{--アイコン--}}
<div class="mb-3">
<label for="member_id" class="form-label"> アイコンはどうるする？？</label><span class="badge badge-danger">必須</span><br>
@if($errors->has('letter_avatar')) <span class="text-danger">{{ $errors->first('letter_avatar') }}<br></span>@endif
<ul style="list-style: none;">
<li><img style="border-radius: 35%; height: 65px; width: 65px;" src="{{ asset('storage/avatars/' . Auth::user()->avatar) }}">
<input type="radio" name="letter_avatar" value="1" @if($letter->letter_avatar == Auth::user()->avatar) checked @endif> 自分のアイコン</li><br>
<li><img style="border-radius: 35%; height: 65px; width: 65px;" src="{{ asset('storage/avatars/' . 'default.png') }}">
<input type="radio" name="letter_avatar" value = "2" @if($letter->letter_avatar == "default.png") checked @endif> 匿名さま専用アイコン</li>
</ul>
</div>
{{--本文--}}
<div class="mb-3">
<label for="body" class="form-label">お手紙の内容が編集できます。</label><span class="badge badge-danger">入力必須</span><br>
@if($errors->has('body')) <span class="text-danger">{{ $errors->first('body') }}<br></span>@endif
<p>1000文字以内でお願いします。<br>絵文字も使用できます。</p>
<textarea class="form-control" required  name="body" cols="50" rows="10" id="body">{{ $letter->body }}</textarea>
</div>

<input type="hidden" name="letter_id" value="{{ $letter->id }}">
<br><input type="submit" class="btn outline btn-default btn-sm" value="プレビュー">
</form>
</body>
</div>
</div>
</div>
</div>

@endsection

