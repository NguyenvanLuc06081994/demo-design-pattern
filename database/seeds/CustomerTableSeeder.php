<?php

use App\Customer;
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
//        $arr = [];
//        $data = [
//            'name'=> Str::random(8),
//            'phone'=> Str::random(10),
//            'email'=>Str::random(20),
//            'address'=>Str::random(20)
//        ];
//        for ($i = 0; $i < 20 ; $i++) {
//            array_push($arr,$data);
//        }
//        DB::table('customers')->insert($arr);
        $customer = new Customer();
        $customer->name = "customer 1";
        $customer->phone  = "113";
        $customer->email  = "customer1@codegym.vn";
        $customer->address  = "Ha Noi";
        $customer->city_id  = 1;
        $customer->save();
        $customer = new Customer();

        $customer->name = "customer 2";
        $customer->phone  = "113";
        $customer->email  = "customer2@codegym.vn";
        $customer->address  = "Ha Noi";
        $customer->city_id  = 1;
        $customer->save();
        $customer = new Customer();

        $customer->name = "customer 3";
        $customer->phone  = "113";
        $customer->email  = "customer3@codegym.vn";
        $customer->address  = "Ha Noi";
        $customer->city_id  = 2;
        $customer->save();
    }
}
