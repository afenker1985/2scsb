<?php
	error_reporting( E_ALL ^ E_NOTICE );
	$file = $_SERVER["SCRIPT_NAME"];
	$break = Explode('/', $file);
	
	$pfile = $break[count($break) - 1];
		
	if ($pfile == "email.php" || $pfile == "guestbook.php" ) {
		$m = <<<EOHTML
			<ul>
				<li><a href="http://2scsbfan.info/index.php">Home</a></li>
				<li><a href="http://2scsbfan.info/albums.php">Albums</a></li>
				<li><a href="http://2scsbfan.info/info.php">Song Info</a></li>
				<li><a href="http://2scsbfan.info/covers.php">Media</a></li>
				<li><a href="http://2scsbfan.info/links.php">Links</a></li>
				<li id="current"><a href="http://2scsbfan.info/email.php">Contact</a></li>
			</ul>
EOHTML;
		
	} else {
		if ($pfile == "ss.php" || $pfile == "ihc.php" || $pfile == "dm.php" || $pfile == "hr.php" || $pfile == "lij.php") {
			$m = <<<EOHTML
			<ul>
				<li><a href="http://2scsbfan.info/index.php">Home</a></li>
				<li id="current"><a href="http://2scsbfan.info/albums.php">Albums</a></li>
				<li><a href="http://2scsbfan.info/info.php">Song Info</a></li>
				<li><a href="http://2scsbfan.info/covers.php">Media</a></li>
				<li><a href="http://2scsbfan.info/links.php">Links</a></li>
				<li><a href="http://2scsbfan.info/email.php">Contact</a></li>
			</ul>
EOHTML;

		} elseif ( $pfile == "covers.php" || $pfile == "midi.php" ) {
			$m = <<<EOHTML
			<ul>
				<li><a href="http://2scsbfan.info/index.php">Home</a></li>
				<li><a href="http://2scsbfan.info/albums.php">Albums</a></li>
				<li><a href="http://2scsbfan.info/info.php">Song Info</a></li>
				<li id="current"><a href="http://2scsbfan.info/covers.php">Media</a></li>
				<li><a href="http://2scsbfan.info/links.php">Links</a></li>
				<li><a href="http://2scsbfan.info/email.php">Contact</a></li>
			</ul>
EOHTML;
		}
	
	switch ($pfile) {
		case "index.php":
			$m = <<<EOHTML
			<ul>
				<li id="current"><a href="http://2scsbfan.info/index.php">Home</a></li>
				<li><a href="http://2scsbfan.info/albums.php">Albums</a></li>
				<li><a href="http://2scsbfan.info/info.php">Song Info</a></li>
				<li><a href="http://2scsbfan.info/covers.php">Media</a></li>
				<li><a href="http://2scsbfan.info/links.php">Links</a></li>
				<li><a href="http://2scsbfan.info/email.php">Contact</a></li>
			</ul>
EOHTML;
			break;
		case "albums.php":
			$m = <<<EOHTML
			<ul>
				<li><a href="http://2scsbfan.info/index.php">Home</a></li>
				<li id="current"><a href="http://2scsbfan.info/albums.php">Albums</a></li>
				<li><a href="http://2scsbfan.info/info.php">Song Info</a></li>
				<li><a href="http://2scsbfan.info/covers.php">Media</a></li>
				<li><a href="http://2scsbfan.info/links.php">Links</a></li>
				<li><a href="http://2scsbfan.info/email.php">Contact</a></li>
			</ul>
EOHTML;
			break;
		case "info.php":
			$m = <<<EOHTML
			<ul>
				<li><a href="http://2scsbfan.info/index.php">Home</a></li>
				<li><a href="http://2scsbfan.info/albums.php">Albums</a></li>
				<li id="current"><a href="http://2scsbfan.info/info.php">Song Info</a></li>
				<li><a href="http://2scsbfan.info/covers.php">Media</a></li>
				<li><a href="http://2scsbfan.info/links.php">Links</a></li>
				<li><a href="http://2scsbfan.info/email.php">Contact</a></li>
			</ul>
EOHTML;
			break;
		case "links.php":
			$m = <<<EOHTML
			<ul>
				<li><a href="http://2scsbfan.info/index.php">Home</a></li>
				<li><a href="http://2scsbfan.info/albums.php">Albums</a></li>
				<li><a href="http://2scsbfan.info/info.php">Song Info</a></li>
				<li><a href="http://2scsbfan.info/covers.php">Media</a></li>
				<li id="current"><a href="http://2scsbfan.info/links.php">Links</a></li>
				<li><a href="http://2scsbfan.info/email.php">Contact</a></li>
			</ul>
EOHTML;
			break;
		case "contact.php":
			$m = <<<EOHTML
			<ul>
				<li><a href="http://2scsbfan.info/index.php">Home</a></li>
				<li><a href="http://2scsbfan.info/albums.php">Albums</a></li>
				<li><a href="http://2scsbfan.info/info.php">Song Info</a></li>
				<li><a href="http://2scsbfan.info/covers.php">Media</a></li>
				<li><a href="http://2scsbfan.info/links.php">Links</a></li>
				<li id="current"><a href="http://2scsbfan.info/email.php">Contact</a></li>
			</ul>
EOHTML;
			break;
		case "covers.php":
			
			break;
		default:
			$m = <<<EOHTML
			<ul>
				<li><a href="http://2scsbfan.info/index.php">Home</a></li>
				<li><a href="http://2scsbfan.info/albums.php">Albums</a></li>
				<li><a href="http://2scsbfan.info/info.php">Song Info</a></li>
				<li><a href="http://2scsbfan.info/covers.php">Media</a></li>
				<li><a href="http://2scsbfan.info/links.php">Links</a></li>
				<li><a href="http://2scsbfan.info/email.php">Contact</a></li>
			</ul>
EOHTML;
			break;
	}


}
	
	$header = <<<EOHTML
	<head>
