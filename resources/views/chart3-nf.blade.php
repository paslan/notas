<html>
    <head>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">

        var result = @json($result);

        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
  
        function drawChart() {
          var data = google.visualization.arrayToDataTable(result);

          var options = {
            title: 'Gráfico de Pagamentos',
            //curveType: 'function',
            legend: { position: 'bottom' }
          };
  
          var chart = new google.visualization.LineChart(document.getElementById('curve_chart'));
  
          chart.draw(data, options);
        }
      </script>
    </head>
    <body>
      <div id="curve_chart" style="width: 1400px; height: 500px"></div>
    </body>
  </html>
  