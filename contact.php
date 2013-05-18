<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<?
	include "header.php";
	include "footer.php";
	
	$content = <<<EOHTML
	{$header}
					<div align="center">
						<h1>
							Contact Options
						</h1>
						<br />
						<h2>
							<a href="email.php">Email Webmaster</a>
						</h2>
						<h2>
							<a href="guestbook.php">Guestbook</a>
						</h2>
					</div>
				{$footer}
EOHTML;
	echo $content;
?>
</html>
