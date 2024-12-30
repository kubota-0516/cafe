<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //追加
use Illuminate\Support\Str; //追加
use Illuminate\Support\Facades\Hash; //追加
use App\Http\Controllers\Admin\PuddingController;
use App\Http\Controllers\Admin\ToastController;

class initCafeseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('admin')->insert([
            'admin_name' =>'admincafe',
            'email'      =>'admincafe@gmail.com',
            'password'   =>'12345',
        ]);
    }
}
