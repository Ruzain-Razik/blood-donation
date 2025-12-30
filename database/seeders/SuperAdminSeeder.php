<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Check if super admin already exists
        $superAdmin = User::where('email', 'admin@admin.com')->first();

        if ($superAdmin) {
            // Update existing super admin
            $superAdmin->update([
                'name' => 'Super Admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'is_admin' => true,
            ]);

            $this->command->info('Super Admin user updated successfully!');
        } else {
            // Create new super admin
            User::create([
                'name' => 'Super Admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => now(),
                'password' => Hash::make('password'),
                'is_admin' => true,
            ]);

            $this->command->info('Super Admin user created successfully!');
        }

        $this->command->info('Email: admin@admin.com');
        $this->command->info('Password: password');
    }
}
