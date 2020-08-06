<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CustomerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [];
        $data = [
            'name'=> Str::random(8),
            'phone'=> Str::random(10),
            'email'=>Str::random(20),
            'address'=>Str::random(20)
        ];
        for ($i = 0; $i < 20 ; $i++) {
            array_push($arr,$data);
        }
        DB::table('customers')->insert($arr);
    }
}
