<?
/*/Test for browser...
if ( strstr($_SERVER['HTTP_USER_AGENT'], "iPhone") || strstr($_SERVER['HTTP_USER_AGENT'], "Mobile") && strstr($_SERVER["SCRIPT_NAME"], "index.php") ) {
	header('Location: http://ip.2scsbfan.info');
} elseif ( strstr($_SERVER['HTTP_USER_AGENT'], "iPhone") || strstr($_SERVER['HTTP_USER_AGENT'], "Mobile") ) {
	$pfile = $break[count($break) - 1];
	echo $pfile . "<br />";
	$folder = $break[count($break) - 2];
	echo $folder . "<br />";
	$file = Explode('.', $pfile);
	echo $file . "<br />";
}*/

?>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<?	
//	include "php/widget.php";
	include "php/mysql_functions.php";
	include "header.php";
	include "footer.php";
	
//	$w = new widget();
//	$widget = $w->createwidget();
	
	$content = <<<EOHTML
	{$header}
			<div style="font-size: 10pt;">
			<br />
				<strong>Welcome to 2scsbfan.info!</strong>  This is a fansite dedicated to the music of the 2<sup>nd</sup> South Carolina String Band.  The band will be used as a springboard to look at other aspects of the Civil War as well.  This site has lyrics and discography for all the band's songs.  It will also contain brief information about some of the major composers of civilwar era music; currently all that is supplied in that area is a list of a few authors and what songs they wrote.
				<br /><br />
				I realize there hasn't been an update in quite some time, but this is due to my lack of free time.  I plan to keep working slowly on this site, but any updates will be done at a slow place.  But you can enjoy all the lyrics from the 2nd South Caroline String Band.
				<br /><br />
				I still hope to have an optimized site for mobile browsing, but again this will take some time.  I have also removed the "guestbook" since it no longer worked, and I have fixed the Email form so it now works.  I am sorry for any inconvenience the lack of these services has provided.
				<br /><br />
				I hope you enjoy the site, and keep coming back.
				<br /><br />
				~Aaron F. (Webmaster) - Posted: 6/7/11
				<br />
				{$widget}
			</div>
			{$footer}
EOHTML;
	echo $content;
?>
</html>
