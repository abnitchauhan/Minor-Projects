
var method = "GET";

var url = 'column.php';

$.post(url,
	   {method: method},
	   function(data){
	   	var allData = JSON.parse(data) ;
	   		
	  	console.log(allData);

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

        categories: ['03-2020', '04-2020', '05-2020', '06-2020', '07-2020','08-2020','09-2020','10-2020','11-2020','12-2020','01-2021','02-2021','03-2021','04-2021','05-2021', '06-2021','07-2021','08-2021','09-2021','10-2021','11-2021']
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
    // legend: {
    //     align: 'right',
    //     x: -30,
    //     verticalAlign: 'top',
    //     y: 25,
    //     floating: true,
    //     backgroundColor:
    //         Highcharts.defaultOptions.legend.backgroundColor || 'white',
    //     borderColor: '#CCC',
    //     borderWidth: 1,
    //     shadow: false
    // },
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
    series:  allData
});

	   })