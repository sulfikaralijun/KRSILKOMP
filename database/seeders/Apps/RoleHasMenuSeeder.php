<?php

namespace Database\Seeders\Apps;

use App\Models\Menu;
use App\Models\RoleMenu;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class RoleHasMenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles = [
            'super-admin' => Menu::limit(4)->get(),
            'dosen' => Menu::limit(1)->get()->merge(Menu::skip(4)->take(PHP_INT_MAX)->get()),
            'asisten' => Menu::limit(1)->get()->merge(Menu::skip(4)->take(PHP_INT_MAX)->get()),
            'mahasiswa' => Menu::limit(1)->get()->merge(Menu::skip(4)->take(4)->get()),
        ];

        foreach ($roles as $roleName => $menus) {
            $role = Role::where('name', $roleName)->first();
            foreach ($menus as $menu) {
                RoleMenu::create([
                    'role_id' => $role->id,
                    'menu_id' => $menu->id,
                ]);
            }
        }
    }
}
