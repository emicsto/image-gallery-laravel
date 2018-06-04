<?php

use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;


class PermissionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Permission::create(['name' => 'manage images']);
        Permission::create(['name' => 'manage own images']);
        Permission::create(['name' => 'create images']);
        Permission::create(['name' => 'show images']);

        Permission::create(['name' => 'manage tags']);
        Permission::create(['name' => 'create tags']);

        Permission::create(['name' => 'create users']);
        Permission::create(['name' => 'manage users']);

        Permission::create(['name' => 'manage own comments']);


        Role::create(['name' => 'image author'])->givePermissionTo(['manage own images']);
        Role::create(['name' => 'comment author'])->givePermissionTo(['manage own comments']);

        $role1 = Role::create(['name' => 'admin']);
        $role1->givePermissionTo(
            'manage images',
            'create images',
            'show images',
            'create tags',
            'manage tags',
            'manage users'
        );

        $role2 = Role::create(['name' => 'user']);
        $role2->givePermissionTo(
            'show images',
            'create images',
            'create tags'
        );

        $user1 = Factory(App\User::class)->create([
            'name' => 'admin',
            'email' => 'admin@example.com',
        ]);
        $user1->assignRole($role1);

        $user2 = Factory(App\User::class)->create([
            'name' => 'user',
            'email' => 'user@example.com',
        ]);
        $user2->assignRole($role2);


        factory('App\Tag',10)->create();

    }
}
