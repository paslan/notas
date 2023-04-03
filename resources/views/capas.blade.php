<!DOCTYPE html>
<html lang="en">
<head>
    <style>
    .tabela-cab
    {
        border: none;
        width: 100%;
    }
    .tabela-footer
    {
        border: none;
        width: 100%;
    }
    .tabela-corpo
    {
        background:white;border:4px solid black;
        width:100%;
    }
    td {border:none}
    .corpo { font-size: 20px; }
    .titulo { font-size: 20px;
              font-weight: bold;
    }
    .cabecalho { font-size: 15px; }
    .tipo { font-size: 36px;
            font-weight: bold;
    }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Capas</title>
    <table class="tabela-cab">
        <tr>
            <td><img src="/images/logo-hmb.png" alt="" width="50" height="50"></td>
            <td align="center">Hospital Municipal de Barueri – Dr. Francisco Moran
                SPDM <br> Associação Paulista para o Desenvolvimento da Medicina
            </td>
            <td><img src="/images/logo-spdm.png" alt="" width="50" height="50"></td>
        </tr>
    </table>
    <table class="tabela-corpo">
        <tr>
            <td class="titulo" align="center" colspan="3" width="100%">
                <br>
                TECNOLOGIA DA INFORMAÇÃO
                <br><br>
            </td>
        </tr>
        <tr class="corpo"><td colspan="3" width="100%" align="center">Empresa: {{ $data->razao_social }}</td></tr>
        <tr>
            <td align="center" colspan="3" width="100%">
                <br><br><br><br><br><br><br><br><br><br>
            </td>
        </tr>
        <tr>
            <td class="tipo" colspan="3" width="100%" align="center">
                @if ($tipo == "C")
                    Relatório de Cobrança<br><br>NF: {{ $data->nronf }}
                @endif
                @if ($tipo == "I")
                    Relatório de <br>Controle Interno
                @endif
                @if ($tipo == "G")
                    Gráfico de Pagamento
                @endif
                @if ($tipo == "T")
                    Contrato
                @endif
                @if ($tipo == "P")
                    Check List para Pagamento<br>de Contrato
                @endif
            </td>
        </tr>
        <tr>
            <td colspan="3" width="100%">
                <br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br><br><br><br>
                <br><br><br><br><br><br><br>
                <br>
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
