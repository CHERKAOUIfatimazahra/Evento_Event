<?php

namespace Database\Seeders;

use App\Models\Permission;
use Illuminate\Database\Seeder;
use App\Models\Role;
use App\Models\User;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    // public function run()
    // {
    //     Role::create(['name' => 'admin']);
    //     Role::create(['name' => 'ogranizer']);
    //     Role::create(['name' => 'spectator']);

        public function run(): void
    {
        // Permissions for admin role
        $adminPermissions = [
            'manage-reservation-approval',
            'manage-users',
            'manage-event-categories',
            'approve-events',
            'view-platform-statistics',
        ];

        // Permissions for spectator role
        $spectatorPermissions = [
            'register-for-event',
            'cancel-registration',
            'view-event-list',
            'filter-events-by-category',
            'search-events-by-title',
            'view-event-details',
        ];

        // Permissions for organizer role
        $organizerPermissions = [
            'create-event',
            'edit-event',
            'delete-event',
            'view-event',
            'view-reservation-statistics',
        ];

        // Creating permissions
        foreach ($adminPermissions as $permissionName) {
            Permission::create(['name' => $permissionName]);
        }

        foreach ($spectatorPermissions as $permissionName) {
            Permission::create(['name' => $permissionName]);
        }

        foreach ($organizerPermissions as $permissionName) {
            Permission::create(['name' => $permissionName]);
        }

        // Creating roles
        $roleAdmin = Role::create(['name' => 'admin']);
        $roleSpectator = Role::create(['name' => 'spectator']);
        $roleOrganizer = Role::create(['name' => 'organizer']);

        // Attaching permissions to roles
        $roleAdmin->permissions()->sync(Permission::pluck('id')->toArray());
        $roleSpectator->permissions()->sync(Permission::whereIn('name', $spectatorPermissions)->pluck('id')->toArray());
        $roleOrganizer->permissions()->sync(Permission::whereIn('name', $organizerPermissions)->pluck('id')->toArray());

        // Creating users and assigning roles
        $admin = User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'password' => bcrypt('admin'),
        ]);
        $admin->roles()->attach($roleAdmin);

        $user = User::create([
            'name' => 'User',
            'email' => 'user@gmail.com',
            'password' => bcrypt('user'),
        ]);
        $user->roles()->attach($roleSpectator);
    }
    }
// }
