google.charts.load('current', {packages: ['corechart', 'line']});
google.charts.setOnLoadCallback(drawBackgroundColor);

function drawBackgroundColor() {
      var data = new google.visualization.DataTable();
      data.addColumn('timeofday', 'X');
      data.addColumn('number', 'Temperature');

      data.addRows( weather_data.temparature );

      var options = {
        hAxis: {
          title: 'Time'
        },
        vAxis: {
          title: 'Level'
        },
        backgroundColor: '#f1f8e9'
      };

      var chart = new google.visualization.LineChart(document.getElementById('chart_div'));
      chart.draw(data, options);
    }