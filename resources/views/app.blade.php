<!DOCTYPE html>

<html lang="{{ app()->getLocale() }}">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- CSRF Token -->
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>{{ config('app.name', 'M_CHANEL') }}</title>

<!-- Styles -->
<link href="{{ asset('css/app.css') }}" rel="stylesheet">
<!-- Scripts -->
<script src="{{ asset('js/app.js') }}"></script>
<!--jQuery/toastrt読み込み-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>
</head>
<body>
<div id="app">
<!--フラッシュメッセージ-->

<script type="text/javascript">
// {{--トーストオプション--}}
toastr.options = {
  "positionClass": "toast-top-right",
  "timeOut": "1200",
};
// {{--成功時--}}
            @if (session('msg_success'))
                $(function () {
                    toastr.success('{{ session('msg_success') }}');
                });
            @endif

            // {{--失敗時--}}
            @if (session('msg_error'))
                $(function () {
                    toastr.error('{{ session('msg_error') }}');
                });
            @endif
</script>

@include('header')
@yield('content')
</div>

</body>
</html>
