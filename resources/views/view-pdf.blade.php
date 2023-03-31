<div class="card-body">
    <table class="table table-bordered table-sm">
        <tr>
            <th scope="col">Id</th>
            <th scope="col">Nome</th>
            <th scope="col">Razao Social</th>
            <th scope="col">CNPJ</th>
        </tr>
        @foreach($data as $row)

            <tr>
                <td scope="row">{{ $row->id }}</td>
                <td style="width:10%">{{ $row->nome }}</td>
                <td style="width:50%">{{ $row->razao_social }}</td>
                <td>{{ $row->cnpj }}</td>
            </tr>

        @endforeach
    </table>
</div>
