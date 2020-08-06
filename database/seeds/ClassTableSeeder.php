<?php

use Illuminate\Database\Seeder;

class ClassTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arr = [];
        for ($i = 0; $i < 10; $i++) {
            array_push($arr,['name'=>\Illuminate\Support\Str::random(20)]);
        }
        \Illuminate\Support\Facades\DB::table('classes')->insert($arr);
    }
}
