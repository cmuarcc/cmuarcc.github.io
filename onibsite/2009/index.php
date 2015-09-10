<?php 
  
include('header.inc'); 
  
$x = $_GET['x'];
if (!empty($x)) 
{
  	if(is_file($x.'.php'))
  	{
   	include($x.'.php');
  	}
  	else
  	{
   	print "Sorry, this page does not exist.  Please report this error to asko@andrew.cmu.edu.";
  	}
} 

else
{
	include('home.php');
}

include('footer.inc'); 
  
?>