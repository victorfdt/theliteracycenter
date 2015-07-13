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

<body>

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
	@include('sections.banner')	
	<!-- /Banner -->

	<!-- Main -->
	<div id="page">

		<!-- Main -->
		<div id="main" class="container">
			<div class="row">
				<div class="9u">
					@yield('content')
				</div>

				<div class="3u">
					@include('sections.right_bar')
				</div>

			</div>
		</div>
		<!-- Main -->

	</div>
	<!-- /Main -->

	<!-- Featured -->
	<!-- @include('sections.featured') -->
	<!-- /Featured -->

	@include('sections.footer')

	@yield('make_home')

</body>
</html>
