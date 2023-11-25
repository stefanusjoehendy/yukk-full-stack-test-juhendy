<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Mst_TranstypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $data = array(
            array(
                'trans_code'    => 'TRIN',
                'trans_name'    => 'TOP UP',
                'lastno'        => 1
            ),
            array(
                'trans_code'    => 'TROT',
                'trans_name'    => 'PAYMENT',
                'lastno'        => 1
            ),
        );
        DB::table('mst_transtype')->insert($data);
    }
}
