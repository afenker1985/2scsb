<?
	require_once "php/mysql_functions.php";
	

	$result = array();
	$content = array();
	$display = array();
	$tracks = array();
	
	$m = new mysql_functions("2scsb");
		
	function get_album_info ($albums, $m) {
		for ($i=1; $i <= count($albums); $i++) {
			$re = $m->mysql_select( "{$albums[$i][0]}" , "Track" , "ASC" );
			
			while ($r = mysqli_fetch_assoc($re)) {
				$t[$i][] = $r;
			}
		}
		
		mysqli_close ( $m->db );
		return $t;
	}	
	function track_info ($result, $albums) {
		
		for ($i = 1; $i <= count($albums); $i++) {
			$content[$i] = "";
			
			for ($e = 0; $e < count($result[$i]); $e++){
				if ($result[$i][$e]['Track'] % 2) {
					if ($result[$i][$e]['Lyrics'] == "") {
						$content[$i] .= <<<EOHTML
											<tr class="etrack">
												<td class="tnumber" align="center">
													{$result[$i][$e]['Track']}
												</td>
												<td class="tinfo">
													{$result[$i][$e]['Title']}
												</td>
												<td class="ttime">
													{$result[$i][$e]['Time']}
												</td>
											</tr>													
EOHTML;
					} else {
						$content[$i] .= <<<EOHTML
											<tr class="etrack">
												<td class="tnumber" align="center">
													<ul class="gallery clearfix">
														<li>
															<a href="#TB_inline?height=350&amp;width=550&amp;inlineId=Lyric{$e}" class="thickbox" style="color: #fff; text-decoration: none; height: 30px;">{$result[$i][$e]['Track']}</a>
														</li>
													</ul>
												</td>
												<td class="tinfo">
													<ul class="gallery clearfix">
														<li>
															<a href="#TB_inline?height=350&amp;width=550&amp;inlineId=Lyric{$e}" class="thickbox" style="color: #fff; text-decoration: none; height: 30px;">{$result[$i][$e]['Title']}</a>
														</li>
													</ul>
												</td>
												<td class="ttime">
													<ul class="gallery clearfix">
														<li>
															<a href="#TB_inline?height=350&amp;width=550&amp;inlineId=Lyric{$e}" class="thickbox" style="color: #fff; text-decoration: none; height: 30px;">{$result[$i][$e]['Time']}</a>
														</li>
													</ul>
													<div class="LB" id="Lyric{$e}" style="display: none;"><h1 style="margin: 0px; padding-bottom: 3px; text-align: center; color: black; font-size: 18pt; font-family: Times; font-weight: bolder;">{$result[$i][$e]['Title']}</h1><br /><p style="font-family: Times; font-size: 11pt;">{$result[$i][$e]['Lyrics']}</p></div>
												</td>
											</tr>													
EOHTML;
					}
				} else {
					if ($result[$i][$e]['Lyrics'] == "") {
						$content[$i] .= <<<EOHTML
											<tr class="otrack">
												<td class="tnumber" align="center">
													{$result[$i][$e]['Track']}
												</td>
												<td class="tinfo">
													{$result[$i][$e]['Title']}
												</td>
												<td class="ttime">
													{$result[$i][$e]['Time']}
												</td>
											</tr>													
EOHTML;
					} else {
						$content[$i] .= <<<EOHTML
											<tr class="otrack">
												<td class="tnumber" align="center">
													<ul class="gallery clearfix">
														<li>
															<a href="#TB_inline?height=350&amp;width=550&amp;inlineId=Lyric{$e}" class="thickbox" style="color: #fff; text-decoration: none; height: 30px;">{$result[$i][$e]['Track']}</a>
														</li>
													</ul>
												</td>
												<td class="tinfo">
													<ul class="gallery clearfix">
														<li>
															<a href="#TB_inline?height=350&amp;width=550&amp;inlineId=Lyric{$e}" class="thickbox" style="color: #fff; text-decoration: none; height: 30px;">{$result[$i][$e]['Title']}</a>
														</li>
													</ul>
												</td>
												<td class="ttime">
													<ul class="gallery clearfix">
														<li>
															<a href="#TB_inline?height=350&amp;width=550&amp;inlineId=Lyric{$e}" class="thickbox" style="color: #fff; text-decoration: none; height: 30px;">{$result[$i][$e]['Time']}</a>
														</li>
													</ul>
													<div class="LB" id="Lyric{$e}" style="display: none;"><h1 style="margin: 0px; padding-bottom: 3px; text-align: center; color: black; font-size: 18pt; font-family: Times; font-weight: bolder;">{$result[$i][$e]['Title']}</h1><br /><p style="font-family: Times; font-size: 11pt;">{$result[$i][$e]['Lyrics']}</p></div>
												</td>
											</tr>													
EOHTML;
					}
				}
			}
		}
		return $content;
	}
		
	function build_rows ($albums, $tlist) {
		$table = <<<EOHTML
			<table>
				<tr>
EOHTML;
		
	/*	$r = 0;
		
		for ($i=1; $i <= count($albums); $i++) {
			if ( ( $r % 3 ) != 0  ) {
				$table .= <<<EOHTML
					<td class="Album">
						<div>
							<div class="front">
								<img src="../Pictures/{$albums[$i][0]}.jpg" alt="{$albums[$i][1]}" class="cover" />
							</div>
							<div class="back">
								<table class="title" style="border-collapse: collapse;">
									<tr>
										<td class="t">
											{$albums[$i][1]}
										</td>
										<td>
											<img src="../Pictures/{$albums[$i][0]}.jpg" alt="{$albums[$i][1]}" class="bcover" />
										</td>
									</tr>
								</table>
								<div class="tlist">
									<table style="width: 100%; border-collapse: collapse;">
										{$tlist[$i]}
									</table>
								</div>
							</div>
						</div>
					</td>
EOHTML;
			} else {
				$table .= <<<EOHTML
				</tr>
			<table>
				<tr>
					<td class="Album">
						<div>
							<div class="front">
								<img src="../Pictures/{$albums[$i][0]}.jpg" alt="{$albums[$i][1]}" class="cover" />
							</div>
							<div class="back">
								<table class="title" style="border-collapse: collapse;">
									<tr>
										<td class="t">
											{$albums[$i][1]}
										</td>
										<td>
											<img src="../Pictures/{$albums[$i][0]}.jpg" alt="{$albums[$i][1]}" class="bcover" />
										</td>
									</tr>
								</table>
								<div class="tlist">
									<table style="width: 100%; border-collapse: collapse;">
										{$tlist[$i]}
									</table>
								</div>
							</div>
						</div>
					</td>
EOHTML;
			}
			$r++;
		}
		*/
		$t = <<<EOHTML
		<!--	<td class="Album">
				<div style="padding-bottom: 15px;">
					<div class="front">
						<img src="../Pictures/{$albums[1][0]}.jpg" alt="{$albums[1][1]}" class="cover" style="background: none; border: 0px;" />
					</div>
					<div>
						<table class="title" style="border-collapse: collapse;">
							<tr>
								<td class="t">
									{$albums[1][1]}
								</td>
								<td>
									<img src="../Pictures/{$albums[1][0]}.jpg" alt="{$albums[1][1]}" class="bcover" style="background: none; border: 0px; padding: 0px; margin: 0px;" />
								</td>
							</tr>
						</table>-->
						<div class="tlist">
							<table style="width: 100%; border-collapse: collapse;">
								{$tlist[1]}
							</table>
						</div>
				<!--	</div>
				</div>
			</td>-->
EOHTML;
		
		$table .= <<<EOHTML
				</tr>
			</table>
EOHTML;
		
		return $t;
	}
	$result = get_album_info($albums, $m);
	$tracks = track_info ($result, $albums);
	$t = build_rows($albums, $tracks);
?>
