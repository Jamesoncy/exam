<?php include("footer.php");?>
<script src="js/js_paginate.js"></script>
<script type="text/javascript" src="//use.typekit.net/vue1oix.js"></script>
<script type="text/javascript">try{Typekit.load();}catch(e){}</script>

<script>
$(document).ready(function() {
	$('#content').scrollPagination({

		nop     : 10, // The number of posts per scroll to be loaded
		offset  : 0, // Initial offset, begins at 0 in this case
		error   : '', // When the user reaches the end this is the message that is
		                            // displayed. You can change this if you want.
		delay   : 500, // When you scroll down the posts will load after a delayed amount of time.
		               // This is mainly for usability concerns. You can alter this as you see fit
		scroll  : true // The main bit, if set to false posts will not load as the user scrolls. 
		               // but will still load if the user clicks.
		
	});

	  $('body').on('click', '.popup-link', function() {

        var elem = $(this), 
         width = elem.attr("image-height"),
         height = elem.attr("image-width"),
         filename = elem.attr("filename"),
         load_url = elem.attr("load-url");
    });
	
});
</script>
</body>
</html>