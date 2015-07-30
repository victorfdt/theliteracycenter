<!DOCTYPE HTML>
<!--
	Ex Machina by TEMPLATED
    templated.co @templatedco
    Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>
<head>
	@include('sections.head')
</head>

<body class="homepage">

	<!-- Header -->
	<div id="header">
		<div class="container" id="menu">

			<!-- Logo -->
			@include('sections.logo')

			<!-- Nav -->
			@include('sections.menu2')

		</div>
	</div>
	<!-- Header -->

	<!-- Banner -->

	<div id="back_banner" class="back_banner">
		@include('sections.banner_home')
	</div>
	<!-- /Banner -->

	<!-- Main -->
	<div id="page">

		@yield('content')

	</div>
	<!-- /Main -->

	<!-- Featured -->
	<!-- @include('sections.featured') -->
	<!-- /Featured -->

	@include('sections.footer')   

</body>
</html>
