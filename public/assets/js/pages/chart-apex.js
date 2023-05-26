'use strict';
$(document).ready(function() {
    setTimeout(function() {


    $(function() {
    
        var options = {
            chart: {
                height: 300,
                type: 'line',
                zoom: {
                    enabled: false
                }
            },
            dataLabels: {
                enabled: false,
                width: 2,
            },
            stroke: {
                curve: 'straight',
            },
            colors: ["#1abc9c"],
            series: [{
                name: "Desktops",
                data: [ 5,4,3,1,9,9,8 ]
            }],
            title: {
                text: 'Product Trends by Month',
                align: 'left'
            },
            grid: {
                row: {
                    colors: ['#f3f6ff', 'transparent'], // takes an array which will be repeated on columns
                    opacity: 0.5
                },
            },
            xaxis: {
                categories: ['sun' , 'mon' , 'tuse' , 'wed' , 'thi' , 'fri'],
            }
        }
         
        var chart = new ApexCharts(
            document.querySelector("#line-chart-1"),
            options
        );
        chart.render();
    });

   
    
	}, 700);
     
   
});
