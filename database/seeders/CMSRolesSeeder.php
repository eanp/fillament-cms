<?php
namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class CmsRolesSeeder extends Seeder
{
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        \Spatie\Permission\Models\Permission::query()->delete();
        \Spatie\Permission\Models\Role::query()->delete();

        $permissions = [
            'view_posts' => 'Access to view all posts',
            'create_posts' => 'Create new posts',
            'edit_posts' => 'Edit existing posts',
            'delete_posts' => 'Delete posts',
            'publish_posts' => 'Publish or unpublish posts',
            'manage_categories' => 'Create and manage categories',
            'manage_media' => 'Upload and manage media files',
            'manage_users' => 'Create and manage users',
            'manage_settings' => 'Modify CMS settings'
        ];

        foreach ($permissions as $permission => $description) {
            Permission::create([
                'name' => $permission,
                'description' => $description,
            ]);
        }

        $roles = [
            'admin' => [
                'label' => 'Administrator',
                'permissions' => [
                    'view_posts',
                    'create_posts',
                    'edit_posts',
                    'delete_posts',
                    'publish_posts',
                    'manage_categories',
                    'manage_media',
                    'manage_users',
                    'manage_settings'
                ]
            ],
            'writer' => [
                'label' => 'Writer',
                'permissions' => [
                    'view_posts',
                    'create_posts',
                    'edit_posts',
                    'manage_media'
                ]
            ],
            'drafter' => [
                'label' => 'Drafter',
                'permissions' => [
                    'view_posts',
                    'create_posts',
                    'edit_posts'
                ]
            ]
        ];

        foreach ($roles as $roleName => $roleData) {
            $role = Role::create([
                'name' => $roleName,
                'description' => $roleData['label']
            ]);
            $role->givePermissionTo($roleData['permissions']);
        }
    }
}
