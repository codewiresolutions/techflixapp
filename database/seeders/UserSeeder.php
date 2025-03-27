<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'tecfix',
            'first_name' => 'tecfix',
            'last_name' => 'Admin',
            'email' => 'admin@tecfix.com',
            'email_verified_at' => now(),
            'password' => Hash::make('tecfix#1234'),
            'role_id' => 1,
            'is_admin' => 1,
            'user_type'=>'superadmin'

        ]);

        $user = User::find(1);
        $user->assignRole('superadmin');
    }
}
