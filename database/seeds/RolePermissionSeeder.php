<?php

use App\Models\Admin;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

/**
 * Class RolePermissionSeeder.
 *
 * @see https://spatie.be/docs/laravel-permission/v5/basic-usage/multiple-guards
 *
 * @package App\Database\Seeds
 */
class RolePermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Permission List as array
        $permissions = [
            [
                'group_name' => 'dashboard',
                'permissions' => [
                    'dashboard.view',
                    'dashboard.edit',
                ]
            ],
            [
                'group_name' => 'blog',
                'permissions' => [
                    'blog.create',
                    'blog.view',
                    'blog.edit',
                    'blog.delete',
                    'blog.approve',
                ]
            ],
            [
                'group_name' => 'admin',
                'permissions' => [
                    'admin.create',
                    'admin.view',
                    'admin.edit',
                    'admin.delete',
                    'admin.approve',
                ]
            ],
            [
                'group_name' => 'role',
                'permissions' => [
                    'role.create',
                    'role.view',
                    'role.edit',
                    'role.delete',
                    'role.approve',
                ]
            ],
            [
                'group_name' => 'profile',
                'permissions' => [
                    'profile.view',
                    'profile.edit',
                    'profile.delete',
                    'profile.update',
                ]
            ],
        ];

        // Find or create the superadmin user
        $admin = Admin::where('username', 'superadmin')->first();
        $roleSuperAdmin = $this->maybeCreateSuperAdminRole($admin);

        // Create and Assign Permissions for admin guard
        foreach ($permissions as $permissionGroup) {
            foreach ($permissionGroup['permissions'] as $permissionName) {
                $this->createPermissionAndAssignRole($permissionName, $permissionGroup['group_name'], 'admin', $roleSuperAdmin);
            }
        }

        // Assign super admin role to superadmin user
        if ($admin) {
            $admin->assignRole($roleSuperAdmin);
        }

        // Create Permissions for web guard
        foreach ($permissions as $permissionGroup) {
            foreach ($permissionGroup['permissions'] as $permissionName) {
                $this->createPermissionIfNotExists($permissionName, $permissionGroup['group_name'], 'web');
            }
        }
    }

    private function maybeCreateSuperAdminRole($admin): Role
    {
        $roleSuperAdmin = Role::where('name', 'superadmin')->where('guard_name', 'admin')->first();

        if (is_null($roleSuperAdmin)) {
            $roleSuperAdmin = Role::create(['name' => 'superadmin', 'guard_name' => 'admin']);
        }

        return $roleSuperAdmin;
    }

    private function createPermissionAndAssignRole($permissionName, $groupName, $guardName, $role)
    {
        $permission = Permission::where('name', $permissionName)->where('guard_name', $guardName)->first();
        if (is_null($permission)) {
            $permission = Permission::create([
                'name' => $permissionName,
                'group_name' => $groupName,
                'guard_name' => $guardName,
            ]);
        }
        if (!$role->hasPermissionTo($permission)) {
            $role->givePermissionTo($permission);
            $permission->assignRole($role);
        }
    }

    private function createPermissionIfNotExists($permissionName, $groupName, $guardName)
    {
        $permission = Permission::where('name', $permissionName)->where('guard_name', $guardName)->first();
        if (is_null($permission)) {
            Permission::create([
                'name' => $permissionName,
                'group_name' => $groupName,
                'guard_name' => $guardName,
            ]);
        }
    }
}
