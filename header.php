<?php 
	// For share buttons & Metas
	$actual_link = (isset($_SERVER['HTTPS']) ? "https" : "http") . "://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";
	
	$generalsJsonDirectory = "variables/general.json";
	$generalsJson = json_decode(file_get_contents($generalsJsonDirectory), TRUE);
?>

<!DOCTYPE html>
<html lang="tr">
<head>

	<!-- Basics
	================================================== -->
	<meta charset="utf-8">
	<title><?php echo $page_title; ?></title>
	<meta name="description" content="<?php echo $page_desc; ?>">
	<meta name="keywords" content="<?php echo $page_keywords; ?>">
	<meta name="robots" content="<?php echo $page_robots; ?>">
	<meta name="abstract" content="<?php echo $page_abstract; ?>">
	<meta name='developer' content="melih şahinkesen - melihsahinkesen.com">

	<!-- Facebook Open Graph tags to customize link previews. -->
	<meta property="og:site_name"     content="tatilcikuş" />
	<meta property="og:url"           content="<?php echo $actual_link; ?>" />
	<meta property="og:type"          content="website" />
	<meta property="og:title"         content="<?php echo $page_title; ?>" />
	<meta property="og:description"   content="<?php echo $page_desc; ?>" />
	<meta property="og:image" 				content="<?php echo $pageFacebookOgImage; ?>.jpg" />
	<meta property="og:image:type"    content="image/jpg" />
	<meta property="og:image:width"   content="250" />
	<meta property="og:image:height"  content="250" />


	<!-- Mobile Specific Metas
	================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta http-equiv="x-ua-compatible" content="ie=edge">

	<!-- CSS
	================================================== -->
	<link rel="stylesheet" href="assets/css/style.css">

	<!-- Favicons
	================================================== -->
	<link rel="icon" type="image/png" href="/favicon-96x96.png" sizes="96x96" />
	<link rel="icon" type="image/svg+xml" href="/favicon.svg" />
	<link rel="shortcut icon" href="/favicon.ico" />
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png" />
	<link rel="manifest" href="/site.webmanifest" />
</head>

<body <?php echo ' id="p-'.$page.'" ';?> class="p-loading">

	<!-- Header -->
	<header id="header">
		<div id="header-main">
			<div class="header-content">
				<nav class="container-fluid navbar navbar-expand-lg">
					<a class="navbar-brand order-1" href="index.php">
						<img src="assets/svg/logoipsum-logo.svg" alt="Example logo">
					</a>
				</nav>
			</div>
		</div>
		<div class="info-content">
			<div class="container">
				<div id="nav-info-text"></div>
			</div>
		</div>
	</header>