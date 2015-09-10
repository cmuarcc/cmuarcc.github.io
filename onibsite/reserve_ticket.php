<html>

<head>
<style type="text/css">
.indented{
	text-align: left;
	padding-top: 10pt;
}
</style>

</head>

<body bgcolor="#CFCFCF">

<?php

$File = "reserve.dat";
if(isset($_POST["name"])){
$Handle = fopen($File, 'a' );
fwrite($Handle,"Name: ".$_POST["name"]."\n");
fwrite($Handle,"Email: ".$_POST["email"]."\n");
fwrite($Handle,"# Tickets: ".$_POST["numtickets"]);
if(isset($_POST['vip']) && $_POST['vip'] == 'yes') fwrite($Handle, " (VIP)");
fwrite($Handle,"\n\n");
fclose($Handle);
echo "<h1><font color=\"red\">THANK YOU FOR RESERVING A TICKET!</font></h1>";
}
$Handle = fopen($File, 'r');
while( !feof($Handle) ){
	
	$name = trim(fgets($Handle));
	fgets($Handle);
	$tickets = trim(fgets($Handle));
	fgets($Handle);
	if( $name == "" || $tickets == "" ) continue;
	echo "<b>$name</b><br>$tickets</a><br><br>";
}
?>

</body>

</html>
