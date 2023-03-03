<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>jQuery, popper.js, and Bootstrap</title>

    {{--    Load compiled CSS    --}}
    <link rel="stylesheet" href={{ asset('css/app.css') }}>

    {{--  popper.js CSS example  --}}
    <style>
        #tooltip {
            background: #333;
            color: white;
            font-weight: bold;
            padding: 4px 8px;
            font-size: 13px;
            border-radius: 4px;
        }
    </style>
</head>
<body>

{{--  Test Bootstrap css  --}}
<div class="alert alert-success mt-5" role="alert">
    O Bootstrap 5 está funcionando usando o Laravel 8 Mix!
</div>

{{--  popper.js HTML example  --}}
<button id="button" aria-describedby="tooltip">Meu botão</button>
<div id="tooltip" role="tooltip">Meu tooltip</div>

{{--    Load compiled Javascript    --}}
<script>
    //Test jQuery
    $(document).ready(function () {
        console.log('jQuery funciona!');

        //Test bootstrap Javascript
        console.log(bootstrap.Tooltip.VERSION);
    });

    //Test popper.js
    const button = document.querySelector('#button');
    const tooltip = document.querySelector('#tooltip');
    const popperInstance = Popper.createPopper(button, tooltip);
</script>

</body>
</html>
