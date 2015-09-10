<html>
<head>
<title>Displaying All Current Ticket Reservations</title>

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
?>

<table width="90%" border="0" align="center">
	<tr>
    <td nowrap class="header"><b>#</b></td>
    <td nowrap class="header"><b>Name</b></td>
    <td nowrap class="header"><b>Andrew ID</b></td>
    <td nowrap class="header"><b>E-mail Address</b></td>
    <td nowrap class="header"><b>Phone Number</b></td>
    <td nowrap class="header"><b>Number of Tickets</b></td>
    <td nowrap class="header"><b>Balance Due</b></td>
    </tr>

	<?php

	$sql = "SELECT * FROM tickets";
	$query = mysql_query($sql);
	$count = 1;
	$total_tix = 0;
	$total_money = 0;
	
	while($row = mysql_fetch_array($query))
	{
		echo "<tr>";
		echo "<td nowrap>".$count++."</td>";
		echo "<td nowrap>".$row['name']."</td>";
		echo "<td nowrap>".$row['andrewid']."</td>";
		echo "<td nowrap>".$row['email']."</td>";
		echo "<td nowrap>".$row['phone']."</td>";
		echo "<td nowrap>".$row['tickets']."</td>";
		$total_tix += $row['tickets'];
		$total = $row['tickets'] * 5;
		echo "<td nowrap>$".$total.".00</td>";
		echo "</tr>";
		$total_money += $total;
	}

	echo "<tr>";
	echo "<td colspan='5' nowrap class='header'><div align='right'><b>Total</b></div></td>";
	echo "<td colspan='1' nowrap class='header'><b>Tickets:</b> ".$total_tix."</td>";
	echo "<td colspan='1' nowrap class='header'><b>Sales:</b> $".$total_money.".00</td>";
	echo "</tr>";
?>
</table>

</body>
</html>