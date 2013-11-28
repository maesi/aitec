<div id="data"></div>
<script type="text/javascript">
  	<!--
  	$(function() {
  	    readdata();
  	});
  	
  	var readdata = function () {
  		$.ajax({
  	  		url: "ajax/readdata.php?<?php echo Config::$AJAX_CLIENT_ID_KEY; ?>=1"
  	  	}).done(function( data ) {
  	  		$("#data").html(processData(data));
  	  	});
  	};
  	setInterval(readdata, 1000);

	function processData(data) {
		var res = '';
		var lines = data.split("<?php echo Config::$LINE_SEPARATOR; ?>");
		lines.forEach(function(entry) {
		    var vals = entry.split("<?php echo Config::$DATA_SEPARATOR;?>");
		    res += vals[0];
		    res += " - ";
		    res += vals[1];
		    res += " - ";
		    res += vals[2];
		    res += "<br />";
		})
		return res;
	}
	//-->
	</script>
