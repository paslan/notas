<!DOCTYPE html>
<html lang="en">
<head>
    <link rel="stylesheet" href="{{ asset('/css/app.css')}}">
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
    <table class="tabela-cab">
        <tr>
            <td class="tipo" align="center" colspan="3" width="100%">
                <br><br>
                Relatório de Controle Interno
                <br><br>
                {{ $nota->competencia }}
            </td>
        </tr>
        <tr class="corpo"><td colspan="3" width="100%" align="center"></td></tr>
        <tr>
            <td align="center" colspan="3" width="100%">
                <br><br><br><br><br>
            </td>
        </tr>
        <tr>
            <td class="tipo" colspan="3" width="100%" align="center">
                {{ $empresa->razao_social }} <br><br><br><br>
            </td>
        </tr>
        <tr>
            <td width="20%">
                &nbsp;
            </td>
            <td class="normal" width="50%" align="center">
                A empresa {{ $empresa->razao_social }} {{ $contrato->desc_ci }} 
                <br><br><br><br>
                <br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br>
                <br><br><br>
            </td>
            <td width="20%">
                &nbsp;
            </td>
        </tr>
    </table>
    <table class="tabela-footer">
        <tr>
            <td align="center">Rua Ângela Mirella, n° 354 - Jardim Barueri - Barueri - SP - CEP: 06411-330.</td>
        </tr>
    </table>
    </head>
<body>

</body>
</html>
