<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<?
	include "header.php";
	include "footer.php";
	
	$content = <<<EOHTML
	{$header}
					<div align="center">
						<h1>2<sup>nd</sup> South Carolina String Band Albums</h1>
						<table>
							<tr>
								<td>
									<a href="Albums/ss.php">
										<img src="Pictures/SS.jpg" style="width: 100px; border: 1px solid #000;" alt="Southern Soldier" />
									</a>
								</td>
								<td align="center" valign="middle">
									<h3><a href="Albums/ss.php">Southern Soldier</a></h3>
								</td>
							</tr>
							<tr>
								<td>
									<a href="Albums/hr.php">
										<img src="Pictures/HR.jpg" style="width: 100px; border: 1px solid #000;" alt="Hard Road" />
									</a>
								</td>
								<td align="center" valign="middle">
									<h3><a href="Albums/hr.php">Hard Road</a></h3>
								</td>
							</tr>
							<tr>
								<td>
									<a href="Albums/ihc.php">
										<img src="Pictures/IHC.jpg" style="width: 100px; border: 1px solid #000;" alt="In High Cotton" />
									</a>
								</td>
								<td align="center" valign="middle">
									<h3><a href="Albums/ihc.php">In High Cotton</a></h3>
								</td>
							</tr>
							<tr>
								<td>
									<a href="Albums/dm.php">
										<img src="Pictures/DM.jpg" style="width: 100px; border: 1px solid #000;" alt="Dulcem Melodies" />
									</a>
								</td>
								<td align="center" valign="middle">
									<h3><a href="Albums/dm.php">Dulcem Melodies</a></h3>
								</td>
							</tr>
							<tr>
								<td>
									<a href="Albums/lij.php">
										<img src="Pictures/LIJ.jpg" style="width: 100px; border: 1px solid #000;" alt="Southern Soldier" />
									</a>
								</td>
								<td align="center" valign="middle">
									<h3><a href="Albums/lij.php">Lightning In A Jar</a></h3>
								</td>
							</tr>
						</table>
					</div>
				{$footer}
EOHTML;
	echo $content;
?>
</html>