<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB; //追加
use Illuminate\Support\Str; //追加
use Illuminate\Support\Facades\Hash; //追加

class initCafeseeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name'       =>'admincafe',
            'email'      =>'admincafe@gmail.com',
            'password'   =>Hash::make('12345'),
        ]);
    }
}
//Base table or view not found: 1146 Table 'pudding.admin' doesn't exist (SQL: insert into `admin` (`admin_name`, `email`, `password`) values (admincafe, admincafe@gmail.com, 12345))
//ベースとなるテーブルまたはビューが見つかりません: 1146 テーブル 'pudding.admin' が存在しません