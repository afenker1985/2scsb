<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<?
	$albums = array( 1 => array("LIJ", "Lightning In A Jar") );
	include "../header.php";
	include "../footer.php";
	include "../getalbum.php";
	
	$content = <<<EOHTML
	{$header}
					<h1>Lightning In A Jar</h1>
					<div align="center">
						<table border="0">
							<tr>
								<td>
									<img src="../Pictures/{$albums[1][0]}.jpg" alt="{$albums[1][1]}" class="cover" style="background: none; border: 0px;" />
								</td>
								<td>
									<table>
										<tr>
											<td width="50%" align="right">
												<h3 class="info">Released:</h3>
											</td>
											<td align="left">
												2008
											</td>
										</tr>
										<tr>
											<td width="50%" align="right">
												<h3 class="info">Label:</h3>
											</td>
											<td align="left">
												Palmetto Productions
											</td>
										</tr>
									</table>
								</td>
							</tr>
							<tr>
								<td colspan="2">
									{$t}
								</td>
							</tr>
						</table>
						<div>
							<h1>Buy:</h1>
							<table>
								<tr>
									<td valign="top">
										<a href="http://itunes.apple.com/us/album/lightning-in-a-jar/id288548039?uo=4" target="itunes_store"><img src="http://r.mzstatic.com/images/web/linkmaker/badge_itunes-lrg.gif" alt="LIGHTNING IN a JAR - 2nd South Carolina String Band" style="border: 0; background: none;"/></a>
									</td>
									<td valign="top">
										<iframe src="http://rcm.amazon.com/e/cm?lt1=_blank&bc1=000000&IS2=1&npa=1&bg1=FFFFFF&fc1=000000&lc1=0000FF&t=aaronfenker-20&o=1&p=8&l=as4&m=amazon&f=ifr&ref=ss_til&asins=B004GO4G2E" style="width:120px;height:240px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe>
									</td>
								</tr>
							</table>
						</div>
					</div>
				{$footer}
EOHTML;
	echo $content;
?>
</html>
