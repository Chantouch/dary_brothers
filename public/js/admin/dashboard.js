function drawLineChart(){$.ajax({url:"https://darybrothers.biz/en/admin/get-line-chart-data",dataType:"json"}).done(function(e){var a=[];e.sales.forEach(function(e){a.push(parseFloat(e.sales))});var t=document.getElementById("lineChart").getContext("2d");new Chart(t,{type:"bar",data:{labels:["Jan","Feb","Mar","Apr","May","Jun","Jul","Aug","Sep","Oct","Nov","Dec"],datasets:[{label:"Sales",backgroundColor:"#3EB9DC",data:a}]},options:{tooltips:{mode:"index",intersect:!0},responsive:!0,scales:{xAxes:[{stacked:!0}],yAxes:[{stacked:!0}]}}})})}$(document).ready(function(){$(".counter").counterUp({delay:10,time:600})}),drawLineChart();var ctx2=document.getElementById("pieChart").getContext("2d"),pieChart=new Chart(ctx2,{type:"pie",data:{datasets:[{data:[12,19,3,5,2,3],backgroundColor:["rgba(255,99,132,1)","rgba(54, 162, 235, 1)","rgba(255, 206, 86, 1)","rgba(75, 192, 192, 1)","rgba(153, 102, 255, 1)","rgba(255, 159, 64, 1)"],label:"Dataset 1"}],labels:["Red","Orange","Yellow","Green","Blue"]},options:{responsive:!0}}),ctx3=document.getElementById("doughnutChart").getContext("2d"),doughnutChart=new Chart(ctx3,{type:"doughnut",data:{datasets:[{data:[12,19,3,5,2,3],backgroundColor:["rgba(255,99,132,1)","rgba(54, 162, 235, 1)","rgba(255, 206, 86, 1)","rgba(75, 192, 192, 1)","rgba(153, 102, 255, 1)","rgba(255, 159, 64, 1)"],label:"Dataset 1"}],labels:["Red","Orange","Yellow","Green","Blue"]},options:{responsive:!0}});
