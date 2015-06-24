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
		<div class="container">

			<!-- TODO = ONLY SHOW WHEN THE ADMIN IS LOOGED!!!!!--> 

			<!-- Logo -->
			@include('sections.logo')

			<!-- Menu -->
			@include('admin.menu')			

		</div>
	</div>
	<!-- Header -->
	


		<!-- Main -->
		<div id="main" class="container">
			<div class="row">
				<div class="12u">
					@yield('content')
				</div>				
			</div>
		</div>
		<!-- Main -->

	<!-- /Main -->

</body>
</html>
