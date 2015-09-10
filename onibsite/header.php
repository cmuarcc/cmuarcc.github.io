<html>
<head>
<title>ONIB</title>
<link rel="stylesheet" type="text/css" href="style.css" />
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.1/jquery.min.js" type="text/javascript"></script>
<script type="text/javascript" src="livevalidation_standalone.js"></script>
<script type= "text/javascript">/*<![CDATA[*/
 
function makeScrollable(wrapper, scrollable){
	// Get jQuery elements
	var wrapper = $(wrapper), scrollable = $(scrollable);
	
	// Hide images until they are not loaded
	scrollable.hide();
	var loading = $('<div class="loading">Loading...</div>').appendTo(wrapper);
	
	// Set function that will check if all images are loaded
	var interval = setInterval(function(){
		var images = scrollable.find('img');
		var completed = 0;
		
		// Counts number of images that are succesfully loaded
		images.each(function(){
			if (this.complete) completed++;	
		});
		
		if (completed == images.length){
			clearInterval(interval);
			// Timeout added to fix problem with Chrome
			setTimeout(function(){
				
				loading.hide();
				// Remove scrollbars	
				wrapper.css({overflow: 'hidden'});						
				
				scrollable.slideDown('slow', function(){
					enable();	
				});					
			}, 1000);	
		}
	}, 100);
	
	function enable(){
		// height of area at the top at bottom, that don't respond to mousemove
		var inactiveMargin = 99;					
		// Cache for performance
		var wrapperWidth = wrapper.width();
		var wrapperHeight = wrapper.height();
		// Using outer height to include padding too
		var scrollableHeight = scrollable.outerHeight() + 2*inactiveMargin;
		// Do not cache wrapperOffset, because it can change when user resizes window
		// We could use onresize event, but it's just not worth doing that 
		// var wrapperOffset = wrapper.offset();
		
		// Create a invisible tooltip
		var tooltip = $('<div class="sc_menu_tooltip"></div>')
			.css('opacity', 0)
			.appendTo(wrapper);
	
		// Save menu titles
		scrollable.find('a').each(function(){				
			$(this).data('tooltipText', this.title);				
		});
		
		// Remove default tooltip
		scrollable.find('a').removeAttr('title');		
		// Remove default tooltip in IE
		scrollable.find('img').removeAttr('alt');	
		
		var lastTarget;
		//When user move mouse over menu			
		wrapper.mousemove(function(e){
			// Save target
			lastTarget = e.target;
 
			var wrapperOffset = wrapper.offset();
		
			var tooltipLeft = e.pageX - wrapperOffset.left;
			// Do not let tooltip to move out of menu.
			// Because overflow is set to hidden, we will not be able too see it 
			tooltipLeft = Math.min(tooltipLeft, wrapperWidth - 75); //tooltip.outerWidth());
			
			var tooltipTop = e.pageY - wrapperOffset.top + wrapper.scrollTop() - 40;
			// Move tooltip under the mouse when we are in the higher part of the menu
			if (e.pageY - wrapperOffset.top < wrapperHeight/2){
				tooltipTop += 80;
			}				
			tooltip.css({top: tooltipTop, left: tooltipLeft});				
			
			// Scroll menu
			var top = (e.pageY -  wrapperOffset.top) * (scrollableHeight - wrapperHeight) / wrapperHeight - inactiveMargin;
			if (top < 0){
				top = 0;
			}			
			wrapper.scrollTop(top);
		});
		
		// Setting interval helps solving perfomance problems in IE
		var interval = setInterval(function(){
			if (!lastTarget) return;	
										
			var currentText = tooltip.text();
			
			if (lastTarget.nodeName == 'IMG'){					
				// We've attached data to a link, not image
				var newText = $(lastTarget).parent().data('tooltipText');
 
				// Show tooltip with the new text
				if (currentText != newText) {
					tooltip
						.stop(true)
						.css('opacity', 0)	
						.text(newText)
						.animate({opacity: 1}, 1000);
				}					
			}
		}, 200);
		
		// Hide tooltip when leaving menu
		wrapper.mouseleave(function(){
			lastTarget = false;
			tooltip.stop(true).css('opacity', 0).text('');
		});			
		
		/*
		//Usage of hover event resulted in performance problems
		scrollable.find('a').hover(function(){
			tooltip
				.stop()
				.css('opacity', 0)
				.text($(this).data('tooltipText'))
				.animate({opacity: 1}, 1000);
	
		}, function(){
			tooltip
				.stop()
				.animate({opacity: 0}, 300);
		});
		*/			
	}
}
	
