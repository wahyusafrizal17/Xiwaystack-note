<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BankAccountSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\BankAccount::create([
            'bank_name' => 'Seabank',
            'account_number' => '901527383224',
            'account_holder_name' => 'Wahyu Safrizal',
            'is_active' => true,
        ]);

        \App\Models\BankAccount::create([
            'bank_name' => 'Mandiri',
            'account_number' => '1320022890280',
            'account_holder_name' => 'Wahyu Safrizal',
            'is_active' => true,
        ]);

        \App\Models\BankAccount::create([
            'bank_name' => 'DANA',
            'account_number' => '081318960576',
            'account_holder_name' => 'Wahyu Safrizal',
            'is_active' => true,
        ]);
    }
}
