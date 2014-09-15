<!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title></title>
    <meta name="description" content="">
    <meta name="viewport" content="width=device-width">

    <script src="//use.typekit.net/gbd2brz.js"></script>
	<script>try{Typekit.load();}catch(e){}</script>
    
    <?php wp_head(); ?>
</head>
<body>
<div class="l-container">
<header class="main-header l-main-header clearfix">
	<nav class="main-nav l-main-nav">
		<ul class="l-horizontal-list">
			<li class="l-mission"><a href="<?php echo get_page_link(8); ?>">Mission</a></li>
			<li class="l-clients"><a href="<?php echo get_page_link(10); ?>">Clients</a></li>
			<li class="l-expertise"><a href="<?php echo get_page_link(12); ?>">Expertise</a></li>
			<li class="l-team"><a href="<?php echo get_page_link(14); ?>">Team</a></li>
			<li class="l-contact"><a href="<?php echo get_page_link(16); ?>">Contact</a></li>
		</ul>
	</nav>
	<a href="<?php echo home_url(); ?>" class="l-logo-con"><img src="<?php bloginfo('template_directory'); ?>/img/logo.svg" onerror="this.src='<?php bloginfo('template_directory'); ?>/img/logo.png'" alt="<?php bloginfo('name'); ?>"></a>
</header>
