
$(function() {
    "use strict";

    $('.counter').counterUp({
        delay: 10,
        time: 1000
    });
    $('.knob').knob({
        draw: function () {           
        }
    });

    // Sales Revenue
    $('.chart_3').sparkline('html', {
        type: 'bar',
        height: '57px',
        barSpacing: 10,
        barWidth: 5,
        barColor: '#1A5089',        
    });

    // Summary 
    $('.statistics_chart').sparkline('html', {
        type: 'bar',
        height: '50px',
        barSpacing: 3,
        barWidth: 2,
        barColor: '#E21E32',        
    });
});


// SALARY STATISTICS
$(document).ready(function() {
    var options = {
        chart: {
            height: 350,
            type: 'bar',
        },
        colors: ['#1A5089', '#E21E32', '#3B3D55'],
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: '55%',
                endingShape: 'rounded'	
            },
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        series: [{
            name: 'Design',
            data: [44, 55, 57, 56, 61, 58, 63, 60, 66]
        }, {
            name: 'Development',
            data: [76, 85, 101, 98, 87, 105, 91, 114, 94]
        }, {
            name: 'Marketing',
            data: [35, 41, 36, 26, 45, 48, 52, 53, 41]
        }],
        xaxis: {
            categories: ['Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct'],
        },
        yaxis: {
            title: {
                text: '$ (thousands)'
            }
        },
        fill: {
            opacity: 1

        },
        tooltip: {
            y: {
                formatter: function (val) {
                    return "$ " + val + " thousands"
                }
            }
        }
    }

    var chart = new ApexCharts(
        document.querySelector("#apex-basic-column"),
        options
    );

    chart.render();
});

// Basic Bar
$(document).ready(function() {
    var options = {
        chart: {
            height: 350,
            type: 'bar',
            toolbar: {
                show: false,
            },
        },
        colors: ['#1A5089'],
        grid: {
            yaxis: {
                lines: {
                    show: false,
                }
            },
            padding: {
                top: 0,
                right: 0,
                bottom: 0,
                left: 0
            },
        },
        plotOptions: {
            bar: {
                horizontal: true,
            }
        },
        dataLabels: {
            enabled: false
        },
        series: [{
            data: [400, 430, 448, 470, 540, 580, 690, 1100, 1200, 1380]
        }],
        xaxis: {
            categories: ['South Korea', 'Canada', 'United Kingdom', 'Netherlands', 'Italy', 'France', 'Japan', 'United States', 'China', 'Germany'],
        }
    }

   var chart = new ApexCharts(
        document.querySelector("#apex-basic-bar"),
        options
    );
    
    chart.render();
});

// RADAR MULTIPLE SERIES
$(document).ready(function() {
    var options = {
        chart: {
            height: 350,
            type: 'radar',
            dropShadow: {
                enabled: true,
                blur: 1,
                left: 1,
                top: 1
            }
        },
        colors: ['#1A5089', '#E21E32', '#ff7f81'],
        series: [{
            name: 'Series 1',
            data: [80, 50, 30, 40, 100, 20],
        }, {
            name: 'Series 2',
            data: [20, 30, 40, 80, 20, 80],
        }, {
            name: 'Series 3',
            data: [44, 76, 78, 13, 43, 10],
        }],
        stroke: {
            width: 0
        },
        fill: {
            opacity: 0.4
        },
        markers: {
            size: 0
        },
        labels: ['2011', '2012', '2013', '2014', '2015', '2016']
    }

    var chart = new ApexCharts(
        document.querySelector("#apex-radar-multiple-series"),
        options
    );

    chart.render();
    function update() {

        function randomSeries() {
            var arr = []
            for(var i = 0; i < 6; i++) {
                arr.push(Math.floor(Math.random() * 100)) 
            }

            return arr
        }
        

        chart.updateSeries([{
            name: 'Series 1',
            data: randomSeries(),
        }, {
            name: 'Series 2',
            data: randomSeries(),
        }, {
            name: 'Series 3',
            data: randomSeries(),
        }])
    }
});

// sparklines
$(document).ready(function() {
   
    var randomizeArray = function (arg) {
        var array = arg.slice();
        var currentIndex = array.length,
        temporaryValue, randomIndex;
  
        while (0 !== currentIndex) {  
            randomIndex = Math.floor(Math.random() * currentIndex);
            currentIndex -= 1;
    
            temporaryValue = array[currentIndex];
            array[currentIndex] = array[randomIndex];
            array[randomIndex] = temporaryValue;
        }  
        return array;
    }

    // data for the sparklines that appear below header area
    var sparklineData = [47, 45, 54, 38, 56, 24, 65, 31, 37, 39, 62, 51, 35, 41, 35, 27, 93, 53, 61, 27, 54, 43, 19, 46];

    // topb big chart    
    var spark1 = {
        chart: {
            type: 'area',
            height: 120,
            sparkline: {
            enabled: true
            },
        },
        stroke: {
            width: 2
        },
        series: [{
            data: randomizeArray(sparklineData)
        }],
        colors: ['#1A5089'],
    }
    var spark1 = new ApexCharts(document.querySelector("#apexspark1"), spark1);
    spark1.render();    
});
