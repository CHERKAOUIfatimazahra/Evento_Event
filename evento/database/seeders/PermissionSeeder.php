<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'create-event',
            'edit-event',
            'delete-event',
            'view-event',
            'register-for-event',
            'cancel-registration',
            'view-event-list',
            'filter-events-by-category',
            'search-events-by-title',
            'view-event-details',
            'manage-own-events',
            'view-reservation-statistics',
            'manage-reservation-approval',
            'manage-users',
            'manage-event-categories',
            'approve-events',
            'view-platform-statistics',
        ];
    
        foreach ($permissions as $permission) {
            Permission::create(['name' => $permission]);
        }
    }
}