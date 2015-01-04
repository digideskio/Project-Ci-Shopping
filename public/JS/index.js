$(function () {
var d = new Date();
var n = d.getDate();
var m = d.getMonth();
var y = d.getFullYear();
$('.start').datepicker('update',new Date(y, m-1, n));
$('.end').datepicker('update', new Date(y, m, n));
dateFrom = $('.start').val();
dateTo = $('.end').val();
loadChart(dateFrom , dateTo);
function loaddingCSS()
{
    var htmlLoading = '<div id="circular3dG">'+
                        '<div id="circular3d_1G" class="circular3dG">'+
                        '</div>'+
                        '<div id="circular3d_2G" class="circular3dG">'+
                        '</div>'+
                        '<div id="circular3d_3G" class="circular3dG">'+
                        '</div>'+
                        '<div id="circular3d_4G" class="circular3dG">'+
                        '</div>'+
                        '<div id="circular3d_5G" class="circular3dG">'+
                        '</div>'+
                        '<div id="circular3d_6G" class="circular3dG">'+
                        '</div>'+
                        '<div id="circular3d_7G" class="circular3dG">'+
                        '</div>'+
                        '<div id="circular3d_8G" class="circular3dG">'+
                        '</div>'+
                        '</div>';
    return htmlLoading;                    

}

function loadChart(dateFrom , dateTo){
$.ajax({
        url : baseUrl + 'backend/ws/index/allProduct/'+dateFrom+'/'+dateTo+'/0',
        type : 'POST',
        data : {},
        success: function(data)
        {
           if(data !== null)
           {
               var total  = 0;
               for(var r in data)
               {
                total = total + parseInt(data[r].count);
               }
               var array =[];
               for(var r in data)
               {
                    arr = [];
                    arr.push(data[r].pcname);
                    arr.push((data[r].count/total)*100);
                    array.push(arr);
               }
               pieData =array;
               allProduct(pieData);
            }else
            {
                $('.container1').html(loaddingCSS);
            }
        }
    });
$.ajax({
        url : baseUrl + 'backend/ws/index/lineChart1/'+dateFrom+'/'+dateTo+'/0',
        type : 'POST',
        data : {},
        success: function(data)
        {
            if(data !== null)
           {
                arr = [];
                categories = [];
                for(var r in data)
                {
                    arr.push(parseInt(data[r].data));
                    categories.push(data[r].name);
                }
                lineData = [{
                name: 'Sản phẩm',
                    data: arr
                    }];  
                lineChart(categories,lineData);
            }else
            {
                $('.container2').html(loaddingCSS);
            }
            
        }
});
}
$('.start').datepicker()
    .on('changeDate', function(e){
        dateFrom = $('.start').val();
        loadChart(dateFrom , dateTo);
});

$('.end').datepicker()
    .on('changeDate', function(e){
        dateTo= $('.end').val();
        loadChart(dateFrom , dateTo);
});

function allProduct(data){
    $('#container1').highcharts({
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: 0,//null,
            plotShadow: false
        },
        title: {
            text: 'Các sản phẩm đã nhập vào'
        },
        tooltip: {
            pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
        },
        credits: {
              enabled: false
        },
        plotOptions: {
            pie: {
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                    style: {
                        color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                    }
                }
            }
        },
        series: [{
            type: 'pie',
            name: 'Số lượng',
            data: data,
        }]
    });
}
function lineChart(categories,lineData)
{
    $('#container2').highcharts({
         title: {
            text: 'Số lượng sản phẩm nhập vào theo ngày',
            x: -20 //center
        },
        subtitle: {
            text: '',
            x: -20
        },
        credits: {
              enabled: false
        },
        xAxis: {
            categories: categories
        },
        yAxis: {
            title: {
                text: 'Số lượng '
            },
            plotLines: [{
                value: 0,
                width: 1,
                color: '#808080'
            }]
        },
        tooltip: {
            valueSuffix: ' sản phẩm '
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle',
            borderWidth: 0
        },
        series: lineData
    });
}
});