$(function(){	
	makeScrollable("div.sc_menu_wrapper", "div.sc_menu");
});
/*]]>*/</script> 
</head>
<body>
<div id="returnhome">
<a href="index.php" style="display: block; width: 30px height: 30px; text-indent: -999px; text-decoration: none">This text won't show up</a>
<a href="index.php" style="display: block; width: 30px height: 30px; text-indent: -999px; text-decoration: none">This text won't show up</a>
<a href="index.php" style="display: block; width: 30px height: 30px; text-indent: -999px; text-decoration: none">This text won't show up</a>
</div>
<div id="returnarcc">
<a href="http://www.cmuarcc.com" style="display: block; width: 30px height: 30px; text-indent: -999px; text-decoration: none">This text won't show up</a>
<a href="http://www.cmuarcc.com" style="display: block; width: 30px height: 30px; text-indent: -999px; text-decoration: none">This text won't show up</a>
<a href="http://www.cmuarcc.com" style="display: block; width: 30px height: 30px; text-indent: -999px; text-decoration: none">This text won't show up</a>
<a href="http://www.cmuarcc.com" style="display: block; width: 30px height: 30px; text-indent: -999px; text-decoration: none">This text won't show up</a>
</div>
<div id="wrapper">
<div id="content">
	<div class="sc_menu_wrapper">
	  <div class="sc_menu">
		<a title="ONIB 2010" href="http://cmuarcc.com/gallery2/main.php?g2_view=core.ShowItem&g2_itemId=21221" ><img src="ONIB2010.jpg" width="160" height="110" alt="Menu"/></a>
		<a title="ONIB 2009" href="http://cmuarcc.com/gallery2/main.php?g2_view=core.ShowItem&g2_itemId=18010" ><img src="ONIB2009.jpg" width="160" height="110" alt="Navigation"/></a>
		<a title="ONIB 2009" href="http://cmuarcc.com/gallery2/main.php?g2_view=core.ShowItem&g2_itemId=18399" ><img src="ONIB_R2009.jpg" width="160" height="110" alt="Navigation"/></a>
		<a title="ONIB 2008" href="http://cmuarcc.com/gallery2/main.php?g2_view=core.ShowItem&g2_itemId=14113" ><img src="ONIB2008.jpg" width="160" height="110" alt="jQuery"/></a>   
		<a title="ONIB 2008" href="http://cmuarcc.com/gallery2/main.php?g2_view=core.ShowItem&g2_itemId=14960" ><img src="ONIB_R2008.jpg" width="160" height="110" alt="jQuery"/></a>   	
		<a title="ONIB 2007" href="http://cmuarcc.com/gallery2/main.php?g2_view=core.ShowItem&g2_itemId=11431" ><img src="ONIB2007.jpg" width="160" height="110" alt="CSS"/></a>
		<a title="ONIB 2007" href="http://cmuarcc.com/gallery2/main.php?g2_view=core.ShowItem&g2_itemId=8867" ><img src="ONIB_R2007.jpg" width="160" height="110" alt="CSS"/></a>
		<a title="ONIB 2006" href="http://cmuarcc.com/gallery2/main.php?g2_view=core.ShowItem&g2_itemId=9125" ><img src="ONIB2006.jpg" width="160" height="110" alt="CSS"/></a>
		<a title="ONIB 2006" href="http://cmuarcc.com/gallery2/main.php?g2_view=core.ShowItem&g2_itemId=6570" ><img src="ONIB_R2006.jpg" width="160" height="110" alt="CSS"/></a>
		
		<a title="ONIB 2005" href="http://cmuarcc.com/gallery2/main.php?g2_view=core.ShowItem&g2_itemId=2249" ><img src="ONIB2005.jpg" width="160" height="110" alt="CSS"/></a>
		 </div>
	</div>
	<div class="menu">

	<a href="index.php?x=aboutus">About Us</a>  |
	<a href="index.php?x=reserve">Reserve</a>  |
	<a href="index.php?x=videos">Videos</a>  |
	<a href="index.php?x=directions">Directions</a>  |
	<a href="index.php?x=contact">Contact</a> 
	</div>
	
	