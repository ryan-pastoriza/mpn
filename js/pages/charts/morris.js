$(window).load(function(){
    $.ajax({
        type:"GET",
        url:"get/pnstat",
        dataType:'json',
        data:{},
        success: function(data)
        {
            // console.log(data[1]);
        }
    });
});

$(function () {
    getMorris('line', 'line_chart');
    getMorris('bar', 'bar_chart');
    getMorris('area', 'area_chart');
    getMorris('donut', 'donut_chart');
});

function getMorris(type, element) {
  if (type === 'bar') {
        Morris.Bar({
            element: element,
            data: [{
                x: '2011-2012 1st Sem',
                prelim: 3,
                midterm: 2,
                prefinal: 3,
                final: 2
            }, {
                x: '2011-2012 2nd Sem',
                prelim: 10,
                midterm: null,
                prefinal: 1,
                final: 2
            }, {
                x: '2012-2013 1st Sem',
                prelim: 0,
                midterm: 2,
                prefinal: 40,
                final: 2
            }, {
                x: '2012-2013 2nd Sem',
                prelim: 0,
                midterm: 2,
                prefinal: 40,
                final: 2
            }, {
                x: '2013-2014 1st Sem',
                prelim: 0,
                midterm: 2,
                prefinal: 40,
                final: 2
            }, {
                x: '2013-2014 2nd Sem',
                prelim: 0,
                midterm: 2,
                prefinal: 40,
                final: 2
            }, {
                x: '2014-2015 1st Sem',
                prelim: 2,
                midterm: 4,
                prefinal: 100,
                final: 2
            }, {
                x: '2014-2015 2nd Sem',
                prelim: 2,
                midterm: 23,
                prefinal: 12,
                final: 2
            }],
            xkey: 'x',
            ykeys: ['prelim', 'midterm', 'prefinal', 'final'],
            labels: ['Prelim', 'Midterm', 'Prefinal', 'Final'],
            barColors: ['#607d8b', 'rgb(0, 188, 212)', 'rgb(0, 150, 136)'],
        });
    }
}