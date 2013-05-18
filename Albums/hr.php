<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<?
	$albums = array( 1 => array("HR", "Hard Road") );
	include "../header.php";
	include "../footer.php";
	include "../getalbum.php";
	
	$content = <<<EOHTML
	{$header}
					<h1>Hard Road</h1>
					<div align="center">
						<table border="0">
							<tr>
								<td valign="top">
									<img src="../Pictures/{$albums[1][0]}.jpg" alt="{$albums[1][1]}" class="cover" style="background: none; border: 0px;" />
								</td>
								<td>
									<table>
										<tr>
											<td width="50%" align="right">
												<h3 class="info">Released:</h3>
											</td>
											<td align="left">
												2000
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
									<a href="http://itunes.apple.com/us/album/hard-road/id5004758?uo=4" target="itunes_store"><img src="http://r.mzstatic.com/images/web/linkmaker/badge_itunes-lrg.gif" alt="Hard Road - 2nd South Carolina String Band" style="border: 0; background: none;"/></a>
								</td>
								<td valign="top">
									<iframe src="http://rcm.amazon.com/e/cm?lt1=_blank&amp;bc1=000000&amp;IS2=1&amp;npa=1&amp;bg1=FFFFFF&amp;fc1=000000&amp;lc1=0000FF&amp;t=aaronfenker-20&amp;o=1&amp;p=8&amp;l=as1&amp;m=amazon&amp;f=ifr&amp;md=10FE9736YVPPT7A0FBG2&amp;asins=B000Z7S6F4" style="width:120px;height:240px;" scrolling="no" marginwidth="0" marginheight="0" frameborder="0"></iframe>
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
