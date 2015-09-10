<html>
<head>
<title>Send Mail to Confirm Ticket Reservations</title>

<style type="text/css">
body
{
	background-color: #fce8b1;
}
body, tr, td
{
	font-family: Geneva, Helvetica, Arial, sans-serif;
	font-size: 11px;
	color: #000000;
}
.header
{
	background-color: #1a0605;
	color: #e89a45;
}
</style>
</head>

<body>
<?php
	$db_host = "cmuarccc.startlogicmysql.com";
	$db_user = "cmuarcc";
	$db_pwd = "jiayou2";
	$db_name = "onib_tix";

	mysql_connect($db_host, $db_user, $db_pwd);
	mysql_select_db($db_name);

	require 'class.phpmailer.php';
	require "class.smtp.php";
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPDebug = 2;
		$mail->SMTPAuth   = true;
		$mail->SMTPSecure = "ssl";
		$mail->Host       = "smtp.andrew.cmu.edu";
		$mail->Port       = 465;
		$mail->Username   = "bkasberg@andrew.cmu.edu";
		$mail->Password   = "Zyelith2006";
		$mail->IsHTML(false);
		$mail->ContentType  =  "text/plain";
		$mail->SMTPKeepAlive = true;

		$arcc_email = "webmaster@cmuarcc.com";
		$my_email = "bkasberg@andrew.cmu.edu";
		$subject = "Final Confirmation of One Night in Beijing Ticket Reservation";

		$mail->Subject  =  $subject;
		$mail->From     =  $arcc_email;
		$mail->FromName = 'CMU ARCC';
		$mail->Sender	=  $arcc_email;
		$mail->AddReplyTo($my_email);
		$mail->AddBCC($my_email, "Nara Kasbergen");
?>

<p>Sending mail.</p><p>

<?php
	$sql = "SELECT * FROM tickets";
	$query = mysql_query($sql);
	$count = 0;
	
	while($row = mysql_fetch_array($query))
	{
		$mail->ClearAddresses();

		$count++;
		$name = $row['name'];
		$andrewid = $row['andrewid'];
		$email = $row['email'];
		$phone = $row['phone'];
		$tickets = $row['tickets'];
		$total = $tickets * 5;

		$msg = "This is a final confirmation of your reservation of ".$tickets." ticket(s) \n";
		$msg .= "for tonight's exciting performance of One Night in Beijing. \n\n";
		$msg .= "If you are no longer planning to attend tonight's performance \n";
		$msg .= "or have already picked up your tickets during regular pre-sale, \n";
		$msg .= "please reply to this e-mail as soon as possible so we can take \n";
		$msg .= "you off the list of reservations to ensure that we have an \n";
		$msg .= "accurate count. Additionally, if you receive this e-mail multiple \n";
		$msg .= "times, it means you are on the list multiple times. For example, \n";
		$msg .= "if you receive two of these e-mails each saying you reserved 2\n";
		$msg .= "tickets, it means that we actually have you down for 4 tickets. If \n";
		$msg .= "this is not intentional, please let us know as soon as possible so \n";
		$msg .= "that we can correct the list. \n\n";
		$msg .= "Below is a copy of your reservation information. There is no need to print \n";
		$msg .= "this out, since we will have a list at the door. If everything is in \n";
		$msg .= "order and you do still plan to attend the show, please come and pay for \n";
		$msg .= "your tickets from our table by the main entrance of Rangos between 7 and \n";
		$msg .= "7:20 PM. In the event that the show sells out and there are still people \n";
		$msg .= "wanting tickets, after 7:20 PM, your seat is no longer guaranteed. We \n";
		$msg .= "will do our best to honor your reservation, but until you pay for your \n";
		$msg .= "ticket(s), we cannot 100% guarantee a seat for you.\n\n";
		$msg .= "If you have any questions, please reply to this e-mail. Otherwise, see \n";
		$msg .= "you tonight!\n\n";
		$msg .= "------------------------------------------------------------------------- \n\n";
		$msg .= "ONE NIGHT IN BEIJING Ticket Reservation \n\n";
		$msg .= "Name: $name \n";
		$msg .= "Andrew ID: $andrewid \n";
		$msg .= "Phone Number: $phone \n";
		$msg .= "Number of Tickets: $tickets \n";
		$msg .= "Balance Due: $total dollars \n\n";
		$msg .= ".";

		$mail->Body     =  $msg;
		$mail->AddAddress($email, $name);

		if (!$mail->Send())
		{
			echo $mail->ErrorInfo;
		}
		else
		{
			echo "Sent mail to <b>".$email."</b> for ".$name."<br>";
		}
	}

	$mail->SmtpClose();

	echo "</p><p>Success! Sent mail to <b>".$count."</b> users.</p>";
?>

</body>
</html>