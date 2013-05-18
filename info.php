<?
/*if ( ( strstr($_SERVER['HTTP_USER_AGENT'], "iPhone") || strstr($_SERVER['HTTP_USER_AGENT'], "Mobile") ) && strstr($_SERVER["SCRIPT_NAME"], "index.php") ) {
	header('Location: http://ip.2scsbfan.info');
} 
if ( strstr($_SERVER['HTTP_USER_AGENT'], "iPhone") || strstr($_SERVER['HTTP_USER_AGENT'], "Mobile") ) {
	$break = $_SERVER['SCRIPT_NAME'];
	header('Location: http://ip.2scsbfan.info' . $break);
}*/
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<?
	include "header.php";
	include "footer.php";
	
	$content = <<<EOHTML
	{$header}
					<h2>Notable Authors</h2>
					<div align="center">
					<ul id="menu" class="menu collapsible" style="list-style-type: none;">
						<li>
							<a href="#">Daniel Decatur Emmett (1815-1904)</a>
							<ul style="list-style-type: none;">
								<li>
									<a href="Albums/ss.php">Old Dan Tucker (c. 1830)</a>
								</li>
								<li>
									<a href="Albums/ss.php">Boatmans' Dance</a>
								</li>
								<li>
									<a href="Albums/ss.php">Dixie (c. 1859)</a>
								</li>
								<li>
									<a href="Albums/ss.php">Zip Coon (Attr.)</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Stephen Collins Foster (1826-64)</a>
							<ul>
								<li>
									<a href="Albums/hr.php">Oh! Susanna (1848)</a>
								</li>
								<li>
									<a href="Albums/ihc.php">Oh! Lemuel (1850)</a>
								</li>
								<li>
									<a href="Albums/hr.php">De Camptown Races (1850)</a>
								</li>
								<li>
									<a href="Albums/dm.php">Nelly Bly (1850)</a>
								</li>
								<li>
									<a href="Albums/ihc.php">Angelina Baker (1850)</a>
								</li>
								<li>
									<a href="Albums/hr.php">Ring de Banjo! (1851)</a>
								</li>
								<li>
									<a href="Albums/ihc.php">Old Folks at Home (Swanee River) (1851)</a>
								</li>
								<li>
									<a href="Albums/dm.php">My Old Kentucky Home (1853)</a>
								</li>
								<li>
									<a href="Albums/ss.php">Hard Times Come Again No More (1854)</a>
								</li>
								<li>
									<a href="Albums/ihc.php">The Glendy Burke (1860)</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">George Frederick Root (1820-95)</a>
							<ul>
								<li>
									<a href="Albums/hr.php">The Vacant Chair (1861)</a>
								</li>
								<li>
									<a href="Albums/hr.php">The Battle Cry of Freedom (1862)</a>
								</li>
								<li>
									<a href="Albums/dm.php">Tramp! Tramp! Tramp! (1864) - Union Version
									<br />
									<span style="padding-left: 15px">Tramp! Tramp! Tramp! - Southern Version (Anonymous)</span></a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Joel Walker Sweeney (1810-60)</a>
							<ul>
								<li>
									<a href="Albums/ss.php">Jenny Get Your Hoecake Done</a>
								</li>
							</ul>
						</li>
						<li>
							<a href="#">Henry Clay Work (1832-84)</a>
							<ul>
								<li>
									<a href="Albums/hr.php">Kingdom Coming! (1862)</a>
								</li>
							</ul>
						</li>
					</ul>
					</div>
				{$footer}
EOHTML;
	echo $content;
?>
</html>