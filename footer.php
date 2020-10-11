<?
	date_default_timezone_set('America/Chicago');
	$y = date("Y");
	$link = <<<EOHTML
<a href="http://2scsbfan.info">2scsbfan.info</a>
EOHTML;
	$footer = <<<EOHTML
	
<!-- main ends -->	
		</div>
		
<!-- content-wrap ends-->	
	</div>
	<!-- footer starts -->
	<div id="footer">
		<p>
			All information on {$link} is &copy;2009&ndash;{$y}, and may not be reproduced without permission. Ownership of lyrics, perfomances, or album artwork is retained by all respective owners and not {$link}.  All liability for misuse of the information provided rests solely with the user, and not with {$link} or its webmaster.
			<br />
			Design by: <a href="http://www.styleshout.com/">styleshout</a>
		</p>
	<!-- footer ends -->		
	</div>	

<!-- wrap ends here -->
</div>
	</body>
EOHTML;
?>
