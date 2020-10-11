<?php
//error_reporting(E_ALL ^ E_NOTICE);
session_start();

include_once("php/Captcha.php");
include "php/mysql_functions.php";
include "Swift/lib/swift_required.php";

function displayCaptchaImage() {
	print $captcha = new Captcha(array(
		"image_bg_color" => array( 220, 220, 255 ),
		"text_color" => array( 255, 30, 0 ),
		"line_color" => array( 143, 143, 222 ))
	);

	$_SESSION['code'] = $captcha->getCode();
}

// ?action=image
if (isset($_GET['action']) && $_GET['action'] == "image") {
	// Display the image...
	displayCaptchaImage();
	// Stop all execution.
	exit;
}

function errorcheck() {
	$alert = "";
	
	if (!isset($_POST['name']) || empty($_POST['name'])) {
        $alert .= "Please enter your name.<br />";
    } 
    if (!isset($_POST['email']) || empty($_POST['email'])) {
        $alert .= "Please enter your email address.<br />";
    } 
    if (!eregi("^[a-zA-Z0-9._-]+@([a-zA-Z0-9._-]+\.)+([a-zA-Z]){2,4}$",$_POST['email'])) {
        $alert .= "Please enter a valid email address.<br />";
    } 
    if (!isset($_POST['comment']) || empty($_POST['comment'])) {
        $alert .= "Please enter a comment.<br />";
    } 
    if ($_POST['code'] != $_SESSION['code'] || !isset($_POST['code']) || empty($_POST['code'])) {
        $alert .= "Please enter the proper code.";
    }
	return $alert;
}

function post($alert) {
	if ( $alert != "" ) {
		display($alert);
	} else {
		//Truncate Name
		$num = strpos($_POST['name'], " ");
		$name = substr($_POST['name'], 0, $num+2) . ".";
		
		echo $name;
		
		//Generate Custome Timestamp
		$dt = date("m/d/Y");
		$ti = date("g:ia");
		$d = $dt . " at " . $ti . " CDT";
		//Post to Database
		$m = new mysql_functions( "2scsb" );
		$m->mysql_insert( "guestbook" , array( "", "{$name}" , "{$_POST['email']}" , "{$_POST['comment']}" , "{$d}" ) );
		
		//Create Transport Options
		$transport = Swift_SmtpTransport::newInstance()
		  ->setUsername('webmaster')
		  ->setPassword('luther1483')
		  ;

		
		$mailer1 = Swift_Mailer::newInstance($transport);
		$mailer2 = Swift_Mailer::newInstance($transport);
		
		//Create E-Mail
		$message1 = Swift_Message::newInstance()

		  //Give the message a subject
		  ->setSubject("2scsbfan.info Guestbook Post")

		  //Set the From address with an associative array
		  ->setFrom(array($_POST['email'] => $_POST['name']))

		  //Set the To addresses with an associative array
		  ->setTo(array('aaronfenker@gmail.com' => 'Aaron Fenker'))

		  //Give it a body
		  ->setBody($_POST['name'] . " signed your guestbook.")
		;
		
		$message2 = Swift_Message::newInstance()

		  //Give the message a subject
		  ->setSubject("2scsbfan.info Guestbook Post")

		  //Set the From address with an associative array
		  ->setFrom(array("webmaster@2scsbfan.info" => "Aaron F."))

		  //Set the To addresses with an associative array
		  ->setTo(array($_POST['email'] => $_POST['name']))

		  //Give it a body
		  ->setBody($_POST['name'] . ", thank you for signing my guestbook.  Again, I will not release your email to any third party whatsoever.  Please come back and visit 2scsbfan.info.")
		;
		
		
		//Send the message
		if ( $mailer1->send($message1) && $mailer2->send($message2) ) {
			$output = <<<EOHTML
                <script type="text/javascript">
                    setTimeout('redirect()',1)
                    function redirect() {
                        window.location='guestbook.php';
                    }
                </script>
EOHTML;
            print $output;
        } else {
            echo "FAILED";
        }
		session_unset();
		mysqli_close( $m->db );
	}
}

