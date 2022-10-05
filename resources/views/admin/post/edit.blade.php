@extends('app')
@section('content')
@include('body')
<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
<div class="panel-body">
<form action="{{ route('admin.post.update') }}" method="post">
{{ csrf_field() }}

{{--本文--}}
<div class="mb-3">
<label for="body" class="form-label">つぶやき内容[管理人画面]</label>
@if ($errors->has('body')) <span class="text-danger">{{ $errors->first('body') }}<br></span>@endif
<textarea class="form-control" required  name="body" cols="50" rows="10" id="body" value="{{ old('body') }}">{{ $post->body }}</textarea>
</div>

<input type="hidden" name="post_id" value="{{ $post->id }}">
<br><input type="submit" class="btn outline btn-success btn-sm" value="つぶやき編集する">
</form>
</body>
</div>
</div>
</div>
</div>

@endsection

