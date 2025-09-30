<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Contact;

class ContactSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $contacts = [
            [
                'user_id' => 1,
                'name' => 'Mariana Almeida',
                'phone' => '88998765432',
                'email' => 'mariana.almeida@aluno.unifapce.edu.br',
                'address' => 'Rua São Pedro, 520, Centro, Juazeiro do Norte - CE',
            ],
            [
                'user_id' => 1,
                'name' => 'Felipe Santiago',
                'phone' => '88991234567',
                'email' => 'felipe.santiago@aluno.unifapce.edu.br',
                'address' => 'Avenida Padre Cícero, 1200, Salesianos, Juazeiro do Norte - CE',
            ],
            [
                'user_id' => 1,
                'name' => 'Juliana Bezerra',
                'phone' => '88988887777',
                'email' => 'juliana.bezerra@aluno.unifapce.edu.br',
                'address' => 'Rua da Conceição, 850, Franciscanos, Juazeiro do Norte - CE',
            ],
            [
                'user_id' => 1,
                'name' => 'Rafael Tavares',
                'phone' => '88999998888',
                'email' => 'rafael.tavares@aluno.unifapce.edu.br',
                'address' => 'Rua Leão XIII, 345, Lagoa Seca, Juazeiro do Norte - CE',
            ],
            [
                'user_id' => 1,
                'name' => 'Leticia Gonçalves',
                'phone' => '88987651234',
                'email' => 'leticia.goncalves@aluno.unifapce.edu.br',
                'address' => 'Avenida Castelo Branco, 1120, Pirajá, Juazeiro do Norte - CE',
            ],
        ];

        foreach ($contacts as $contact) {
            Contact::create($contact);
        }
    }
}
