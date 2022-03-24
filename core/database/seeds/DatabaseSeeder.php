<?php

use App\Group;
use App\GroupMenu;
use App\Menu;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Group::create([
            'name' => 'Admin',
        ]);
        User::create([
            'username' => 'admin',
            'name' => 'adii',
            'password' =>bcrypt('123456'),
            'email' => 'adi@gmail.com',
            'group_id' => 1
        ]);
        Menu::insert(array([
            'parent' => null,
            'key' => 'man',
            'name' => 'Management',
            'icon' => 0
        ],[
            'parent' => null,
            'key' => 'master',
            'name' => 'Master Data',
            'icon' => 0
        ],[
            'parent' => 1,
            'key' => 'menu-man',
            'name' => 'Menu',
            'icon' => 1
        ],[
            'parent' => 1,
            'key' => 'user-man',
            'name' => 'User',
            'icon' => 1
        ],[
            'parent' => 1,
            'key' => 'user-group',
            'name' => 'User Group',
            'icon' => 1
        ],[
            'parent' => 2,
            'key' => 'cabang',
            'name' => 'Cabang',
            'icon' => 1
        ],[
            'parent' => 2,
            'key' => 'gudang',
            'name' => 'Gudang',
            'icon' => 1
        ],[
            'parent' => 2,
            'key' => 'area-gudang',
            'name' => 'Area Gudang',
            'icon' => 1
        ],[
            'parent' => 2,
            'key' => 'brand',
            'name' => 'Brand',
            'icon' => 1
        ],[
            'parent' => 2,
            'key' => 'item',
            'name' => 'Item',
            'icon' => 1
        ],[
            'parent' => 2,
            'key' => 'variant',
            'name' => 'Variant',
            'icon' => 1
        ],[
            'parent' => 2,
            'key' => 'uom',
            'name' => 'Unit of Measure',
            'icon' => 1
        ],[
            'parent' => 2,
            'key' => 'bom',
            'name' => 'Bill of Material',
            'icon' => 1
        ]));

        GroupMenu::insert(array([
            'group_id' => 1,
            'menu_id' => 1
        ]));
    }
}
