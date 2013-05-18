<html>
<body>
<?
	if ( strstr($_SERVER['HTTP_USER_AGENT'], "iPhone") or strstr($_SERVER['HTTP_USER_AGENT'], "Mobile") ) {
		echo "MOBILE" . "<br />";
	} else {
		echo "NOT MOBILE" . "<br />";
	}

echo $_SERVER['HTTP_USER_AGENT'] . "\n\n";
$browser = get_browser();
?>
<pre>
<?
print_r($browser);
?>
</pre>
<script type="text/javascript">
var browser=navigator.appName;
var b_version=navigator.appVersion;
var version=parseFloat(b_version);

document.write("Browser name: "+ browser);
document.write("<br />");
document.write("Browser version: "+ version);
</script>

</body>
</html>