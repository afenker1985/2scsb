<?
/**
 * Link Pager
 *
 * Generates pagination links.
 *
 * @param	int		Current page
 * @param	int		Number of pages
 * @param	int		Delta of pages to show
 * @param	string	URL to base links off of.
 * @access	public
 * @uses		pagerURL
 * @static
 */
function pager($current, $total, $delta, $url)
{
	$links = "";

	if ($current != 1 && $total > $delta*2+1) {
		$links .= "<a href=\"" . pagerURL(1, $url) . "\" title=\"page 1\">[1]</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		$back = $current - 1;
		$links .= "<a href=\"" . pagerURL($back, $url) . "\" title=\"previous page\">&laquo;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
	}

	if ($total > $delta*2+1) {
		$farleft = $current - $delta;
		$farright = $current + $delta;

		for ($i=1; $i<=$delta; $i++) {
			if ($farleft < 1) {
				$farleft++;
				$farright++;
			}
			if ($farright > $total) {
				$farleft--;
				$farright--;
			}
		}
	} else {
		$farleft = 1;
		$farright = $total;
	}

	if ($total > 1) {
		for ($i=$farleft; $i<=$farright; $i++) {
			if ($i != $current) {
				$links .= "<a href=\"" . pagerURL($i, $url) . "\" title=\"page $i\">$i</a>";
			} else {
				$links .= "<strong>$i</strong>";
			}

			if ($i != $farright) {
				$links .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			} else {
				$links .= "&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
			}
		}
	}

	if ($current != $total  && $total > $delta*2+1) {
		$next = $current + 1;
		$links .= "<a href=\"" . pagerURL($next, $url) . "\" title=\"next page\">&raquo;</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
		$links .= "<a href=\"" . pagerURL($total, $url) . "\" title=\"page {$total}\">[{$total}]</a>";
	}
	
	return $links;
}

/**
 * Parses Pager URL
 *
 * Replaces the id in the URL with the current page ID.
 *
 * @param	int		Page number
 * @param	string	URL to parse
 * @return	string	Parsed URL
 * @access	public
 * @static
 */
function pagerURL($page = 1, $url)
{
	settype($page, "string");
	return eregi_replace("%id%", $page, $url);
}
?>