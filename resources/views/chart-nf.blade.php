<html>
    <head>
      <script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
      <script type="text/javascript">
        google.charts.load('current', {'packages':['corechart']});
        google.charts.setOnLoadCallback(drawChart);
  
        function drawChart() {
          var data = google.visualization.arrayToDataTable([
            ['Meses', 'Valores'],
            ['Janeiro',  0],
            ['Fevereiro',  0],
            ['Março',  0],
            ['Abril',  0],
            ['Maio',  0],
            ['Junho',  0],
            ['Julho',  0],
            ['Agosto',  0],
            ['Setembro',  1621.08],
            ['Outubro',  1621.08],
            ['Novembro',  1621.08],
            ['Dezembro',  1621.08]
          ]);
  
          var options = {
            title: 'Company Performance',
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
  