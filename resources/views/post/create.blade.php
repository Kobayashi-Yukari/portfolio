@extends('app')
@section('content')
@include('body')
<body>
<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel-body">


<form action="{{ route('post.store') }}" method="post">
{{ csrf_field() }}

{{--本文--}}
<div class="mb-3">
<label for="body" class="form-label"><i class="fas fa-dove fa-2x faa-wrench animated"></i> つぶやく</label>
@if($errors->has('body')) <span class="text-danger">{{ $errors->first('body') }}<br></span>@endif
<p>200文字以内でつぶやいてね！</p>
<textarea class="form-control" required  name="body" cols="50" rows="5" id="body">{{ old('body') }}</textarea>
</div>

<br>
<div class="buttom" style="text-align: right;">
<input type="submit" class="btn outline btn-success btn-sm" value="つぶやく">
</div>
</form>
</body>
</div>
</div>

</body>

@endsection