<!-- META TAGS -->
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<meta name="description" content="This site is dedicated to the music of the 2nd South Carolina String band." />
		<meta name="keywords" content="civil war music, civil war, 2nd South Carolina String Band" />
		<meta name="author" content="Aaron Fenker - aaronfenker@gmail.com" />
		<meta name="Distribution" content="Global" />
		<meta name="Rating" content="General" />
		<meta name="Robots" content="index,follow" />
		
		<title>
			Fan Site for the 2nd South Carolina String Band
		</title>
<!-- CSS -->
		
		<link rel="stylesheet" type="text/css" href="http://2scsbfan.info//images/HarvestField.css" />
		<link rel="stylesheet" type="text/css" href="http://2scsbfan.info/css/info.css" />
		<link rel="stylesheet" type="text/css" href="http://2scsbfan.info/css/thickbox.css" />
		<link rel="stylesheet" type="text/css" href="http://2scsbfan.info/css/style.css" />
		
<!-- External JS -->
		<script type="text/JavaScript" src="JavaScript/jquery-1.3.2.min.js"></script>
		<script type="text/JavaScript" src="JavaScript/thickbox.js"></script>
		<script type="text/JavaScript" src="JavaScript/jquery.popupwindow.js"></script>
		<script type="text/javascript" src="JavaScript/rotate3Di-0.9/rotate3Di-0.9.js"></script>
		<script type="text/javascript" src="JavaScript/rotate3Di-0.9/jquery-css-transform.js"></script>
		<script type="text/javascript" src="JavaScript/accordion.js"></script>

<!-- JScript -->
		<script type="text/javascript">

		  var _gaq = _gaq || [];
		  _gaq.push(['_setAccount', 'UA-16964230-1']);
		  _gaq.push(['_trackPageview']);

		  (function() {
		    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
		    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
		    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		  })();

		</script>
		<script type="text/javascript">
		$(document).ready(function () {
							
		    $('.Album div.back').hide();
		
		    function mySideChange(front) {
		        if (front) {
		            $(this).parent().find('div.front').show();
		            $(this).parent().find('div.back').hide();

		        } else {
		            $(this).parent().find('div.front').hide();
		            $(this).parent().find('div.back').show();
		        }
		    }

		    $('.Album').click(
		        function () {
		            $(this).find('div').stop().rotate3Di('toggle', 1500, {sideChange: mySideChange});
		        },
		        function () {
		            $(this).find('div').stop().rotate3Di('toggle', 1500, {sideChange: mySideChange});
		        }
		    );
		});
		</script>
	</head>
	
<!-- Content -->
		<body>
<!-- wrap starts here -->
		<div id="wrap">

<!--header -->
			<div id="header">			

				<h1 id="logo-text"><a href="http://2scsbfan.info/http://2scsbfan.info" title=""><span>2<sup>nd</sup></span> South Carolina <span>String Band</span></a></h1>
				<h2 id="slogan">Just a fan site...</h2>

				<div id="header-links">
					<p>
						<a href="http://2scsbfan.info/index.php">Home</a> | 
						<a href="http://2scsbfan.info/email.php">Email</a>
					</p>		
				</div>				

	<!--header ends-->					
			</div>
<!-- navigation starts-->	
			<div  id="nav">

				<div id="light-brown-line"></div>	

				{$m}

<!-- navigation ends-->	
			</div>
<!-- content-wrap starts -->
			<div id="content-wrap">

				<div id="sidebar">
					<h1>Albums</h1>
					<p class="thumbs">
						<a href="http://2scsbfan.info/Albums/ss.php"><img src="Pictures/SS.jpg" width="42" height="42" alt="thumbnail" /></a>
						<a href="http://2scsbfan.info/Albums/hr.php"><img src="Pictures/HR.jpg" width="42" height="42" alt="thumbnail" /></a>
						<a href="http://2scsbfan.info/Albums/ihc.php"><img src="Pictures/IHC.jpg" width="42" height="42" alt="thumbnail" /></a>
						<a href="http://2scsbfan.info/Albums/dm.php"><img src="Pictures/DM.jpg" width="42" height="42" alt="thumbnail" /></a>
						<a href="http://2scsbfan.info/Albums/lij.php"><img src="Pictures/LIJ.jpg" width="42" height="42" alt="thumbnail" /></a>
					</p>
					

					<h1>Sidebar Menu</h1>
					<ul class="sidemenu">				
						<li><a href="http://2scsbfan.info/index.php">Home</a></li>
					</ul>	

					<h1>Links</h1>
					<ul class="sidemenu">
						<li><a href="http://www.civilwarband.com/" target="_blank">2<sup>nd</sup> South Carolina String Band</a></li>
						<li><a href="http://www.civilwarpoetry.org/" target="_blank">Civil War Poetry</a></li>
					</ul>
					<br />
					{$t}
<!-- sidebar ends -->		
				</div>
				
				<div id="main">
			

EOHTML;
?>
