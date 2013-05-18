<?
/**
* @author Aaron Fenker <aaronfenker@gamil.com>
*
* The widget class creates a widget that will display dates from civil war 
* battles, people, and other events.  It will have a separate css file (widget.css)
* so the widget can be customizable to different website layouts and designs.
**/

class widget {
	/**
	* Current DateTime
	*
	* This is set in the constructor
	*
	* @var $current
	* @access private
	**/
	private $current;
	
	/**
	* Contains the HTML for the widget
	*
	* This set in createwidget();
	*
	* @var $widget
	* @access private
	**/
	private $widget;
	
	public function __construct() {
		$this->m = new mysql_functions( "2scsb" );
		//$this->current = new DateTime( "Now" );
	}
	
	public function createwidget() {
		$pb = $this->births();
		$pd = $this->deaths();
		$b = $this->battles();
		$e = $this->events();
		
		if ($e != "" || $b != "" || $pb !="" || $pd != "") {
		$w = <<<EOHTML
	<div align="center" id="widget" style="width: 75%; font-size: 12pt; font-family: Times; background: #F9F7DD; border: 1px solid #E0DBC9; min-height: 150px; margin-top: 50px; margin-bottom: 10px;">
		<h3>Civil War History for {$this->current->format("M. jS")}</h3>
		{$pb}
		{$pd}
		{$e}
		{$b}
	</div>	
EOHTML;
		} else {
			$w = "";
		}
		
		mysqli_close( $this->m->db );
		return $w;
	}
	
	private function events() {
		$re = $this->m->mysql_select( "events" , "Id" , "ASC" );
		$i = 0;
		$t = "";
		
		while ($r = mysqli_fetch_assoc($re)) {
			$list[$i] = $r;
			$i++;
		}
				
		for ($i=0; $i <= count($list); $i++) {
			if ( $list[$i]['Date'] == $this->current->format("m/d") ) {
				$t .= "{$list[$i]['Event']}<br />";
			} else {
				$t .= "";
			}
		}
		if ($t != "") {
			$elist = <<<EOHTML
				<h2>Events</h2>
				{$t}
EOHTML;
			return $elist;
		} else {
			$elist = "";
			return $elist; 
		}
	}
	
	private function battles() {
		$re = $this->m->mysql_select( "battles" , "Id" , "ASC" );
		$i = 0;
		
		while ($r = mysqli_fetch_assoc($re)) {
			$list[$i] = $r;
			$i++;
		}

		$epoch = new DateTime( $this->current->format("m") . "/" . $this->current->format("d") );
		
		for ($i=0; $i <= count($list); $i++) {
			if ( ($list[$i]['Start'] == $this->current->format("m/d") || $list[$i]['End'] == $this->current->format("m/d") ) || ($epoch->format("U") >= strtotime($list[$i]['Start']) && $epoch->format("U") <= strtotime($list[$i]['End']) ) ) { 
				$e .= "{$list[$i]['Battle']}<br />";
			} else {
				$e .= "";
			}
		}
		
		if ($e != "") {
			$blist = <<<EOHTML
				<h2>Battles</h2>
				{$e}
EOHTML;
			return $blist;
		} else {
			$blist = "";
			return $blist;
		}
		
	}
	
	private function deaths() {
		$re = $this->m->mysql_select( "people" , "Id" , "ASC" );
		$i = 0;
		
		while ($r = mysqli_fetch_assoc($re)) {
			$list[$i] = $r;
			$i++;
		}
		
		for ($i=0; $i < count($list); $i++) {
			$d = new DateTime($list[$i]['Death']);
			
			if ($d->format("m/d") == $this->current->format("m/d")) {
				$t .= "{$list[$i]['Name']} ({$d->format("Y")})<br />";
			} else {
				$t .= "";
			}
		}
		if ($t != "") {
			$elist = <<<EOHTML
				<h2>Deaths</h2>
				{$t}
				
EOHTML;
			return $elist;
		} else {
			$elist = "";
			return $elist; 
		}
	}
	
	private function births() {
		$re = $this->m->mysql_select( "people" , "Id" , "ASC" );
		$i = 0;
		
		while ($r = mysqli_fetch_assoc($re)) {
			$list[$i] = $r;
			$i++;
		}
		
		for ($i=0; $i < count($list); $i++) {
			$d = new DateTime($list[$i]['Birth']);
			
			if ($d->format("m/d") == $this->current->format("m/d")) {
				if ($list[$i]['Name'] == "Joel Sweeney") {
					$t .= "{$list[$i]['Name']} (ca. {$d->format("Y")})<br />";
				} else {
					$t .= "{$list[$i]['Name']} ({$d->format("Y")})<br />";
				}
			} else {
				$t .= "";
			}
		}
		if ($t != "") {
			$elist = <<<EOHTML
				<h2>Births</h2>
				{$t}
EOHTML;
			return $elist;
		} else {
			$elist = "";
			return $elist; 
		}
	}
	
}

?>
