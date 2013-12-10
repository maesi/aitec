<section id="data"></section>
<script type="text/javascript">
  	<!--
  	$().ready(function() {
  	    readdata();
  	    
  	    //setInterval(readdata, 1000);
  	});  	

  	function readdata () {
  		$.ajax({
  	  		url: "ajax/readdata.php?<?php echo Config::$AJAX_CLIENT_ID_KEY; ?>=1"
  	  	}).done(function( data ) {
  	  	  	var parsed = jQuery.parseJSON(data);
  	  	  	var testdata = parsed;
  	  		$("#data").html("Testdata: " + testdata);
  	  	});
  	};

	//-->
</script>
