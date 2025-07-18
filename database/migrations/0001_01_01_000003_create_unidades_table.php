<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class CreateUnidadesTable extends Migration
{
    public function up(): void
    {
        Schema::create('unidades', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('slug')->unique();
            $table->string('imagem')->nullable();
            $table->string('telefone')->nullable();
            $table->text('especialidades')->nullable();
            $table->string('endereco');
            $table->decimal('latitude', 10, 7)->nullable();
            $table->decimal('longitude', 10, 7)->nullable();
            $table->timestamps();
        });

        // Inserindo dados diretamente
        DB::table('unidades')->insert([
            [
                'nome' => 'Centro de Saúde/ Secretaria de Saúde',
                'slug' => 'centro-de-saude',
                'imagem' => 'centro-de-saude.jpg',
                'telefone' => '3262-8400',
                'especialidades' => 'Clínico Geral e Ginecologia/ Obstetrícia, Atendimento de Assistente Social, Setor de Agendamento,Epidemiologia, Vacinação',
                'endereco' => 'Rua Manoel Ribas, s/n - Centro',
                'latitude' => -23.37276604099743,
                'longitude' => -50.84401371649174,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Posto de Saúde Vila Nova',
                'slug' => 'posto-de-saude-vila-nova',
                'imagem' => 'posto-vila-nova.jpg',
                'telefone' => '3211-1116',
                'especialidades' => 'Clínico Geral e Pediatria, Vacinação',
                'endereco' => 'Rua Primavera, s/n – Vila Nova',
                'latitude' => -23.366192558956854,
                'longitude' => -50.84584325589272,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Posto de Saúde Copasa',
                'slug' => 'posto-copasa',
                'imagem' => 'posto-copasa.jpg',
                'telefone' => '3262-5330',
                'especialidades' => 'Clínico Geral, Pediatria, Vacinação',
                'endereco' => 'Rua Tancredo Neves, s/n – Conjunto Assaí',
                'latitude' => -23.382461742922988,
                'longitude' => -50.85182242300341,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        
            [
                'nome' => 'Posto Pau D\'Alho do Sul',
                'slug' => 'posto-pau-dalho-do-sul',
                'imagem' => 'posto-pau-dalho.jpg',
                'telefone' => '3211-1116',
                'especialidades' => 'Clínico Geral, Odontologia, Vacinação',
                'endereco' => 'Rua Principal, s/n – Distrito Pau D\'Alho do Sul',
                'latitude' => -23.520147921710354,
                'longitude' => -50.89325316923388,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Posto de Saúde Vila Nova Esperança ',
                'slug' => 'posto-vila-nova-esperanca',
                'imagem' => 'posto-vila-nova-esperanca.jpg',
                'telefone' => '3262-5582',
                'especialidades' => 'Clínico Geral, Pediatria, Vacinação',
                'endereco' => 'Rua Vicente Ilario da Cruz, s/n – Vila Esperança',
                'latitude' => -23.379656634566572,
                'longitude' => -50.83721946861969,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Clínica Da Mulher',
                'slug' => 'clinica-da-mulher',
                'imagem' => 'clinica-da-mulher.jpg',
                'telefone' => '3262-2373',
                'especialidades' => 'Ortopedia, Psiquiatria, Endocrino Pediátra, Cardiologia, Psicologia, Fonoaudiologia, Fisioterapia, Exame de Eletrocardiograma',
                'endereco' => 'Rua Getúlio Vargas, s/n – Centro',
                'latitude' => -23.371973707982605,
                'longitude' => -50.84689517009438,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Policlínica',
                'slug' => 'policlinica',
                'imagem' => 'policlinica.jpg',
                'telefone' => '3262-0865',
                'especialidades' => 'Fisioterapia, Odontologia',
                'endereco' => 'Av Rio de Janeiro, s/n – Centro',
                'latitude' => -23.370000000000000,
                'longitude' => -50.850000000000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Hospital Municipal de Assaí',
                'slug' => 'hospital-municipal-de-assai',
                'imagem' => 'hospital.jpg',
                'telefone' => '3262-4080',
                'especialidades' => 'Atendimento, Urgência, Emergência',
                'endereco' => 'Rua Manoel Ribas, 1530 – Centro',
                'latitude' => -23.378873158652166,
                'longitude' => -50.8411611748812,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Fármacia Municipal',
                'slug' => 'farmacia-municipal',
                'imagem' => 'farmacia-municipal.jpg',
                'telefone' => '3262-0064',
                'especialidades' => 'Fornecimento de Medicamentos',
                'endereco' => 'Av Rio de Janeiro, s/n – Centro',
                'latitude' => -23.38043176530061,
                'longitude' => -50.84201632740277,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'nome' => 'Sede Endemias',
                'slug' => 'sede-endemias',
                'imagem' => 'sede-endemias.jpg',
                'telefone' => '',
                'especialidades' => 'Combate de doenças endêmicas',
                'endereco' => 'Rua Tancredo Neves, s/n – Conjunto Assaí',
                'latitude' => -23.378873158652166,
                'longitude' => -50.8411611748812,
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }

    public function down(): void
    {
        Schema::dropIfExists('unidades');
    }
}
