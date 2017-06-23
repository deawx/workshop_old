var midhigh = [
 [0, 3.9, 4.1], [1, 4.7, 5.0], [2, 5.5, 5.9], [3, 6.4, 6.8], [4, 7.1, 7.4], [5, 7.8, 8.1], [6, 8.4, 8.9], [7, 9.0, 9.5], [8, 9.4, 10.0], [9, 9.7, 10.4],
 [10, 10.2, 10.8], [11, 10.6, 11.1], [12, 11.0, 11.5], [13, 11.4, 11.8], [14, 11.6, 12.2], [15, 12.0, 12.6], [16, 12.4, 12.9], [17, 12.6, 13.2], [18, 12.9, 13.5], [19, 13.2, 13.8],
 [20, 13.5, 14.1], [21, 13.7, 14.4], [22, 14.0, 14.6], [23, 14.2, 14.9], [24, 14.4, 15.1], [25, 14.6, 15.4], [26, 14.9, 15.6], [27, 15.1, 15.9], [28, 15.4, 16.1], [29, 15.6, 16.4],
 [30, 15.8, 16.6], [31, 16.1, 16.9], [32, 16.4, 17.1], [33, 16.6, 17.4], [34, 16.8, 17.6], [35, 17.0, 17.9], [36, 17.3, 18.1], [37, 17.5, 18.4], [38, 17.7, 18.7], [39, 17.9, 18.9],
 [40, 18.2, 19.2], [41, 18.4, 19.5], [42, 18.5, 19.7], [43, 18.8, 20.0], [44, 19.0, 20.3], [45, 19.3, 20.5], [46, 19.5, 20.8], [47, 19.7, 21.0], [48, 20.0, 21.3], [49, 20.2, 21.5],
 [50, 20.4, 21.7], [51, 20.6, 22.0], [52, 20.8, 22.2], [53, 21.1, 22.4], [54, 21.3, 22.7], [55, 21.5, 22.9], [56, 21.7, 23.2], [57, 21.9, 23.5], [58, 22.2, 23.7], [59, 22.4, 24.0],
 [60, 22.6, 24.3], [61, 22.9, 24.5], [62, 23.1, 24.8], [63, 23.4, 25.0], [64, 23.5, 25.3], [65, 23.8, 25.5], [66, 24.0, 25.8], [67, 24.3, 26.0], [68, 24.5, 26.3], [69, 24.7, 26.5], [70, 25.0, 26.7], [71, 25.2, 27.0], [72, 25.4, 27.2]
];
var mid = [
 [0, 2.9, 3.9], [1, 3.5, 4.7], [2, 4.2, 5.5], [3, 4.8, 6.4], [4, 5.4, 7.1], [5, 5.8, 7.8], [6, 6.4, 8.4], [7, 6.7, 9.0], [8, 7.2, 9.4], [9, 7.6, 9.7],
 [10, 7.9, 10.2], [11, 8.1, 10.6], [12, 8.4, 11.0], [13, 8.5, 11.4], [14, 8.7, 11.6], [15, 8.9, 12.0], [16, 9.1, 12.4], [17, 9.3, 12.6], [18, 9.4, 12.9], [19, 9.6, 13.2], [20, 9.8, 13.5],
 [21, 10.0, 13.7], [22, 10.2, 14.0], [23, 10.4, 14.2], [24, 10.5, 14.4], [25, 10.6, 14.6], [26, 10.8, 14.9], [27, 10.9, 15.1], [28, 11.1, 15.4], [29, 11.2, 15.6], [30, 11.4, 15.8],
 [31, 11.5, 16.1], [32, 11.6, 16.4], [33, 11.8, 16.6], [34, 11.9, 16.8], [35, 12.0, 17.0], [36, 12.2, 17.3], [37, 12.4, 17.5], [38, 12.5, 17.7], [39, 12.6, 17.9], [40, 12.7, 18.2],
 [41, 12.8, 18.4], [42, 12.9, 18.5], [43, 13.0, 18.8], [44, 13.1, 19.0], [45, 13.2, 19.3], [46, 13.4, 19.5], [47, 13.5, 19.7], [48, 13.6, 20.0], [49, 13.7, 20.2], [50, 13.8, 20.4],
 [51, 14.0, 20.6], [52, 14.1, 20.8], [53, 14.2, 21.1], [54, 14.3, 21.3], [55, 14.4, 21.5], [56, 14.5, 21.7], [57, 14.6, 21.9], [58, 14.8, 22.2], [59, 14.9, 22.4], [60, 15.0, 22.6],
 [61, 15.1, 22.9], [62, 15.3, 23.1], [63, 15.4, 23.4], [64, 15.5, 23.5], [65, 15.7, 23.8], [66, 15.8, 24.0], [67, 16.0, 24.3], [68, 16.1, 24.5], [69, 16.3, 24.7], [70, 16.4, 25.0], [71, 16.5, 25.2], [72, 16.6, 25.4]
];
var midlow = [
 [0, 2.7, 2.9], [1, 3.3, 3.5], [2, 3.8, 4.2], [3, 4.5, 4.8], [4, 5.0, 5.4], [5, 5.5, 5.8], [6, 5.9, 6.4], [7, 6.4, 6.7], [8, 6.7, 7.2], [9, 7.2, 7.6], [10, 7.5, 7.9],
 [11, 7.7, 8.1], [12, 7.9, 8.4], [13, 8.1, 8.5], [14, 8.3, 8.7], [15, 8.5, 8.9], [16, 8.6, 9.1], [17, 8.8, 9.3], [18, 9.0, 9.4], [19, 9.1, 9.6], [20, 9.2, 9.8],
 [21, 9.4, 10.0], [22, 9.5, 10.2], [23, 9.6, 10.4], [24, 9.8, 10.5], [25, 10.0, 10.6], [26, 10.1, 10.8], [27, 10.2, 10.9], [28, 10.4, 11.1], [29, 10.5, 11.2], [30, 10.6, 11.4],
 [31, 10.7, 11.5], [32, 10.8, 11.6], [33, 11.0, 11.8], [34, 11.1, 11.9], [35, 11.3, 12.0], [36, 11.4, 12.2], [37, 11.5, 12.4], [38, 11.6, 12.5], [39, 11.7, 12.6], [40, 11.8, 12.7],
 [41, 11.9, 12.8], [42, 12.0, 12.9], [43, 12.2, 13.0], [44, 12.3, 13.1], [45, 12.4, 13.2], [46, 12.5, 13.4], [47, 12.6, 13.5], [48, 12.7, 13.6], [49, 12.8, 13.7], [50, 12.9, 13.8],
 [51, 13.1, 14.0], [52, 13.2, 14.1], [53, 13.3, 14.2], [54, 13.4, 14.3], [55, 13.5, 14.4], [56, 13.6, 14.5], [57, 13.7, 14.6], [58, 13.9, 14.8], [59, 14.0, 14.9], [60, 14.1, 15.0],
 [61, 14.2, 15.1], [62, 14.4, 15.3], [63, 14.5, 15.4], [64, 14.6, 15.5], [65, 14.7, 15.7], [66, 14.8, 15.8], [67, 15.0, 16.0], [68, 15.1, 16.1], [69, 15.2, 16.3], [70, 15.4, 16.4], [71, 15.5, 16.5], [72, 15.5, 16.6]
];
var low = [
     [0, 0, 2.7], [1, 0, 3.3], [2, 0, 3.8], [3, 0, 4.5], [4, 0, 5.0], [5, 0, 5.5], [6, 0, 5.9], [7, 0, 6.4], [8, 0, 6.7], [9, 0, 7.2], [10, 0, 7.5],
     [11, 0, 7.7], [12, 0, 7.9], [13, 0, 8.1], [14, 0, 8.3], [15, 0, 8.5], [16, 0, 8.6], [17, 0, 8.8], [18, 0, 9.0], [19, 0, 9.1], [20, 0, 9.2],
     [21, 0, 9.4], [22, 0, 9.5], [23, 0, 9.6], [24, 0, 9.8], [25, 0, 10.0], [26, 0, 10.1], [27, 0, 10.2], [28, 0, 10.4], [29, 0, 10.5], [30, 0, 10.6],
     [31, 0, 10.7], [32, 0, 10.8], [33, 0, 11.0], [34, 0, 11.1], [35, 0, 11.3], [36, 0, 11.4], [37, 0, 11.5], [38, 0, 11.6], [39, 0, 11.7], [40, 0, 11.8],
     [41, 0, 11.9], [42, 0, 12.0], [43, 0, 12.2], [44, 0, 12.3], [45, 0, 12.4], [46, 0, 12.5], [47, 0, 12.6], [48, 0, 12.7], [49, 0, 12.8], [50, 0, 12.9],
     [51, 0, 13.1], [52, 0, 13.2], [53, 0, 13.3], [54, 0, 13.4], [55, 0, 13.5], [56, 0, 13.6], [57, 0, 13.7], [58, 0, 13.9], [59, 0, 14.0], [60, 0, 14.1],
     [61, 0, 14.2], [62, 0, 14.4], [63, 0, 14.5], [64, 0, 14.6], [65, 0, 14.7], [66, 0, 14.8], [67, 0, 15.0], [68, 0, 15.1], [69, 0, 15.2], [70, 0, 15.4], [71, 0, 15.5], [72, 0, 15.5]
  ],
  avg = [
    [0, 2.5], [1, 2.5], [2, 22.1], [3, 23.0], [4, 23.8], [5, 21.4], [6, 21.3], [7, 18.3], [8, 15.4], [9, 16.4], [10, 17.7],
    [11, 17.7], [12, 17.7], [13, 17.7], [14, 17.7], [15, 17.7], [16, 17.7], [17, 17.7], [18, 17.7], [19, 17.7], [20, 17.7],
    [21, 17.7], [22, 17.7], [23, 17.7], [24, 17.7], [25, 17.7], [26, 17.7], [27, 17.7], [28, 17.7], [29, 17.7], [30, 17.7],
    [31, 17.7], [32, 17.7], [33, 17.7], [34, 17.7], [35, 17.7], [36, 17.7], [37, 17.7], [38, 17.7], [39, 17.7], [40, 17.7],
    [41, 17.7], [42, 17.7], [43, 17.7], [44, 17.7], [45, 17.7], [46, 17.7], [47, 17.7], [48, 17.7], [49, 17.7], [50, 17.7],
    [51, 17.7], [52, 17.7], [53, 17.7], [54, 17.7], [55, 17.7], [56, 17.7], [57, 17.7], [58, 17.7], [59, 17.7], [60, 17.7],
    [61, 17.7], [62, 17.7], [63, 17.7], [64, 17.7], [65, 17.7], [66, 17.7], [67, 17.7], [68, 17.7], [69, 17.7], [70, 17.7], [71, 17.7], [72, 17.7],
];
$('#weight').highcharts({
  chart: { height: 600 },
  title : { text : 'กราฟแสดงน้ำหนักตามอายุ', },
  plotOptions: {
    area: {
      stacking: 'percent',
      lineColor: '#ffffff',
      lineWidth: 1,
      marker: { lineWidth: 1, lineColor: '#ffffff' }
    }
  },
  xAxis :{ title :{ text : 'อายุ(เดือน)' } },
  yAxis : {
    maxStaggerLines : 5,
    title : { text : 'น้ำหนัก(กก.)' },
    min : 0,
    max : 30
  },
  series: [{
    data: low,
    type: 'arearange',
    lineWidth: 0,
    linkedTo: ':previous',
    color: Highcharts.getOptions().colors[0],
    fillOpacity: 0.3,
    zIndex: 0
  },{
    data: midlow,
    type: 'arearange',
    lineWidth: 0,
    linkedTo: ':previous',
    color: Highcharts.getOptions().colors[1],
    fillOpacity: 0.3,
    zIndex: 0
  },{
    data: mid,
    type: 'arearange',
    lineWidth: 0,
    linkedTo: ':previous',
    color: Highcharts.getOptions().colors[2],
    fillOpacity: 0.3,
    zIndex: 0
  },{
    data: midhigh,
    type: 'arearange',
    lineWidth: 0,
    linkedTo: ':previous',
    color: Highcharts.getOptions().colors[3],
    fillOpacity: 0.3,
    zIndex: 0
  }]
});

$.ajax({
  type : 'POST',
  url : 'getDataForGraph',
  data : $.param(params),
  dataType : 'json',
    success : function(data,textStatus,jqXHR ){
      var datesplit=transformDateForSetDateField(data.child.birthday);
      var spitt=datesplit.split('/');
      if(typeof(data.child) !== 'undefined' && typeof(data.childhc) !== 'undefined'){
        for(var i=0;i<data.childhc.length;i++){
        var arr1=[calMouth(new Date(data.child.birthday),new Date(data.childhc[i].chkDate)),data.childhc[i].height];
        arr.push(arr1);
        }
    }
    option.series[0].setData(arr);
    },
    error: function(){
      console.log('error');
    }
});