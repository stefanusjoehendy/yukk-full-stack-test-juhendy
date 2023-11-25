<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array(
            array(
                'name' => 'Administrator',
                'username' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => bcrypt('123456')
            ),
        );
        DB::table('users')->insert($data);
    }
}
