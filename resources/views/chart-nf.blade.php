<html>
    <head>
      <style>
.tabela-cab-grafico
{
    background:white;border:2px solid black;
    width: 100%;
}
.tabela-footer
{
    width: 100%;
}
.tabela-corpo-grafico
{
    background:white;border:4px solid black;
    width:100%;
}
.tabela-externa-grafico
{
    background:white;border:4px solid black;
    width:100%;
}
.linha
{
  text-align: center;
}
.linha-borda
{
  border: 2px solid;
  text-align: center;
}
.coluna-borda
{
  border: 2px solid;
}
td
{
  /* border: 2px solid; */

}

      </style>

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
      <table class="tabela-externa-grafico">
        <tr>
          <td>
            <table class="tabela-cab-grafico">
              <tr>
                  <td><img src="/images/logo-hmb.png" alt="" width="50" height="50"></td>
                  <td class="linha">Hospital Municipal de Barueri - Dr. Francisco Moran
                      SPDM <br> Associação Paulista para o Desenvolvimento da Medicina
                  </td>
                  <td><img src="/images/logo-spdm.png" alt="" width="50" height="50"></td>
              </tr>
            </table>
            <table class="tabela-corpo-grafico">
              <tr>
                <td colspan="3" class="linha-borda">
                  CHECK LIST PARA SOLICITAÇÃO DE PAGAMENTO - CONTRATO NÃO MÉDICO
                </td>
              </tr>
              <tr>
                <td colspan="3">
                  Empresa: {{  $empresa->razao_social }} <br>
                </td>
              </tr>
              <tr>
                <td colspan="2" width="60%" >Contrato Não Médico Nº: N/A</td>
                <td>NF: {{ $nota->nronf }}</td>
              </tr>
              <tr>
                <td colspan="2" width="60%" >Objeto do Contrato: {{ $contrato->objeto }}</td>
                <td>Emissão: {{ $nota->data_emissao }}</td>
              </tr>
              <tr>
                <td colspan="2" width="60%" >Centro de Custo: 123456789</td>
                <td>Vencimento: {{ $nota->data_vencto }}</td>
              </tr>
              <tr>
                <td width="60%" >Solicitante do Controle: TI</td>
                <td>Setor Responsável: TI</td>
                <td>Período: {{ $nota->competencia }}</td>
              </tr>
              <tr>
                <td colspan="3">Controle de Pagamento</td>
              </tr>
              <tr>
                <td colspan="3">
                  <table width="100%" border="2px solid" class="tabela-pagto">
                    <tr>
                      <td>Janeiro</td>
                      <td>Fevereiro</td>
                      <td>Março</td>
                      <td>Abril</td>
                      <td>Maio</td>
                      <td>Junho</td>
                      <td>Julho</td>
                      <td>Agosto</td>
                      <td>Setembro</td>
                      <td>Outubro</td>
                      <td>Novembro</td>
                      <td>Dezembro</td>
                      <td>{{ $nota->ano_competencia  }}</td>
                    </tr>
                    <tr>
                      @foreach ($result as $key => $value)
                        <td>
                         {{--  {{ floatval($result[$key][1]) }} --}}
                         {{  number_format((float)$result[$key][1], 2, '.', '') }}
                        </td>
                      @endforeach
                      <td>0.00</td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr width:100%>
                <td colspan="3" width:100%>
                  <div id="curve_chart" style="width: 100%; height: 500px"></div>
                </td>
              </tr>
            </table>
        </td>
      </tr>
      </table>
    </body>
  </html>
  