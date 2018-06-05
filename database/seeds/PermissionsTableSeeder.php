<?php

use App\Tag;
use App\User;
use Illuminate\Support\Facades\DB;
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


        factory('App\User',20)->create();
        factory('App\Image',40)->create();
        factory('App\Tag',9)->create();
        factory('App\Comment',100)->create();

for($i=1;$i<40;$i++){
    for($j=1;$j<10;$j++) {
        DB::table('image_tag')->insert(
            [
                'tag_id' => $j,
                'image_id' => $i,
            ]
        );
    }
}


    }
}
