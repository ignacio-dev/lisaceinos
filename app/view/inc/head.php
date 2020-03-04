<!DOCTYPE html>
<html>
<head>
	<!-- GENERAL -->
	<meta charset="utf-8">
	<title><?= SITENAME . titleAppend($current); ?></title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- OPEN GRAPH -->
	<meta property="og:title" content="<?= META_TITLE ?>"/>
	<meta property="og:url" content="<?= URL ?>"/>
	<meta property="og:type" content="website"/>
	<meta property="og:description" content="<?= META_DESCRIPTION ?>"/>
	<meta property="og:image" content="<?= OG_IMG ?>"/>
	<!-- TWITTER CAARD -->
	<meta name="twitter:card" content="summary"/>
	<meta name="twitter:site" content="<?= TWITTER ?>"/>
	<meta name="twitter:title" content="<?= META_TITLE ?>"/>
	<meta name="twitter:description" content="<?= META_DESCRIPTION ?>"/>
	<meta name="twitter:image" content="<?= TWITTER_CARD ?>"/>
	<!-- SEO -->
	<link rel="canonical" href="<?= URL ?>"/>
	<meta name="description" content="<?= META_DESCRIPTION ?>">
	<!-- FAVICON -->
	<link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="/favicon-16x16.png">
	<link rel="manifest" href="/site.webmanifest">
	<link rel="mask-icon" href="/safari-pinned-tab.svg" color="#B91D47">
	<meta name="apple-mobile-web-app-title" content="<?= SITENAME ?>">
	<meta name="application-name" content="<?= SITENAME ?>">
	<meta name="msapplication-TileColor" content="#B91D47">
	<meta name="theme-color" content="#FFFFFF">
	<!-- STYLESHEETS -->
	<link rel="stylesheet" type="text/css" href="<?= URLROOT ?>/css/reset.css?<?=     TIMESTAMP ?>">
	<link rel="stylesheet" type="text/css" href="<?= URLROOT ?>/css/style.css?<?=     TIMESTAMP ?>">
	<link rel="stylesheet" type="text/css" href="<?= URLROOT ?>/css/header.css?<?=    TIMESTAMP ?>">
	<link rel="stylesheet" type="text/css" href="<?= URLROOT ?>/css/keyframes.css?<?= TIMESTAMP ?>">
	<link rel="stylesheet" type="text/css" href="<?= URLROOT ?>/css/modal.css?<?=     TIMESTAMP ?>">
	<link rel="stylesheet" type="text/css" href="<?= URLROOT ?>/css/<?= strtolower($current)?>.css?<?=   TIMESTAMP ?>">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
</head>
<body>
<? require APPROOT . "/view/inc/navbar.php"; ?>
