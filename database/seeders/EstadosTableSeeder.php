<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EstadosTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $now = date("Y-m-d H:i:s");

        DB::table("estados")->insert([
            [
                "id"         => 11,
                "nome"       => "Rondônia",
                "abrev"       => "RO",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 12,
                "nome"       => "Acre",
                "abrev"       => "AC",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 13,
                "nome"       => "Amazonas",
                "abrev"       => "AM",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 14,
                "nome"       => "Roraima",
                "abrev"       => "RR",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 15,
                "nome"       => "Pará",
                "abrev"       => "PA",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 16,
                "nome"       => "Amapá",
                "abrev"       => "AP",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 17,
                "nome"       => "Tocantins",
                "abrev"       => "TO",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 21,
                "nome"       => "Maranhão",
                "abrev"       => "MA",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 22,
                "nome"       => "Piauí",
                "abrev"       => "PI",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 23,
                "nome"       => "Ceará",
                "abrev"       => "CE",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 24,
                "nome"       => "Rio Grande do Norte",
                "abrev"       => "RN",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 25,
                "nome"       => "Paraíba",
                "abrev"       => "PB",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 26,
                "nome"       => "Pernambuco",
                "abrev"       => "PE",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 27,
                "nome"       => "Alagoas",
                "abrev"       => "AL",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 28,
                "nome"       => "Sergipe",
                "abrev"       => "SE",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 29,
                "nome"       => "Bahia",
                "abrev"       => "BA",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 31,
                "nome"       => "Minas Gerais",
                "abrev"       => "MG",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 32,
                "nome"       => "Espírito Santo",
                "abrev"       => "ES",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 33,
                "nome"       => "Rio de Janeiro",
                "abrev"       => "RJ",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 35,
                "nome"       => "São Paulo",
                "abrev"       => "SP",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 41,
                "nome"       => "Paraná",
                "abrev"       => "PR",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 42,
                "nome"       => "Santa Catarina",
                "abrev"       => "SC",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 43,
                "nome"       => "Rio Grande do Sul",
                "abrev"       => "RS",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 50,
                "nome"       => "Mato Grosso do Sul",
                "abrev"       => "MS",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 51,
                "nome"       => "Mato Grosso",
                "abrev"       => "MT",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 52,
                "nome"       => "Goiás",
                "abrev"       => "GO",
                "created_at" => $now,
                "updated_at" => $now,
            ], [
                "id"         => 53,
                "nome"       => "Distrito Federal",
                "abrev"       => "DF",
                "created_at" => $now,
                "updated_at" => $now,
            ],
        ]);

    }

}
