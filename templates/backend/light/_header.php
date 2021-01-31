<!DOCTYPE html>
<html lang="fr">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no">
	<meta name="description" content="">
	<meta name="author" content="">

    <title><?php echo (isset($GLOBALS['Site']) ? $GLOBALS['Site']->get_Valeur('titre') : "Installation"); ?></title>

	<!-- Main Styles -->
	<link rel="stylesheet" href="/templates/<?php echo $_SESSION['template']; ?>/assets/styles/style.min.css">
	
	<!-- Material Design Icon -->
	<link rel="stylesheet" href="/templates/<?php echo $_SESSION['template']; ?>/assets/fonts/material-design/css/materialdesignicons.css">

	<!-- mCustomScrollbar -->
	<link rel="stylesheet" href="/templates/<?php echo $_SESSION['template']; ?>/assets/plugin/mCustomScrollbar/jquery.mCustomScrollbar.min.css">

	<!-- Waves Effect -->
	<link rel="stylesheet" href="/templates/<?php echo $_SESSION['template']; ?>/assets/plugin/waves/waves.min.css">

	<!-- Sweet Alert -->
	<link rel="stylesheet" href="/templates/<?php echo $_SESSION['template']; ?>/assets/plugin/sweet-alert/sweetalert.css">
	
	<!-- Morris Chart -->
	<link rel="stylesheet" href="/templates/<?php echo $_SESSION['template']; ?>/assets/plugin/chart/morris/morris.css">

	<!-- FullCalendar -->
	<link rel="stylesheet" href="/templates/<?php echo $_SESSION['template']; ?>/assets/plugin/fullcalendar/fullcalendar.min.css">
	<link rel="stylesheet" href="/templates/<?php echo $_SESSION['template']; ?>/assets/plugin/fullcalendar/fullcalendar.print.css" media='print'>
	
	<!-- Dropify -->
	<link rel="stylesheet" href="/templates/<?php echo $_SESSION['template']; ?>/assets/plugin/dropify/css/dropify.min.css">
	
	<!-- Jquery UI -->
	<link rel="stylesheet" href="/templates/<?php echo $_SESSION['template']; ?>/assets/plugin/jquery-ui/jquery-ui.min.css">
	<link rel="stylesheet" href="/templates/<?php echo $_SESSION['template']; ?>/assets/plugin/jquery-ui/jquery-ui.structure.min.css">
	<link rel="stylesheet" href="/templates/<?php echo $_SESSION['template']; ?>/assets/plugin/jquery-ui/jquery-ui.theme.min.css">

	<!-- Dark Themes -->
	<link rel="stylesheet" href="/templates/<?php echo $_SESSION['template']; ?>/assets/styles/style-dark.min.css">
</head>

<body>