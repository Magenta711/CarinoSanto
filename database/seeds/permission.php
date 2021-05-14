<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission as per;

class permission extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'Ver todas las respuestas',
            'Ver respuestas del cliente propias',
            'Ver lista de respuestas',
            'Eliminar respuestas',
            'Ver lista de formularios',
            'Ver formularios',
            'Crear formularios',
            'Editar formularios',
            'Eliminar formularios',
            'Copiar url de su formulario',
        ];
        for ($i = 0; $i < count($permissions); $i++) {
            per::create([
                  'name' => $permissions[$i],
                  'guard_name' => 'web'
            ]);
        }

    }
}
