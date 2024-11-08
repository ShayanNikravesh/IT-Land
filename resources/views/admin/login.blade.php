
<!DOCTYPE html>
<!--
Template Name: Metronic - Bootstrap 4 HTML, React, Angular 11 & VueJS Admin Dashboard Theme
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: https://1.envato.market/EA4JP
Renew Support: https://1.envato.market/EA4JP
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="fa" direction="rtl" dir="rtl" style="direction: rtl" >
	<!--begin::Head-->
	<head><base href="../../../../">
		<meta charset="utf-8" />
		<title>IT Land | Login</title>
		<meta name="description" content="Login page example" />
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
		{{-- <link rel="canonical" href="https://keenthemes.com/metronic" /> --}}
		<!--begin::Fonts-->
		<!--end::Fonts-->
		<!--begin::Page Custom Styles(used by this page)-->
		<link href="{{asset('admin-assets/css/pages/login/login-5.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Page Custom Styles-->
		<!--begin::Global Theme Styles(used by all pages)-->
		<link href="{{asset('admin-assets/plugins/global/plugins.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('admin-assets/plugins/custom/prismjs/prismjs.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('admin-assets/css/style.bundle.rtl.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Global Theme Styles-->
		<!--begin::Layout Themes(used by all pages)-->
		<link href="{{asset('admin-assets/css/themes/layout/header/base/light.rtl.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('admin-assets/css/themes/layout/header/menu/light.rtl.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('admin-assets/css/themes/layout/brand/dark.rtl.css')}}" rel="stylesheet" type="text/css" />
		<link href="{{asset('admin-assets/css/themes/layout/aside/dark.rtl.css')}}" rel="stylesheet" type="text/css" />
		<!--end::Layout Themes-->
		<link rel="shortcut icon" href="{{asset('admin-assets/media/logos/favicon.ico')}}"/>
	</head>
	<!--end::Head-->
	<!--begin::Body-->
	<body id="kt_body" class="header-fixed header-mobile-fixed subheader-enabled subheader-fixed aside-enabled aside-fixed aside-minimize-hoverable page-loading">
		<!--begin::Main-->
		<div class="d-flex flex-column flex-root">
			<!--begin::Login-->
			<div class="login login-5 login-signin-on d-flex flex-row-fluid" id="kt_login">
				<div class="d-flex flex-center bgi-size-cover bgi-no-repeat flex-row-fluid" style="background-image: url('{{asset('admin-assets/media/bg/bg-2.jpg')}}');">
					<div class="login-form text-center text-white p-7 position-relative overflow-hidden">
						<!--begin::Login Header-->
						<div class="d-flex flex-center mb-15">
							<img src="{{asset('admin-assets/media/logos/logo-letter-13.png')}}" class="max-h-75px" alt="" />
						</div>
						<!--end::Login Header-->
						<!--begin::Login Sign in form-->
						<div class="login-signin">
							<div class="mb-20">
								<h3 class="opacity-40 font-weight-normal">ورورد به پنل مدیریت</h3>
								<p class="opacity-40">ایمیل و رمز خود را وارد کنید :</p>
							</div>
							@if ($errors->any())
								<div>
									<ul>
										@foreach ($errors->all() as $error)
											<li class="bg-danger rounded">{{ $error }}</li>
											<br>
										@endforeach
									</ul>
								</div>
							@endif
							<form class="form" id="kt_login_signin_form" method="POST" action="{{route('admin-login')}}">
								@csrf
								<div class="form-group">
									<input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="text" placeholder="ایمیل" name="email" autocomplete="off" />
								</div>
								<div class="form-group">
									<input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="password" placeholder="رمز ورود" name="password" />
								</div>
								<div class="form-group d-flex flex-wrap justify-content-between align-items-center px-8 opacity-60">
									{{-- <div class="checkbox-inline">
										<label class="checkbox checkbox-outline checkbox-white text-white m-0">
										<input type="checkbox" name="remember" />
										<span></span>Remember me</label>
									</div> --}}
									<a href="javascript:;" id="kt_login_forgot" class="text-white font-weight-bold">رمز خود را فراموش کرده اید؟</a>
								</div>
								<div class="form-group text-center mt-10">
									<button id="kt_login_signin_submit" type="submit" class="btn btn-pill btn-primary opacity-90 px-15 py-3">ورود</button>
								</div>
							</form>
						</div>
						<!--end::Login Sign in form-->
						
						<!--begin::Login forgot password form-->
						<div class="login-forgot">
							<div class="mb-20">
								<h3 class="opacity-40 font-weight-normal">فراموشی رمز</h3>
								<p class="opacity-40">ایمیل خود را وارد کنید.</p>
							</div>
							<form class="form" id="kt_login_forgot_form">
								<div class="form-group mb-10">
									<input class="form-control h-auto text-white bg-white-o-5 rounded-pill border-0 py-4 px-8" type="text" placeholder="ایمیل" name="email" autocomplete="off" />
								</div>
								<div class="form-group">
									<button id="kt_login_forgot_submit" class="btn btn-pill btn-primary opacity-90 px-15 py-3 m-2">ثبت</button>
									<button id="kt_login_forgot_cancel" class="btn btn-pill btn-outline-white opacity-70 px-15 py-3 m-2">لغو</button>
								</div>
							</form>
						</div>
						<!--end::Login forgot password form-->
					</div>
				</div>
			</div>
			<!--end::Login-->
		</div>
		<!--end::Main-->
		{{-- <script>var HOST_URL = "https://preview.keenthemes.com/metronic/theme/html/tools/preview";</script> --}}
		<!--begin::Global Config(global config for global JS scripts)-->
		{{-- <script>var KTAppSettings = { "breakpoints": { "sm": 576, "md": 768, "lg": 992, "xl": 1200, "xxl": 1400 }, "colors": { "theme": { "base": { "white": "#ffffff", "primary": "#3699FF", "secondary": "#E5EAEE", "success": "#1BC5BD", "info": "#8950FC", "warning": "#FFA800", "danger": "#F64E60", "light": "#E4E6EF", "dark": "#181C32" }, "light": { "white": "#ffffff", "primary": "#E1F0FF", "secondary": "#EBEDF3", "success": "#C9F7F5", "info": "#EEE5FF", "warning": "#FFF4DE", "danger": "#FFE2E5", "light": "#F3F6F9", "dark": "#D6D6E0" }, "inverse": { "white": "#ffffff", "primary": "#ffffff", "secondary": "#3F4254", "success": "#ffffff", "info": "#ffffff", "warning": "#ffffff", "danger": "#ffffff", "light": "#464E5F", "dark": "#ffffff" } }, "gray": { "gray-100": "#F3F6F9", "gray-200": "#EBEDF3", "gray-300": "#E4E6EF", "gray-400": "#D1D3E0", "gray-500": "#B5B5C3", "gray-600": "#7E8299", "gray-700": "#5E6278", "gray-800": "#3F4254", "gray-900": "#181C32" } }, "font-family": "Poppins" };</script> --}}
		<!--end::Global Config-->
		<!--begin::Global Theme Bundle(used by all pages)-->
		<script src="{{asset('admin-assets/plugins/global/plugins.bundle.js')}}"></script>
		<script src="{{asset('admin-assets/plugins/custom/prismjs/prismjs.bundle.js')}}"></script>
		<script src="{{asset('admin-assets/js/scripts.bundle.js')}}"></script>
		{{-- <script src="https://keenthemes.com/metronic/assets/js/engage_code.js"></script> --}}
		<!--end::Global Theme Bundle-->
		<!--begin::Page Scripts(used by this page)-->
		<script src="{{asset('admin-assets/js/pages/custom/login/login-general.js')}}"></script>
		<!--end::Page Scripts-->
	</body>
	<!--end::Body-->
</html>