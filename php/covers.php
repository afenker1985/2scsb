<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<?
	include "header.php";
	include "footer.php";
	include "php/coverlist.php";
	
	$c = new coverlist();
	
	$cl = $c->printlist();
	
	$content = <<<EOHTML
	{$header}
					<h1 align="center">
						Original Music Covers
					</h1>
					<div style="font-size: 10pt;">
						This page offers a glance at the first page of sheet music for some of the songs performed by the 2<sup>nd</sup> South Carolina String band.  A few of the songs have a couple covers, and both are offered here.  There is one inconsistancy that I am aware of, namely, <em>Southron's Tramp! Tramp! Tramp!</em> has the sheet music linked for <em>Tramp! Tramp! Tramp!</em>.  Also, the sheet music for <em>Dandy Jim of Caroline</em> is included for <em>Company I, 2nd South Caroline</em> because the later is a parody by 2<sup>nd</sup> South Carolina String Band based upon the former.  I am working to find more examples of sheet music covers.  I hope you enjoy the selection.
					</div>
					<br />
					{$cl}
					
				<!--	<br />
					<dl>
						<dt>Southern Soldier</dt>
							<dd>&nbsp;&nbsp;6. <a href="http://2scsbfan.info/Covers/SS/6.php" class="mcover">Zip Coon</a></dd>
							<dd>&nbsp;&nbsp;7. <a href="http://2scsbfan.info/Covers/SS/7.php" class="mcover">Hard Times Come Again No More</a></dd>
							<dd>12. <a href="http://2scsbfan.info/Covers/SS/12.php" class="mcover">Keemo Kimo</a></dd>
							<dd>17. <a href="http://2scsbfan.info/Covers/SS/17.01.php" class="mcover">Arkansas Traveler</a> (<em><a href="http://2scsbfan.info/Covers/SS/17.02.php" class="mcover">alternate</a></em>)</dd>
						<dt>Hard Road</dt>
							<dd>&nbsp;&nbsp;1. <a href="http://2scsbfan.info/Media/covers/TentingTonight.png" class="mcover">Tenting on the Old Camp Ground</a></dd>
							<dd>&nbsp;&nbsp;2. <a href="http://2scsbfan.info/Media/covers/BattleCryofFreedom.png" class="mcover">Battle Cry of Freedom</a></dd>
							<dd>&nbsp;&nbsp;4. <a href="http://2scsbfan.info/Media/covers/Johnny.png" class="mcover">When Johnny Comes Marching Home</a></dd>
							<dd>&nbsp;&nbsp;7. <a href="http://2scsbfan.info/Media/covers/Invalid.jpg" class="mcover">Invalid Corps</a></dd>
							<dd>&nbsp;&nbsp;9. <a href="http://2scsbfan.info/Media/covers/KingdomComing.png" class="mcover">Kingdom Coming</a></dd>
							<dd>10. <a href="http://2scsbfan.info/Media/covers/BonnieBlue1.jpg" class="mcover">Bonnie Blue Flag</a> (<em><a href="http://2scsbfan.info/Media/covers/BonnieBlue2.jpg" class="mcover">alternate</a></em>)</dd>
							<dd>15. <a href="http://2scsbfan.info/Media/covers/GooberPeas.png" class="mcover">Goober Peas</a></dd>
							<dd>18. <a href="http://2scsbfan.info/Media/covers/Lorena.jpg" class="mcover">Lorena</a> (<em><a href="http://2scsbfan.info/Media/covers/Lorena2.jpg" class="mcover">alternate</a></em>)</dd>
							<dd>19. <a href="http://2scsbfan.info/Media/covers/VacantChair.jpg" class="mcover">The Vacant Chair</a></dd>
						<dt>In High Cotton</dt>
							<dd>&nbsp;&nbsp;2. <a href="http://2scsbfan.info/Media/covers/OldFolks1.jpg" class="mcover">Old Folks At Home (Swanee River)</a> (<em><a href="http://2scsbfan.info/Media/covers/OldFolks.jpg" class="mcover">alternate</a></em>)</dd>
							<dd>&nbsp;&nbsp;3. <a href="http://2scsbfan.info/Media/covers/OLemuel.jpg" class="mcover">O Lemuel</a></dd>
							<dd>12. <a href="http://2scsbfan.info/Media/covers/RosinTheBeau.jpg" class="mcover">Old Rosin The Beau</a></dd>
							<dd>15. <a href="http://2scsbfan.info/Media/covers/DownInAlabama.jpg" class="mcover">Down In Alabama</a></dd>
							<dd>16. <a href="http://2scsbfan.info/Media/covers/BonnieBlue1.jpg" class="mcover">The Bonnie Blue Flag</a> (<em><a href="http://2scsbfan.info/Media/covers/BonnieBlue2.jpg" class="mcover">alternate</a></em>)</dd>
						<dt>Dulcem Melodies</dt>
							<dd>&nbsp;&nbsp;1. <a href="http://2scsbfan.info/Media/covers/NellyBly.jpg" class="mcover">Nelly Bly</a></dd>
							<dd>&nbsp;&nbsp;3. <a href="http://2scsbfan.info/Media/covers/StonewallJacksonsWay.png" class="mcover">Stonwall Jackson's Way</a> / Garryowen</dd>
							<dd>&nbsp;&nbsp;4. <a href="http://2scsbfan.info/Media/covers/Mockingbird.jpg" class="mcover">Listen to the Mocking Bird</a> / Siege of Vicksburg</dd>
							<dd>&nbsp;&nbsp;8. <a href="http://2scsbfan.info/Media/covers/Kentucky.jpg" class="mcover">My Old Kentucky Home</a></dd>
							<dd>&nbsp;&nbsp;9. <a href="http://2scsbfan.info/Media/covers/YellowRoseOfTexas.jpg" class="mcover">The Yellow Rose of Texas</a></dd>
							<dd>11. <a href="http://2scsbfan.info/Media/covers/MinstrelBoy.jpg" class="mcover">The Minstrel Boy</a></dd>
							<dd>12. <a href="http://2scsbfan.info/Media/covers/TrampTrampTramp.png" class="mcover">Southron's Tramp! Tramp! Tramp!</a></dd>
							<dd>14. <a href="http://2scsbfan.info/Media/covers/sweetevelina.jpg" class="mcover">Sweet Evalina</a> (<em><a href="http://2scsbfan.info/Media/covers/sweetevelina2.jpg" class="mcover">alternate</a></em>)</dd>
							<dd>15. <a href="http://2scsbfan.info/Media/covers/DixieWar.jpg" class="mcover">War Song of Dixie</a></dd>
					</dl>

					<div align="center">
						<table cellspacing="5">
							<tr>
								<td>
									<div class="bg" style="background:url(Pictures/SS.thumb.jpg)">
										<ol>
											<li>
												Ol' Dan Tucker
											</li>
											<li>
												McLeod's Reel
											</li>
											<li>
												Oh Lud Gals
											</li>
											<li>
												Boatman's Dance
											</li>
											<li>
												Fisher's/Rickett's Hornpipes
											</li>
											<li>
												<a href="Media/covers/ZipCoon.jpg" class="mcover">Zip Coon</a>
											</li>
											<li>
												Hard Times Come Again No More
											</li>
											<li>
												John Brown's March
											</li>
											<li>
												John Brown's Dream
											</li>
											<li>
												Oh, I'm A Good Ol' Rebel
											</li>
											<li>
												Palmetto Quickstep
											</li>
											<li>
												<a href="Media/covers/KeemoKimo.jpg" class="mcover">Keemo Kimo</a>
											</li>
											<li>
												Jackson in the Valley
											</li>
											<li>
												Johnny Boker/Circus Jig/Jim Along Josie
											</li>
											<li>
												Rock the Cradle, Julie
											</li>
											<li>
												Jenny, Get Your Hoecake Done
											</li>
											<li>
												<a href="Media/covers/ArkansasTraveler1.jpg" class="mcover">The Arkansas Traveller</a>
											</li>
											<li>
												Southern Soldier
											</li>
											<li>
												Dixie's Land
											</li>
										</ol>
									</div>
								</td>
								<td>
									<div class="bg" style="background:url(Pictures/HR.thumb.jpg)">
										<ol>
											<li>
												Tenting On the Old Camp Ground
											</li>
											<li>
												<a href="Media/covers/BattleCryofFreedom.png" class="mcover">Battle Cry of Freedom</a>
											</li>
											<li>
												Cavalier's Waltz
											</li>
											<li>
												When Johnny Comes Marching Home
											</li>
											<li>
												Cindy
											</li>
											<li>
												Oh! Susanna
											</li>
											<li>
												Invalid Corps
											</li>
											<li>
												Buffalo Gals
											</li>
											<li>
												Kingdom Coming
											</li>
											<li>
												Bonnie Blue Flag
											</li>
											<li>
												Jine the Cavalry
											</li>
											<li>
												Ring De Banjo
											</li>
											<li>
												Rose of Alabama
											</li>
											<li>
												Camptown Races
											</li>
											<li>
												Goober Peas
											</li>
											<li>
												Cumberland Gap
											</li>
											<li>
												Sweet Betsy from Pike
											</li>
											<li>
												Lorena
											</li>
											<li>
												The Vacant Chair
											</li>
											<li>
												Richmond Is A Hard Road
											</li>
										</ol>
									</div>
								</td>
							</tr>
						</table>
						<table cellspacing="5">
							<tr>
								<td>
									<div class="bg" style="background:url(Pictures/IHC.thumb.jpg)">
										<ol>
											<li>
												Lynchburg Town/Briggs' Jig
											</li>
											<li>
												Old Folks at Home (Swanee River)
											</li>
											<li>
												O Lemuel
											</li>
											<li>
												'Twill Neber Do to Gib It Up So
											</li>
											<li>
												Granny Will Your Dog Bite/Guilderoy
											</li>
											<li>
												Liza Jane/Mississippi Sawyer/Road to Boston
											</li>
											<li>
												I'm Gwine Ober de Mountain
											</li>
											<li>
												Blue Tail Fly
											</li>
											<li>
												Angelina Baker/Angeline the Baker
											</li>
											<li>
												Cripple Creek/Old Joe Clarke/The Girl I Left Behind Me
											</li>
											<li>
												Jordan Is A Hard Road To Travel
											</li>
											<li>
												Old Rosin the Beau
											</li>
											<li>
												Glendy Burke
											</li>
											<li>
												The White Cockade/The Devil's Dream
											</li>
											<li>
												The Bonnie Blue Flag
											</li>
										</ol>
									</div>
								</td>
								<td>
									<div class="bg" style="background:url(Pictures/DM.thumb.jpg)">
										<ol>
											<li>
												Nelly Bly
											</li>
											<li>
												Hard Crackers Come Again No More
											</li>
											<li>
												Stonewall Jackson's Way/Garryowen
											</li>
											<li>
												Listen to the Mockingbird/Siege of Vicksburg
											</li>
											<li>
												Amazing Grace
											</li>
											<li>
												Clare de Kitchen
											</li>
											<li>
												Kelton's Reel/Waiting for the Federals
											</li>
											<li>
												My Old Kentucky Home
											</li>
											<li>
												The Yellow Rose of Texas
											</li>
											<li>
												Southron's Battle Cry of Freedom
											</li>
											<li>
												The Minstrel Boy
											</li>
											<li>
												Southron's Tramp! Tramp! Tramp!
											</li>
											<li>
												Jim Along Josie
											</li>
											<li>
												Sweet Evalina
											</li>
											<li>
												War Song of Dixie
											</li>
											<li>
												Hawks and Eagles
											</li>
										</ol>
									</div>
								</td>
							</tr>
						</table>
					</div> -->
				{$footer}
EOHTML;
	echo $content;
?>
</html>