function display($alerts) {
	include "header.php";
	include "footer.php";
	include "php/pager.php";
	
	$m = new mysql_functions( "2scsb" );
	
	$current = (isset($_GET['page']) && !empty($_GET['page']) && is_numeric($_GET['page'])) ? $_GET['page'] : 1;
	$result = $m->mysql_sort_select( "guestbook" , "Id" , "DESC" );
	
	if ( @mysql_num_rows($result) ) {
		$total = ceil(mysqli_num_rows($result) / 4);
		$start = (($current - 1) * 4);
		$count = 4;
	
		$result = $m->limit_sort_select("guestbook", "Id", "DESC", $start, $count );
		
				while ($row = mysqli_fetch_array($result)) {
					$posts .= <<<EOHTML
						<tr>
			                <td>
			                    <hr width='100%' align='center'>
								<div syle="font-size: 10pt;">
			                    <span style="text-transform: uppercase; color: #BE420D; font-weight: bold">{$row['Name']}</span> signed <i>{$row['Time']}</i>
								</div>
			                <td>
			            </tr>
			            <tr>
			                <td>
								<div style="padding-left: 10px; padding-bottom: 7px; font-size: 11pt;">
				                    {$row['Comment']}
								</div>
			                </td>
			            </tr>
EOHTML;
			}
		
		mysqli_close( $m->db );
	} else {
		$posts = <<<EOHTML
			<tr>
				<td align="center">
					<div>
						<h4>The Guestbook is currently unsigned.</h4>
					</div>
				</td>
			</tr>
EOHTML;
		mysqli_close( $m->db );
	}
	
	$pager = pager($current, $total, 2, "guestbook.php?page=%id%");
	
	$content = <<<EOHTML
	{$header}
					<h1>
						2SCSBFan Guestbook
					</h1>
					<div align="center">
					<table>
						{$posts}
					</table>
					</div>
					<hr style="width: 75%; align: center;" />
					<div align="center">
						{$pager}
					</div>
					<hr style="width: 95%; border: 0; height: 2px; background-color: black;" />
					<h1>
						Sign Guestbook
					</h1>
					<div align="center">
					<form method="post" action="{$_SERVER['PHP_SELF']}?action=send" autocomplete="off">
                                <div style="color: red; font-size: 8pt; text-align: center;">
                                    {$alerts}
                                </div>
                            <table class="email" cellspacing="3">
                                <tr>
                                    <td align="right" style="border: 0px;">
                                        Name:
                                    </td>
                                    <td style="border: 0px;">
                                        <input type="text" name="name" value="{$_POST['name']}" />
                                    </td>
								</tr>
								<tr>
									<td colspan="2" style="border: 0px;">
										<div style="color: #B0B1B9; font-size: 7pt; font-style: italic;">
											Will be stored as FirstName and LastInitial, e.g., John Doe = John D.
										</div>
									</td>
                                </tr>
                                <tr>
                                    <td align="right" style="border: 0px;">
                                        Email Address:
                                    </td>
                                    <td style="border: 0px;">
                                        <input type="text" name="email" value="{$_POST['email']}" />
                                    </td>
								</tr>
								<tr>
									<td colspan="2" style="border: 0px;">
										<div style="color: #B0B1B9; font-size: 7pt; font-style: italic;">
											Will not be posted, and will never be released to any third party whatsoever.
										</div>
									</td>
                                </tr>
                                <tr>
                                    <td colspan="2" style="border: 0px;">
                                        Comment:
                                        <br />
                                        <textarea name="comment" cols="50" rows="15">{$_POST['comment']}</textarea>
                                    </td>
                                </tr>
                                <tr>
                                    <td align="right" style="border: 0px;">
                                        Authentication Code:
                                    </td>
                                    <td style="border: 0px;">
                                        <input type="text" name="code" />
                                    </td>
                                </tr>
							</table>
                            <div style="color: #B0B1B9; font-size: 7pt; font-style: italic;" align="center">
								Enter the code you see in the image below.
								<br />
								This is done to prevent this form from being used to send spam.
							</div>
                            <div align="center">
								<img src="?action=image" style="border:1px #8f8fde solid;" alt="Captcha" />
							</div>
							<br />
                            <table>
                                <tr>
                                    <td align="right" valign="top" style="border: 0px;">
                                        <button type="submit" style="width: 120px;">Submit</button>
										<div style="color: #B0B1B9; font-size: 7pt; font-style: italic;">
											May take a few seconds.
										</div>
                                    </td>
									<td align="left" valign="top" style="border: 0px;">
										<button type="reset" style="width: 120px;">Clear</button>
									</td>
                                </tr>                                                
                            </table>
                        </form>
						</div>
				{$footer}
EOHTML;
	echo $content;
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<?php	
	if ( isset($HTTP_POST_VARS['action']) && $HTTP_POST_VARS['action'] == "send" ) {
		$alert = errorcheck();
		post($alert);
	} else {
		$alert="";
		display($alert);
	}
	
?>
</html>