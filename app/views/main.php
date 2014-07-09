<!DOCTYPE html>
<html class="no-js">
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0, minimal-ui" />
	<title>Language Project</title>
	
	<!-- Google Fonts -->	
	<link href='http://fonts.googleapis.com/css?family=Oxygen:400,300,700' rel='stylesheet' type='text/css'>
	<link href='http://fonts.googleapis.com/css?family=Special+Elite' rel='stylesheet' type='text/css'>	
	<link href='http://fonts.googleapis.com/css?family=Homemade+Apple' rel='stylesheet' type='text/css'>

	<!-- Modernizr -->
	<script src="/myProject/bower_components/modernizr/modernizr.js"></script>

	<!-- Pic at top of tab -->
	<link rel="icon" type="img/" href="">

	<!-- Font Awesome -->
	<link href="http://maxcdn.bootstrapcdn.com/font-awesome/4.1.0/css/font-awesome.min.css" rel="stylesheet">

	<!-- Main CSS -->
	<link rel="stylesheet" href="/myProject/css/styles.css">

	<!-- Payload CSS -->
	<?php echo Payload::get_css(); ?>
</head>
<body>

	<div class="page">
		<?php echo $primary_header; ?>

		<div class="content">
			<?php echo $side_nav; ?>
			<?php echo $main_content; ?>
		</div>

		<?php echo $primary_footer; ?>
	</div>

	<!-- Include Common Scripts -->
	<script src="/myProject/bower_components/jquery/dist/jquery.js"></script>
	<script src="/myProject/bower_components/ReptileForms/dist/reptileforms.js"></script>

	<!-- Get JS -->
	<script>var app = {};app.settings=<?php echo Payload::get_settings(); ?>;</script>
	<?php echo Payload::get_js(); ?>
	
	<!-- CDN hosted by Cachefly -->
	<script src="http://tinymce.cachefly.net/4.1/tinymce.min.js"></script>

	<!-- Main JS -->
	<script src="/myProject/js/main.js"></script>

	<!-- text swapper -->
	<script src="/myProject/js/swapper.js"></script>


</body>
</html>