<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $permissions = [

            'index-specialiste',
            'create-specialiste',
            'edit-specialiste',
            'delete-specialiste',
            'show-specialiste',



            'index-consultation',
            'create-consultation',
            'edit-consultation',
            'delete-consultation',
            'show-consultation',
            'stats-consultation',
            'print-consultation',



            'index-service',
            'create-service',
            'edit-service',
            'delete-service',
            'show-service',


            'index-type',
            'create-type',
            'edit-type',
            'delete-type',
            'show-type',


            'index-soins',
            'create-soins',
            'edit-soins',
            'delete-soins',
            'show-soins',
            'stats-soins',
            'print-soins',

            'edit-analyse',
            'delete-analyse',
            'show-analyse',
            'stats-analyse',
            'print-analyse',
            'index-analyse',
            'create-analyse',



            'index-intervention',
            'create-intervention',
            'edit-intervention',
            'delete-intervention',
            'show-intervention',
            'stats-intervention',
            'print-intervention',



            'show-medecin',
            'index-medecin',
            'create-medecin',
            'edit-medecin',
            'delete-medecin',

            'show-role',
            'index-role',
            'create-role',
            'edit-role',
            'delete-role',

            'show-patient',
            'index-patient',
            'create-patient',
            'edit-patient',
            'delete-patient',

            'index-user',
            'create-user',
            'edit-user',
            'delete-user',

         ];

         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
     }
}

