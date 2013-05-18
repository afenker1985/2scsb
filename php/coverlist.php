<?php
/**
* @author Aaron Fenker <aaronfenker@gamil.com>
*
* The coverlist class will run through the albums store in mysql and will check to see
* if they have album covers associated with them.  It will take in to account medley tracks
* that may have several covers.
**/

	class coverlist {
		/**
		* Contains the mysql_functions class
		*
		* This is set in construct()
		*
		* @var $m
		* @access private
		**/
		private $m;
		
		/**
		* Contains an array of albums
		*
		* This is set
		*
		* @var $albums
		* @access private
		**/
		private $albums = array( 1 => array("SS", "Southern Soldier"),
								2 => array("HR", "Hard Road"),
								3 => array("IHC", "In High Cotton"),
								4 => array("DM", "Dulcem Melodies"),
								5 => array("LIJ", "Lightning In A Jar")
							);
							
		private $list;
		
		public function __construct() {
			include "mysql_functions.php";
			$this->m = new mysql_functions( "2scsb" );
			$this->createlist($this->albums);
		}
		
		public function printlist() {
			return $this->list;
		}
		
		private function pullinfo($albums) {
			for ($i=1; $i <= count($albums); $i++) {
				$re = $this->m->mysql_select( "{$albums[$i][0]}" , "Track" , "ASC" );

				while ($r = mysqli_fetch_assoc($re)) {
					$t[$i][] = $r;
				}
			}
			return $t;
		}
		
		private function createlist($albums) {
			$t = $this->pullinfo($albums);
			$this->list = <<<EOHTML
				<dl>\r
EOHTML;
			for ($i=1; $i <= count($albums); $i++) {
				$this->list .= <<<EOHTML
					<dt>{$albums[$i][1]}</dt>\r
EOHTML;
				for ($e=0; $e <count($t[$i]); $e++) {
					
					if ($t[$i][$e]['Cover'] > 0) {

						if ( !$this->odditycheck($albums, $t[$i][$e], $i) ) {
							
							if ( !$this->doublecheck($albums, $t[$i][$e], $i, $e) ) {
							
								if ($e < 9) {
									$this->list .= <<<EOHTML
										<dd>&nbsp;&nbsp;{$t[$i][$e]['Track']}. <a href="http://2scsbfan.info/Media/covers/{$albums[$i][0]}/{$t[$i][$e]['Track']}.jpg" class="thickbox">{$t[$i][$e]['Title']}</a></dd>\r
EOHTML;
								} else {
									$this->list .= <<<EOHTML
										<dd>{$t[$i][$e]['Track']}. <a href="http://2scsbfan.info/Media/covers/{$albums[$i][0]}/{$t[$i][$e]['Track']}.jpg" class="thickbox">{$t[$i][$e]['Title']}</a></dd>\r
EOHTML;
								}
							
							}
							
						} 
						
					}
				}
			}
			$this->list .= <<<EOHTML
				</dl>\r
EOHTML;
		}
		
		private function odditycheck($albums, $info, $a) {
			if ($albums[$a][0] == "DM" && ($info['Track'] == 3 || $info['Track']== 4 ) ) {
				if ($info['Track'] == 3) {
					$this->list .= <<<EOHTML
						<dd>&nbsp;&nbsp;{$info['Track']}. <a href="http://2scsbfan.info/Media/covers/{$albums[$a][0]}/{$info['Track']}a.jpg" class="thickbox">Stonewall Jackson's Way</a> / Garryowen</dd>\r
EOHTML;
					return true;
				}
				if ($info['Track'] == 4) {
					$this->list .= <<<EOHTML
						<dd>&nbsp;&nbsp;{$info['Track']}. <a href="http://2scsbfan.info/Media/covers/{$albums[$a][0]}/{$info['Track']}a.jpg" class="thickbox">Listen to the Mocking Bird</a> / Siege of Vicksburg</dd>\r
EOHTML;
					return true;
				}
			} else {
				return false;
			}
		}
		
		private function doublecheck($albums, $info, $a, $e) {
			if ( $info['Cover'] >= 2 ) {
				if ($e < 9) {
					$this->list .= <<<EOHTML
						<dd>&nbsp;&nbsp;{$info['Track']}. <a href="http://2scsbfan.info/Media/covers/{$albums[$a][0]}/{$info['Track']}.01.jpg" class="thickbox">{$info['Title']}</a> (<em><a href="http://2scsbfan.info/Media/covers/{$albums[$a][0]}/{$info['Track']}.02.jpg" class="thickbox">alternate</a></em>)</dd>\r
EOHTML;
				} else {
					$this->list .= <<<EOHTML
						<dd>{$info['Track']}. <a href="http://2scsbfan.info/Media/covers/{$albums[$a][0]}/{$info['Track']}.01.jpg" class="thickbox">{$info['Title']}</a> (<em><a href="http://2scsbfan.info/Media/covers/{$albums[$a][0]}/{$info['Track']}.02.jpg" class="thickbox">alternate</a></em>)</dd>\r
EOHTML;
				}
				
				return true;
				
			} else {
				return false;
			}
		}
		
	}
	
?>