<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        \DB::table('users')->insert([
            [
                'id' => 1,
                'name' => 'Admin',
                'email' => 'admin@admin.com',
                'email_verified_at' => Carbon::now()->toDateTimeString(),
                'password' => Hash::make("admin"),
                'role' => 3,
                'image' => 'storage/assets/profile/admin.png'
            ]
            ]);
    }
}
