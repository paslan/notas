<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Controle de Notas Fiscais</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.1/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
    <div class="container mt-5">

        <h1 class="text-primary mt-3 mb-4 text-center"><b>Sistema de Controle de Notas Fiscais</b></h1>

        @yield('content')

    </div>
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.6.4.js" integrity="sha256-a9jBBRygX1Bh5lt8GZjXDzyOB+bWve9EiO7tROUtj/E=" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.15/jquery.mask.min.js"></script>


    <script>

    </script>






    <script>

function changeContrato(response) {
            //alert(response.value);
        $.ajax({
            url: $(response).data('url'),
            type: 'post',
            data: {_method: 'post', _token: $(response).data('token'), empresa_id: response.value},
            success: function(res) {
                $("#contrato_id").empty();
                $('#contrato_id').append('<option selected value=' + "0" + '>' + "Selecione..." + '</option>');
                $.each( res, function(a, b) {
                    $('#contrato_id').append($('<option>', {value: b['id'], text: b['objeto']}));

                });
            },
            error: function(){
                console.log('error');
            },
        });
        }


        function changeCity(response) {
            //alert(response.value);
            $.ajax({
                url: $(response).data('url'),
                type: 'post',
                data: {_method: 'post', _token: $(response).data('token'), estado_id: response.value},
                success: function(res) {
                    $("#cidade_id").empty();
                    $('#cidade_id').append('<option selected value=' + "0" + '>' + "Selecione..." + '</option>');
                    $.each( res, function(a, b) {
                        $('#cidade_id').append($('<option>', {value: b['id'], text: b['nome']}));

                    });
                },
                error: function(){
                    console.log('error');
                },
            });
        }

        function maiuscula(z){
            v = z.value.toUpperCase();
            z.value = v;
        }

        $(document).ready(function($){
            $('#cnpj').mask('99.999.999/9999-99');
       });

       //Muda tipo de input de text para date na pesquisa
       function alterainputsearch(){
        const $select = document.getElementById('campo')
        document.getElementById('search').type = 'text';
        if ($select.value == "data_emissao"){
             document.getElementById('search').type = 'date';
        }
        if ($select.value == "data_vencto"){
             document.getElementById('search').type = 'date';
        }
    }




    </script>


<script>
    const $select = document.getElementById('opcoes')





</body>
</html>
