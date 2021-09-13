var initChartWidget3 = function(tabSelector, chartSelector, data, initByDefault) {
    var token = $('#csrfToken1').val();
    var element = document.querySelector(chartSelector);
    var height = parseInt(KTUtil.css(element, 'height'));

    if (!element) {
        return;
    }

    var options = {
        series: [{
            name: 'Profit',
            data: data
        }],
        chart: {
            fontFamily: 'inherit',
            type: 'bar',
            height: height,
            toolbar: {
                show: false
            }
        },
        plotOptions: {
            bar: {
                horizontal: false,
                columnWidth: ['30%'],
                endingShape: 'rounded'
            },
        },
        legend: {
            show: false
        },
        dataLabels: {
            enabled: false
        },
        stroke: {
            show: true,
            width: 2,
            colors: ['transparent']
        },
        xaxis: {
            crosshairs: {
                show: false
            },
            categories: ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'],
            axisBorder: {
                show: false,
            },
            axisTicks: {
                show: false
            },
            labels: {
                style: {
                    colors: KTUtil.getCssVariableValue('--bs-gray-400'),
                    fontSize: '12px'
                }
            }
        },
        yaxis: {
            crosshairs: {
                show: false
            },
            labels: {
                style: {
                    colors: KTUtil.getCssVariableValue('--bs-gray-400'),
                    fontSize: '12px'
                }
            }
        },
        states: {
            normal: {
                filter: {
                    type: 'none',
                    value: 0
                }
            },
            hover: {
                filter: {
                    type: 'none',
                }
            },
            active: {
                allowMultipleDataPointsSelection: false,
                filter: {
                    type: 'none',
                    value: 0
                }
            }
        },
        fill: {
            opacity: 1
        },            
        tooltip: {
            style: {
                fontSize: '12px'
            },
            y: {
                formatter: function (val) {
                    return "$" + val + "k"
                }
            }
        },
        colors: [KTUtil.getCssVariableValue('--bs-primary')],
        grid: {
            borderColor: KTUtil.getCssVariableValue('--bs-gray-300'),
            strokeDashArray: 4,
            yaxis: {
                lines: {
                    show: true
                }
            }
        }
    };

    var chart = new ApexCharts(element, options);

    var init = false;
    var tab = document.querySelector(tabSelector);
    
    if (initByDefault === true) {
        chart.render();
        init = true;
    }        

    tab.addEventListener('shown.bs.tab', function (event) {
        if (init == false) {
            chart.render();
            init = true;
        }
    })
} 