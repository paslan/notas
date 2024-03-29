<html>
    <head>
      <link rel="stylesheet" href="{{ asset('/css/app.css')}}">
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
    <body class="corpo-grafico">
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
                <td>Emissão: {{ date( 'd/m/Y' , strtotime($nota->data_emissao)) }}</td>
              </tr>
              <tr>
                <td colspan="2" width="60%" >Centro de Custo: {{ $custo->ccusto }}</td>
                <td>Vencimento: {{ date( 'd/m/Y' , strtotime($nota->data_vencto)) }}</td>
              </tr>
              <tr>
                <td width="60%" >Solicitante do Controle: TI</td>
                <td>Setor Responsável: TI</td>
                <td>Período: {{ $nota->competencia }}</td>
              </tr>
              <tr>
                <td colspan="3"><br><br>Controle de Pagamento</td>
              </tr>
              <tr>
                <td colspan="3">
                  <table width="100%" border="2px solid" class="tabela-pagto">
                    <tr>
                      <td align="center">Janeiro</td>
                      <td align="center">Fevereiro</td>
                      <td align="center">Março</td>
                      <td align="center">Abril</td>
                      <td align="center">Maio</td>
                      <td align="center">Junho</td>
                      <td align="center">Julho</td>
                      <td align="center">Agosto</td>
                      <td align="center">Setembro</td>
                      <td align="center">Outubro</td>
                      <td align="center">Novembro</td>
                      <td align="center">Dezembro</td>
                      <td align="center">{{ $nota->ano_competencia  }}</td>
                    </tr>
                    <tr>
                      @foreach ($result as $key => $value)
                        @if ($key >=1)
                          <td>
                              {{--  {{ floatval($result[$key][1]) }} --}}
                              R$ {{  number_format((float)$result[$key][1], 2, ',', '.') }}
                          </td>
                        @endif
                      @endforeach
                      <td>R$ {{ number_format((float)$total, 2, ',', '.')  }}</td>
                    </tr>
                  </table>
                </td>
              </tr>
              <tr width:100%>
                <td colspan="3" width:100%>
                  <div id="curve_chart" style="width: 100%; height: 500px"></div>
                </td>
              </tr>
              <tr>
                <td colspan="3">
                  <table border="2 px solid" width="100%">
                    <tr>
                      <th>Empresa</th>
                      <th>Serviços Prestados</th>
                      <th>Valor unitário</th>
                      <th>Total Realizado</th>
                      <th>Total</th>
                    </tr>
                    <tr>
                      <td rowspan="11">{{ trim($empresa->razao_social) }}</td>
                      <td>{{ $contrato->objeto }}</td>
                      <td align="right">R$ {{  number_format((float)$nota->valor, 2, ',', '.') }}</td>
                      <td align="right">R$ {{  number_format((float)$nota->valor, 2, ',', '.') }}</td>
                      <td align="right">R$ {{  number_format((float)$nota->valor, 2, ',', '.') }}</td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td>&nbsp;</td>
                      <td></td>
                      <td></td>
                      <td></td>
                    </tr>
                    <tr>
                      <td colspan="3">
                        Valor Total da Nota
                      </td>
                      <td align="right">R$ {{  number_format((float)$nota->valor, 2, ',', '.') }}</td>
                    </tr>
                </table>
                <table width="100%" border="2 px solid">
                  <tr valign="top">
                    <td colspan="3" height="150">Observação</td>
                  </tr>
                  <tr valign="top">
                    <td height="150" width="33%" align="center">Responsável pela Elaboração deste Relatório<br>(SPDM - HMB)</td>
                    <td height="150" align="center">Gerência Administrativa<br>(SPDM - HMB)</td>
                    <td height="150" align="center">Diretoria<br>(SPDM - HMB)</td>
                  </tr>
              </table>
                </td>
              </tr>
            </table>
        </td>
      </tr>
      </table>
</body>
  </html>
  