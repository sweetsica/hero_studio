<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Reset cached roles and permissions -Xóa sạch các permission trước
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

        // create permissions - example
//        Permission::create(['name' => 'edit articles']);
//        Permission::create(['name' => 'delete articles']);
//        Permission::create(['name' => 'publish articles']);
//        Permission::create(['name' => 'unpublish articles']);

        // create roles - example
          Role::create(['name' => 'super admin']);
          Role::create(['name' => Role::ROLE_COF]);
          Role::create(['name' => Role::ROLE_KOLS]);
          Role::create(['name' => Role::ROLE_EDITOR]);
    }
}
