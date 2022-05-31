<?php

namespace Database\Seeders;

use App\Models\Bank;
use Illuminate\Database\Seeder;

class BankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $banks = ['BRI', 'BNI', 'BCA', 'MANDIRI', 'CIMB NIAGA', 'BTPN', 'PERMATA BANK', 'MUAMALAT', 'MAYBANK', 'OVO', 'Dana', 'Gopay'];
        foreach ($banks as $bank) {
            Bank::create([
                'name' => $bank,
            ]);
        }
    }
}
