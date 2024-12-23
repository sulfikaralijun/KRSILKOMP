<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        User::factory()->create([
            'name' => fake()->name(),
            'email' => 'zik@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'),
        ])->assignRole('super-admin');

        User::factory()->create([
            'name' => fake()->name(),
            'email' => 'dosen@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'),
        ])->assignRole('dosen');
        User::factory()->create([
            'name' => fake()->name(),
            'email' => 'dosen1@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'),
        ])->assignRole('dosen');
        User::factory()->create([
            'name' => fake()->name(),
            'email' => 'dosen2@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'),
        ])->assignRole('dosen');
        User::factory()->create([
            'name' => fake()->name(),
            'email' => 'dosen12@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'),
        ])->assignRole('dosen');
        User::factory()->create([
            'name' => fake()->name(),
            'email' => 'dosen22@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'),
        ])->assignRole('dosen');
        User::factory()->create([
            'name' => fake()->name(),
            'email' => 'dosen11@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'),
        ])->assignRole('dosen');
        User::factory()->create([
            'name' => fake()->name(),
            'email' => 'dosen21@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'),
        ])->assignRole('dosen');

        User::factory()->create([
            'name' => fake()->name(),
            'email' => 'asisten@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'),
        ])->assignRole('asisten');

        User::factory()->create([
            'name' => fake()->name(),
            'email' => 'mahasiswa@gmail.com',
            'email_verified_at' => now(),
            'password' => bcrypt('admin123'),
        ])->assignRole('mahasiswa');
    }
}
