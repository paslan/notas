<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
        .break {
            page-break-after: always;
        }
    </style>
    <title>Completo</title>
</head>
<body>

    
    @if ($tipo=='X')
        @include('relatorios.capas', array('id'=>$nota->id,
                                            'tipo'=>'C'
        ));
        @include('relatorios.capas', array('id'=>$nota->id,
                                            'tipo'=>'I'
        ));
        @include('relatorios.controlei', array('id'=>$nota->id));

        @include('relatorios.capas', array('id'=>$nota->id,
                                            'tipo'=>'G'
        ));
        @include('relatorios.chart-nf', array('id'=>$nota->id));

        @include('relatorios.capas', array('id'=>$nota->id,
                                            'tipo'=>'T'
        ));
        @include('relatorios.capas', array('id'=>$nota->id,
                                            'tipo'=>'P'
        ));

        @include('relatorios.checkl', array('id'=>$nota->id));

    @endif

</body>
</html>
