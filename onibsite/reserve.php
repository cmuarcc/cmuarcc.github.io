
	<div class="text_content">
		<align="justify">
		Ticket Reservation Period is now <b>OVER</b>. 
		</align>
		<br>
		<fieldset>   
		<legend>Contact Details</legend>   

		<form name="input" action="reserve_ticket.php" method="post">
			<ul>
				<li>
					<label for="name">Name:</label>   
					<input type="text" name="name" id="f1" DISABLED/> 
				</li>
				<li>
					<label for="email">Email:</label>  
					<input type="text" name="email" id="f2" DISABLED/>
				</li>
				<li>
					<label for="numtickets"># of Tickets:</label>  
					<input type="text" name="numtickets" id="f3" DISABLED /> 
				</li>
				<li>
					<label for="vip">VIP: <font color="red">Sold out</font></label>  
					<input type="checkbox" name="vip" value="yes" DISABLED/> 
				</li>
			</ul>
			<input type="submit" value="Submit" class="button" DISABLED />
		</form>
		<script type="text/javascript"> 
    			var f1 = new LiveValidation( 'f1', {onlyOnSubmit: false } );
    			f1.add( Validate.Presence );
    			var f2 = new LiveValidation( 'f2', {onlyOnSubmit: false } );
    			f2.add( Validate.Email );
    			var f3 = new LiveValidation( 'f3', {onlyOnSubmit: false } );
				f3.add( Validate.Numericality, { minimum: 1 } );
 
				var automaticOnSubmit = f1.form.onsubmit;
				f1.form.onsubmit = function(){
				  var valid = automaticOnSubmit();
				  if(valid){
					return true;
				  }else{
				  return false;
				  }
				}
    	 </script> 
		</fieldset>
		
	