<?php
error_reporting(E_ALL ^ E_NOTICE);
session_start();

include_once("php/Captcha.php");
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
	if (!isset($_POST['subject']) || empty($_POST['subject'])) {
		$alert .= "Please enter a subject.<br />";
	}
    if (!isset($_POST['message']) || empty($_POST['message'])) {
        $alert .= "Please enter a message.<br />";
    }
    if ($_POST['code'] != $_SESSION['code'] || !isset($_POST['code']) || empty($_POST['code'])) {
        $alert .= "Please enter the proper code.";
    }
	return $alert;
}

function email($alert) {
	if($alert != "") {
		display($alert);
	} else {
		//Create Transport Options
		$transport = Swift_SmtpTransport::newInstance()
		  ->setUsername('webmaster')
		  ->setPassword('concord1530')
		  ;

		
		$mailer1 = Swift_Mailer::newInstance($transport);
		$mailer2 = Swift_Mailer::newInstance($transport);
		
		//Create E-Mail
		$message1 = Swift_Message::newInstance()

		  //Give the message a subject
		  ->setSubject("2scsbfan.info Email - Subject: " . $_POST['subject'])

		  //Set the From address with an associative array
		  ->setFrom(array($_POST['email'] => $_POST['name']))

		  //Set the To addresses with an associative array
		  ->setTo(array('aaronfenker@gmail.com' => 'Aaron Fenker'))

		  //Give it a body
		  ->setBody($_POST['message'])
		;
		
		$message2 = Swift_Message::newInstance()

		  //Give the message a subject
		  ->setSubject("2scsbfan.info Email")

		  //Set the From address with an associative array
		  ->setFrom(array("webmaster@2scsbfan.info" => "Aaron F."))

		  //Set the To addresses with an associative array
		  ->setTo(array($_POST['email'] => $_POST['name']))

		  //Give it a body
		  ->setBody($_POST['name'] . ", thank you for sending me an email.  This is an automated email; I will respond to you shortly.  Please come back and visit 2scsbfan.info.")
		;
		
		
		//Send the message
		if ( $mailer1->send($message1) && $mailer2->send($message2) ) {
			include "header.php";
			include "footer.php";
			
			$output = <<<EOHTML
				{$header}
					<script type="text/javascript">
	                    setTimeout('redirect()',9000)
	                    function redirect() {
	                        window.location='http://2scsbfan.info';
	                    }
	                </script>
					<h1>
						Thank you for sending me an email.  You will be redirected shortly.
					</h1>
							{$footer}				
EOHTML;
            print $output;
        } else {
            echo "FAILED";
        }
		session_unset();
	}
}

function display($alerts) {
	include "header.php";
	include "footer.php";
	
	$content = <<<EOHTML
	{$header}
					<h1>E-Mail Webmaster</h1>
					<div align="center" style="font-size: 10.5pt;">
					To E-mail me, please fill out the form below and I will reply shortly.
					</div>
					<div style="color: red; font-size: 10pt; text-align: center;">
					{$alerts}
					</div>
					<br />
					<div align="center">
					<form method="post" action="{$_SERVER['PHP_SELF']}?action=send" autocomplete="off">
						<table style="border: 0px;" border="4">
							<tr>
								<td align="right" style="border: 0px;">
									Name:
								</td>
								<td style="border: 0px;">
									<input type="text" name="name" value="{$_POST['name']}" />
								</td>
							</tr>
							<tr>
								<td align="right" style="border: 0px;">
									E-mail Address:
								</td>
								<td style="border: 0px;">
									<input type="text" name="email" value="{$_POST['email']}" />
								</td>
							</tr>
							<tr>
								<td colspan="2" align="center" valign="top" style="border: 0px;">
									<div style="color: #B0B1B9; font-size: 7pt; font-style: italic;">
										Will never be released to any third party whatsoever.
									</div>
								</td>
                            </tr>
							<tr>
								<td align="right" style="border: 0px;">
									Subject:
								</td>
								<td style="border: 0px;">
									<input type="text" name="subject" value="{$_POST['subject']}" />
								</td>
							</tr>
							<tr>
								<td colspan="2" style="border: 0px;">
									Message:
									<br />
									<textarea name="message" cols="50" rows="15">{$_POST['message']}</textarea>
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
                        <div style="color: #B0B1B9; font-size: 7pt; font-style: italic; padding-bottom: 5px;" align="center">
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
<?
	if ($_GET['action'] == "send") {
		$alert = errorcheck();
		email($alert);
	} else {
		$alert ="";
		display($alert);
	}
?>
</html>
