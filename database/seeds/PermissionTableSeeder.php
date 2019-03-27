<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'manage-roles',
            'manage-locations',
            'manage-questions',
            'manage-content',
            'manage-documents',
            'manage-schools',
            'manage-students',
            'manage-teachers',
            'manage-parents',
            'manage-subjects',
            'manage-units',
            'manage-observations',
            'manage-results',
            'manage-question-guides',
            'school-level-performance',
            'sector-level-performance',
            'district-level-performance',
            'national-level-performance'
        ];

        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }


    }
}
