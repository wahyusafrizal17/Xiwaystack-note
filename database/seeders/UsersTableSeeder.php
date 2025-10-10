<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $password = Hash::make('WahyuJR17_');

        $data = [
            ['name'=>'Wahyu Safrizal', 'email'=>'wahyusafrizal174@gmail.com', 'password'=> $password, 'level' => 'guest'],
        ];

        User::insert($data);
    }
}
