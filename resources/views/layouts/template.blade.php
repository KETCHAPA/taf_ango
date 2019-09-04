<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>
        @yield('title')
    </title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="\img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="\js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['\css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	{{-- fontawesome kit 5 --}}
	<script src="https://kit.fontawesome.com/9842a92080.js"></script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.1.4/toastr.min.css">
	<link rel="stylesheet" href="\css/bootstrap.min.css">
    <link rel="stylesheet" href="\css/atlantis.css">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/simple-line-icons/2.4.1/css/simple-line-icons.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
    <link rel="stylesheet" href="\css/demo.css">
    <link rel="stylesheet" href="\css/custom.css">
</head>
<body>
	<div class="wrapper">
		<div class="main-header">
			@include('layouts.partials.header')

			@include('layouts.partials.navbar')
		</div>
        @include('layouts.partials.sidebar')

        <div class="main-panel">
            <div class="container">
                <div class="page-inner">
                    <div class="page-header">
                        <h4 class="page-title">@yield('title')</h4>
                        <ul class="breadcrumbs">
                            <li class="nav-home">
                                <a href="#">
                                    <i class="flaticon-home"></i>
                                </a>
                            </li>
                            <li class="separator">
                                <i class="flaticon-right-arrow"></i>
                            </li>
                        </ul>
                    </div>

                    @if(session()->has("success"))
                        <p class="alert alert-success">
                            {{ session("success") }}
                        </p>
                    @endif

                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $e)
                                    <li>{{ $e }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @yield('content')
                </div>
            </div>
            @include('layouts.partials.footer')
        </div>
	</div>
    @include('layouts.partials.script')
    @yield('script')
</body>
</html>
