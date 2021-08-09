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
	<meta name='designer' content="melih şahinkesen">

	<!-- Twitter metas to customize link previews. -->
	<meta name="twitter:card" content="summary" />
	<meta name="twitter:site" content="@TatilcikusCom" />
	<meta name="twitter:creator" content="@TatilcikusCom" />
	<meta name="twitter:image" content="<?php echo $pageFacebookOgImage; ?>.jpg" />
	<meta name="twitter:image:src" content="<?php echo $pageFacebookOgImage; ?>.jpg" />

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
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#669966">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#ffffff">
</head>

<body <?php echo ' id="p-'.$page.'" ';?> class="p-loading">

	<!-- Header -->
	<header id="header">
		<div id="header-main">
			<div class="header-content">
				<nav class="container navbar navbar-expand-lg">
					<a class="navbar-brand order-1" href="index.php"></a>
					<div class="d-flex align-items-center navbar-extras order-2 order-lg-3 ml-md-auto">
						<div class="item d-lg-none">
							<button class="navbar-toggler order-3" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon d-flex align-items-center justify-content-center"><i class="fas fa-bars"></i></span>
							</button>
						</div>
					</div>

					<div class="collapse navbar-collapse order-4 order-lg-2" id="navbarSupportedContent">
						<ul class="navbar-nav mr-auto">
							<li class="nav-item d-none">
								<a class="nav-link" href="kibris-otelleri.php">Kıbrıs Otelleri</a>
							</li>
						</ul>
					</div>

				</nav>
			</div>
		</div>
		<div class="info-content">
			<div class="container">
				<div id="nav-info-text"></div>
			</div>
		</div>
	</header>


