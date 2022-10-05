<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
{{--Font Awesome読み込みリンク--}}
<link href="https://use.fontawesome.com/releases/v5.6.1/css/all.css" rel="stylesheet">
<head>

<!-- Scripts -->
<!--jQuery/toastrt読み込み-->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js"></script>

<script>
    // {{--トーストオプション--}}
toastr.options = {
  "positionClass": "toast-top-right",
  "timeOut": "1200",
};
@if (session('msg_success'))
	$(function () {
	    toastr.success('{{ session('msg_success') }}');
	});
    @endif
@if (session('msg_error'))
	$(function () {
	    toastr.error('{{ session('msg_error') }}');
	});
    @endif
</script>

        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>M_chanel</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">

        <!-- Styles -->
        <style>
@import url('https://fonts.googleapis.com/css2?family=Abril+Fatface&family=Bebas+Neue&display=swap');
            html, body {
font-family: 'M PLUS Rounded 1c', sans-serif;
                background-color:  #1c273e;
                color: #efeeea;
                font-weight: 100;
                height: 100vh;
                margin: 0;
            }
.m-b-md {
		font-family: 'Bebas Neue', cursive;
}
            .full-height {
                height: 100vh;
            }

            .flex-center {
                align-items: center;
                display: flex;
                justify-content: center;
            }

            .position-ref {
                position: relative;
            }

            .top-right {
                position: absolute;
                right: 10px;
                top: 18px;
            }

            .content {
                text-align: center;
            }

            .title {
                font-size: 80px;
            }

            .links > a {
                color: #636b6f;
                padding: 0 25px;
                font-size: 12px;
                font-weight: 600;
                letter-spacing: .1rem;
                text-decoration: none;
                text-transform: uppercase;
            }

            .m-b-md {
                margin-bottom: 30px;
            }
.btn-flat-border {
  display: inline-block;
  padding: 0.3em 1em;
  text-decoration: none;
  color: #efeeea;
  border: solid 2px #efeeea;
  border-radius: 3px;
  transition: .4s;
margin: 30px;
font-family: 'Arial', sans-serif;
}

.btn-flat-border:hover {
  background: #efeeea;
  color: #1c273e;
}
details {
    padding: .5em .5em 0;
text-align: left;
}

summary {
    margin: -.5em -.5em 0;
    padding: .5em;
}

details[open] {
    padding: .5em;
}

details[open] summary {
    margin-bottom: .5em;
}
.details_p {
font-size: 13px;
}


        </style>
    </head>
    <body>
<div class="container">
<div class="row">
<div class="col-md-8 col-md-offset-2">
<div class="panel panel-default">
<div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                <div class="top-right links">
                </div>
            @endif

            <div class="content">
                <div class="title m-b-md">
                    M_CHANEL
                </div>

<p id="example">はじめまして、M_chanelの管理人Mです。<br>
ここはムッカーである管理人『 M 』が運営するMUCC非公式サイトです。<br><br>
</p>
<a href="{{ route('login') }}" class="btn-flat-border">ログイン</a><br>


</div>
</div>
</div>
</div>
</div>
</div>
</body>
</html>
