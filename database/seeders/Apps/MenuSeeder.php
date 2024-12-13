<?php

namespace Database\Seeders\Apps;

use App\Models\Menu;
use App\Models\RoleMenu;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menu = [];
        $menus = [
            ['name' => 'Dashboard', 'route' => 'dashboard', 'icon' => 'LayoutDashboard', 'order' => 1],
            ['name' => 'Manage Users', 'route' => 'manage-users.index', 'icon' => 'LayoutGrid', 'order' => 2],
            ['name' => 'Manage Roles', 'route' => 'manage-roles.index', 'icon' => 'LayoutGrid', 'order' => 3],
            ['name' => 'Manage Menus', 'route' => 'manage-menus.index', 'icon' => 'LayoutGrid', 'order' => 4],
            ['name' => 'Pengajuan KRS', 'route' => 'pengajuan.index', 'icon' => 'Notebook', 'order' => 5],
            ['name' => 'Pembelajaran', 'route' => 'pembelajaran.index', 'icon' => 'BookOpenText', 'order' => 6],
        ];

        foreach ($menus as $menuData) {
            $menu[] = Menu::create($menuData);
        }

        $parentId = $menu[5]->id ?? null;
        $subMenus = [
            ['name' => 'Kelas', 'route' => 'kelas.index', 'icon' => 'Presentation', 'order' => 1, 'parent_id' => $parentId],
            ['name' => 'Praktikum', 'route' => 'praktikum.index', 'icon' => 'FileTerminal', 'order' => 2, 'parent_id' => $parentId],
            ['name' => 'Daftar Nilai', 'route' => 'daftar-nilai.index', 'icon' => 'BookPlus', 'order' => 3, 'parent_id' => $parentId],
        ];

        $roleMenu = [];
        foreach ($subMenus as $subMenu) {
            $roleMenu[] = Menu::create($subMenu);
        }
    }
}
