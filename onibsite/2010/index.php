<?php 

$x = $_GET['x'];

if (empty($x)) 
{
	include('header.inc');
	include('main.php');
	include('footer.inc');
} 
  
if (!empty($x)) 
{
	include('header.inc'); 
  	if(is_file($x.'.php'))
  	{
   	include($x.'.php');
  	}
  	else
  	{
   	print "Sorry, this page does not exist.  Please report this error to asko@andrew.cmu.edu.";
  	}
  	include('footer.inc'); 
} 
  
?>