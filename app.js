
var method = "GET";

var url = 'column.php';

$.post(url,
	   {method: method},
		   function(data){
		   	var allData = JSON.parse(data) ;
		   		
		  	console.log(allData['pie']);

		   	Highcharts.chart('pune', {
	    chart: {
	        type: 'column'
	    },
	    title: {
	        text: 'Covid Variants'
	    },
	    xAxis: {
	        title: {
	            text: 'Dates'
	        },

	        // categories: ['03-2020', '04-2020', '05-2020', '06-2020', '07-2020','08-2020','09-2020','10-2020','11-2020','12-2020','01-2021','02-2021','03-2021','04-2021','05-2021', '06-2021','07-2021','08-2021','09-2021','10-2021','11-2021']
	    },
	    credits: {enabled: false},
	    yAxis: {
	        min: 0,
	        title: {
	            text: 'Genomes'
	        },
	        stackLabels: {
	            enabled: true,
	            style: {
	                fontWeight: 'bold',
	                color: ( // theme
	                    Highcharts.defaultOptions.title.style &&
	                    Highcharts.defaultOptions.title.style.color
	                ) || 'gray'
	            }
	        }
	    },
	   
	    tooltip: {
	        headerFormat: '<b>{point.x}</b><br/>',
	        pointFormat: '{series.name}: {point.y}<br/>Total: {point.stackTotal}'
	    },
	    credits:{enabled: false},
	    plotOptions: {
	        column: {
	            stacking: 'normal',
	            dataLabels: {
	                enabled: true
	            }
	        }
	    },
	    series:  allData['bar']
	});

		   	// PIE CHART

		   	// Pie Chart Pune
        Highcharts.chart('pune_pie', {
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Genomes Distribution'
            },
            tooltip: {
                pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
            },
            credits:{enabled: false},
            accessibility: {
                point: {
                    valueSuffix: '%'
                }
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                    },
                    startAngle:0,
                    endAngle: 360,
                    innerSize: '50%'
                }
            },
            series: [
            		 {
            		 	name: 'lineage',
            		 	data: allData['pie']
            		}
            		]
        }); 

})