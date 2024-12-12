<?php

namespace Database\Seeders\Apps;

use App\Models\Menu;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menu = [];
        $menus = [
            ['name' => 'Dashboard', 'route' => 'dashboard', 'icon' => 'dashboard', 'order' => 1],
            ['name' => 'Manage Users', 'route' => 'manage-users', 'icon' => 'dashboard', 'order' => 2],
            ['name' => 'Manage Roles', 'route' => 'manage-roles', 'icon' => 'dashboard', 'order' => 3],
            ['name' => 'Manage Menus', 'route' => 'manage-menus', 'icon' => 'dashboard', 'order' => 4],
            ['name' => 'Pengajuan KRS', 'route' => 'pengajuan', 'icon' => 'dashboard', 'order' => 5],
            ['name' => 'Pembelajaran', 'route' => 'pembelajaran', 'icon' => 'dashboard', 'order' => 6],
        ];

        foreach ($menus as $menuData) {
            $menu[] = Menu::create($menuData);
        }

        $parentId = $menu[5]->id ?? null;
        $subMenus = [
            ['name' => 'Kelas', 'route' => 'kelas', 'icon' => 'dashboard', 'order' => 1, 'parent_id' => $parentId],
            ['name' => 'Praktikum', 'route' => 'pengajuan', 'icon' => 'dashboard', 'order' => 2, 'parent_id' => $parentId],
            ['name' => 'Daftar Nilai', 'route' => 'daftar-nilai', 'icon' => 'dashboard', 'order' => 3, 'parent_id' => $parentId],
        ];

        foreach ($subMenus as $subMenu) {
            Menu::create($subMenu);
        }
    }
}
