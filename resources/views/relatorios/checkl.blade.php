<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('/css/print.css')}}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Capas</title>
    <table class="tabela-cab">
        <tr>
            <td><img src="/images/logo-hmb.png" alt="" width="50" height="50"></td>
            <td align="center">Hospital Municipal de Barueri - Dr. Francisco Moran
                SPDM <br> Associação Paulista para o Desenvolvimento da Medicina
            </td>
            <td><img src="/images/logo-spdm.png" alt="" width="50" height="50"></td>
        </tr>
    </table>
    <table width="100%" border="1px solid">
        <th class="tipo" colspan="5">
            Check list para Pagamentos de Contratos
        </th>
        <tr>
            <td>
                Empresa
            </td>
            <td>
                {{ $empresa->razao_social }}
            </td>
            <td>
                CNPJ
            </td>
            <td>
                {{ $empresa->cnpj }}
            </td>
            <td align="center">
                Valor
            </td>
        </tr>
        <tr>
            <td>No. Contrato</td>
            <td>N/A</td>
            <td>NF</td>
            <td>{{ $nota->nronf }}</td>
            <td align="right">R$ {{  number_format((float)$nota->valor, 2, ',', '.') }}</td>
        </tr>
        <tr>
            <td>&nbsp;</td>
            <td>&nbsp;</td>
            <td align="center" colspan="2">Data de Emissão</td>
            <td align="center" >Data de Pagamento</td>
        </tr>
        <tr>
            <td colspan="2">&nbsp;</td>
            <td align="center" colspan="2">{{ $nota->data_emissao <> "" ? date( 'd/m/Y' , strtotime($nota->data_emissao)) : "" }}</td>
            <td align="center" >{{ $nota->data_pagto <> "" ? date( 'd/m/Y' , strtotime($nota->data_pagto)) : "" }}</td>
        </tr>
        <tr>
            <td>Valor Mensal do Contrato</td>
            <td align="right">R$ {{  number_format((float)$nota->valor, 2, ',', '.') }} </td>
            <td align="center" colspan="3">&nbsp;</td>
        </tr>
        <tr>
            <td align="center" colspan="5">Objeto de Contrato</td>
        </tr>
        <tr>
            <td colspan="5">{{ $contrato->objeto }}</td>
        </tr>
        <tr>
            <td align="center" rowspan="2" colspan="2">Obrigações da Contratada</td>
            <td align="center" colspan="3">Avaliação</td>
        </tr>
        <tr>
            <td align="center" colspan="2">Sim</td>
            <td align="center">Não</td>
        </tr>
        <tr>
            <td height="63" colspan="2" valign="top">{{ $contrato->obrigacao1 }}</td>
            <td colspan="2" align="center" >X</td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td height="63" colspan="2" valign="top">{{ $contrato->obrigacao2 }}</td>
            <td colspan="2" align="center" >X</td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td height="63" colspan="2" valign="top">{{ $contrato->obrigacao3 }}</td>
            <td colspan="2" align="center" >X</td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr>
            <td height="63" colspan="2" valign="top">{{ $contrato->obrigacao4 }}</td>
            <td colspan="2" align="center" >X</td>
            <td align="center">&nbsp;</td>
        </tr>
        <tr height="60">
            <td colspan="2" valign="top">Conferido por:</td>
            <td colspan="3" align="right" valign="bottom">{{ strftime('%A, %d de %B de %Y', strtotime('today')) }} </td>
        </tr>
    </table>
    </head>
<body>

</body>
</html>
