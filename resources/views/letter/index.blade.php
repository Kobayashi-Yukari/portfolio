@extends('app')

@section('content')
@include('body')
<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
<div class="panel-heading"><i class="far fa-envelope"></i>ファンレタ一覧</div>

<div class="panel-body">

<table class="table table-striped table-hover table-centered">
<thead>
<tr>
<th>タイトル</th>
<th>本文</th>
<th>書き込み者</th>
</tr>
</thead>
<tbody>
@foreach ($letters as $letter)
<td>{{ $letter->title }}</td>
<td>{{ $letter->body }}</td>
<td>{{ $letter->user['name'] }}</td>
</tr>
@endforeach
</tbody>
</table>


</div>
</div>
</div>
</div>
</div>
</div>
@endsection
