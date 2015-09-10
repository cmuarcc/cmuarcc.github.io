<?php

$Name = $_POST['Name'];
$ID = $_POST['ID'];
$Email = $_POST['Email'];
$Phone = $_POST['Phone'];
$Tickets = $_POST['Tickets'];
$Comments = $_POST['Comments'];

$File = "reservations.php";
$Handle = fopen($File, 'a');
fwrite($Handle, "<b>Name</b>: $Name\n<br>\n<b>Number of Tickets</b>: $Tickets\n\n<br><br>\n\n");
fclose($Handle);

$File = "reservationsfull.php";
$Handle = fopen($File, 'a');
fwrite($Handle, "<b>Name</b>: $Name\n<br>\n<b>Andrew ID</b>: $ID\n<br>\n<b>Email</b>: $Email\n<br>\n<b>Phone</b>: $Phone\n<br>\n<b>Number of Tickets</b>: $Tickets\n<br>\n<b>Comments</b>: $Comments\n\n<br><br>\n\n");
fclose($Handle);

include("reservations.php");

?>