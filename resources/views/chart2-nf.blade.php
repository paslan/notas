<html>
    <head>
      <title>Grafico Google-Chart</title>
      <script src="https://www.gstatic.com/charts/loader.js"></script>
    </head>
    <body>
      <div id="linechart" style="width: 1400px; height: 500px"></div>

      <script>
        var result = @json($result);
        
        console.log(result);

        google.charts.load('current', {'packages':['corechart']});

        google.charts.setOnLoadCallback(drawChart);

        function drawChart()
        {
          var data = google.visualization.arraytoDataTable(result);

          var options = {
            title: "Grafico de Pagamentos",
            curveType: '',
            legend: {position:'bottom'}
          };

          var chart = new google.visualization.LineChart(document.getElementById('linechart'));
          chart.draw(data, option);

        }

      </script>
    </body>
  </html>
  