<!doctype html>
<!--[if lt IE 7]> <html class="no-js ie6 oldie" lang="en"> <![endif]-->
<!--[if IE 7]>    <html class="no-js ie7 oldie" lang="en"> <![endif]-->
<!--[if IE 8]>    <html class="no-js ie8 oldie" lang="en"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

	<title><?php echo $title_for_layout ?></title>
	<meta name="description" content="">
	<meta name="author" content="">

	<meta name="viewport" content="width=device-width,initial-scale=1">

	<link rel="stylesheet" href="/css/style.css">

    <link href='http://fonts.googleapis.com/css?family=Alegreya+SC|Monsieur+La+Doulaise|Italianno' rel='stylesheet' type='text/css'>
    <link rel="stylesheet" href="/css/cakersvp.css">
	<script src="/js/libs/modernizr-2.0.6.min.js"></script>
    <?php		echo $scripts_for_layout;	?>
</head>
<body>
	<div id="header-container">
		<header class="wrapper clearfix">
			<h1 id="title" class="mons"><a href="/">Scott & Javaneh's Wedding</a></h1>
			<nav>
				<ul>
                    <li><a href="/">Home</a></li>
                    <li><a href="/pages/registry">Registry</a></li>
                    <li><a href="/pages/info">Information</a></li>
				</ul>
			</nav>
		</header>
	</div>
	<div id="main-container">
		<div id="main" class="wrapper clearfix">
            <article>
            <?php echo $this->Session->flash(); ?>
			<?php echo $content_for_layout; ?>
            </article>
            <?php if(!isset($noaside) || !$noaside){ ?>
            <aside>
                <?php
                    if(!empty($user)){
                        echo $this->element("user");
                    } else {
                        echo $this->element("rsvp");
                    }
                ?>
			</aside>
            <?php } ?>
		</div> <!-- #main -->
	</div> <!-- #main-container -->

	<div id="footer-container">
		<footer class="wrapper">			
            <div id="countdowncontainer" class="ital"></div>
		</footer>
	</div>

<script src="//ajax.googleapis.com/ajax/libs/jquery/1.7.1/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="js/libs/jquery-1.7.1.min.js"><\/script>')</script>

<script src="/js/script.js"></script>
<script>
	var _gaq=[['_setAccount','UA-XXXXX-X'],['_trackPageview']]; // Change UA-XXXXX-X to be your site's ID
	(function(d,t){var g=d.createElement(t),s=d.getElementsByTagName(t)[0];g.async=1;
	g.src=('https:'==location.protocol?'//ssl':'//www')+'.google-analytics.com/ga.js';
	s.parentNode.insertBefore(g,s)}(document,'script'));
</script>

<!--[if lt IE 7 ]>
	<script src="//ajax.googleapis.com/ajax/libs/chrome-frame/1.0.2/CFInstall.min.js"></script>
	<script>window.attachEvent("onload",function(){CFInstall.check({mode:"overlay"})})</script>
<![endif]-->
<?php echo $this->element('sql_dump'); ?>
</body>
</html>