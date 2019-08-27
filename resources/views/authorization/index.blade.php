<!DOCTYPE html>

<!-- 
Template Name: Metronic - Responsive Admin Dashboard Template build with Twitter Bootstrap 4 & Angular 8
Author: KeenThemes
Website: http://www.keenthemes.com/
Contact: support@keenthemes.com
Follow: www.twitter.com/keenthemes
Dribbble: www.dribbble.com/keenthemes
Like: www.facebook.com/keenthemes
Purchase: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
Renew Support: http://themeforest.net/item/metronic-responsive-admin-dashboard-template/4021469?ref=keenthemes
License: You must have a valid license purchased only from themeforest(the above link) in order to legally use the theme for your project.
-->
<html lang="en">

	<!-- begin::Head -->
	<head>

		<!--begin::Base Path (base relative path for assets of this page) -->
		<base href="../../../../">

		<!--end::Base Path -->
		<meta charset="utf-8" />
		<title>Task Login</title>
		<meta name="description" content="Login page example">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!--begin::Fonts -->
		<script src="https://ajax.googleapis.com/ajax/libs/webfont/1.6.16/webfont.js"></script>
		<script>
			WebFont.load({
				google: {
					"families": ["Poppins:300,400,500,600,700", "Roboto:300,400,500,600,700"]
				},
				active: function() {
					sessionStorage.fonts = true;
				}
			});
		</script>

		<!--end::Fonts -->

		<!--begin::Page Custom Styles(used by this page) -->
		<link href="<?= URL::to('/public/assets/css/demo1/pages/login/login-4.css') ?>" rel="stylesheet" type="text/css" />

		<!--end::Page Custom Styles -->

		<!--begin::Global Theme Styles(used by all pages) -->
		<link href="<?= URL::to('/public/assets/vendors/global/vendors.bundle.css') ?>" rel="stylesheet" type="text/css" />
		<link href="<?= URL::to('/public/assets/css/demo1/style.bundle.css') ?>" rel="stylesheet" type="text/css" />

		<!--end::Global Theme Styles -->

		<!--begin::Layout Skins(used by all pages) -->
		<link href="<?= URL::to('/public/assets/css/demo1/skins/header/base/light.css') ?>" rel="stylesheet" type="text/css" />
		<link href="<?= URL::to('/public/assets/css/demo1/skins/header/menu/light.css') ?>" rel="stylesheet" type="text/css" />
		<link href="<?= URL::to('/public/assets/css/demo1/skins/brand/dark.css') ?>" rel="stylesheet" type="text/css" />
		<link href="<?= URL::to('/public/assets/css/demo1/skins/aside/dark.css') ?>" rel="stylesheet" type="text/css" />

		<!--end::Layout Skins -->
		<link rel="shortcut icon" href="<?= URL::to('/public/assets/media/logos/favicon.ico') ?>" />

		<script src="<?= URL::to('/public/assets/vendors/global/vendors.bundle.js') ?>" type="text/javascript"></script>
		<script src="<?= URL::to('/public/assets/js/demo1/scripts.bundle.js') ?>" type="text/javascript"></script>

		<!--end::Global Theme Bundle -->

		<script type="text/javascript">
			window.onload = function() {
				var showErrorMsg = function(form, type, msg) {
					var alert = $('<div class="kt-alert kt-alert--outline alert alert-' + type + ' alert-dismissible" role="alert">\
						<button type="button" class="close" data-dismiss="alert" aria-label="Close"></button>\
						<span></span>\
					</div>');

					form.find('.alert').remove();
					alert.prependTo(form);
					//alert.animateClass('fadeIn animated');
					KTUtil.animateClass(alert[0], 'fadeIn animated');
					alert.find('span').html(msg);
				};

				var hideErrorMsg = function(form) {
					form.find('.alert').remove();
				};
				var displaySignInForm = function() {
					$('#kt_login').removeClass('kt-login--forgot');
					$('#kt_login').removeClass('kt-login--signup');

					$('#kt_login').addClass('kt-login--signin');
					KTUtil.animateClass($('#kt_login').find('.kt-login__signin')[0], 'flipInX animated');
					//login.find('.kt-login__signin').animateClass('flipInX animated');
				};
				var displayForgotForm = function() {
					$('#kt_login').removeClass('kt-login--signin');
					$('#kt_login').removeClass('kt-login--signup');

					$('#kt_login').addClass('kt-login--forgot');
					//login.find('.kt-login--forgot').animateClass('flipInX animated');
					KTUtil.animateClass($('#kt_login').find('.kt-login__forgot')[0], 'flipInX animated');

				};
			};
		</script>
	</head>

	<!-- end::Head -->

	<!-- begin::Body -->
	<body class="kt-quick-panel--right kt-demo-panel--right kt-offcanvas-panel--right kt-header--fixed kt-header-mobile--fixed kt-subheader--enabled kt-subheader--fixed kt-subheader--solid kt-aside--enabled kt-aside--fixed kt-page--loading">

		<!-- begin:: Page -->
		<div class="kt-grid kt-grid--ver kt-grid--root">
			<div class="kt-grid kt-grid--hor kt-grid--root  kt-login kt-login--v4 kt-login--signin" id="kt_login">
				<div class="kt-grid__item kt-grid__item--fluid kt-grid kt-grid--hor" style="background-image: url(<?= URL::to('/public/assets/media/bg/bg-2.jpg') ?>);">
					<div class="kt-grid__item kt-grid__item--fluid kt-login__wrapper">
						<div class="kt-login__container">
							<div class="kt-login__logo">
								<h1>Task</h1>
							</div>
							<div class="kt-login__signin">
								<div class="kt-login__head">
									<h3 class="kt-login__title">Sign In</h3>
								</div>
								<form class="kt-form" action="<?= URL::to('/login') ?>" method="post">
									{{ csrf_field() }}
									<div class="input-group">
										<input class="form-control" type="text" placeholder="Email" name="Login[email]" autocomplete="off">
									</div>
									<div class="input-group">
										<input class="form-control" type="password" placeholder="Password" name="Login[password]">
									</div>
									<div class="kt-login__actions">
										<button type="submit" class="btn btn-brand btn-pill kt-login__btn-primary">Sign In</button>
									</div>

								</form>
							</div>

						</div>
					</div>
				</div>
			</div>
		</div>

		<!-- end:: Page -->

		<!-- begin::Global Config(global config for global JS sciprts) -->
		<script>
			var KTAppOptions = {
				"colors": {
					"state": {
						"brand": "#5d78ff",
						"dark": "#282a3c",
						"light": "#ffffff",
						"primary": "#5867dd",
						"success": "#34bfa3",
						"info": "#36a3f7",
						"warning": "#ffb822",
						"danger": "#fd3995"
					},
					"base": {
						"label": ["#c5cbe3", "#a1a8c3", "#3d4465", "#3e4466"],
						"shape": ["#f0f3ff", "#d9dffa", "#afb4d4", "#646c9a"]
					}
				}
			};
		</script>

		<!-- end::Global Config -->

		<!--begin::Global Theme Bundle(used by all pages) -->
		<!--begin::Page Scripts(used by this page) -->
		<script src="<?= URL::to('/public/assets/js/demo1/pages/login/login-general.js') ?>" type="text/javascript"></script>
		<!--end::Page Scripts -->
	</body>

	<!-- end::Body -->
</html>