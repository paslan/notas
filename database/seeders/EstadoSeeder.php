<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('estados')->insert([
            'id' => 12,
            'uf' => 'AC',
            'nome' => 'Acre',
        ]);
        DB::table('estados')->insert([
            'id' => 27,
            'uf' => 'AL',
            'nome' => 'Alagoas',
        ]);
        DB::table('estados')->insert([
            'id' => 16,
            'uf' => 'AP',
            'nome' => 'Amapá',
        ]);
        DB::table('estados')->insert([
            'id' => 13,
            'uf' => 'AM',
            'nome' => 'Amazonas',
        ]);
        DB::table('estados')->insert([
            'id' => 29,
            'uf' => 'BA',
            'nome' => 'Bahia',
        ]);
        DB::table('estados')->insert([
            'id' => 23,
            'uf' => 'CE',
            'nome' => 'Ceará',
        ]);
        DB::table('estados')->insert([
            'id' => 53,
            'uf' => 'DF',
            'nome' => 'Distrito Federal',
        ]);
        DB::table('estados')->insert([
            'id' => 32,
            'uf' => 'ES',
            'nome' => 'Espírito Santo',
        ]);
        DB::table('estados')->insert([
            'id' => 52,
            'uf' => 'GO',
            'nome' => 'Goiás',
        ]);
        DB::table('estados')->insert([
            'id' => 21,
            'uf' => 'MA',
            'nome' => 'Maranhão',
        ]);
        DB::table('estados')->insert([
            'id' => 51,
            'uf' => 'MT',
            'nome' => 'Mato Grosso',
        ]);
        DB::table('estados')->insert([
            'id' => 50,
            'uf' => 'MS',
            'nome' => 'Mato Grosso do Sul',
        ]);
        DB::table('estados')->insert([
            'id' => 31,
            'uf' => 'MG',
            'nome' => 'Minas Gerais',
        ]);
        DB::table('estados')->insert([
            'id' => 15,
            'uf' => 'PA',
            'nome' => 'Pará',
        ]);
        DB::table('estados')->insert([
            'id' => 25,
            'uf' => 'PB',
            'nome' => 'Paraíba',
        ]);
        DB::table('estados')->insert([
            'id' => 41,
            'uf' => 'PR',
            'nome' => 'Paraná',
        ]);
        DB::table('estados')->insert([
            'id' => 26,
            'uf' => 'PE',
            'nome' => 'Pernambuco',
        ]);
        DB::table('estados')->insert([
            'id' => 22,
            'uf' => 'PI',
            'nome' => 'Piauí',
        ]);
        DB::table('estados')->insert([
            'id' => 33,
            'uf' => 'RJ',
            'nome' => 'Rio de Janeiro',
        ]);
        DB::table('estados')->insert([
            'id' => 24,
            'uf' => 'RN',
            'nome' => 'Rio Grande do Norte',
        ]);
        DB::table('estados')->insert([
            'id' => 43,
            'uf' => 'RS',
            'nome' => 'Rio Grande do Sul',
        ]);
        DB::table('estados')->insert([
            'id' => 11,
            'uf' => 'RO',
            'nome' => 'Rondônia',
        ]);
        DB::table('estados')->insert([
            'id' => 14,
            'uf' => 'RR',
            'nome' => 'Roraima',
        ]);
        DB::table('estados')->insert([
            'id' => 42,
            'uf' => 'SC',
            'nome' => 'Santa Catarina',
        ]);
        DB::table('estados')->insert([
            'id' => 35,
            'uf' => 'SP',
            'nome' => 'São Paulo',
        ]);
        DB::table('estados')->insert([
            'id' => 28,
            'uf' => 'SE',
            'nome' => 'Sergipe',
        ]);
        DB::table('estados')->insert([
            'id' => 17,
            'uf' => 'TO',
            'nome' => 'Tocantins',
        ]);

    }
}
