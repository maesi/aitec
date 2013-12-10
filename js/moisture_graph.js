$().ready(function() {
		var graphData = [[0,0],[0,0]];
		var moisterName = "F&uuml;llstand";
		var moisterColor = "#7777FF";
		var daylightName = "Tageslichtst&auml;rke";
		var daylightColor = "#FFFF77";

		var updateInterval = 10000;
		var currentPlot = null;
		
		fetchDataFromServer();

		
		// Graph erstellen
		currentPlot = $.plot($("#graph"), 
				[							
					{ label: moisterName , data: graphData[1], color: moisterColor },
					{ label: daylightName , data: graphData[0], color: daylightColor},
				], 
				{
					series: { 
						lines: { 
							show: true,
							fill: true
							}		
						},
					yaxis: {},
					xaxis: {show: false }
				});
		setInterval(updateData, 2000);
		
		
		// Daten neu laden
		function updateData() {
			fetchDataFromServer();
			currentPlot.setData([		
					{ label: moisterName , data: graphData[1], color: moisterColor, fill: true  },
					{ label: daylightName , data: graphData[0], color: daylightColor , fill: false },
				]);
			currentPlot.setupGrid()
			currentPlot.draw();
			
		}
		
		// Daten vom Server laden
		function fetchDataFromServer() {				
			$.getJSON( "ajax/readdata.php?client=1", function( json ) {
					graphData = json;
			});
		}

	});
