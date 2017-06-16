<!doctype html>
<html>
	<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Questionare Index</title>

	<!-- Bootstrap -->
	<link rel="stylesheet" href="resources/css/bootstrap.css">
	<link rel="stylesheet" href="resources/css/custom_styles.css" />



	</head>

<body>

	<section class="section_1_container">
		<p align="center">Oops . . . Something went wrong</p>
	</section>

	<hr width="80%" left="10%" />

	<section class="section_2_container">
		<p align="center">Oops . . . Something went wrong</p>
	</section>

	<hr width="80%" left="10%" />

	<section class="section_3_container">
		<p align="center">Oops . . . Something went wrong</p>
	</section>



<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
<script src="resources/js/jquery-1.11.3.min.js"></script>
<!-- Include all compiled plugins (below), or include individual files as needed -->
<script src="resources/js/bootstrap.js"></script>
<script language="javascript">
$(document).ready(function(){

	$('.section_1_container').load('section_1/index.php');
	$('.section_2_container').load('section_2/index.php');
	$('.section_3_container').load('section_3/index.php');

});
</script>
</body>
</html>
