<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('puddings', function (Blueprint $table) {
            $table->id();
            $table->string('shop_name'); //stringは入力可能数が255文字になる
            $table->string('shop_introduction');  
            $table->string('officialsite');
            $table->string('pets_allowed');
            $table->string('reservations_allowed');
            $table->string('shop_address');
            $table->string('image_path');  // 画像のパスを保存するカラム
            $table->timestamps(); //これを書くことでcreated_at、updated_atのカラムが出来る
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('puddings');
    }
};
