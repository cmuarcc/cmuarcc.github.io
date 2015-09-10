<?php include("header.inc"); ?>

<?php
if (isset($_POST['Submit']))
{	
	$db_host = "cmuarccc.startlogicmysql.com";
	$db_user = "cmuarcc";
	$db_pwd = "jiayou2";
	$db_name = "onib_tix";

	mysql_connect($db_host, $db_user, $db_pwd);
	mysql_select_db($db_name);


	$name = $_POST['Name'];
	$andrewid = $_POST['AndrewID'];
	$email = $_POST['E-mail'];
	$phone = $_POST['Phone'];
	$tickets = $_POST['Tickets'];
	$total = $tickets * 5;
	
	$regex_name = "/[a-zA-Z]+?\s[a-zA-Z]+?\s*?[a-zA-Z]*?/";
	$regex_aid = "/[a-zA-Z0-9]{2,8}/";
	$regex_eml = "/^[-_.a-z0-9]+@(([-_a-z0-9]+\.)+(ad|ae|aero|af|ag|ai|al|am|an|ao|aq|ar|arpa|as|at|
	au|aw|az|ba|bb|bd|be|bf|bg|bh|bi|biz|bj|bm|bn|bo|br|bs|bt|bv|bw|by|bz|ca|cc|cd|cf|cg|ch|ci|
	ck|cl|cm|cn|co|com|coop|cr|cs|cu|cv|cx|cy|cz|de|dj|dk|dm|do|dz|ec|edu|ee|eg|eh|er|es|et|eu|
	fi|fj|fk|fm|fo|fr|ga|gb|gd|ge|gf|gh|gi|gl|gm|gn|gov|gp|gq|gr|gs|gt|gu|gw|gy|hk|hm|hn|hr|ht|
	hu|id|ie|il|in|info|int|io|iq|ir|is|it|jm|jo|jp|ke|kg|kh|ki|km|kn|kp|kr|kw|ky|kz|la|lb|lc|
	li|lk|lr|ls|lt|lu|lv|ly|ma|mc|md|mg|mh|mil|mk|ml|mm|mn|mo|mp|mq|mr|ms|mt|mu|museum|mv|mw|mx|
	my|mz|na|name|nc|ne|net|nf|ng|ni|nl|no|np|nr|nt|nu|nz|om|org|pa|pe|pf|pg|ph|pk|pl|pm|pn|pr|
	pro|ps|pt|pw|py|qa|re|ro|ru|rw|sa|sb|sc|sd|se|sg|sh|si|sj|sk|sl|sm|sn|so|sr|st|su|sv|sy|sz|
	tc|td|tf|tg|th|tj|tk|tm|tn|to|tp|tr|tt|tv|tw|tz|ua|ug|uk|um|us|uy|uz|va|vc|ve|vg|vi|vn|vu|wf|
	ws|ye|yt|yu|za|zm|zw)|(([0-9][0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5])\.){3}([0-9]
	[0-9]?|[0-1][0-9][0-9]|[2][0-4][0-9]|[2][5][0-5]))$/";
	$regex_phone = "/[0-9]{10}/";

	$send = "yes";
	if(($name == "") || (preg_match($regex_name, $name) <= 0))
		{ $name_err = "Please enter your FULL name.\n";	$send="no"; }
	if(($andrewid != "") && (preg_match($regex_aid, $andrewid) <= 0)) { $aid_err = "Please enter a
		valid Andrew ID.\nIf you are not a CMU student, leave this field blank.";	$send="no"; }
	if($email == "") { $email_err = "Please enter a valid e-mail address.\n";	$send="no"; }
	else if(preg_match($regex_eml, $email) <= 0)
		{ $email_err = "Your e-mail address is not valid.\n";	$send="no"; }
	if(($phone == "" )|| (preg_match($regex_phone, $phone) <= 0))
		{ $phone_err = "Please enter a valid 10-digit phone number.\n";	$send="no"; }

	if($send != "no")
	{
		$msg = "ONE NIGHT IN BEIJING Ticket Reservation Confirmation";
		$msg .= "\nSubmitted at http://www.cmuarcc.com/onib \n\n";
		$msg .= "Name: $name \n";
		$msg .= "Andrew ID: $andrewid \n";
		$msg .= "Phone Number: $phone \n";
		$msg .= "Number of Tickets: $tickets \n";
		$msg .= "Balance Due: $total dollars \n\n";
		$msg .= "Unless you did not reserve these tickets, no further action is required "; 
		$msg .=	"on your part. \nYou can pay for and pick up your tickets at the door on ";
		$msg .=	"the night of the event.";

		$arcc_email = "webmaster@cmuarcc.com";
		$my_email = "bkasberg@andrew.cmu.edu";
		$subject = "Confirmation of One Night in Beijing Ticket Reservation";
		$mail_headers = "From: $arcc_email\r\n" . "Return-Path: $arcc_email\r\n" . 
			"Reply-To: $my_email\r\n" . "Bcc: $my_email";
		mail($email, $subject, $msg, $mail_headers);

		$query = "INSERT INTO tickets (name, andrewid, email, phone, tickets) " . 
			"VALUES ('$name', '$andrewid', '$email', '$phone', '$tickets')";
		mysql_query($query) or die("Error submitting data to database.");
		echo "<p>Success! Your tickets have been reserved. Your balance due at the door is $";
		printf ("%01.2f", $total);
		echo "<p>You should receive an e-mail confirmation within the next 4 hours. If you do 
			not receive a confirmation within that time, please e-mail
			<a href=\"mailto:bkasberg@andrew.cmu.edu\">bkasberg@andrew.cmu.edu</a>";
		echo "<p>&laquo; <a href=\"javascript:history.go(-1)\">go back</a></p>";
	}
	else
	{
		echo "$name_err <br>";
		echo "$aid_err <br>";
		echo "$email_err <br>";
		echo "$phone_err <br>";
		echo "<p>Please <a href=\"javascript:history.go(-1)\">go back</a> and re-enter 
			your information correctly.";
	}
}
else
{
		include("content.inc");
}
?>

<?php include("footer.inc"); ?>