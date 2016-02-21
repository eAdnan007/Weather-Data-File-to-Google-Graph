google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(function(){
    drawBackgroundColor(weather_data.temperature, 'Temperature', 'temperature');
    drawBackgroundColor(weather_data.humidity, 'Humidity', 'humidity');
    drawBackgroundColor(weather_data.moisture, 'Moisture', 'moisture');
});

function drawBackgroundColor(rows, legend, el_id) {
  var data = new google.visualization.DataTable();
  data.addColumn('timeofday', 'X');
  data.addColumn('number', legend);

  data.addRows( rows );

  var options = {
    hAxis: {
      title: 'Time'
    },
    vAxis: {
      title: 'Level'
    },
    backgroundColor: '#f1f8e9'
  };

  var chart = new google.visualization.LineChart(document.getElementById(el_id));
  chart.draw(data, options);
}