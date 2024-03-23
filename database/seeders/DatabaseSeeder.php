<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
use App\Models\Role;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => bcrypt('admin'),
            'email_verified_at' => now()
        ]);

        User::create([
            'name' => 'Pegawai 1',
            'email' => 'pegawai1@admin.com',
            'password' => bcrypt('pegawai1'),
            'email_verified_at' => now()
        ]);

        User::create([
            'name' => 'Pegawai 2',
            'email' => 'pegawai2@admin.com',
            'password' => bcrypt('pegawai2'),
            'email_verified_at' => now()
        ]);
    }
}
